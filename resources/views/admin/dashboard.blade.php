<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-10">
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

            <!-- Total Complaints -->
            <div class="bg-white border rounded shadow p-4">
                <div class="flex items-center">
                    <div class="rounded p-3 bg-orange-600 text-white">
                        <i class="fas fa-exclamation-triangle fa-2x fa-fw"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500">Total Complaints</p>
                        <p class="font-bold text-2xl">5</p>
                    </div>
                </div>
            </div>

            <!-- Total Inquiries -->
            <div class="bg-white border rounded shadow p-4">
                <div class="flex items-center">
                    <div class="rounded p-3 bg-purple-600 text-white">
                        <i class="fas fa-question-circle fa-2x fa-fw"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500">Total Inquiries</p>
                        <p class="font-bold text-2xl">8</p>
                    </div>
                </div>
            </div>

            <!-- Total Feedbacks -->
            <div class="bg-white border rounded shadow p-4">
                <div class="flex items-center">
                    <div class="rounded p-3 bg-green-700 text-white">
                        <i class="fas fa-comment-alt fa-2x fa-fw"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500">Total Feedbacks</p>
                        <p class="font-bold text-2xl">12</p>
                    </div>
                </div>
            </div>

            <!-- Analytics -->
            <div class="bg-blue-200 border rounded shadow p-4 transition duration-300 ease-in-out hover:bg-blue-300">
                <a href="{{ route('admin.analytics.index') }}" class="block">
                    <div class="flex items-center">
                        <div class="rounded p-3 bg-blue-800 text-white">
                            <i class="fas fa-chart-line fa-2x fa-fw"></i>
                        </div>
                        <div class="ml-4">
                            <p class="font-bold text-xl">View Customer & Revenue Analytics</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
