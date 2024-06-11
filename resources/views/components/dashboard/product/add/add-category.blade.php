<div class="modal single-product-add-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="form-container">
                <form method="POST" action="{{ route('dashboard.addCategory') }}">
                    <h1>{{ $product->name }}</h1>
                    @csrf
                    <input type="hidden" name="product" value="{{ $product->id }}">
                    <div class="form-group">
                        <datalist id="categories">
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                            @endforelse
                        </datalist>
                        <input type="text" name="category" class="form-control" placeholder="Category name"
                            list="categories">
                        @error('category')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add category" id="addProductColor"
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
