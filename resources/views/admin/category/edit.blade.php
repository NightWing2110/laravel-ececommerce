@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Update Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" value="{{ $category->name }}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $category->slug }}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control">{{ $category->description }}</textarea>
                    </div>
                    @if($category->image)
                        <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="Category Image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control" accept="image/*" />
                    </div>
                    <div class="col-md-6">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $category->status == 1 ? 'checked' : '' }} name="status">
                    </div>
                    <div class="col-md-6">
                        <label for="">Popular</label>
                        <input type="checkbox" {{ $category->popular == 1 ? 'checked' : '' }} name="popular">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Done</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
