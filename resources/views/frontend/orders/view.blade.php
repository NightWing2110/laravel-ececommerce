@extends('layouts.front')

@section('title')
My Orders
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Order View
                        <a href="{{ url('my-orders') }}" class="btn btn-warning text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Shipping Details</h4>
                            <hr>
                            <label for="">First Name</label>
                            <div class="border p-2">{{ $orders->fname }}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2">{{ $orders->lname }}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{ $orders->email }}</div>
                            <label for="">Contact</label>
                            <div class="border p-2">{{ $orders->phone }}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{ $orders->address1 }},<br>
                                {{ $orders->address2 }},<br>
                                {{ $orders->city }},<br>
                                {{ $orders->state }},<br>
                                {{ $orders->country }},<br>
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{ $orders->pincode }}</div>
                        </div>
                        <div class="col-md-6">
                            <h4>Orders Details</h4>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach ($order_product as $item)
                                    @php
                                    $total += $item->selling_price * $item->order_qty;
                                    @endphp
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->order_qty }}</td>
                                        <td>{{ number_format($item->selling_price).' VNĐ' }}</td>
                                        <td><img src="{{ asset('assets/uploads/products/' . $item->image) }}"
                                                width="50px" alt=""></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <h6>Total: {{ number_format($total).' VNĐ' }}</h6>
                            <h6>Payment Mode: {{ $item->payment_mode }}</h6>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection