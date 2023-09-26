<div x-data="{ searchTerm: '', filterOptions: { showAll: true, showFirstName: true, showLastName: true, showEmail: true, showPhoneNumber: true, showAddress: true } }">
    <!-- Search Bar -->
    <div class="mt-4 mb-4 relative">
        <input x-model="searchTerm" type="text" class="border rounded-lg pl-10 pr-4 py-2 w-80 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Search Customer Name">
        <div class="absolute top-0 left-2 flex items-center h-full">
            <i class="fas fa-search text-gray-400"></i>
        </div>
    </div>

    <!-- Filter Checkboxes -->
    <div class="mt-6 mb-4">
        <label class="inline-flex items-center ml-4">
            <input type="checkbox" x-model="filterOptions.showFirstName" class="form-checkbox text-indigo-600">
            <span class="ml-2 text-gray-700">Show First Name</span>
        </label>
        <label class="inline-flex items-center ml-4">
            <input type="checkbox" x-model="filterOptions.showLastName" class="form-checkbox text-indigo-600">
            <span class="ml-2 text-gray-700">Show Last Name</span>
        </label>
        <label class="inline-flex items-center ml-4">
            <input type="checkbox" x-model="filterOptions.showEmail" class="form-checkbox text-indigo-600">
            <span class="ml-2 text-gray-700">Show Email</span>
        </label>
        <label class="inline-flex items-center ml-4">
            <input type="checkbox" x-model="filterOptions.showPhoneNumber" class="form-checkbox text-indigo-600">
            <span class="ml-2 text-gray-700">Show Phone Number</span>
        </label>
        <label class="inline-flex items-center ml-4">
            <input type="checkbox" x-model="filterOptions.showAddress" class="form-checkbox text-indigo-600">
            <span class="ml-2 text-gray-700">Show Address</span>
        </label>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-left cursor-pointer" x-show="filterOptions.showFirstName">First Name</th>
                <th class="px-4 py-2 text-left cursor-pointer" x-show="filterOptions.showLastName">Last Name</th>
                <th class="px-4 py-2 text-left cursor-pointer" x-show="filterOptions.showEmail">Email</th>
                <th class="px-4 py-2 text-left cursor-pointer" x-show="filterOptions.showPhoneNumber">Phone Number</th>
                <th class="px-4 py-2 text-left cursor-pointer" x-show="filterOptions.showAddress">Address</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach($customers as $customer)
                <tr x-show="matchesSearch('{{ strtolower($customer->first_name) }} {{ strtolower($customer->last_name) }} {{ strtolower($customer->email) }}', searchTerm) && (filterOptions.showAll || (filterOptions.showFirstName && '{{ strtolower($customer->first_name) }}'.includes(searchTerm)) || (filterOptions.showLastName && '{{ strtolower($customer->last_name) }}'.includes(searchTerm)) || (filterOptions.showEmail && '{{ strtolower($customer->email) }}'.includes(searchTerm)) || (filterOptions.showPhoneNumber && '{{ strtolower($customer->phone_number) }}'.includes(searchTerm)) || (filterOptions.showAddress && '{{ strtolower($customer->address) }}'.includes(searchTerm)))">
                    <td class="px-4 py-3" x-show="filterOptions.showFirstName">{{ $customer->first_name }}</td>
                    <td class="px-4 py-3" x-show="filterOptions.showLastName">{{ $customer->last_name }}</td>
                    <td class="px-4 py-3" x-show="filterOptions.showEmail">{{ $customer->email }}</td>
                    <td class="px-4 py-3" x-show="filterOptions.showPhoneNumber">{{ $customer->phone_number }}</td>
                    <td class="px-4 py-3" x-show="filterOptions.showAddress">{{ $customer->address }}</td>
                    <td class="px-4 py-3">
                        <button wire:click="removeCustomer({{ $customer->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Remove
                        </button>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-history"></i> Order History
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function matchesSearch(text, searchTerm) {
            return text.toLowerCase().includes(searchTerm.toLowerCase());
        }
    </script>
</div>
