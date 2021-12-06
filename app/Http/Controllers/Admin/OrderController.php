<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('status','0')->get();
        return view('admin.orders.index',compact('orders'));
    }
    
    public function view($id){
        $order_product = DB::table('orders')->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.prod_id', '=', 'products.id')->where('order_id', $id)->get();
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('admin.orders.view',compact('orders','order_product'));
    }

    public function updateorder(Request $request, $id){
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status','Order Updated Successfully');
    }

    public function orderhistory(){
        $orders = Order::where('status','1')->get();
        return view('admin.orders.history',compact('orders'));
    }
}
