<tr>
    <th class="carts-collection-links" colspan="6">{{ $carts->links() }}</th>
</tr>
<tr>
    <th>Cart ID</th>
    <th>User</th>
    <th>Amount</th>
    <th>State</th>
    <th>Change state</th>
</tr>
@forelse ($carts as $cart)
    <x-dashboard.cart.cart-row :currentState="$currentState" :cart="$cart" />
@empty
    <tr class="">
        <td colspan="5" class="h2 text-center text text-danger">
            <div class="p-3 alert-no-records">
                No carts
            </div>
        </td>
    </tr>
@endforelse
