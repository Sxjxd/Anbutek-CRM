<div class="overflow-x-auto mt-6">
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="py-3 px-4 bg-gray-300 text-left">First Name</th>
                <th class="py-3 px-4 bg-gray-300 text-left">Last Name</th>
                <th class="py-3 px-4 bg-gray-300 text-left">Email</th>
                <th class="py-3 px-4 bg-gray-300 text-left">Phone Number</th>
                <th class="py-3 px-4 bg-gray-300 text-left">Address</th>
                <th class="py-3 px-4 bg-gray-300 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-500">
            @foreach($customers as $customer)
            <tr>
                <td class="py-4 px-6">{{ $customer->first_name }}</td>
                <td class="py-4 px-6">{{ $customer->last_name }}</td>
                <td class="py-4 px-6">{{ $customer->email }}</td>
                <td class="py-4 px-6">{{ $customer->phone_number }}</td>
                <td class="py-4 px-6">{{ $customer->address }}</td>
                <td>
                    <button wire:click="removeCustomer({{ $customer->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Remove
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
