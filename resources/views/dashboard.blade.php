<x-app-layout>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome Operation & Sales Manager!') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 pt-10">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Total Revenue -->
            <div class="bg-white border rounded shadow p-4">
                <div class="flex items-center">
                    <div class="rounded p-3 bg-green-600 text-white">
                        <i class="fas fa-wallet fa-2x fa-fw"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500">Total Revenue</p>
                        <p class="font-bold text-2xl">LKR {{ number_format(App\Models\Order::totalRevenue()) }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Users -->
            <div class="bg-white border rounded shadow p-4">
                <div class="flex items-center">
                    <div class="rounded p-3 bg-pink-600 text-white">
                        <i class="fas fa-users fa-2x fa-fw"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500">Total Users</p>
                        <p class="font-bold text-2xl">{{ $customerCount }}</p>
                    </div>
                </div>
            </div>

            <!-- New Users -->
            <div class="bg-white border rounded shadow p-4">
                <div class="flex items-center">
                    <div class="rounded p-3 bg-yellow-600 text-white">
                        <i class="fas fa-user-plus fa-2x fa-fw"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500">New Users</p>
                        <p class="font-bold text-2xl">{{ $newCustomerCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Products -->
            <div class="bg-white border rounded shadow p-4">
                <div class="flex items-center">
                    <div class="rounded p-3 bg-indigo-600 text-white">
                        <i class="fas fa-tasks fa-2x fa-fw"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500">Total Products</p>
                        <p class="font-bold text-2xl">{{ $productCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="bg-white border rounded shadow p-4">
                <div class="flex items-center">
                    <div class="rounded p-3 bg-blue-600 text-white">
                        <i class="fas fa-shopping-cart fa-2x fa-fw"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500">Total Orders</p>
                        <p class="font-bold text-2xl">23</p>
                    </div>
                </div>
            </div>

            <!-- Total Issues -->
            <div class="bg-white border rounded shadow p-4">
                <div class="flex items-center">
                    <div class="rounded p-3 bg-red-600 text-white">
                        <i class="fas fa-exclamation-circle fa-2x fa-fw"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500">Total Issues</p>
                        <p class="font-bold text-2xl">3</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
