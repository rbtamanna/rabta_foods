<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;


class OrderController extends Controller
{
    //
    // public function manageOrderStatus()
    // {
    //     $codes = Order::distinct()->pluck('code');
    //     $status=array();
    //     $customer_id=[];
    //     $prices=[];
        
    //     foreach($codes as $code)
    //     {
    //         array_push($status,Order::where('code',$code)->pluck('status')->first());
    //         array_push($customer_id,Order::where('code',$code)->pluck('customer_id')->first());
    //         array_push($prices,Order::where('code',$code)->pluck('price')->get());
    //     }
    //     $total=0;
    //     foreach($prices as $price)
    //     {
    //         foreach($price as $p)
    //         {
    //             $total+=$p;
    //         }
    //     }
    //     dd($total);
    //     // dd($status);
    //     if(sizeof($codes)>0)
    //         return view('backend.manageOrderStatus',compact('codes','status','customer_id','total'));
    //     else
    //         return view('customer.notAdded');
    // }
        public function manageOrderStatus()
    {
        $codes = Order::distinct()->pluck('code');
        $status = [];
        $customer_id = [];
        $total = []; // Initialize the total price

        foreach ($codes as $code) {
            $status[] = Order::where('code', $code)->pluck('status')->first();
            $customer_id[] = Order::where('code', $code)->pluck('customer_id')->first();

            // Retrieve the prices for the current code and sum them up
            $prices = Order::where('code', $code)->pluck('price');
            $total []= $prices->sum(); // Use sum() to calculate the total
        }
        // dd($codes[0]);

        if (sizeof($codes) > 0) {
            return view('backend.manageOrderStatus', compact('codes', 'status', 'customer_id', 'total'));
        } else {
            return view('customer.notAdded');
        }
    }
    public function statusUpdate(string $code, Request $request)
    {
        // dd($request->status);
        $order = Order::where('code', $code)->first();
        if (!$order) {
            return view('errors.404');
        }
        Order::where('code', $code)->update([
            'status' => $request->status, // You can use any expression here
        ]);
        $codes = Order::distinct()->pluck('code');
        $status = [];
        $customer_id = [];
        $total = []; // Initialize the total price
        
        foreach ($codes as $code) {
            $status[] = Order::where('code', $code)->pluck('status')->first();
            $customer_id[] = Order::where('code', $code)->pluck('customer_id')->first();

            // Retrieve the prices for the current code and sum them up
            $prices = Order::where('code', $code)->pluck('price');
            $total []= $prices->sum(); // Use sum() to calculate the total
        }
        // dd($codes[0]);

        if (sizeof($codes) > 0) {
            return view('backend.manageOrderStatus', compact('codes', 'status', 'customer_id', 'total'));
        } else {
            return view('customer.notAdded');
        }
    }

}
