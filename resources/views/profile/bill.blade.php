<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .invoice-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .invoice-header {
            border-bottom: 2px solid #ff6f61;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            color: #ff6f61;
            margin: 0;
            font-size: 28px;
        }
        .section-title {
            font-size: 18px;
            color: #343a40;
            border-left: 4px solid #ff6f61;
            padding-left: 10px;
            margin-bottom: 15px;
        }
        .table th {
            background-color: #ff6f61;
            color: white;
            text-align: center;
        }
        .table td {
            text-align: center;
        }
        .total-section {
            font-weight: bold;
            background-color: #f1f1f1;
        }
        .notes {
            font-style: italic;
            color: #6c757d;
        }
    </style>
</head>
<body>
<div class="container invoice-container">
     <div class="print-button">
        <button class="btn btn-primary" onclick="window.print()">Print Invoice</button>
    </div>
    <div class="invoice-header d-flex justify-content-between align-items-center">
        <div>
            <h1>Invoice <small class="text-muted">#{{$booking->bill->id}}</small></h1>
            <p>Date: {{ Carbon\Carbon::createFromTimestamp($booking->bill->created_at)->format('Y-m-d') }}</p>
        </div>
        <div class="text-end">
            <h4>Acme Corporation</h4>
            <p>Software Development<br>Field 3, Moon<br><a href="mailto:info@acme.com">info@acme.com</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h5 class="section-title">Company Details</h5>
            <p><strong>Name:</strong> Acme Corporation</p>
            <p><strong>Industry:</strong> Hotel</p>
            <p><strong>Address:</strong> Field 3, Moon</p>
            <p><strong>Phone:</strong> 123.4456.4567</p>
            <p><strong>Email:</strong> <a href="mailto:mail@acme.com">mail@acme.com</a></p>
        </div>
        <div class="col-md-6">
            <h5 class="section-title">Customer Details</h5>
            <p><strong>Name:</strong> {{$booking->user->name}}</p>
            <p><strong>Email:</strong> {{$booking->user->email}}</p>
            <p><strong>Booking ID:</strong> {{$booking->id}}</p>
        </div>
    </div>

    <h5 class="section-title">Room Charges</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item / Details</th>
                <th>Unit Price</th>
                <th>Night</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="5">Room Charges</td>
            </tr>
            <tr>
                <td><strong>Room Number {{$booking->room->number}}</strong></td>
                <td>{{env('CURRENCY')}} {{$booking->room->price}}</td>
                <td>{{$booking->bill->nights}}</td>
                <td>{{env('CURRENCY')}} 0</td>
                <td>{{env('CURRENCY')}} {{$booking->room->price * $booking->bill->nights}}</td>
            </tr>
            <tr class="total-section">
                <td colspan="4">Sub Total - Room Charges</td>
                <td>{{env('CURRENCY')}} {{$booking->room->price * $booking->bill->nights}}</td>
            </tr>
        </tbody>
    </table>

    <h5 class="section-title">Additional Charges</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $added_charges = json_decode($booking->bill->added_charges, true);
                $subtotal = 0;
            @endphp
            @foreach ($added_charges as $key => $added_charge)
            <tr>
                <td>{{$key}}</td>
                <td>{{env('CURRENCY')}} {{$added_charge['charge']}}</td>
                <td>{{$added_charge['count']}}</td>
                <td>{{env('CURRENCY')}} {{$added_charge['charge'] * $added_charge['count']}}</td>
            </tr>
            @php
                $subtotal += ($added_charge['charge'] * $added_charge['count']);
            @endphp
            @endforeach
            <tr class="total-section">
                <td colspan="3">Sub Total - Additional Charges</td>
                <td>{{env('CURRENCY')}} {{$subtotal}}</td>
            </tr>
        </tbody>
    </table>

    <h5 class="section-title">Restaurant Orders</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $restaurant_total = 0;
            @endphp
            @foreach ($resturantbills as $resturantbill)
            <tr>
                <td colspan="5">Order Number - {{$resturantbill->order_id}}</td>
            </tr>
            @php
                $items = json_decode($resturantbill->Items, true);
                $restaurant_total += $resturantbill['total_amount'];

                $item_count = count($items);
                $run_count = 0;
            @endphp
            @foreach ($items as $key => $item)

            @php
                $run_count++;
               
            @endphp
            <tr>
                <td>{{ \App\Models\RestaurantMenu::find($key)->name }}</td>
                <td>{{env('CURRENCY')}} {{$item['unit_price']}}</td>
                <td>{{$item['quantities']}}</td>
                <td>{{env('CURRENCY')}} {{$item['total_price']}}</td>
                @if ($run_count == $item_count)
                    <td>{{env('CURRENCY')}} {{$resturantbill['total_amount']}}<br> <small>Tax ({{env('CURRENCY')}} {{$resturantbill['vat_charge']}}) and services charges ({{env('CURRENCY')}} {{$resturantbill['service_charge']}}) included</small></td>
                @else
                    <td></td>
                @endif
            </tr>
            @endforeach
            @endforeach
            <tr class="total-section">
                <td colspan="4">Sub Total - Restaurant Orders </td>
                <td>{{env('CURRENCY')}} {{$restaurant_total}} </td>
            </tr>
        </tbody>
    </table>

    <h5 class="text-lg font-semibold">Final Total</h5>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <tbody>
            <tr class="border-b">
                <td class="px-4 py-2 font-medium">Total Room Charges</td>
                <td class="px-4 py-2 text-right">{{ env('CURRENCY') }} {{ $booking->room->price * $booking->bill->nights }}</td>
                <td class="px-4 py-2"></td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 font-medium">Total Additional Charges</td>
                <td class="px-4 py-2 text-right">{{ env('CURRENCY') }} {{ $subtotal }}</td>
                <td class="px-4 py-2"></td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 font-medium">Total Restaurant Orders</td>
                <td class="px-4 py-2 text-right">{{ env('CURRENCY') }} {{ $restaurant_total }}</td>
                <td class="px-4 py-2"></td>
            </tr>
            <tr class="border-t border-b bg-gray-50">
                <td class="px-4 py-2 font-medium">Total</td>
                <td class="px-4 py-2 text-right"></td>
                <td class="px-4 py-2 text-right font-semibold"> {{ env('CURRENCY') }} {{ $booking->room->price * $booking->bill->nights + $subtotal + $restaurant_total }}</td>
            </tr>
            <tr class="border-b bg-gray-50">
                <td class="px-4 py-2 font-medium">Room Charges Paid</td>
                <td class="px-4 py-2 text-right"></td>
                <td class="px-4 py-2 text-right text-red-500">- {{ env('CURRENCY') }} {{ $booking->room->price * $booking->bill->nights }}</td>
            </tr>
            <tr class="bg-gray-50">
                <td class="px-4 py-2 font-medium">Amount Due</td>
                <td class="px-4 py-2 text-right"></td>
                <td class="px-4 py-2 text-right font-semibold"> {{ env('CURRENCY') }} {{ $subtotal + $restaurant_total }}</td>
            </tr>
        </tbody>
    </table>


    <div class="notes mt-3">
        <p>Thank you for choosing Acme Corporation. If you have any questions regarding this invoice, please contact us at <a href="mailto:info@acme.com">info@acme.com</a>.</p>
    </div>
</div>
</body>
</html>

