@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Product</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->selling_price) }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/products/'.$item->image) }}" width="100px" alt="Image here">
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit',$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('admin.products.delete',$item->id) }}"
                               class="btn btn-primary btn-sm">Delete</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
