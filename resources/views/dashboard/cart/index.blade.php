@extends('dashboard.layouts.adminTemplate')
@section('content')
@section('content')
    <div class="carts-index-states">
        <a href="/dashboard/cart"@class(['carts-index-state-link', 'active' => $currentState == null])>All orders</a>
        @foreach (['pending', 'approved', 'moved', 'completed', 'canceled'] as $state)
            <a href="/dashboard/cart?state={{ $state }}"@class([
                'carts-index-state-link',
                'active' => $state == $currentState,
            ])>{{ $state }}</a>
        @endforeach
    </div>
    <table class="table carts-index-table">
        <caption class="h3 text-center">{{ ucfirst($currentState ?? 'All') }} carts</caption>
        <x-dashboard.cart.cartCollection :carts="$carts" :currentState="$currentState" />
    </table>
@endsection
