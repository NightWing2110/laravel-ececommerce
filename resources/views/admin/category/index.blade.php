@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Category</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/category/'.$item->image) }}" width="100px" alt="Image here">
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.edit',$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('admin.categories.delete',$item->id) }}"
                            class="btn btn-primary btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
