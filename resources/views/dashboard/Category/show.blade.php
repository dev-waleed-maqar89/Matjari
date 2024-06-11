@extends('main.layouts.mainTemblate')
@section('content')
    <h1>
        {{ $category->name }}
    </h1>
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Main color</th>
            <th>Main color price</th>
            <th>Quantity</th>
        </tr>
        @forelse ($category->products as $product)
            <x-dashboard.product.parts.ProductRow :product="$product" />
        @empty
        @endforelse
    </table>
@endsection
