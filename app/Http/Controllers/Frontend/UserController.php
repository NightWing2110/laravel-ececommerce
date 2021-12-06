<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        // dd($order_product);
        return view('frontend.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $order_product = DB::table('orders')->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.prod_id', '=', 'products.id')->where('order_id', $id)->get();
        //  dd($order_product);
        // join('countries', 'countries.country_id', '=', 'leagues.country_id')
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders', 'order_product'));
    }
}
