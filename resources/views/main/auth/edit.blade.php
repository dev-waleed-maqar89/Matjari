@extends('main.layouts.mainTemblate')
@section('content')
    <div class="form-container Register-login-form">
        <form action="{{ route('User.Update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Your name">
                @error('name')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror


            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                    placeholder="Your email">
                @error('email')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" value="" placeholder="Type password">
                @error('password')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control" value=""
                    placeholder="Re-type password">
                @error('password_confirmation')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="address" class="form-control" value="{{ $user->address }}"
                    placeholder="Your address">
                @error('address')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control" placeholder="Test">
                @error('image')
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
