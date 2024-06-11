<div class="modal single-product-add-discount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="form-container">
                <form method="POST" action="{{ route('dashboard.addDiscount') }}" enctype="multipart/form-data">
                    <h1>{{ $product->name }}</h1>
                    @csrf
                    <div class="form-group">
                        <select name="color" id="addDiscountforColor" class="form-control">
                            <option value="">Select color</option>
                            @forelse ($product->colors as $color)
                                <option value="{{ $color->id }}">{{ $color->size->size . ' - ' . $color->Color }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" name="amount" class="form-control" placeholder="Add discount">
                    </div>
                    <div class="form-group">
                        <select name="type" id="" class="form-control">
                            <option value="">Discount type</option>
                            <option value="percent">Percentage</option>
                            <option value="value">Value</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="datetime-local" name="starts_at" class="form-control"
                            placeholder="Discount start date">
                    </div>
                    <div class="form-group">
                        <input type="datetime-local" name="ends_at" class="form-control"
                            placeholder="Discount end date">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add discount" id="addProductColor"
                            class="form-control btn btn-info">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
