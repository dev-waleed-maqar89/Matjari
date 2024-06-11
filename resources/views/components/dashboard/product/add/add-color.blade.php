<div class="modal single-product-add-color" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="form-container">
                <form method="POST" action="{{ route('dashboard.addColor') }}">
                    <h1>{{ $product->name }}</h1>
                    @csrf
                    <div class="form-group">
                        <select name="size" id="addColorForSize" class="form-control">
                            <option value="">Select size</option>
                            @forelse ($product->sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="color" class="form-control" placeholder="Color name">
                        @error('color')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" class="form-control" placeholder="Price" id="">
                        @error('price')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" name="quantity" class="form-control" placeholder="Quantity">
                        @error('quantity')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="makeMainColor">Make as main color</label>
                        <input type="checkbox" name="main" id="makeMainColor" value="1">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add color" id="addProductColor" class="form-control btn btn-info">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
