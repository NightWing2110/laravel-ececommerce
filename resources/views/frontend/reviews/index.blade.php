@extends('layouts.front')

@section('title', 'Write A Review')


@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if($verified_purchase->count() > 0)
                    <h5>You Are Writing A Review For {{ $product->name }}</h5>
                    <form action="{{ url('/add-review') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <textarea class="form-control" name="user_review" rows="5"
                            placeholder="Write A Review"></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                    </form>
                    @else
                    <div class="alert alert-danger">
                        <h5>You Are Not Eligible To Review This Product</h5>
                        <p>
                            For The Trusthworthiness Of The Reviews, Only Customers Who Purchased The Product Can Write
                            A Review About The Product.
                        </p>
                        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Go To HomePage</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection