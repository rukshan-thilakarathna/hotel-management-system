<?php

namespace App\Orchid\Screens\Restaurant;


use App\Services\RestaurantOrderService;
use App\Http\Requests\SaveOrderRequest;
use App\View\Components\Restaurant\RestaurantPlaceOrder;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast as FacadesToast;

class RestaurantPlaceOrderListScreen extends Screen
{

    protected $restaurantOrderService;

    public function __construct(RestaurantOrderService $restaurantOrderService)
    {
        $this->restaurantOrderService = $restaurantOrderService;
    }
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

    public function save(SaveOrderRequest $request)
    {
        $newOrder = $this->restaurantOrderService->saveOrder($request->validated());

        Alert::info('Order saved successfully.');
    }


}
