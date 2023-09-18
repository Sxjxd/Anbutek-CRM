<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;

class RegisteredUsersList extends Component
{
    public function removeCustomer($customerId)
    {
        $customer = Customer::find($customerId);

        if ($customer) {
            $customer->delete();
        }
    }

    public function render()
    {
        $customers = Customer::all();

        return view('livewire.registered-users-list', compact('customers'));
    }
}
