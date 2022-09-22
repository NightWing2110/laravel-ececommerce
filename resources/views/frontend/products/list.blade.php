@extends('layouts.front')

@section('title')
Product
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
                Home
            </a> /
            <a>
                Product
            </a>
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h2>Category</h2>
                @foreach ($categories as $item)
                <a href="{{ route('view-category',$item->slug) }}"><br>{{ $item->name }}</a>
                @endforeach
            </div>
            <div class="col-md-10">
                <h2>All Product</h2>
                <div class="row">
                    @foreach ($product as $prod)
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('view-product', $prod->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" width="100px"
                                    alt="Product image">
                                <div class="card-body">
                                    <h5>{{ $prod->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
