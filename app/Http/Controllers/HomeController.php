<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Order;
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
        $orderCount = Order::count();
        //get the count of inquiry category feedbacks
        $inquiryCount = Feedback::where('category', 'Inquiry')->count();
        $complaintCount = Feedback::where('category', 'Complaint')->count();
        $feedbackCount = Feedback::where('category', 'Feedback')->count();
        $issueCount = Feedback::where('category', 'Complaint')->count();
        $issueCount = Feedback::where('category', 'Other')->count();

        $newCustomerCount = Customer::where('created_at', '>=', now()->subDays(7))->count();


        return view('admin.dashboard', compact('customerCount', 'productCount', 'newCustomerCount',
            'orderCount', 'feedbackCount', 'complaintCount', 'inquiryCount', 'issueCount'));
    }

}

