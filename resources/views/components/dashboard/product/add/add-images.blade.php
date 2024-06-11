<div class="modal single-product-add-images" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="form-container">
                <form method="POST" action="{{ route('dashboard.addImages') }}" enctype="multipart/form-data">
                    <h1>{{ $product->name }}</h1>
                    @csrf
                    <div class="form-group">
                        <select name="color" id="addImagesForColor" class="form-control">
                            <option value="">Select color</option>
                            @forelse ($product->colors as $color)
                                <option value="{{ $color->id }}">{{ $color->size->size . ' - ' . $color->Color }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="form-grou">
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add images" id="addProductColor" class="form-control btn btn-info">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
