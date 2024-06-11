@extends('main.layouts.mainTemblate')
@section('content')
    <div class="form-container Register-login-form">
        <div class="aler alert-info mb-3 p-2">
            A link will be sent to Your E-mail
        </div>
        <form action="{{ route('sendPasswordLink') }}" method="POST" enctype="multipart/form-data">
            @if (Session::has('msg'))
                <div class="alert alert-success">
                    {{ Session::get('msg') }}
                </div>
            @endif
            @if (Session::has('exp'))
                <div class="text text-danger">
                    {{ Session::get('exp') }}
                </div>
            @endif
            @csrf
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
                <input type="submit" Value="Send link" class="form-control" value="">
            </div>
        </form>
    </div>
@endsection
