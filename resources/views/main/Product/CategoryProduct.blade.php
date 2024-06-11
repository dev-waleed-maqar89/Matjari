@extends('main.layouts.mainTemblate')
@vite('resources/css/main.css')
@section('content')
    <h2 class="text-center">Products for {{ $category->name }}</h2>
    {{ $products->links() }}
    <div class="products-category-products-container">
        @forelse ($products as $product)
            <x-Main.Product.singleProduct :product="$product" />
        @empty
        @endforelse
    </div>
@endsection
