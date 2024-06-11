<div class="single-cart-single-item">
    @if ($item->color->pics->first())
        <img src="{{ asset($item->color->pics->first()->image->src) }}" class="single-cart-item-img">
    @else
        <img src="{{ asset('images/products/no-image.jpeg') }}" class="single-cart-item-img">
    @endif
    <div class="text-center single-cart-item-title">
        <h3 class="">{{ $item->color->product->name }}</h3>
        <div class="single-cart-item-cost">
            <span class="text text-secondary">Quantity: {{ $item->quantity }}</span>
            <span class="text text-secondary">Price: {{ $item->cost }}</span>
            <span class="text text-secondary">Amount: {{ $item->amount }}</span>
        </div>
    </div>
</div>
