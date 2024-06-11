@extends('main.layouts.mainTemblate')
@section('content')
    <div class="form-container">

        <form action="{{ route('dashboard.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Your name">
                @error('name')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" Value="Update" class="form-control">
            </div>
        </form>
    </div>
@endsection
