<div class="mb-3 p-3 single-cart-single-product">
    <a href="{{ route('product.show', $product->color->product->id) }}" class="single-cart-product-link">
        @if ($product->color->pics->first())
            <img src="{{ asset($product->color->pics->first()->image->src) }}" class="single-cart-product-img">
        @else
            <img src="{{ asset('images/products/no-image.jpeg') }}" class="single-cart-product-img">
        @endif
        <h3>
            {{ $product->color->product->name }}
        </h3>
        <div class="single-cart-product-details">
            {{ $product->color->product->name }} | {{ $product->color->size->size }} |
            {{ $product->color->Color }}
            <br>
            <div class="single-cart-product-cost">
                <span class="text text-secondary">Quantity: {{ $product->quantity }}</span>
                <span class="text text-secondary">Price: {{ $product->cost }}</span>
                <span class="text text-secondary">Amount: {{ $product->amount }}</span>
            </div>
        </div>
    </a>
    @if ($cart->state == 'pending')
        <div class="single-cart-product-forms">
            <form action="{{ route('changeQuantity', $product->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-group">
                    <input type="number" name="quantity" value={{ $product->quantity }} class="form-control">
                    <input type="submit" value="Change quantity" class="form-control btn btn-info">
                    @error('quantity')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </form>
            <form action="{{ route('removeCartProduct', $product->id) }}" method="POST">
                @csrf @method('delete')
                <div class="form-group">
                    <input type="submit" value="Delete" class="form-control btn btn-danger">
                </div>
            </form>
        </div>
    @endif
</div>
