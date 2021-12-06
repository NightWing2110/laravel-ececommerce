@extends('layouts.front')

@section('title')
    Product
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a>
                    Blog
                </a>
            </h6>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                {{-- <div class="col-md-2">
                    <h2>Category</h2>
                    @foreach ($categories as $item)
                        <a href="{{ route('view-category', $item->slug) }}"><br>{{ $item->name }}</a>
                    @endforeach
                </div> --}}
                <div class="col-md-12">
                    <h2>All Blogs</h2>
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('view-blog', $blog->slug) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/blog/' . $blog->image) }}" width="100px"
                                            alt="Product image">
                                        <div class="card-body">
                                            <h5><a href="{{ route('view-blog', $blog->slug) }}">{{ $blog->title }}</a>
                                            </h5>
                                            <small>{{ \Carbon\Carbon::parse($blog->created_at)->format('d-m-Y') }}</small>
                                            <small>{{ $blog->user->name }}</small>
                                            <small><i class="fa fa-eye"></i>{{ $blog->view_counts }}</small>
                                            {{-- <p>
                                        {{ $prod->description }}
                                    </p> --}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
