<aside>
    <ul class="admin-navbar">
        @if (Auth::user()->role != 'moderator')
            <li><a class="navbar-link" href="{{ route('dashboard.category.index') }}">categories</a></li>
            <li><a class="navbar-link" href="{{ route('dashboard.category.create') }}">Add category</a></li>
            <li><a class="navbar-link" href="{{ route('dashboard.product.index') }}">Products</a></li>
            <li><a class="navbar-link" href="{{ route('dashboard.product.create') }}">Add product</a></li>
        @endif
        <li><a class="navbar-link" href="{{ route('dashboard.cart.index') }}">Carts</a></li>
        @if (Auth::user()->role === 'supervisor')
            <li><a class="navbar-link" href="{{ route('dashboard.user.index') }}">Users</a></li>
        @endif
    </ul>
</aside>
