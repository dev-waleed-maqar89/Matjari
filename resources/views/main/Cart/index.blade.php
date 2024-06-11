@extends('main.layouts.mainTemblate')
@section('content')
    {{ $carts->links() }}
    <table class="table text-center cart-index-table">
        <tr>
            <th>Order id</th>
            <th>Created at</th>
            <th>Order state</th>
            <th>Order amount</th>
            <th>Completed at</th>
        </tr>
        @forelse ($carts as $cart)
            <tr>
                <td>
                    <a href="/cart/{{ $cart->id }}">
                        {{ $cart->id * 19 + 3207 }}
                    </a>
                </td>
                <td>{{ \Carbon\Carbon::parse($cart->created_at)->format('Y-M-d') }}</td>
                <td>{{ $cart->state }}</td>
                <td>{{ $cart->amount }}</td>
                <td>{{ $cart->completed_at ? \Carbon\Carbon::parse($cart->completed_at)->format('Y-M-d') : '' }}</td>
            </tr>
            <h1>

            </h1>
        @empty
            <tr>
                <td colspan="5" class="h2 text-center alert alert-danger"> No carts </td>
            </tr>
        @endforelse
    </table>
@endsection
