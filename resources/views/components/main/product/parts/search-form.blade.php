<form action="/product" class="product-search-form" id="ProductSearchForm">

    <div class="row">
        <div class="col-6 form-group">
            <input type="search" name="search" class="form-control" id="ProductSearch" placeholder="Search products"
                value="{{ $search }}">
        </div>
        <div class="col-6 form-group">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
