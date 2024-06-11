@extends('dashboard.layouts.adminTemplate')
@section('content')
    <table class="table carts-index-table">
        <caption class="h3 text-center">{{ $user->name }} carts</caption>
        <x-dashboard.cart.cartCollection :carts="$user->carts()->paginate('25')" />

    </table>
@endsection
