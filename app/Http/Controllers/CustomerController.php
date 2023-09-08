<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CustomerRegistrationRequest;
use App\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use\App\Http\Middleware\isCustomerLoggedIn;

class CustomerController extends Controller
{
    public function viewRegistration ()
    {
        return view('customer.registration');
    }
    public function store(CustomerRegistrationRequest $request)
    {
        
        if (Customer::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        
        ]) ){
            
            return redirect('signin')->with('success', 'Registration Complete ');
       
        } else {
            return redirect('registration')->back()->with('errors', 'Registration not Complete ');
        }
    }
    public function viewSignin()
    {
        return view('customer.signin');
    }
        public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('signin')->withErrors($validator->errors());
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            // Authentication succeeded
            return redirect('menu');
        } else {
            // Authentication failed
            return redirect('signin');
        }
    }
    public function signout()
    {
        \request()->session()->flush();
        return redirect('signin');
    }
    public function cartTable()
    {
        return view('customer.cartTable');
    }
}
