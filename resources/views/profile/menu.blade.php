<x-app-layout>
    @include('layouts.dashboard')

    <!-- Menu Section -->
    <div class="container mx-auto py-8 text-white">
        <div class="bg-cover bg-center rounded-lg shadow-lg p-6" style="background-image: url('{{ asset('images/menu.jpeg') }}');">
            <h3 class="text-center text-4xl font-extrabold uppercase tracking-wide mb-8 text-shadow">Menu</h3>

            <!-- Menu Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Display Main Dishes and Desserts -->
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
                                                <span class="font-medium">{{ $subDish->name }}</span>
                                                <span class="font-semibold">Rs.{{ number_format($subDish->price, 2) }}</span>
                                                <input type="checkbox" class="menu-item w-6 h-6 text-green-500 rounded focus:ring-green-300" 
                                                       data-name="{{ $subDish->name }}" 
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
                        </tr>
                    </thead>
                    <tbody id="order-list" class="divide-y divide-gray-700">
                        <!-- Dynamic rows will be added here -->
                    </tbody>
                </table>
            </div>
            <div class="mt-6 text-right">
                <h4 class="text-xl font-semibold">Total: <span id="total-price" class="text-green-400">Rs.0.00</span></h4>
            </div>
            <button id="place-order-btn" class="mt-4 bg-green-500 hover:bg-green-600 text-white py-3 px-6 rounded-lg font-bold shadow-lg transition">
                Place Order
            </button>
        </div>
    </div>

    <!-- JavaScript Logic -->
    <script>
        const menuItems = document.querySelectorAll('.menu-item');
        const orderList = document.getElementById('order-list');
        const totalPriceEl = document.getElementById('total-price');
        let orders = [];

        const updateOrders = () => {
            orderList.innerHTML = '';
            let total = 0;

            orders.forEach((order, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="p-3">${order.name}</td>
                    <td class="p-3">Rs.${order.price.toFixed(2)}</td>
                    <td class="p-3">
                        <input type="number" class="quantity-input w-16 bg-gray-700 text-white rounded text-center" min="1" value="${order.quantity}" data-index="${index}">
                    </td>
                    <td class="p-3">Rs.${(order.price * order.quantity).toFixed(2)}</td>
                `;
                total += order.price * order.quantity;
                orderList.appendChild(row);
            });

            totalPriceEl.textContent = `Rs.${total.toFixed(2)}`;

            const quantityInputs = document.querySelectorAll('.quantity-input');
            quantityInputs.forEach(input => {
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
                const name = e.target.dataset.name;
                const price = parseFloat(e.target.dataset.price);

                if (e.target.checked) {
                    const existingOrder = orders.find(order => order.name === name);
                    if (existingOrder) {
                        existingOrder.quantity++;
                    } else {
                        orders.push({ name, price, quantity: 1 });
                    }
                } else {
                    orders = orders.filter(order => order.name !== name);
                }

                updateOrders();
            });
        });

        document.getElementById('place-order-btn').addEventListener('click', () => {
            if (orders.length > 0) {
                alert('Order placed successfully!');
                console.log(orders);
                // You can send orders to the backend via AJAX here
            } else {
                alert('Please select items to place an order.');
            }
        });
    </script>
</x-app-layout>
