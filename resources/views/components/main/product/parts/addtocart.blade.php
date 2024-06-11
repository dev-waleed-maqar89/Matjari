<div>
    @auth
        <form class="add-to-cart" data-color="{{ $mainColor->id }}" method="POST" action="{{ route('cartProduct.store') }}">
            @csrf
            <div class="row">
                <input type="hidden" name="color" value="{{ $mainColor->id }}">
                <div class="form-group col-1">
                    <input type="number" name="quantity" max="{{ $mainColor->quantity }}" min="1" value=1
                        class="form-control single-product-change-quantitiy">
                    @error('color')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('quantity')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <input type="submit" value="Add to cart" class="form-control btn btn-info">
                </div>
            </div>
        </form>
    @else
        <div class="alert alert-danger">
            Please <a href="{{ route('login') }}">Login</a> to add product to cart
        </div>
    @endauth
</div>
