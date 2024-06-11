<div class="modal single-product-add-size" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="form-container">
                <form method="POST" action="{{ route('dashboard.addSize', $product->id) }}">
                    @csrf
                    <input type="hidden" name="product" value="{{ $product->id }}">
                    <div class="form-group">
                        <input type="text" name="size" class="form-control" placeholder="Size name">
                        <div class="text text-danger">
                            @error('size')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add size" id="addProductSize" class="form-control btn btn-info">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
