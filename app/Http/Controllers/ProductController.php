<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Products_category;
use App\Http\Requests\ProductAddRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CategoryAddRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Http\Requests\ProductEditRequest;


class ProductController extends Controller
{
    public function addProductView ()
    {
        $category = Category::all();
        return view('product.createProduct', compact('category'));
    }
    public function indexProduct()
    {
        $products = Product::get();
        $category = Category::get();
        return view('product.indexProduct', compact('products'), compact('category'));
    }
    
    public function storeProduct(ProductAddRequest $request)
    {
        if ($request->has('image')) {

            $extension = $request->file('image')->getClientOriginalExtension();
            $file_name = random_int(0001, 9999).'.'.$extension;
            $file_path = 'product/'.$file_name;
            Storage::disk('public')->put($file_path, file_get_contents($request->file('image')));
        } else {
            $file_path = null;
        }
        
        if (Product::insert([
            'code' => $request->code,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $file_name,
        ]) ){
            foreach ($request->category as $categori) {
                DB::table('products_category')->insert([
                    'product_id'=>DB::table('products')->where('code', $request->code)->value('id'),
                    'category_id'=>$categori,
                ]);
            }
            

            return redirect('products')->with('success', 'Product added');
                
           
        } else {
            return redirect()->back()->with('errors', 'Product not added');
        }
    }

    public function edit(int $id)
    {
        $product = Product::findOrFail( $id);
        $product = Product::where('id', $id)->first();
        
        // $product = Product::with('categories')->where('id', $id)->first();
        $category = Category::all();
        // $selectedCategoryIds = $product->categories->pluck('id')->toArray();
        return view('product.edit', compact('product', 'category'));
    }

    public function update($id, ProductEditRequest $request)
    {
        $product = DB::table('products')->where('id', $id)->first();
        
        if ($request->has('image')) {

            $extension = $request->file('image')->getClientOriginalExtension();
            $file_name = random_int(0001, 9999).'.'.$extension;
            $file_path = 'product/'.$file_name;
            if ($product->image) {
                Storage::disk('public')->delete('product/'.$product->image);
            }
            Storage::disk('public')->put($file_path, file_get_contents($request->file('image')));
        } else {
            $file_name = $product->image;
        }
        // dd($request->category);
        // dd($id);
        
        $categories = DB::table('products_category')->where('product_id', $id)->get();
        $productCategoryId= array();
        // dd($categories[0]->id);
        
        // dd($request->category[0]);
        foreach ($categories as $row) {
            array_push($productCategoryId, $row->id);
        }
        // dd($productCategoryId);
        foreach ($productCategoryId as $idDel) 
            {
                DB::table('products_category')->where('id', '=', $idDel)->delete();
            }
        foreach ($request->category as $categori) {
            DB::table('products_category')->insert([
                'product_id'=>$id,
                'category_id'=>$categori,
            ]);
        }
        // dd('pd');
        DB::table('products')->where('id', $id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $file_name,
        ]);
        // if (DB::table('products')->where('id', $id)->update([
        //     'code' => $request->code,
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'image' => $file_name,
        // ])) {
            // foreach ($request->category as $categori) {
            //     DB::table('products_category')->insert([
            //         'product_id'=>$id,
            //         'category_id'=>$categori,
            //     ]);
            // }
            // dd('success');
            // $product = Product::find($id);
            // $product->categories()->sync($request->category);
            // dd('product submit');
            // foreach ($request->category as $categori) 
            // {
            //     // dd()
            //     DB::table('products_category')->update([
            //         'category_id'=> $categori,
            //         // 'category_id'=>DB::table('categories')->where('name', $categori)->value('id'),
            //     ]);
            // }
        
        
            return redirect('products')->with('success', 'Product Updated');
            
        // } else {
           
        //     return redirect()->back()->with('errors', 'Product not saved');
        // }
    }
    public function delete(int $id)
    {

        $product = DB::table('products')->where('id', $id)->delete();
        return redirect('products')->with('success', 'Product deleted');
    }

    public function category()
    {
        $category = Category::get();
        return view('product.indexCategory', compact('category'));
    }

    public function addCategory()
    {
        return view('product.addCategory');
    }
    public function storeCategory(CategoryAddRequest $request)
    {
        
        if (DB::table('categories')->insert([
            'name' => $request->name,
        ]) ){
            return redirect('category')->with('success', 'Product added');
        } else {
            return redirect()->back()->with('errors', 'Product not added');
        }
    }
    public function editCategory(int $id)
    {
        $category = Category::findOrFail( $id);
        $category = Category::where('id', $id)->first();
        return view('product.editCategory', compact('category'));
    }
    public function updateCategory($id, CategoryEditRequest $request)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        
        if (DB::table('categories')->where('id', $id)->update([
            'name' => $request->name,
        ])) {
            return redirect('category')->with('success', 'Category Updated');
        } else {
            return redirect()->back()->with('errors', 'Category not saved');
        }
    }
    public function deleteCategory(int $id)
    {
        $product = DB::table('categories')->where('id', $id)->delete();
        // $product->;
        return redirect('category')->with('success', 'category deleted');
    }
    
}
