<?php

namespace App\Orchid\Screens\Rooms;

use App\Models\Rooms;
use App\View\Components\RoomView;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RoomViewScreen extends Screen
{
    public  $rooms;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Rooms $id): iterable
    {
        $this->rooms = $id;

        return [
            'room' => $id
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Room View Screen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Update')
                            ->modal('Upload')
                            ->icon('pencil')
                            ->modalTitle('Update images')
                            ->method('uploadImage', [
                                'id' => $this->rooms->id,
                            ]),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
           Layout::component(RoomView::class),
           Layout::modal('Upload', [
            Layout::rows([

                Input::make('image')
                    ->type('file')
                    ->required()
                    ->multiple()
                    ->title('Images (700px * 700px)'),

            ]),
        ]),
        ];
    }

    public function uploadImage(Request $request): void
{
    // Find the room by ID or fail
    $room = Rooms::findOrFail($request->id);

    // Decode existing images, default to an empty array if null
    $existingImages = json_decode($room->image, true) ?? [];

    if ($request->hasFile('image')) {
        $newImages = [];

        foreach ($request->file('image') as $uploadedFile) {
            // Generate a unique filename with the original extension
            $extension = $uploadedFile->getClientOriginalExtension();
            $filename = uniqid('room_', true) . '.' . $extension;

            // Store the file in the 'rooms' directory under 'public'
            $uploadedFile->storeAs('rooms', $filename, 'public');

            // Add the filename to the new images array
            $newImages[] = $filename;
        }

        // Merge existing images with new ones
        $allImages = array_merge($existingImages, $newImages);

        // Save updated images as JSON
        $room->image = json_encode($allImages);
        $room->save();

        // Show a success message using Toast
        Toast::info(__('Images were updated successfully.'));
    } else {
        Toast::error(__('No image files were uploaded.'));
    }
}


    public function deleteimage(Request $request): void
    {
      
        $room = Rooms::findOrFail($request->id);
        $existingImages = json_decode($room->image, true) ?? []; // Decode existing images, default to empty array

        if ($request->has('image')) {
            $imageToDelete = $request->input('image');

            // Remove the image from the array
            $updatedImages = array_filter($existingImages, function ($image) use ($imageToDelete) {
                return $image !== $imageToDelete;
            });

            // Save updated images as JSON
            $room->image = json_encode($updatedImages);
            $room->save();
        }

        Toast::info(__('Image was deleted'));
    }
}
