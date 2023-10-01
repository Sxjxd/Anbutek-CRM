<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory Management') }}
        </h2>
    </x-slot>

    <div x-data="{ searchTerm: '' }" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-semibold mb-6">Inventory List</h1>

                    <!-- Search Bar -->
                    <div class="mb-4 relative">
                        <input x-model="searchTerm" type="text" class="border rounded-lg pl-10 pr-4 py-2 w-80 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Search Product Name">
                        <div class="absolute top-0 left-2 flex items-center h-full">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-200 text-green-800 px-4 py-2 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-sky-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                SKU
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantity
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($inventory as $item)
                            <tr x-show="matchesSearch('{{ strtolower($item->product->name) }}', searchTerm)">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->product->sku }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->product->name }}
                                </td>
                                <!-- Inventory Status -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($item->status === 'in_stock')
                                        <span class="text-green-600">In Stock</span>
                                    @else
                                        <span class="text-red-600">Out of Stock</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->quantity }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('admin.inventory.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                    No inventory items found.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function matchesSearch(text, searchTerm) {
            return text.toLowerCase().includes(searchTerm.toLowerCase());
        }
    </script>
</x-app-layout>
