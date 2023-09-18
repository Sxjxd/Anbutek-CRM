<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Inventory Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-semibold mb-6">Edit Inventory Item</h1>

                    @if (session('success'))
                        <div class="bg-green-200 text-green-800 px-4 py-2 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.inventory.update', $inventoryItem->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Quantity -->
                        <div class="mb-4">
                            <label for="quantity" class="block text-gray-700 font-bold mb-2">Quantity</label>
                            <input type="number" name="quantity" id="quantity" value="{{ $inventoryItem->quantity }}" required
                                   class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('quantity')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Inventory Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 font-bold mb-2">Inventory Status</label>
                            <select name="status" id="status" required
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="in_stock" @if($inventoryItem->status === 'in_stock') selected @endif>In Stock</option>
                                <option value="out_of_stock" @if($inventoryItem->status === 'out_of_stock') selected @endif>Out of Stock</option>
                            </select>
                        </div>


                        <!-- Submit Button -->
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Inventory Item
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
