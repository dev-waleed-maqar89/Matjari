@extends('main.layouts.mainTemblate')
@section('content')
    <div class="form-container">
        <form action="{{ route('dashboard.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Your name">
                @error('name')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" Value="Create" class="form-control">
            </div>
        </form>
    </div>
@endsection
