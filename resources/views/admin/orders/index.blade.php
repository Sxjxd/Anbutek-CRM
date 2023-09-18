<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Filter and Search Bar -->
                    <div x-data="orderFilter()" x-init="init()">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                            <!-- Search Orders -->
                            <div class="col-span-1">
                                <label for="searchOrders" class="block text-gray-700 mb-1">Search Orders</label>
                                <input type="text" x-model="search" id="searchOrders" class="form-input w-full px-3 py-2 rounded-lg border focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Search by Customer Name">
                            </div>

                            <!-- Status Filter -->
                            <div class="col-span-1">
                                <label for="orderStatusFilter" class="block text-gray-700 mb-1">Status</label>
                                <select x-model="statusFilter" id="orderStatusFilter" class="form-select w-3/4 px-3 py-2 rounded-lg border focus:border-blue-500 focus:ring focus:ring-blue-200">
                                    <option value="">All</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Confirmed">Confirmed</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Canceled">Canceled</option>
                                    <option value="Returned">Returned</option>
                                </select>
                            </div>

                            <!-- Date Range Filters -->
                            <div class="col-span-1">
                                <div class="flex space-x-2">
                                    <div>
                                        <label for="startDate" class="block text-gray-700 mb-1">Start Date</label>
                                        <input type="date" x-model="startDate" id="startDate" class="form-input w-full px-3 py-2 rounded-lg border focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Start Date">
                                    </div>
                                    <div>
                                        <label for="endDate" class="block text-gray-700 mb-1">End Date</label>
                                        <input type="date" x-model="endDate" id="endDate" class="form-input w-full px-3 py-2 rounded-lg border focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="End Date">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Table -->
                        <div class="overflow-x-auto">
                            <table class="table-auto min-w-full">
                                <thead class="bg-sky-100">
                                <tr>
                                    <th class="px-4 py-2">Order ID</th>
                                    <th class="px-4 py-2">Customer Name</th>
                                    <th class="px-4 py-2">Order Date</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Total Price</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Loop through your orders here -->
                                @foreach ($orders as $order)
                                    <tr x-show="matchFilter('{{ $order->customer->first_name }} {{ $order->customer->last_name }}', '{{ $order->status }}', '{{ $order->order_date }}')">
                                        <td class="border px-4 py-2">{{ $order->id }}</td>
                                        <td class="border px-4 py-2">{{ optional($order->customer)->first_name }} {{ optional($order->customer)->last_name }}</td>
                                        <td class="border px-4 py-2">{{ $order->order_date }}</td>
                                        <td class="border px-4 py-2">{{ $order->status }}</td>
                                        <td class="border px-4 py-2">LKR {{ number_format($order->total_price, 2) }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('orders.show', $order->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-1 rounded-md transition duration-300 ease-in-out">View Details</a>
                                            <a href="{{ route('orders.edit', $order->id) }}" class="text-blue-500 hover:underline ml-2">Edit</a>
                                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline ml-2" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function orderFilter() {
        return {
            search: '',
            statusFilter: '',
            startDate: '',
            endDate: '',
            init() {
                this.$watch(['search', 'statusFilter', 'startDate', 'endDate'], () => {
                    this.$nextTick(() => {
                        this.$dispatch('orders-filtered', {
                            search: this.search,
                            statusFilter: this.statusFilter,
                            startDate: this.startDate,
                            endDate: this.endDate
                        });
                    });
                });
            },
            matchFilter(customerName, status, orderDate) {
                const isSearchMatch = customerName.toLowerCase().includes(this.search.toLowerCase());
                const isStatusMatch = !this.statusFilter || status === this.statusFilter;
                const isDateMatch = !this.startDate || !this.endDate || (orderDate >= this.startDate && orderDate <= this.endDate);

                return isSearchMatch && isStatusMatch && isDateMatch;
            }
        };
    }
</script>
