@extends('main.layouts.mainTemblate')
@section('content')
    <div class="form-container Register-login-form">
        <form action="{{ route('resetpassword') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
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
                <input type="submit" Value="Reset" class="form-control" value="">
            </div>
        </form>
    </div>
@endsection
