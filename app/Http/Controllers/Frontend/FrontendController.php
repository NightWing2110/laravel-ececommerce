<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FrontendController extends Controller
{
    public function index()
    {
        $featured_products =  Product::where('trending', '1')->take(15)->get();
        $trending_category = Category::where('popular', '1')->take(15)->get();
        $cellphone = Product::where('cate_id', '2')->take(15)->get();
        $laptop = Product::where('cate_id', '3')->take(15)->get();
        $tablet = Product::where('cate_id', '4')->take(15)->get();
        $wristwatch = Product::where('cate_id', '5')->take(15)->get();
        $categorylist = Category::where('status', '0')->get();
        // dd($categorylist);
        return view('frontend.index', compact('featured_products', 'trending_category', 'cellphone', 'laptop', 'tablet', 'wristwatch', 'categorylist'));
    }

    // public function category()
    // {
    //     $category = Category::where('status', '0')->get();
    //     return view('frontend.category', compact('category'));
    // }
    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products'));
        } else {
            return redirect('/')->with('status', 'Slug doesnot exists');
        }
    }
    public function productview($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists()) {
            if (Product::where('slug', $prod_slug)->exists()) {
                $products = Product::where('slug', $prod_slug)->first();
                $ratings = Rating::where('prod_id', $products->id)->get();
                $rating_sum = Rating::where('prod_id', $products->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id', $products->id)->where('user_id', Auth::id())->first();
                $reviews = Review::where('prod_id', $products->id)->get();
                if ($ratings->count() > 0) {
                    $rating_value = $rating_sum / $ratings->count();
                } else {
                    $rating_value = 0;
                }
                return view('frontend.products.view', compact('products', 'ratings', 'rating_value', 'user_rating', 'reviews'));
            } else {
                return redirect('/')->with('status', 'The link was broken');
            }
        } else {
            return redirect('/')->with('status', 'No such category found');
        }
    }
    public function product($prod_slug)
    {
        if (Product::where('slug', $prod_slug)->exists()) {
            $product = Product::where('slug', $prod_slug)->first();
            $ratings = Rating::where('prod_id', $product->id)->get();
            $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
            $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();
            $reviews = Review::where('prod_id', $product->id)->get();
            if ($ratings->count() > 0) {
                $rating_value = $rating_sum / $ratings->count();
            } else {
                $rating_value = 0;
            }
            return view('frontend.products.viewproduct', compact('product', 'ratings', 'rating_value', 'user_rating', 'reviews'));
        }
    }
    public function productlistAjax()
    {
        $products = Product::select('name')->where('status', '0')->get();
        $data = [];
        foreach ($products as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }
    public function searchProduct(Request $request)
    {
        $search_product = $request->product_name;
        if($search_product != "")
        {
            $product = Product::where("name","LIKE","%$search_product%")->first();
            if($product)
            {
                return redirect('view-category/'.$product->category->slug.'/'.$product->slug);
            }
            else
            {
                return redirect()->back()->with("Status","No Product Matched Your Search");
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
