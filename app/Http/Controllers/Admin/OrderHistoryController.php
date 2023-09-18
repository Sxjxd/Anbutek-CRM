<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderHistoryController extends Controller
{
    public function show($customerId)
    {
        // Fetch the order history for the customer with the given ID
        $orderHistory = Order::where('customer_id', $customerId)->get();

        return view('admin.order-history.show', compact('orderHistory'));
    }
}
