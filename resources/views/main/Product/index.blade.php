@extends('main.layouts.mainTemblate')
@vite('resources/css/main.css')
@section('content')
    <h2 class="text-center">All products</h2>
    <div class="product-index-search">
        <x-Main.Product.Parts.searchform :search="$search" />
    </div>
    {{ $products->links() }}
    <div class="container products-index-container">
        @forelse ($products as $product)
            <x-Main.Product.singleProduct :product="$product" />
        @empty
        @endforelse
    </div>
@endsection
