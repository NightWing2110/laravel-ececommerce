@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Update Blog</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.blog.update',$blogs->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}" @if($blogs->category_id == $item->id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $blogs->title }}">
                </div>

                <div class="col-md-6">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $blogs->description }}">
                </div>

                <div class="col-md-12">
                    <label for="">New Post</label>
                    <input type="checkbox" name="new_post" {{ $blogs->new_post == '1' ? 'checked' : '' }}>
                </div>
                
                <div class="col-md-12">
                    <label for="">Highlight Post</label>
                    <input type="checkbox" name="highlight_post" {{ $blogs->highlight_post == '1' ? 'checked' : '' }}>
                </div>

                @if ($blogs->image)
                    <img src="{{ asset('assets/uploads/blog/'.$blogs->image) }}" width="100px" alt="Product Image here">
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control" accept="image/*" />
                </div>

                <div class="col-md-12">
                    <label for="">Content</label>
                    <textarea id="content" name="content" class="ckeditor">{{ $blogs->content }}</textarea>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection