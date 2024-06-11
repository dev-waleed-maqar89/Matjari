@extends('main.layouts.mainTemblate')
@vite('resources/css/main.css')
@section('content')
    <div class="text-center single-product-title">

        <h1 class="">
            {{ $product->name }}
        </h1>
        <div class="single-product-categories">
            @forelse ($product->categories as $cat)
                <x-main.product.Parts.category :cat="$cat" />
            @empty
            @endforelse
        </div>
        <div class="single-product-add-to-cart">
            <x-main.Product.Parts.addToCart :mainColor="$mainColor" />
        </div>
    </div>
    <div class="single-product-details-container">
        <div class="container single-product-main-color-container">
            <x-Main.Product.Parts.mainColor :mainColor="$mainColor" />
        </div>

        <div class="my-5 single-product-sizes-container">
            <x-Main.Product.Parts.sizes :product="$product" :sizes="$sizes" :mainColor="$mainColor" />
        </div>
        <div class="mb-5 single-product-options-container">
            <ul class="single-product-options-list">
                @forelse ($product->options as $option)
                    <x-main.Product.Parts.option :option="$option" />
                @empty
                @endforelse
            </ul>
        </div>
        <div class="mb-5 single-product-description-container">
            <h3>About product:</h3>
            <p>{{ $product->description }}</p>
        </div>
    </div>
@endsection
