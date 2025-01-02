<?php

namespace App\Orchid\Screens\Restaurant;

use App\Models\RestaurantOrder;
use App\Orchid\Layouts\Restaurant\RestaurantPlaceOrderListLayout;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use Orchid\Screen\Actions\Link as ActionsLink;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RestaurantOrderListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $orders = RestaurantOrder::with('user')->filters()
            ->defaultSort('id', 'desc')->get();

        return [
            'orders' => $orders
        ];

    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Restaurant Order Management';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            
            ActionsLink::make('Place Order')->icon('bs.plus-circle')->route('platform.systems.restaurant-place-order'),
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
            RestaurantPlaceOrderListLayout::class,
            Layout::modal('CancelOrder', [
                Layout::rows([
                    TextArea::make('reson_for_order')->title('Reason For Cancellation')->required(),
                ]),
            ]),

        ];
    }

    public function cancelOrder(Request $request){

        $order = RestaurantOrder::find($request->id);

        $order->order_status = 'Cancelled';
        $order->payment_status = 'Cancelled';
        $order->save();
        
        Toast::info('Order Cancelled');
    }



}
