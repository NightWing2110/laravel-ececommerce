@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Add Blog</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select" name="category_id">
                        <option value="">Select Category</option>
                        @foreach($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Please Enter Title">
                </div>

                <div class="col-md-6">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Please Enter Description">
                </div>

                <div class="col-md-12">
                    <label for="">New Post</label>
                    <input type="checkbox" name="new_post" value="1">
                </div>

                <div class="col-md-12">
                    <label for="">Highlight Post</label>
                    <input type="checkbox" name="highlight_post" value="1">
                </div>

                <div class="col-md-12">
                    <input type="file" name="image" class="form-control" accept="image/*" />
                </div>

                <div class="col-md-12">
                    <label for="">Content</label>
                    <textarea id="content" name="content" class="ckeditor"
                        placeholder="Please Enter Content"></textarea>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection