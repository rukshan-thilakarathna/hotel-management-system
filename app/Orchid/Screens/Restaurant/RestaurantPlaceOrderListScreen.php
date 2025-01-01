<?php

namespace App\Orchid\Screens\Restaurant;

use App\Models\RestaurantOrder;
use App\Models\RoomBooking;
use App\View\Components\Restaurant\RestaurantPlaceOrder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Alert\Toast;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast as FacadesToast;

class RestaurantPlaceOrderListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Restaurant Place Order';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::component(RestaurantPlaceOrder::class)
        ];
    }

    public function save(Request $request)
{
    // Define base validation rules
    $rules = [
        'order_number' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'order_type' => 'required|string|max:255',
        'room_number' => 'nullable|string|max:255',
        'service_charge' => 'nullable',
        'vat' => 'nullable',
        'menu' => 'required|array',
        'menu.*' => 'required|string|max:255',
        'quantity' => 'required|array',
        'quantity.*' => 'required|integer|min:1',
        'price' => 'required|array',
        'price.*' => 'required|numeric|min:0',
        'total_price' => 'required|numeric|min:0',
    ];

    // Add conditional rule if `room_number` is provided
    if ($request->has('room_number') && $request->input('room_number')) {
        $rules['booking_id'] = 'required|string|max:255';
        $rules['order_type'] = 'required|string|max:255|in:Room';


        $bookig = RoomBooking::where('id', $request->input('booking_id'))->first();
        
    }

    // Validate the request
    $validatedData = $request->validate($rules);

    // Extract validated data
    $orderNumber = $validatedData['order_number'];
    $customerName = $validatedData['name'];
    $roomNumber = $validatedData['room_number'] ?? null;
    $orderType = $validatedData['order_type'];
    $serviceCharge = $validatedData['service_charge'] ?? 0;
    $vat = $validatedData['vat'] ?? 0;
    $menuItems = $validatedData['menu'];
    $quantities = $validatedData['quantity'];
    $prices = $validatedData['price'];
    $totalPrice = $validatedData['total_price'];

    // Determine order status
    $orderStatus = 'Complete';
    $paymentStatus = $roomNumber ? 'Pending' : 'Complete';

    // Build the menu array
    $menu = [];
    foreach ($menuItems as $key => $menuItem) {
        $menu[$menuItem] = [
            'quantities' => $quantities[$key] ?? 0,
            'unit_price' => $prices[$key] ?? 0,
            'total_price' => ($prices[$key] ?? 0) * ($quantities[$key] ?? 0),
        ];
    }

    // Save the order to the database
    $newOrder = new RestaurantOrder();
    $newOrder->order_id = $orderNumber;
    $newOrder->user_id = $bookig->user_id ?? 0; // Use authenticated user ID
    $newOrder->user_name = $customerName;
    $newOrder->room_id = $roomNumber ?? 0;
    $newOrder->type_of_order = $orderType;
    $newOrder->service_charge = $serviceCharge;
    $newOrder->vat_charge = $vat;
    $newOrder->Items = json_encode($menu); // Convert menu to JSON
    $newOrder->total_amount = $totalPrice;
    $newOrder->order_status = $orderStatus;
    $newOrder->payment_status = $paymentStatus;
    $newOrder->added_user = auth()->user()->id;
    $newOrder->save();

    FacadesToast::info('Order saved successfully.');
}


}
