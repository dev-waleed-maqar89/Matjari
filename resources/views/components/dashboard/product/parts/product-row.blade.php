<tr>
    <td>
        <a href="{{ route('dashboard.product.show', $product->id) }}">
            {{ $product->name }}
        </a>
    </td>
    <td>
        {{ $product->mainColor->Color }}
    </td>
    <td>
        {{ $product->mainColor->price }}
    </td>
    <td>
        {{ $product->quantity }}
    </td>
</tr>
