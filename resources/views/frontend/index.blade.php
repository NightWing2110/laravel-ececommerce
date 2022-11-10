@extends('layouts.front')

@section('title')
    Wellcome to NightWing-Shop
@endsection

@section('content')
    @include('layouts.inc.frontcategory')
    @include('layouts.inc.slider')
    {{-- Featured Product --}}
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Product</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <a href="{{ url('view-product', $prod->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="Product image">
                                    <div class="card-body">
                                        <h5>{{ $prod->name }}</h5>
                                        <span class="float-start">{{ number_format($prod->selling_price) . ' VNĐ' }}</span>
                                        <span class="float-end">
                                            <s>{{ number_format($prod->original_price) . ' VNĐ' }}</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- Cellphone --}}
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Cellphone</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($cellphone as $product)
                        <div class="item">
                            <a href="{{ url('view-product', $product->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/products/' . $product->image) }}"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5>{{ $product->name }}</h5>
                                        <span
                                            class="float-start">{{ number_format($product->selling_price) . ' VNĐ' }}</span>
                                        <span class="float-end">
                                            <s>{{ number_format($product->original_price) . ' VNĐ' }}</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- Laptop --}}
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Laptop</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($laptop as $product)
                        <div class="item">
                            <a href="{{ url('view-product', $product->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/products/' . $product->image) }}"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5>{{ $product->name }}</h5>
                                        <span
                                            class="float-start">{{ number_format($product->selling_price) . ' VNĐ' }}</span>
                                        <span class="float-end">
                                            <s>{{ number_format($product->original_price) . ' VNĐ' }}</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- Tablet --}}
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Tablet</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($tablet as $product)
                        <div class="item">
                            <a href="{{ url('view-product', $product->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/products/' . $product->image) }}"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5>{{ $product->name }}</h5>
                                        <span
                                            class="float-start">{{ number_format($product->selling_price) . ' VNĐ' }}</span>
                                        <span class="float-end">
                                            <s>{{ number_format($product->original_price) . ' VNĐ' }}</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- Wristwatch --}}
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Wristwatch</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($wristwatch as $product)
                        <div class="item">
                            <a href="{{ url('view-product', $product->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/products/' . $product->image) }}"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5>{{ $product->name }}</h5>
                                        <span
                                            class="float-start">{{ number_format($product->selling_price) . ' VNĐ' }}</span>
                                        <span class="float-end">
                                            <s>{{ number_format($product->original_price) . ' VNĐ' }}</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
@endsection
