@extends('main.layouts.mainTemblate')
@section('content')
    <div class="form-container Add-product-form">

        <form action="{{ route('dashboard.product.store') }}" method="POST" enctype="multipart/form-data" id="createProduct">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                    placeholder="Product name">
                @error('name')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="description" class="form-control" placeholder="Decripe Your product" minlength="36">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" Value="Add product" class="form-control">
            </div>
        </form>
    </div>
@endsection
