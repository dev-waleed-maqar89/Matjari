@extends('main.layouts.mainTemblate')
@section('content')
    <div class="card single-user-card">
        <div class="card-body">
            <h1 class="card-title text-center">{{ $user->name }}</h1>
            <div class="card-footer">
                <a href="/cart" class="card-link">{{ Auth::user()->name }}'s Orders</a>
            </div>
            <h1>Email: {{ $user->email }}</h1>
            <h1>Address: {{ $user->address ?? 'No address added' }}</h1>
            <a href="/user/{{ $user->id }}/edit" class="btn btn-primary">Edit</a>
            <div class="m-3 single-user-image">
                @if ($user->profile_pic)
                    <img src="{{ asset($user->profile_pic->src) }}" class="card-image-top">
                @else
                    <img src="{{ asset('images/users/No image.png') }}" class="card-image-top">
                @endif
            </div>
        </div>
    </div>
@endsection
