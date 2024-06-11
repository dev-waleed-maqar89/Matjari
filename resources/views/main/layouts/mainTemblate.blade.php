@include('main.layouts.header')
<div class="navbars-container">
    @include('main.layouts.mainNavbar')
    @auth
        @if (Auth::user()->role)
            @include('dashboard.layouts.adminNavbar')
        @endif
    @endauth
</div>
<div class="container content-container mt-5">
    @yield('content')
</div>
@include('main.layouts.footer')
