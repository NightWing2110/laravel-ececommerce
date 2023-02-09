@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Update Product</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.update',$products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="cate_id">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" @if($products->cate_id == $item->id) selected @endif>{{
                            $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{ $products->name }}" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{ $products->slug }}" name="slug">
                    </div>
                    <div class="col-md-12">
                        <label for="">Small Description</label>
                        <textarea name="small_description"
                                  class="form-control">{{ $products->small_description }}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea name="description" class="ckeditor">{{ $products->description }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" value="{{ $products->original_price }}"
                               name="original_price">
                    </div>
                    <div class="col-md-6">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{ $products->selling_price }}"
                               name="selling_price">
                    </div>
                    <div class="col-md-6">
                        <label for="">Tax</label>
                        <input type="number" class="form-control" value="{{ $products->tax }}" name="tax">
                    </div>
                    <div class="col-md-6">
                        <label for="">Quanlity</label>
                        <input type="number" class="form-control" value="{{ $products->qty }}" name="qty">
                    </div>
                    @if ($products->image)
                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" width="150px" alt="Product Image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control" accept="image/*" />
                    </div>
                    <div class="col-md-6">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $products->status == '1' ? 'checked' : '' }} name="status">
                    </div>
                    <div class="col-md-6">
                        <label for="">Trending</label>
                        <input type="checkbox" {{ $products->trending == '1' ? 'checked' : '' }} name="trending">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Done</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
