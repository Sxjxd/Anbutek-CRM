<?php

namespace App\Http\Livewire\Admin;

use App\Models\Customer;
use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;

class Analytics extends Component
{
    public $revenue = [];
    public $labels = [];
    public $customerCount = [];
    public $customerLabels = [];

    public function mount()
    {
        $revenueDataForChart = Order::revenueData();

        $this->labels = $revenueDataForChart->pluck('date')->toArray();
        $this->revenue = $revenueDataForChart->pluck('total_price')->toArray();

        $this->labels = array_map(function ($label) {
            return Carbon::parse($label)->format('M d');
        }, $this->labels);


        $customerDataForChart = Customer::customerData();

        $this->customerLabels = $customerDataForChart->pluck('date')->toArray();
        $this->customerCount = $customerDataForChart->pluck('customer_count')->toArray();

        $this->customerLabels = array_map(function ($label) {
            return Carbon::parse($label)->format('M d');
        }, $this->customerLabels);
    }

    public function render()
    {
        return view('livewire.admin.analytics', [
            'revenue' => $this->revenue,
            'labels' => $this->labels,
            ]);
    }
}


