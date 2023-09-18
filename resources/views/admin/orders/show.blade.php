<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-200 text-lg font-semibold p-4">
                    Order Details
                </div>
                <div class="p-4">
                    <table class="w-full border-collapse">
                        <tr>
                            <th class="w-1/4 py-2 border">Order ID:</th>
                            <td class="w-3/4 py-2 border">{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th class="w-1/4 py-2 border">Customer Name:</th>
                            <td class="w-3/4 py-2 border">{{ $order->customer->first_name }}</td>
                        </tr>
                        <tr>
                            <th class="w-1/4 py-2 border">Order Date:</th>
                            <td class="w-3/4 py-2 border">{{ $order->order_date }}</td>
                        </tr>
                        <tr>
                            <th class="w-1/4 py-2 border">Status:</th>
                            <td class="w-3/4 py-2 border">{{ $order->status }}</td>
                        </tr>
                        <tr>
                            <th class="w-1/4 py-2 border">Total Price:</th>
                            <td class="w-3/4 py-2 border">LKR {{ number_format($order->total_price, 2) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="p-4 bg-gray-100">
                    <a href="{{ route('orders.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Back to Orders</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-200 text-lg font-semibold p-4">
                    Order Details
                </div>
                <div class="p-4">
                    <table class="w-full border-collapse">
                        <tr>
                            <th class="w-1/4 py-2 border">Order ID:</th>
                            <td class="w-3/4 py-2 border">{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th class="w-1/4 py-2 border">Customer Name:</th>
                            <td class="w-3/4 py-2 border">{{ $order->customer->first_name }}</td>
                        </tr>
                        <tr>
                            <th class="w-1/4 py-2 border">Order Date:</th>
                            <td class="w-3/4 py-2 border">{{ $order->order_date }}</td>
                        </tr>
                        <tr>
                            <th class="w-1/4 py-2 border">Status:</th>
                            <td class="w-3/4 py-2 border">{{ $order->status }}</td>
                        </tr>
                        <tr>
                            <th class="w-1/4 py-2 border">Total Price:</th>
                            <td class="w-3/4 py-2 border">LKR {{ number_format($order->total_price, 2) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="p-4 bg-gray-100">
                    <a href="{{ route('orders.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Back to Orders</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
