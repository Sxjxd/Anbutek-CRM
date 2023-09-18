<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AnalyticsDashboard extends Component
{
    public function index()
    {
        return view('admin.analytics.index');
    }

    public $revenueData;
    public $usersData;
    public $ordersData;

    public function mount()
    {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.analytics-dashboard');
    }

    public function fetchData()
    {
        // Fetch data from your database tables and format it as needed
        $this->revenueData = $this->fetchRevenueData();
        $this->usersData = $this->fetchUsersData();
        $this->ordersData = $this->fetchOrdersData();
    }

    protected function fetchRevenueData()
    {
        // Fetch revenue data from your database table
        return DB::table('orders')
            ->select(DB::raw('SUM(total_price) as revenue'), DB::raw("DATE_FORMAT(order_date, '%Y-%m') as month"))
            ->where('status', 'Delivered')
            ->groupBy('month')
            ->get();
    }

    protected function fetchUsersData()
    {
        // Fetch users data from your database table
        return DB::table('customers')
            ->select(DB::raw('COUNT(*) as users'), DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"))
            ->groupBy('month')
            ->get();
    }

    protected function fetchOrdersData()
    {
        // Fetch orders data from your database table
        return DB::table('orders')
            ->select(DB::raw('COUNT(*) as orders'), DB::raw("DATE_FORMAT(order_date, '%Y-%m') as month"))
            ->groupBy('month')
            ->get();
    }
}
