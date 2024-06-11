@extends('main.layouts.mainTemblate')
@section('content')
    <div class="form-container product-update-form">

        <form action="{{ route('dashboard.product.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            id="createProduct">
            @csrf @method('PUT')
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Your name">
                @error('name')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="description" class="form-control" placeholder="Decripe Your product">{{ $product->description }}</textarea>
                @error('description')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" Value="Update product" class="form-control">
            </div>
        </form>
    </div>
@endsection
