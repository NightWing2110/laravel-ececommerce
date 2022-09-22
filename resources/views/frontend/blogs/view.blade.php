@extends('layouts.front')

@section('title', $blog->title)

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
                Collections
            </a> /
            <a href="{{ url('blog') }}">
                Blog
            </a> /
            <a href="{{ url('view-category/' . $blog->category->slug . '/' . $blog->slug) }}">
                {{ $blog->title }}
            </a>
        </h6>
    </div>
</div>
<div class="container">
    <div class="card-shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-meta">
                        <small>{{ \Carbon\Carbon::parse($blog->created_at)->format('d-m-Y') }}</small>
                        <small>By: {{ $blog->user->name }}</small>
                        <small><i class="fa fa-eye"></i>{{ $blog->view_counts }}</small>
                    </div>
                    <p class="mt-3">
                        {!! $blog->content !!}
                    </p>
                </div>
                <div class="col-md-4 border-right">
                    <h4 style="color: red" class="small-title">Hot Trending-You may also like</h4>
                    @foreach ($relate as $item)
                    <div class="blog-box">
                        <div class="blog-meta">
                            <h4><a href="{{ route('view-blog',$item->slug) }}" title="">{{ $item->title }}</a></h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
