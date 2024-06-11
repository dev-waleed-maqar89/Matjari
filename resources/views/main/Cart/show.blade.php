@extends('main.layouts.mainTemblate')
@vite('resources/css/main.css')
@section('content')
    @error('address')
        <div class="p-3 alert-add-address">
            <span class="btn float-right close-add-address">X</span>
            <div class="m-3">{{ $message }}</div>
            <a href="{{ route('user.edit', Auth::id()) }}" class="btn btn-primary float-right">Edit profile</a>
        </div>
    @enderror
    @if (count($products) != 0)
        <div class="cart-state">
            <div class="p-2 single-cart-total-amount">
                Order amount: {{ $cart->amount }} L.E.
                <small class="d-block">Doesn't include delivery fees</small>
            </div>
            <div class="mb-3">
                <x-Main.Cart.parts.cartstatus :cart="$cart" />
            </div>

        </div>
    @endif

    @if (in_array($cart->state, ['pending', 'approved']))
        <div class="row single-cart-change-state">
            @if ($cart->state == 'pending')
                <div class="col-6">
                    <form action="{{ route('cart.approve', $cart->id) }}" method="POST" class="approve-cart">
                        @csrf @method('put')
                        <input type="submit" value="Approve" class="btn btn-success">
                    </form>
                </div>
            @endif
            <div class="col-6">
                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST" class="cancel-cart">
                    @csrf @method('delete')
                    <input type="submit" value="Cancel order" class="btn btn-danger">
                </form>
            </div>
        </div>
    @endif
    <div class="mt-3">
        {{ $products->links() }}
    </div>
    <div class="single-cart-products-container">
        @forelse ($products as $product)
            <x-Main.Cart.parts.singleProduct :product="$product" :cart="$cart" />
        @empty
            <div class="h1 alert alert-danger">
                Your basket is empty
            </div>
        @endforelse
    </div>
@endsection
