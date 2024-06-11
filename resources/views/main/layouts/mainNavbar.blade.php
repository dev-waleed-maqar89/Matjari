<nav class="navbar-container">
    <ul class="main-navbar">
        @auth
            @if (Auth::user()->role)
                <li class="dashboard-links"><a class="navbar-link" href="">
                        <div class="menu-line"></div>
                        <div class="menu-line"></div>
                        <div class="menu-line"></div>
                    </a></li>
            @endif
            <li><a class="navbar-link" href="/logout">Logout</a></li>
            <li><a class="navbar-link" href="/user/{{ Auth::id() }}">Profile</a></li>
            @if (Auth::user()->pendingCart())
                <li class="basket-icon"><a class="navbar-link" href="/cart/{{ Auth::user()->pendingCart()->id }}">
                        Basket({{ count(Auth::user()->pendingCart()->products) }})
                    </a></li>
            @endif
        @else
            <li><a class="navbar-link" href="/register">Register</a></li>
            <li><a class="navbar-link" href="/login">Log in</a></li>
        @endauth
        <li class="products-link"><a class="navbar-link" href="{{ route('product.index') }}">Products</a></li>
    </ul>
</nav>
