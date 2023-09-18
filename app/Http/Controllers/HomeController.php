<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;


use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $role=Auth::user()->role;

        if($role=='1')
        {
            return view('admin.dashboard');
        }
        else
        {
            return view('dashboard');
        }


    }

    public function dashboard()
    {
        $customerCount = Customer::count();
        $productCount = Product::count();
        $newCustomerCount = Customer::where('created_at', '>=', now()->subDays(7))->count();

        return view('admin.dashboard', compact('customerCount', 'productCount', 'newCustomerCount'));
    }

}

