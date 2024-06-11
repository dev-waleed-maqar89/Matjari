<nav>
    <ul class="main-navbar">
        @auth
            @if (Auth::user()->role)
                <li class="navbar-link dashboard-links"><a href="">Admin</a></li>
            @endif
            <li class="navbar-link"><a href="/logout">Logout</a></li>
            <li class="navbar-link"><a href="/user/{{ Auth::id() }}">Profile</a></li>
            @if (Auth::user()->pendingCart())
                <li class="navbar-link basket-icon"><a href="/cart/{{ Auth::user()->pendingCart()->id }}">
                        Basket({{ count(Auth::user()->pendingCart()->products) }})
                    </a></li>
            @endif
        @else
            <li class="navbar-link"><a href="/register">Register</a></li>
            <li class="navbar-link"><a href="/login">Log in</a></li>
        @endauth
        <li class="navbar-link products-link"><a href="{{ route('product.index') }}">Products</a></li>
    </ul>
</nav>
