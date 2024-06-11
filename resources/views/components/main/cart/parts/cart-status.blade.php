    @foreach (['pending', 'approved', 'moved', 'completed', 'canceled'] as $state)
        <span @class([
            'mr-1 text-center single-cart-state',
            'active' => $cart->state == $state,
        ]) data-cart="{{ $cart->id }}" data-state="{{ $state }}">
            {{ $state }}
        </span>
    @endforeach
