@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Edit/Update Category</h1>
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

                <div class="col-md-12 mb-3">
                    <label for="">Parent_id</label>
                    <select name="parent_id" class="form-control">
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                            <?php showCategories($categories);?>
                    </select>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {
        if($item->parent_id == $parent_id)
        {
            echo '<option value="'.$item->id.'">'.$char.$item->name.'</option>';
            unset($categories[$key]);
            showCategories($categories, $item->id, $char. ' -- ');
        }
    }
}
?>
@endsection
