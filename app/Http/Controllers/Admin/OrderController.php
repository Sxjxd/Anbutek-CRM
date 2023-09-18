<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch all orders and pass them to the view
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // View order details
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        // Edit order (if needed)
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        // Update order status (e.g., cancel, return)
        // Handle the status update logic here and then redirect

        // For example, you can update the order status like this:
        $order->status = $request->input('status');
        $order->save();

        // Redirect back to the order details page
        return redirect()->route('orders.show', $order->id)->with('success', 'Order status updated successfully');
    }


}
