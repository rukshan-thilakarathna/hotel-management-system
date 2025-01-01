<?php

namespace App\Orchid\Layouts\Restaurant;

use App\Models\RestaurantOrder;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class RestaurantPlaceOrderListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'orders';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('order_id', 'Order Id')
                ->render(function ($model) {
                    return '<span style="color: #080808;font-size: 11px;font-weight: 700;">' . $model->order_id . '</span>';
                }),

            TD::make('user_name', 'Customer Name'),

            TD::make('type_of_order', 'Type of Order'),

            TD::make('total_amount','Total Amount')
                ->render(function ($model) {
                    return  env('CURRENCY').' '. $model->total_amount;
                }),

            TD::make('order_status', 'Order Status')
                ->render(function ($model) {
                    return $model->order_status != 'Complete' ? '<span style="color: #ffffff;font-size: 11px;font-weight: 700;background: #ff0000;padding: 3px 10px;">' . $model->order_status . '</span>' :  '<span style="color: #ffffff;font-size: 11px;font-weight: 700;background: #047403;padding: 3px 10px;">' . $model->order_status . '</span>';
                }),

            TD::make('payment_status', 'Payment Status')
                ->render(function ($model) {
                    
                    if($model->payment_status == 'Complete'){
                        return '<span style="color: #ffffff;font-size: 11px;font-weight: 700;background: #047403;padding: 3px 10px;">' . $model->payment_status . '</span>';
                    }elseif($model->payment_status == 'Pending'){
                        return '<span style="color: #ffffff;font-size: 11px;font-weight: 700;background:rgb(214, 106, 17);padding: 3px 10px;">' . $model->payment_status . '</span>';
                    }else{
                        return '<span style="color: #ffffff;font-size: 11px;font-weight: 700;background: #ff0000;padding: 3px 10px;">' . $model->payment_status . '</span>';
                    }
                }),   

            TD::make('user.name', 'Added By'),

            TD::make(__('Actions'))
            ->align(TD::ALIGN_CENTER)
            ->width('100px')
            ->render(fn (RestaurantOrder $restaurantOrder) => DropDown::make()
                ->icon('bs.three-dots-vertical')
                ->list([

                    ModalToggle::make(__('Cancel'))
                        ->modal('CancelOrder')
                        ->modalTitle(__('Cancel Order'))
                        ->method('cancelOrder', ['id' => $restaurantOrder->id])
                        ->icon('bs.x'),


                   
                ])),
        ];
    }
}
