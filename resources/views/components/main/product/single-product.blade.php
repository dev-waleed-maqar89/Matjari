<div class="products-index-single-product-card">
    <a href="{{ route('product.show', $product->id) }}">
        @if ($product->mainColor->pics->first())
            <img src="{{ asset($product->mainColor->pics->first()->image->src) }}"
                class="products-index-single-product-image">
        @else
            <img src="{{ asset('images/products/no-image.jpeg') }}" class="products-index-single-product-image">
        @endif
        <br>
        <span>{{ $product->name . ' | ' . $product->mainColor->Color }}</span> <br>
        @if ($product->mainColor->lastDiscount())
            <span><del>{{ $product->mainColor->price }} L.E.</del></span>
            <span>{{ $product->mainColor->newPrice }} L.E.</span>
        @else
            <span>{{ $product->mainColor->price }} L.E.</span>
        @endif
    </a>
</div>
