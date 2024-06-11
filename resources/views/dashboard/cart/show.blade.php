@extends('main.layouts.mainTemblate')
@vite('resources/css/dashboard.css')
@section('content')
    <div class="mb-3">
        @foreach (['pending', 'approved', 'moved', 'completed', 'canceled'] as $state)
            <span @class([
                'mr-1 text-center single-cart-state',
                'active' => $cart->state == $state,
            ]) data-cart="{{ $cart->id }}" data-state="{{ $state }}">
                {{ $state }}
            </span>
        @endforeach
        @if (in_array($cart->state, ['pending', 'approved', 'moved']))
            <div class="mt-3 row carts-index-change-state-container">
                @if ($cart->state != 'pending')
                    <form action="{{ route('dashboard.cart.changeState', $cart->id) }}" method="POST" class="col-4">
                        @csrf @method('PUT')
                        <input type="hidden" name="state" value="{{ $cart->next_state }}">
                        <input type="submit" value="{{ ucfirst($cart->next_state) }}" class="btn btn-info">
                    </form>
                @endif
                <form action="{{ route('dashboard.cart.changeState', $cart->id) }}" method="POST" class="col-4">
                    @csrf @method('PUT')
                    <input type="hidden" name="state" value="canceled">
                    <input type="submit" value="Cancel" class="btn btn-danger">
                </form>
            </div>
        @endif
    </div>
    <ul class="single-cart-user-details">
        <li>
            <span>Customer:</span>
            <span><a href="{{ route('dashboard.user.show', $cart->user->id) }}">
                    {{ $cart->user->name }}
                </a></span>
        </li>
        <li>
            <span>Address:</span>
            <span>{{ $cart->user->address ?? 'N/A' }}</span>
        </li>
        <li>
            <span>Amount:</span>
            <span>{{ $cart->amount }}</span>
        </li>
    </ul>
    <div class="single-cart-items-container">
        @forelse ($cart->products as $item)
            <x-dashboard.cart.parts.cartitem :item="$item" />
        @empty
        @endforelse
    </div>
@endsection
