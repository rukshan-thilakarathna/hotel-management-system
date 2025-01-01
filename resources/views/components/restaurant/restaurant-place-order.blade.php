@php
    $menus = \App\Models\RestaurantMenu::get();
    $rooms = \App\Models\Rooms::get();
    $orders = \App\Models\RestaurantOrder::max('id');

@endphp

<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Place Order</h4>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="order_number">Order Number</label>
                        <input required type="text"  value="ORDER0{{ $orders ? $orders+1 : 1}}" class="form-control" id="order_number" readonly >
                        <input  type="hidden" name="order_number" value="ORDER0{{ $orders ? $orders+1 : 1}}"  readonly >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Customer Name</label>
                        <input required type="text" name="name" value="{{old('name')}}" class="form-control" id="name" >
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="service_charge">Room Number</label>
                        <select name="room_number" class="form-control" id="">
                            <option value="">Select Room</option>
                            @foreach ($rooms as $room)
                                <option @if (old('room_number') == $room->id) selected @endif value="{{ $room->id }}">{{ $room->number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="booking_id">Booking Id</label>
                        <input  type="text" value="{{old('booking_id')}}" name="booking_id" class="form-control" id="booking_id" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="vat">Order Type</label>
                        <select name="order_type" class="form-control" id="">
                            <option @if (old('order_type') == 'Dine In') selected @endif value="Dine In">Dine In</option>
                            <option @if (old('order_type') == 'Take Away') selected @endif value="Take Away">Take Away</option>
                            <option @if (old('order_type') == 'Delivery') selected @endif value="Delivery">Delivery</option>
                            <option @if (old('order_type') == 'Room') selected @endif value="Room">Room</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="service_charge">Service Charge</label>
                        <input type="text" class="form-control " name="" value="{{ env('CURRENCY') .' '. env('SERVICE_CHARGE') }}" id="service_charge" >
                        <input type="hidden" name="service_charge" value="{{ env('SERVICE_CHARGE') }}" id="service_charge_price">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="vat">Vat</label>
                        <input type="text" class="form-control" name="" value="{{ env('CURRENCY') .' '. env('VAT') }}" id="vat" >
                        <input type="hidden" name="vat" value="{{ env('SERVICE_CHARGE') }}" id="service_charge_price">
                    </div>
                </div>
            </div>
            <table class="table table-bordered" id="orderTable">
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Initial Row -->
                    <tr class="order-row">
                        <td>
                            <select required name="menu[]" class="form-control menu-select">
                                <option value="">Select Menu</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}" data-price="{{ $menu->price }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" required class="form-control quantity-input" name="quantity[]" value="1" placeholder="Quantity" min="1"></td>
                        <td>
                            <strong>{{env('CURRENCY')}} </strong>
                            <span class="price-display">0.00</span>
                            <input type="hidden" class="price-input" name="price[]">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm remove-row remove-button">Remove</button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-center">
                            <button type="button" id="addRow" class="btn btn-secondary add-button">Add Row</button>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Total Price</strong></td>
                        <td>
                            <strong>{{env('CURRENCY')}} </strong>
                            <span id="totalPriceDisplay">{{ env('SERVICE_CHARGE') + env('VAT') }}.00</span> <!-- Display the total price here -->
                            <input type="hidden" id="totalPriceInput" name="total_price" value="0.00"> <!-- Hidden input for total price -->
                        </td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <button data-controller="button" data-turbo="true" type="submit" class="btn btn-primary mt-3" form="post-form" formaction="http://localhost:8000/admin/restaurant-place-order/save">Place Order</button>

</button>
        </div>
    </div>
</div>

<script>
    // Function to update the price based on quantity
    function updateTotalPrice() {
        let totalPrice = {{ env('SERVICE_CHARGE') + env('VAT') }};
        
        // Loop through each row and calculate the total price
        const rows = document.querySelectorAll('#tableBody tr');
        rows.forEach(function(row) {
            const priceInput = row.querySelector('.price-input');
            const quantityInput = row.querySelector('.quantity-input');
            const priceDisplay = row.querySelector('.price-display');
            
            const price = parseFloat(priceInput.value) || 0;
            const quantity = parseInt(quantityInput.value) || 1; // Ensure quantity defaults to 1 if not provided

            // Update the price display
            priceDisplay.textContent = (price * quantity).toFixed(2);

            // Add the total price for the current row
            totalPrice += price * quantity;
        });

        // Update the total price displayed on the page (span)
        document.getElementById('totalPriceDisplay').textContent = totalPrice.toFixed(2);
        
        // Update the hidden input with the total price value
        document.getElementById('totalPriceInput').value = totalPrice.toFixed(2);
    }

    // Update the price input when a menu item is selected
    document.getElementById('tableBody').addEventListener('change', function (e) {
        if (e.target && e.target.classList.contains('menu-select')) {
            const priceInput = e.target.closest('tr').querySelector('.price-input');
            const priceDisplay = e.target.closest('tr').querySelector('.price-display');
            const selectedOption = e.target.options[e.target.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            
            // Update the price input with the menu item's price and update the display
            priceInput.value = price ? price : '';
            priceDisplay.textContent = price ? price : '0.00';
            updateTotalPrice(); // Update total price based on new menu selection
        }

        if (e.target && e.target.classList.contains('quantity-input')) {
            updateTotalPrice(); // Update total price when quantity changes
        }
    });

    // Add a new row
    document.getElementById('addRow').addEventListener('click', function () {
        const tableBody = document.getElementById('tableBody');
        
        // Create a new row
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>
                <select required name="menu[]" class="form-control menu-select">
                    <option value="">Select Menu</option>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}" data-price="{{ $menu->price }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
            </td>
            <td><input required type="number" class="form-control quantity-input" name="quantity[]" value="1" placeholder="Quantity" min="1"></td>
            <td>
                <strong>{{env('CURRENCY')}} </strong>
                <span class="price-display">0.00</span>
                <input type="hidden" class="price-input" name="price[]">
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm remove-row remove-button">Remove</button>
            </td>
        `;

        // Append the new row to the table body
        tableBody.appendChild(newRow);
    });

    // Delegate remove-row functionality, prevent removal of the first row
    document.getElementById('tableBody').addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-row')) {
            const rows = document.querySelectorAll('#tableBody tr');
            if (rows.length > 1) {
                const row = e.target.closest('tr');
                row.remove();
                updateTotalPrice(); // Update total price when a row is removed
            } else {
                alert('The first row cannot be removed!');
            }
        }
    });
</script>
