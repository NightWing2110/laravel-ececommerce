@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Blog</h1>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blog as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->category_id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/blog/'.$item->image) }}" width="100px" alt="Image here">
                    </td>
                    <td>
                        <a href="{{ route('admin.blog.edit',$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('admin.blog.delete',$item->id) }}" class="btn btn-primary btn-sm">Delete</a>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection