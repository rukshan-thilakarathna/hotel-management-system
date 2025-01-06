<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Services\RestaurantOrderService;
use App\Http\Requests\SaveOrderRequest;
use Illuminate\Http\Request;

class RestaurantOrderController extends Controller
{
    protected $restaurantOrderService;

    public function __construct(RestaurantOrderService $restaurantOrderService)
    {
        $this->restaurantOrderService = $restaurantOrderService;
    }

    public function index(SaveOrderRequest $request)
    {
        $newOrder = $this->restaurantOrderService->saveOrder($request->validated());
        return redirect()->route('my-bookings')->with('success', 'Your booking was successfully updated!');  
    }
}
