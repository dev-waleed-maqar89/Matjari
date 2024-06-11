<div class="single-product-details-container">
    <div class="single-product-description">
        <hr>
        <span class="h3 single-product-description-title">About product:</span>
        <p title="Product description">
            {{ $product->description }}
        </p>
    </div>
    <div class="single-product-details-section single-product-categories">
        <div class="single-product-details-section-header">
            <span class="h3 single-product-categories-title">Categories</span>

            <span class="single-product-add-details-button" data-bs-toggle="modal"
                data-bs-target=".single-product-add-category">
                Add category
            </span>
        </div>
        <ul class="">
            @forelse ($product->categories as $cat)
                <x-dashboard.product.show.show-category :category="$cat" />
            @empty
                <div class="alert alert-no-records">
                    No categories added to this product.

                </div>
            @endforelse

        </ul>
        <hr />
    </div>
    <div class="single-product-details-section single-product-options">
        <div class="single-product-details-section-header">
            <span class="h3 single-product-options-title">Options</span>

            <span class="single-product-add-details-button" data-bs-toggle="modal"
                data-bs-target=".single-product-add-option">
                Add option
            </span>
        </div>
        <ul class="">
            @forelse ($product->options as $option)
                <x-dashboard.product.show.show-options :option="$option" />
            @empty
                <div class="alert alert-no-records">
                    No options added to this product.
                </div>
            @endforelse
        </ul>
        <hr />
    </div>
    <div class="single-product-details-section single-product-sizes">
        <div class="single-product-details-section-header">
            <span class="h3 single-product-sizes-title">Sizes</span>

            <span class="single-product-add-details-button" data-bs-toggle="modal"
                data-bs-target=".single-product-add-size">
                Add size
            </span>
        </div>
        <ul class="single-product-sizes-names">
            @forelse ($product->sizes as $size)
                <li type="button" class="single-product-size-name" data-bs-toggle="modal"
                    data-bs-target=".colors-container-for-size-{{ $size->id }}">
                    {{ $size->size }}
                </li>
            @empty
                <div class="alert alert-no-records">
                    No sizes added to this product.
                </div>
            @endforelse

            @if (!$product->mainColor()->first())
                <div class="alert alert-no-records">
                    Add/ Choose main color for product to be shown to customers
                </div>
            @endif
        </ul>
        @forelse ($product->sizes as $size)
            <x-dashboard.product.show.show-size :size="$size" />
        @empty
        @endforelse
    </div>
</div>
