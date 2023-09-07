<?php

namespace App\Http\Controllers;
use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;
use App\Products_category;

class FrontendController extends Controller
{
    public function viewAbout()
    {
        return view('frontend.about');
    }
    public function viewContact()
    {
        $contact = Contact::get();
        return view('frontend.contact', compact('contact'));
    }
    public function manageContact()
    {
        $contact = Contact::get();
        return view('backend.indexContact', compact('contact'));
    }
    public function addContact()
    {
        return view('backend.addContact');
    }
    public function storeContact(ContactRequest $request)
    {
        if ($request->value && $request->url)
        {
            if (DB::table('contacts')->insert([
                'media' => $request->media,
                'url' => $request->url,
                'value' => $request->value,
            ]) ){
                return redirect('manageContact')->with('success', 'Contact added');
            } else {
                return redirect()->back()->with('errors', 'Contact not added');
            }
        }
        else if($request->value)
        {
            if (DB::table('contacts')->insert([
                'media' => $request->media,
                'value' => $request->value,
            ]) ){
                return redirect('manageContact')->with('success', 'Contact added');
            } else {
                return redirect()->back()->with('errors', 'Contact not added');
            }
        }
        else
        {
            if (DB::table('contacts')->insert([
                'media' => $request->media,
                'url' => $request->url,
            ]) ){
                return redirect('manageContact')->with('success', 'Contact added');
            } else {
                return redirect()->back()->with('errors', 'Contact not added');
            }
        }
        
    }
    public function editContact(int $id)
    {
        $contact = Contact::findOrFail( $id);
        $contact = Contact::where('id', $id)->first();
        return view('backend.editContact', compact('contact'));
    }
    public function updateContact($id, ContactRequest $request)
    {
        // if ($request->value && $request->url)
        // {
            DB::table('contacts')->where('id', $id)->update([
                'media' => $request->media,
                'url' => $request->url,
                'value' => $request->value,
            ]) ;
            return redirect('manageContact')->with('success', 'Contact added');
            // } else {
            //     return redirect()->back()->with('errors', 'Contact not added');
            // }
        // }
        // else if($request->value)
        // {
        //     if (DB::table('contacts')->where('id', $id)->update([
        //         'media' => $request->media,
        //         'value' => $request->value,
        //     ]) ){
        //         return redirect('manageContact')->with('success', 'Contact added');
        //     } else {
        //         return redirect()->back()->with('errors', 'Contact not added');
        //     }
        // }
        // else
        // {
        //     if (DB::table('contacts')->where('id', $id)->update([
        //         'media' => $request->media,
        //         'url' => $request->url,
        //     ]) ){
        //         return redirect('manageContact')->with('success', 'Contact added');
        //     } else {
        //         return redirect()->back()->with('errors', 'Contact not added');
        //     }
        // }
        
    }
    public function deleteContact(int $id)
    {
        $contact = DB::table('contacts')->where('id', $id)->delete();
        return redirect('manageContact')->with('success', 'category deleted');
    }
    public function viewMenu(int $id)
    {
        $products = array();
        $productsID = DB::table('products_category')->where('category_id', $id)->pluck('product_id');
        foreach ($productsID as $id) 
        {
            $product = Product::findOrFail($id);
            array_push($products, $product);
        }
        $category = Category::get();
        return view('frontend.viewMenu', compact('products'), compact('category'));
    } 
    public function viewMenuList()
    {
        $products = Product::get();
        $category = Category::get();
        return view('frontend.viewMenuList', compact('products'), compact('category'));
    }
}
