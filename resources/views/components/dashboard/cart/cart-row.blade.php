<tr>
    <td>
        <a href="{{ route('dashboard.cart.show', $cart->id) }}">
            {{ $cart->id }}
        </a>
    </td>
    <td>
        <a href="{{ route('dashboard.user.show', $cart->user_id) }}">
            {{ $cart->user->name }}
        </a>
    </td>
    <td>{{ $cart->amount }}</td>
    <td>{{ $cart->state }}</td>
    <td>
        @if (in_array($cart->state, ['pending', 'approved', 'moved']))
            <div class="row carts-index-change-state-container">
                <form action="{{ route('dashboard.cart.changeState', $cart->id) }}" method="POST" class="col-4">
                    @csrf @method('PUT')
                    <input type="hidden" name="state" value="{{ $cart->next_state }}">
                    <input type="submit" value="{{ ucfirst($cart->next_state) }}" class="btn btn-info">
                </form>
                <form action="{{ route('dashboard.cart.changeState', $cart->id) }}" method="POST" class="col-4">
                    @csrf @method('PUT')
                    <input type="hidden" name="state" value="canceled">
                    <input type="submit" value="Cancel" class="btn btn-danger">
                </form>
            </div>
        @else
            Order has been already {{ $cart->state }}
        @endif
    </td>
</tr>
