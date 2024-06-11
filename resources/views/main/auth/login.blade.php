@extends('main.layouts.mainTemblate')
@section('content')
    <div class="form-container Register-login-form">
        @error('msg')
            <div class="text text-danger">
                {{ $message }}
            </div>
        @enderror
        <form action="/login" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Your email">
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
                <label for="remember">Remember me</label>
                <input type="checkbox" name="remember" id="remember">
            </div>
            <div class="form-group">
                <input type="submit" Value="Login" class="form-control" value="">
            </div>
            <a href="{{ route('forget.password.form') }}">Forget Password?</a>
        </form>
    </div>
@endsection
