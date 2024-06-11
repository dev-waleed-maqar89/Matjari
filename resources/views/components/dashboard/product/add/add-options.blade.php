<div class="modal single-product-add-option" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="form-container">
                <form method="POST" action="{{ route('dashboard.addOption', $product->id) }}">
                    <h1>{{ $product->name }}</h1>
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="option name">
                        <div class="text text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="value" class="form-control" placeholder="option value">
                        <div class="text text-danger">
                            @error('value')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add option" id="addProductSize" class="form-control btn btn-info">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
