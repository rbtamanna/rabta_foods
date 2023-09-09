<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CustomerRegistrationRequest;
use App\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use\App\Http\Middleware\isCustomerLoggedIn;
use App\Cart;
use App\Product;
use App\Http\Requests\CartQuantityChangeRequest;
use App\Order;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderAddressRequest;

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
        
        if (Auth::guard('customer')->attempt($credentials)) {
            session(['user_data'=>$credentials]);
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
        $user=session('user_data');
        $email=$user['email'];
        $customer=Customer::where('email', $email)->first();
        // dd($customer->id);
        $customer_id=$customer->id;
        $carts = Cart::where('customer_id', $customer_id)->get();
        // dd($cart[0]->product_id);
        $products=array();
        
        if(sizeof($carts)>0)
        {
            foreach($carts as $cart)
            {
                $temp=Product::where('id', $cart->product_id)->get();
                array_push($products,$temp[0]);
            }
            // dd($products[0]->code); 
            // dd(sizeof($carts));
            return view('customer.cartTable', compact('carts','products'));
        }
        else
            return view('customer.notAdded');
    }
    public function addToCart(Request $request, int $id)
    {
        $user=session('user_data');
        $email=$user['email'];
        // dd($email);
        $customer=Customer::where('email', $email)->first();
        // dd($customer->id);
        $customer_id=$customer->id;
        $product_id=$id;
        $cartItem = Cart::where('customer_id', $customer_id)->where('product_id', $product_id)->first();
        // dd($cartItem);
        if($cartItem)
        {
            $cartItem->quantity += 1;
            $cartItem->save();
        }
        else
        {
            Cart::insert([
                'customer_id' => $customer_id,
                'product_id' => $product_id,
                'quantity' => 1,
            ]);
        }
        return back();
    }
    public function changeQuantity(CartQuantityChangeRequest $request, int $id)
    {
        // dd('aschhe');
        if (Cart::where('id', $id)->update([
            'quantity' => $request->quantity,
        ])) {
            return redirect('cart')->with('success', 'Quantity Updated');
        } else {
            return redirect()->back()->with('errors', 'Quantity not saved');
        }
    }
    public function checkout(int $id)
    {
        $carts=Cart::where('customer_id',$id)->get();
        // $products=Product::get();
        $user=session('user_data');
        $email=$user['email'];
        // dd($email);
        $customer=Customer::where('email', $email)->first();
        // dd($customer->id);
        $customer_id=$customer->id;
        $products=array();
        
        foreach($carts as $cart)
        {
            $temp=Product::where('id', $cart->product_id)->get();
            array_push($products,$temp[0]);
        }
        // $customer=Customer::where('id', $customer_id)->first();
        if($customer_id==$id && sizeof($carts)>0)
            return view('customer.checkout',compact('carts','products', 'customer'));
        else if ($customer_id==$id)
            return view('customer.notAdded',compact('carts','products', 'customer'));
        else 
            return view('errors.404');
    }
    public function orderConfirm(int $id, OrderAddressRequest $request)
    {
        $carts=Cart::where('customer_id',$id)->get();
        // $products=Product::get();
        $user=session('user_data');
        $email=$user['email'];
        // dd($email);
        $customer=Customer::where('email', $email)->first();
        // dd($customer->id);
        $customer_id=$customer->id;
        $products=array();
        
        foreach($carts as $cart)
        {
            $temp=Product::where('id', $cart->product_id)->get();
            array_push($products,$temp[0]);
        }
        if($customer_id==$id){
            $code=random_int(00001, 99999);
        foreach ($carts as $i => $cart)
        {
                Order::insert([
                    'code'=> $code,
                    'product_id'=>$cart->product_id,
                    'customer_id' => $id,
                    'quantity' => $cart->quantity,
                    'price' => $products[$i]->price,
                    'Status' => 'pending',
                    'road'=>$request->road,
                    'house'=>$request->house,
                    'area'=>$request->area,
                    'city'=>$request->city,
                    'total_price'=>$products[$i]->price*$cart->quantity,
                ]);
                
               
        }
        $orders=Order::where('customer_id',$customer_id)->get();
        $codes = Order::distinct()->pluck('code');
        $status=array();
        foreach($codes as $code)
        {
            array_push($status,Order::where('code',$code)->pluck('status')->first());
        }
        DB::table('carts')->where('customer_id', $id)->delete();
       
            return view('customer.status',compact('carts','products', 'customer','codes','status'));}
        else 
            return view('errors.404');
    }
    public function status()
    {
        
        // $products=Product::get();
        $user=session('user_data');
        $email=$user['email'];
        // dd($email);
        $customer=Customer::where('email', $email)->first();
        // dd($customer->id);
        $customer_id=$customer->id;
        $orders=Order::where('customer_id',$customer_id)->get();
        $codes = Order::distinct()->pluck('code');
        $status=array();
        foreach($codes as $code)
        {
            array_push($status,Order::where('code',$code)->pluck('status')->first());
        }
        // dd($status);
        if(sizeof($orders)>0)
            return view('customer.status',compact('codes','status'));
        else
            return view('customer.notAdded');
    }
        public function orderDetails(string $code)
    {
        $user = session('user_data');
        $email = $user['email'];

        $customer = Customer::where('email', $email)->first();

        if (!$customer) {
            return view('errors.404');
        }

        $customer_id = $customer->id;

        // Check if any orders exist for the given code and customer ID
        $check = Order::where('code', $code)->where('customer_id', $customer_id)->count();

        if ($check > 0) {
            $orders = Order::where('code', $code)->get();
            $names = [];

            foreach ($orders as $order) {
                $productName = Product::where('id', $order->product_id)->pluck('name')->first();
                array_push($names, $productName);
            }

            return view('customer.orderDetails', compact('orders', 'names', 'code'));
        } else {
            return view('errors.404');
        }
    }
    public function deleteFromCart(int $id)
    {
       DB::table('carts')->where('id', $id)->delete();
        return redirect('cart')->with('success', 'Product deleted from cart');
    }

}
