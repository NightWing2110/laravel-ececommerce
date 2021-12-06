@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>

                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>

                    <div class="col-md-12">
                        <label for="">Meta Keywords</label>
                        <textarea  class="form-control" name="meta_keywords"></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="">Meta Description</label>
                        <textarea  class="form-control" name="meta_description"></textarea>
                    </div>

                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control" accept="image/*"/>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>

                    <div class="col-md-6">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection