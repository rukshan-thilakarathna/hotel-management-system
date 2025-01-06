<?php

namespace App\Services;

use App\Models\RestaurantOrder;
use App\Models\RoomBooking;
use Illuminate\Support\Facades\Auth;

class RestaurantOrderService
{
    public function saveOrder(array $data)
    {
        // Check if room booking exists (optional logic based on `room_number`)
        $roomBooking = null;
        if (isset($data['room_number']) && $data['room_number']) {
            $roomBooking = RoomBooking::where('id', $data['booking_id'])->first();
        }

        // Determine order status and payment status
        $orderStatus = 'Complete';
        $paymentStatus = $data['room_number'] ? 'Pending' : 'Complete';

        // Build the menu array
        $menu = [];
        foreach ($data['menu'] as $key => $menuItem) {
            $menu[$menuItem] = [
                'quantities' => $data['quantity'][$key] ?? 0,
                'unit_price' => $data['price'][$key] ?? 0,
                'total_price' => ($data['price'][$key] ?? 0) * ($data['quantity'][$key] ?? 0),
            ];
        }

        // Save the order to the database
        $newOrder = new RestaurantOrder();
        $newOrder->order_id = $data['order_number'];
        $newOrder->user_id = $roomBooking->user_id ?? 0; // Use authenticated user ID or fallback
        $newOrder->user_name = $data['name'];
        $newOrder->room_id = $data['room_number'] ?? 0;
        $newOrder->booking_id = $data['booking_id'] ?? 0;
        $newOrder->type_of_order = $data['order_type'];
        $newOrder->service_charge = $data['service_charge'] ?? 0;
        $newOrder->vat_charge = $data['vat'] ?? 0;
        $newOrder->Items = json_encode($menu); // Convert menu to JSON
        $newOrder->total_amount = $data['total_price'];
        $newOrder->order_status = $orderStatus;
        $newOrder->payment_status = $paymentStatus;
        $newOrder->added_user = Auth::id();
        $newOrder->save();

        return $newOrder;
    }
}
