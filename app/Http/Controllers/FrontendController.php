<?php

namespace App\Http\Controllers;
use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;
use App\Products_category;
use App\About;
use App\Http\Requests\AboutRequest;

class FrontendController extends Controller
{
    public function viewAbout()
    {
        $about=About::orderBy('preference', 'asc')->get();
        // dd($about);
        return view('frontend.about',compact('about'));
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
        return redirect('manageContact')->with('success', 'Contact deleted');
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
    public function home()
    {
        return view('frontend.home');
    } 
    public function manageAbout()
    {
        $about = About::get();
        return view('backend.indexAbout', compact('about'));
    }
    public function addAbout()
    {
        return view('backend.addAbout');
    }
    public function storeAbout(AboutRequest $request)
    {
          if (DB::table('abouts')->insert([
                'heading' => $request->heading,
                'paragraph' => $request->paragraph,
                'preference' => $request->preference,
            ]) ){
                return redirect('manageAbout')->with('success', 'Contact added');
            } else {
                return redirect()->back()->with('errors', 'Contact not added');
            }
       
    }
    public function editAbout(int $id)
    {
        $about = About::findOrFail( $id);
        $about = About::where('id', $id)->first();
        return view('backend.editAbout', compact('about'));
    }
    public function updateAbout($id, AboutRequest $request)
    {
            DB::table('abouts')->where('id', $id)->update([
                'heading' => $request->heading,
                'paragraph' => $request->paragraph,
                'preference' => $request->preference,
            ]) ;
            return redirect('manageAbout')->with('success', 'About added');
    }
    public function deleteAbout(int $id)
    {
        $about = DB::table('abouts')->where('id', $id)->delete();
        return redirect('manageAbout')->with('success', 'About deleted');
    }
}
