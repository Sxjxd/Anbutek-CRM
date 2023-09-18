<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderApiController extends Controller
{
    public function create(Request $request)
    {
        // Validate the request data
        $request->validate([
            'customer_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        try {
            // Fetch the product based on the provided product_id
            $product = Product::findOrFail($request->input('product_id'));

            // Calculate the total price based on the product's price and quantity
            $totalPrice = $product->price * $request->input('quantity');

            // Create a new order
            $order = new Order();
            $order->customer_id = $request->input('customer_id');
            $order->product_id = $product->id;
            $order->quantity = $request->input('quantity');
            $order->price = $product->price; // Set the product's price
            $order->total_price = $totalPrice; // Calculate and set the total price
            $order->status = 'Pending'; // Set the initial status as 'Pending'
            $order->order_date = now(); // Set the order date as the current date and time
            $order->save();

            return response()->json(['message' => 'Order created successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create order', 'error' => $e->getMessage()], 500);
        }
    }


    public function fetch()
    {
        // Fetch orders via API, including details defined in the 'orders' table
        $orders = Order::with(['customer', 'product'])->get();

        // Return the orders as JSON
        return response()->json($orders);
    }
}

