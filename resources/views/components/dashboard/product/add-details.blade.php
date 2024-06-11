<div class="single-product-add-details">
    @if ($errors->any())
        <div class="form-errors-container">
            @foreach ($errors->all() as $error)
                <div class="form-error">
                    {{ $error }}
                </div>
            @endforeach
            <button type="button" class="btn btn-secondary float-end close-form-errors">Close</button>
        </div>
    @endif

    <div class="">
        <x-dashboard.product.add.add-size :product="$product" />
        <x-dashboard.product.add.add-color :product="$product" />
        <x-dashboard.product.add.add-images :product="$product" />
        <x-dashboard.product.add.add-options :product="$product" />
        <x-dashboard.product.add.add-discount :product="$product" />
        <x-dashboard.product.add.add-category :product="$product" />
    </div>
</div>
