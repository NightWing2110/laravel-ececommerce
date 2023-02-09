@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.insert') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="file" name="image" class="form-control" accept="image/*" />
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
                        <button type="submit" class="btn btn-primary">Done</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
