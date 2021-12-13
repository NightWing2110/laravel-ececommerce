<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productlist()
    {
        $product = Product::all();
        $categories = Category::all();
        return view('frontend.products.list', compact('product', 'categories'));
    }
}
