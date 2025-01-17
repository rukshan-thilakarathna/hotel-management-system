<x-app-layout>
    @include('layouts.dashboard')

    <!-- Menu Section -->
    <div class="container mx-auto py-8 text-white">
        <div class="bg-cover bg-center rounded-lg shadow-lg p-6" style="background-image: url('{{ asset('images/menu.jpeg') }}');">
            <h3 class="text-center text-4xl font-extrabold uppercase tracking-wide mb-8 text-shadow">Menu</h3>

            <!-- Menu Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $menus = [
                        ['title' => 'Main Dishes', 'data' => \App\Models\RestaurantMainMenu::where('is_desserts', '0')->with('subDishes')->get()],
                        ['title' => 'Desserts', 'data' => \App\Models\RestaurantMainMenu::where('is_desserts', '1')->with('subDishes')->get()]
                    ];
                @endphp

                    @foreach ($menus as $menu)
                        <div>
                            <h2 class="text-2xl font-bold mb-4">{{ $menu['title'] }}</h2>
                            @foreach ($menu['data'] as $mainDish)
                                @if ($mainDish->subDishes->count() > 0)
                                    <div class="bg-gray-800 rounded-lg p-4 shadow-lg transition-transform hover:scale-105">
                                        <h5 class="text-xl font-semibold border-b border-gray-600 pb-3 mb-4">{{ $mainDish->name }}</h5>
                                        <div class="space-y-3">
                                            @foreach ($mainDish->subDishes as $subDish)
                                                <div class="flex justify-between items-center">
                                                    <!-- Display the image -->
                                                    <img src="{{ asset('images/' . $subDish->image) }}" 
                                                        alt="{{ $subDish->name }}" 
                                                        class="w-16 h-16 rounded object-cover mr-4">
                                                    <!-- Display the name, weight, and price -->
                                                    <div class="flex-grow">
                                                        <span class="font-medium block">{{ $subDish->name }}</span>
                                                        <span class="text-gray-400 text-sm block">Weight: {{ $subDish->weight }} g</span>
                                                        <span class="font-semibold block">Rs.{{ number_format($subDish->price, 2) }}</span>
                                                    </div>
                                                    <!-- Checkbox -->
                                                    <input type="checkbox" class="menu-item w-6 h-6 text-green-500 rounded focus:ring-green-300" 
                                                        data-name="{{ $subDish->name }}" 
                                                        data-id="{{ $subDish->id }}"
                                                        data-price="{{ $subDish->price }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
            </div>
        </div>
    </div>

    <form action="{{route('restaurant-order')}}" method="Post" style="margin-bottom:30px; margin-top:-45px;">
    @csrf
    <!-- Orders Section -->
    <div class="container mx-auto mt-12">
        <div class="bg-gray-900 rounded-lg shadow-lg p-6 text-white">
            <h3 class="text-center text-3xl font-extrabold uppercase tracking-wide mb-6">Your Orders</h3>
            <div class="overflow-x-auto">
                <table class="table-auto w-full text-left">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="p-3">Orders</th>
                            <th class="p-3">Price per One</th>
                            <th class="p-3">Quantity</th>
                            <th class="p-3">Total Price</th>
                            <th class="p-3">Action</th>
                        </tr>
                    </thead>
                    <tbody id="order-list" class="divide-y divide-gray-700">
                        <!-- Dynamic rows will be added here -->
                    </tbody>
                </table>
            </div>
            <div class="mt-6 text-right">
                <h4 class="text-xl font-semibold">Service Charge: <span id="service-charge" class="text-green-400">Rs.<span id="service_span">0</span></span></h4>
                <h4 class="text-xl font-semibold">VAT: <span id="vat" class="text-green-400">Rs.{{ env('VAT') }}</span></h4>
                <h4 class="text-xl font-semibold">Grand Total: <span id="grand-total" class="text-green-400">Rs.0.00</span></h4>
                <input type="hidden" name="total_price" id="total_price">
            </div>
            <button id="place-order-btn" class="mt-4 bg-green-500 hover:bg-green-600 text-white py-3 px-6 rounded-lg font-bold shadow-lg transition">
                Place Order
            </button>
            @php
                $orders = \App\Models\RestaurantOrder::max('id');
            @endphp
            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
            <input type="hidden" name="order_number" value="ORDER0{{ $orders ? $orders+1 : 1}}">
            <input type="hidden" name="name" value="{{ $booking->user->name }}">
            <input type="hidden" name="order_type" value="Room">
            <input type="hidden" name="room_number" value="{{ $booking->room->number }}">
            <input type="hidden" id="service_charge" name="service_charge" value="{{ env('SERVICE_CHARGE') }}">
            <input type="hidden" name="vat" value="{{ env('VAT') }}">
            
        </div>
    </form>
    </div>

    <!-- JavaScript Logic -->
    <script>
        const menuItems = document.querySelectorAll('.menu-item');
        const orderList = document.getElementById('order-list');
        const vat = parseFloat({{ env('VAT') }});
        const vatEl = document.getElementById('vat');
        const grandTotalEl = document.getElementById('grand-total');
        const totalInput = document.getElementById('total_price');
        const service_charge = document.getElementById('service_charge');
        const service_span = document.getElementById('service_span');
        let orders = [];

        const updateOrders = () => {
            orderList.innerHTML = '';
            let subtotal = 0;

            orders.forEach((order, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="p-3">${order.name} <input type="hidden" name="menu[]" value="${order.id}"></td>
                    <td class="p-3">Rs.${order.price.toFixed(2)} <input type="hidden" name="price[]" value="${order.price}"></td>
                    <td class="p-3">
                        <input type="number" name="quantity[]" class="quantity-input w-16 bg-gray-700 text-white rounded text-center" min="1" value="${order.quantity}" data-index="${index}">
                    </td>
                    <td class="p-3">Rs.${(order.price * order.quantity).toFixed(2)}</td>
                    <td class="p-3">
                         <button class="btn btn-danger btn-sm" onclick="deleteOrder(${index})">Remove</button>
                    </td>
                `;
                subtotal += order.price * order.quantity;
                orderList.appendChild(row);
            });

            const total = subtotal + subtotal*10/100 + vat;
            vatEl.textContent = `Rs.${vat.toFixed(2)}`;
            grandTotalEl.textContent = `Rs.${total.toFixed(2)}`;
            totalInput.value = total;
            service_charge.value = subtotal*10/100;
            service_span.innerHTML = subtotal*10/100;

            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('input', (e) => {
                    const index = e.target.dataset.index;
                    const newQuantity = parseInt(e.target.value);

                    if (newQuantity > 0) {
                        orders[index].quantity = newQuantity;
                        updateOrders();
                    }
                });
            });
        };

        menuItems.forEach(item => {
            item.addEventListener('change', (e) => {
                const id = e.target.dataset.id;
                const name = e.target.dataset.name;
                const price = parseFloat(e.target.dataset.price);

                if (e.target.checked) {
                    const existingOrder = orders.find(order => order.id === id);
                    if (existingOrder) {
                        existingOrder.quantity++;
                    } else {
                        orders.push({ id, name, price, quantity: 1 });
                    }
                } else {
                    orders = orders.filter(order => order.id !== id);
                }

                updateOrders();
            });
        });

        const deleteOrder = (index) => {
            const order = orders[index]; // Get the order to be removed
            const checkbox = document.querySelector(`.menu-item[data-id="${order.id}"]`);

            if (checkbox) {
                checkbox.checked = false; // Uncheck the corresponding checkbox
            }

            orders.splice(index, 1); // Remove the order from the orders array
            updateOrders(); // Refresh the table
        };
        
        // document.getElementById('place-order-btn').addEventListener('click', () => {
        //     if (orders.length > 0) {
        //         alert('Order placed successfully!');
        //         console.log(orders);
        //         // Send orders to the backend here via AJAX
        //     } else {
        //         alert('Please select items to place an order.');
        //     }
        // });
    </script>
</x-app-layout>
