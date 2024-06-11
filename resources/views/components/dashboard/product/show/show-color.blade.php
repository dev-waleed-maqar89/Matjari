<div class="tab-pane fade p-3" id="deatailsForColor{{ $color->id }}" role="tabpanel"
    aria-labelledby="color{{ $color->id }}-tab" tabindex="0">
    <span class="d-block single-product-price">Price: {{ $color->price }}</span>
    <span class="d-block single-product-quantity">quantity: {{ $color->quantity }}</span>
    <div class="single-color-discounts-container">
        <span>Discounts:</span>
        @forelse ($color->discounts as $discount)
            <x-dashboard.product.show.show-discount :discount="$discount" />
        @empty
        @endforelse
    </div>
    <div class="p-1 single-color-images-container">
        @forelse ($color->pics as $image)
            <x-dashboard.product.show.show-image :image="$image->image" />
        @empty
        @endforelse
    </div>
    @if ($color->main)
        <div class="alert alert-info">
            This is the main color
        </div>
    @else
        <form action="{{ route('dashboard.makeMainColor') }}" method="POST">
            @csrf
            <input type="hidden" name="color" value="{{ $color->id }}">
            <input type="hidden" name="product" value="{{ $color->size->product_id }}">
            <input type="submit" value="Make main color" class="btn btn-info">
        </form>
    @endif
    <span class="m-2 single-product-add-details-button add-images" data-bs-toggle="modal"
        data-bs-target=".single-product-add-images" data-color="{{ $color->id }}">
        Add images
    </span>
    <span class="m-2 single-product-add-details-button add-discount" data-bs-toggle="modal"
        data-bs-target=".single-product-add-discount" data-color="{{ $color->id }}">
        Add discount
    </span>
</div>
