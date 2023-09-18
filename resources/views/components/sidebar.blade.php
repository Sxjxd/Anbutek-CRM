<aside class="bg-gradient-to-b from-blue-600 to-blue-950 text-white h-screen w-64 flex flex-col">
    <!-- Sidebar content goes here -->
    <div class="p-4 flex items-center justify-center">
        <img src="{{ asset('images/crmLogo.png') }}" alt="Logo" class="h-100 w-100">
    </div>
    <ul class="space-y-2">
        <li>
            <a href="/admin/dashboard" class="block items-center px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                <i class="fas fa-tachometer-alt fa-fw text-xl mr-2"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/admin/products" class="block items-center px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('admin.products.index') ? 'bg-gray-700' : '' }}">
                <i class="fas fa-shopping-cart fa-fw text-xl mr-2"></i>
                Product Management
            </a>
        </li>
        <li>
            <a href="/admin/inventory" class="block items-center px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('admin.inventory.index') ? 'bg-gray-700' : '' }}">
                <i class="fas fa-box fa-fw text-xl mr-2"></i>
                Inventory
            </a>
        </li>
        <li>
            <a href="/admin/AppUsers" class="block items-center px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('admin.AppUsers') ? 'bg-gray-700' : '' }}">
                <i class="fas fa-users fa-fw text-xl mr-2"></i>
                User Management
            </a>
        </li>
        <!-- Add more navigation links as needed -->
        <li>
            <a href="/admin/analytics" class="block items-center px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('analytics.index') ? 'bg-gray-700' : '' }}">
                <i class="fas fa-chart-line fa-fw text-xl mr-2"></i> <!-- icon for Analytics (Line Chart) -->
                Analytics
            </a>
        </li>
        <li>
            <a href="/admin/orders" class="block items-center px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('orders.index') ? 'bg-gray-700' : '' }}">
                <i class="fas fa-shopping-bag fa-fw text-xl mr-2"></i>
                Order Management
            </a>
        </li>
    </ul>

    <!-- Profile and Logout -->
    <div class="mt-auto mb-6">
        <a href="{{ route('profile.show') }}" class="block items-center px-4 py-2 hover:bg-blue-900">
            <i class="fas fa-user fa-fw text-xl mr-2"></i>
            Profile
        </a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block items-center px-4 py-2 hover:bg-blue-900">
            <i class="fas fa-sign-out-alt fa-fw text-xl mr-2"></i>
            Logout
        </a>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</aside>
