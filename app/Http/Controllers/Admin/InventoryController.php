<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    public function index()
    {
        // Get all inventory items with their associated products
        $inventory = Inventory::with('product')->get();

        return view('admin.inventory.index', compact('inventory'));
    }

    public function edit($id)
    {
        $inventoryItem = Inventory::findOrFail($id);
        return view('admin.inventory.edit', compact('inventoryItem'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer',
            'status' => 'required|in:in_stock,out_of_stock', // Validate the status
        ]);

        $inventoryItem = Inventory::findOrFail($id);
        $inventoryItem->quantity = $validatedData['quantity'];
        $inventoryItem->status = $validatedData['status'];
        $inventoryItem->save();

        return redirect()->route('admin.inventory.index')->with('success', 'Inventory item updated successfully');
    }

}
