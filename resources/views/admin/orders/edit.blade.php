<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-200 text-lg font-semibold p-4">
                    Edit Order
                </div>
                <div class="p-4">
                    <form action="{{ route('orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Order Status:</label>
                            <select name="status" id="status" class="form-select w-1/3 px-3 py-2 rounded-lg border focus:border-blue-500 focus:ring focus:ring-blue-200">
                                <option value="Pending" {{ $order->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Confirmed" {{ $order->status === 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="Delivered" {{ $order->status === 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="Canceled" {{ $order->status === 'Canceled' ? 'selected' : '' }}>Canceled</option>
                                <option value="Returned" {{ $order->status === 'Returned' ? 'selected' : '' }}>Returned</option>
                            </select>
                        </div>
                        <div class="p-4 bg-gray-100">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Update Status</button>
                            <a href="{{ route('orders.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
