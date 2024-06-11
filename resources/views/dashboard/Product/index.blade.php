@extends('main.layouts.mainTemblate')
@section('content')
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Main color</th>
            <th>Main color price</th>
            <th>Quantity</th>
        </tr>
        @forelse ($products as $product)
            <x-dashboard.product.parts.ProductRow :product="$product" />
        @empty
            <tr>
                <td colspan="4" class="alert-no-records"> No products </td>
            </tr>
        @endforelse
    </table>
@endsection
