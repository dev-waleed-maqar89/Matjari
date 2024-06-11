@extends('dashboard.layouts.adminTemplate')
@section('content')
    <h1>
        {{ $product->name }}
        <a href="{{ route('dashboard.product.edit', $product->id) }}" class="btn btn-dark">Edit</a>
    </h1>

    <div class="single-product-details">
        <x-dashboard.product.show-details :product="$product" />
        <x-dashboard.product.add-details :product="$product" />
    </div>
@endsection
