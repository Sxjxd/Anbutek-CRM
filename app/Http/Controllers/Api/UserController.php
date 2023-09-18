<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Customer;

class UserController extends Controller
{
//     Login User & Create Token
     public function login(Request $request){

         $request->validate([
             'email' => 'required|email',
             'password' => 'required'
         ]);

         if(!auth()->attempt($request->only('email', 'password'))){
             return response()->json([
                 'message' => 'Invalid login details'
             ], 401);
         }

         $user = (new User())->where('email', $request->email)->first();

         $token = $user->createToken('auth_token')->plainTextToken;

         return response()->json([
             'access_token' => $token,
             'token_type' => 'Bearer',
             'user' => $user,
         ]);
     }



    public function register(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:customers,email',
                'password' => 'required|string|min:6',
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'phoneNumber' => 'required|string|unique:customers,phone_number',
                'address' => 'required|string',
            ]);

            // Check if the customer exists with the email or phone number
            $customer = Customer::where('email', $request->email)
                ->orWhere('phone_number', $request->phoneNumber)
                ->first();

            if ($customer) {
                return response()->json([
                    'message' => 'Customer already exists'
                ], 409);
            }

        // Create a new customer instance
        $customer = new Customer();
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->first_name = $request->firstName;
        $customer->last_name = $request->lastName;
        $customer->phone_number = $request->phoneNumber;
        $customer->address = $request->address;

        // Save the customer record
        $customer->save();

        return response()->json([
            'message' => 'Registration successful',
            'customer' => $customer
        ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 401);
        }
    }

    public function getRegisteredUsers()
    {
        $customers = Customer::all();
        return view('admin.AppUsers', compact('customers'));
    }

    public function destroy($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();

            return response()->json([
                'message' => 'Customer deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 401);
        }
    }
}




