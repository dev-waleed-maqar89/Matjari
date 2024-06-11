<div class="modal single-product-size-colors-container colors-container-for-size-{{ $size->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true" id="colorsForSize{{ $size->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @forelse ($size->colors as $color)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="color{{ $color->id }}-tab" data-bs-toggle="pill"
                            data-bs-target="#deatailsForColor{{ $color->id }}" type="button" role="tab"
                            aria-controls="deatailsForColor{{ $color->id }}" aria-selected="true">
                            {{ $color->Color }}
                        </button>
                    </li>
                @empty
                    <div class="alert alert-no-records">
                        No colors added to this size.
                    </div>
                @endforelse
                <li class="nav-item" role="presentation">
                    <span class="float-end single-product-add-details-button single-product-add-color-button"
                        data-bs-toggle="modal" data-bs-target=".single-product-add-color"
                        data-size="{{ $size->id }}">
                        Add color
                    </span>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                @forelse ($size->colors as $color)
                    <x-dashboard.product.show.show-color :color="$color" />
                @empty
                @endforelse
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
