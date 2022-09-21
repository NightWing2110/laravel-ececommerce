<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }
    public function add()
    {
        $category = Category::orderBy('name','ASC')->get();
        return view('admin.product.add', compact('category'));
    }

    public function insert(Request $request)
    {
        $products = new Product();
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'small_description' => 'required',
            'description' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'tax' => 'required',
            'qty' => 'required',
            'image' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $filename);
            $products->image = $filename;
        }
        $products->cate_id = $request->cate_id;
        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->small_description = $request->small_description;
        $products->description = $request->description;
        $products->original_price = $request->original_price;
        $products->selling_price = $request->selling_price;
        $products->tax = $request->tax;
        $products->qty = $request->qty;
        $products->status = $request->status == TRUE ? '1' : '0';
        $products->trending = $request->trending == TRUE ? '1' : '0';
        $products->save();
        return redirect()->route('admin.products.index')->with('status', 'Create Product Successfully');
    }

    public function edit($id)
    {
        $products = Product::find($id);
        $category = Category::orderBy('name','ASC')->get();
        $categories = Category::find($id);
        return view('admin.product.edit', compact('products', 'category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        if ($request->hasFile('image')) {
            $path = 'assets/uploads/products/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $filename);
            $products->image = $filename;
        }
        $products->name = $request->name;
        $products->cate_id = $request->cate_id;
        $products->slug = $request->slug;
        $products->small_description = $request->small_description;
        $products->description = $request->description;
        $products->original_price = $request->original_price;
        $products->selling_price = $request->selling_price;
        $products->tax = $request->tax;
        $products->qty = $request->qty;
        $products->status = $request->status == TRUE ? '1' : '0';
        $products->trending = $request->trending == TRUE ? '1' : '0';
        $products->update();
        return redirect()->route('admin.products.index')->with('status', 'Product Update Successfully');
    }

    public function delete($id)
    {
        $products = Product::find($id);
        $path = 'assets/uploads/products/' . $products->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $products->delete();
        return redirect()->route('admin.products.index')->with('status', 'Product Deleted Successfully');
    }
}
