<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .invoice-header {
            background-color: #f8f9fa;
            padding: 20px;
            border-bottom: 2px solid #dee2e6;
        }
        .invoice-title {
            font-weight: bold;
        }
        .invoice-section {
            margin-top: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .r-summary {
            color: #636363;
            font-size: 13px;
        }
    </style>
</head>
<body>
<div class="container my-4">
    <div class="invoice-header d-flex justify-content-between align-items-center">
        <div>
            <h1 class="invoice-title">Invoice <span class="text-muted">With Credit</span></h1>
            <p>NO: {{$booking->bill->id}} | Date: {{ Carbon\Carbon::createFromTimestamp($booking->bill->created_at)->format('Y-m-d') }}</p>
        </div>
        <div class="text-end">
            <h4>Acme Corporation</h4>
            <p>Software Development<br>Field 3, Moon<br>info@acme.com</p>
        </div>
    </div>

    <div class="row invoice-section">
        <div class="col-md-6">
            <h5>Company Details</h5>
            <p><strong>Name:</strong> Acme Corporation</p>
            <p><strong>Industry:</strong> Hottel</p>
            <p><strong>Address:</strong> Field 3, Moon</p>
            <p><strong>Phone:</strong> 123.4456.4567</p>
            <p><strong>Email:</strong> mail@acme.com</p>
        </div>
        <div class="col-md-6">
            <h5>Customer Details</h5>
            <p><strong>Name:</strong> {{$booking->user->name}}</p>
            <p><strong>Email:</strong> {{$booking->user->email}}</p>
            <p><strong>Booking Id:</strong> {{$booking->id}}</p>
        </div>
    </div>

    <div class="invoice-section">
        <h5>Room Charges</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item / Details</th>
                    <th>Unit Price</th>
                    <th>Night</th>
                    <th>Quantity</th>
                    <th>Tax</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">Room Charges</th>
                </tr>
            <tr>
                <td class="r-summary">
                    <strong>Room Number {{$booking->room->number}}</strong><br>
                  
                </td>
                <td class="r-summary">{{env('CURRENCY')}}     {{$booking->room->price}} <br><small>Only Room Charges for 1 Night</small></td>
                <td class="r-summary">{{$booking->bill->nights}}</td>
                <td class="r-summary">-</td>
                <td class="r-summary">{{env('CURRENCY')}} 0</td>
                <td class="r-summary">{{env('CURRENCY')}} {{$booking->room->price * $booking->bill->nights}}</td>
            </tr>
            <tr>
                <th colspan="5">Sub Total - Room Charges</th>
                <td>{{env('CURRENCY')}} {{$booking->room->price * $booking->bill->nights}}</td>
            </tr>

            @php
                $added_charges = $booking->bill->added_charges;
                $added_charges = json_decode($added_charges, true);  // The second parameter "true" will return an associative array
                $subtotal = 0
            @endphp
            <tr>
                <td colspan="6">Additional Charges</th>
            </tr>
            @foreach ($added_charges as $key => $added_charge)

            <tr>
                <td class="r-summary">
                    <strong>{{$key}}</strong><br>
                    
                </td>
                <td class="r-summary">{{env('CURRENCY')}} {{$added_charge['charge']}}</td>
                <td class="r-summary">-</td>
                <td class="r-summary">{{$added_charge['count']}}</td>
                <td class="r-summary">{{env('CURRENCY')}} 0</td>
                <td class="r-summary">{{env('CURRENCY')}} {{$added_charge['charge'] * $added_charge['count']}}</td>
            </tr>

            @php
               $subtotal += ($added_charge['charge'] * $added_charge['count']);
            @endphp
                
            @endforeach
            <tr>
                <th colspan="5">Sub Total - Additional Charges</th>
                <td>{{env('CURRENCY')}} {{$subtotal}}</td>
            </tr>

            
            
            </tbody>
            {{-- <tfoot>
            <tr>
                <th colspan="5">Sub Total</th>
                <td>$19,752.00</td>
            </tr>
            </tfoot> --}}
        </table>
    </div>

    <div class="invoice-section">
        <h5>Resturant Orders</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item / Details</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Item Total price</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $resturemtotal = 0;
                @endphp
           @foreach ( $resturantbills as $key => $resturantbill)
                <tr>
                    <td colspan="5">Order Number - {{$resturantbill->order_id}}</th>
                </tr>

                @php
                $items = $resturantbill->Items;
                $items = json_decode($items, true);  // The second parameter "true" will return an associative array

                $item_count = count($items);
                $run_count = 0;
                
                $resturemtotal += $resturantbill['total_amount'];
                @endphp

                @foreach ($items as $key => $item)


                    @php
                        $run_count++;
                        $item_name = \App\Models\RestaurantMenu::where('id', $key)->first();
                    @endphp
                <tr>
                    <td class="r-summary">
                        <strong>{{$item_name->name}}</strong><br>
                    </td>
                    <td class="r-summary">{{env('CURRENCY')}} {{$item['unit_price']}}</td>
                    <td class="r-summary">{{$item['quantities']}}</td>
                    <td class="r-summary">{{env('CURRENCY')}} {{$item['total_price']}}</td>
                    @if ($run_count == $item_count)

                   
                    <td class="r-summary"> {{env('CURRENCY')}} {{$resturantbill['total_amount']}} <br> <small>Tax ({{env('CURRENCY')}} {{$resturantbill['vat_charge']}}) and services charges ({{env('CURRENCY')}} {{$resturantbill['service_charge']}}) included</small></td>
                    @endif
                </tr>
                @endforeach

               

           @endforeach

            <tr>
                <th colspan="4">Sub Total - Room Charges</th>
                <td>{{env('CURRENCY')}} {{$resturemtotal}}</td>
            </tr>

            
            
            </tbody>
            {{-- <tfoot>
            <tr>
                <th colspan="5">Sub Total</th>
                <td>$19,752.00</td>
            </tr>
            </tfoot> --}}
        </table>
    </div>


    <div class="row invoice-section">
        <div class="col-md-12">
            <h5>Comments / Notes</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odit repudiandae numquam sit facere blanditiis, quasi distinctio ipsam? Libero odit ex expedita.</p>
        </div>
        
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
