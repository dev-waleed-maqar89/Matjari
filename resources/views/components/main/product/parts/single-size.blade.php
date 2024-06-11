<div @class([
    'tab-pane fade',
    'show active' => $size->id == $mainColor->size_id,
]) id="size{{ $size->id }}" role="tabpanel"
    aria-labelledby="size{{ $size->id }}-tab">
    @forelse($size->colors as $color)
        <span class="d-block">
            <a href="{{ route('product.show', $product->id) }}?color={{ $color->id }}">
                {{ $color->Color }}
            </a>
        </span>
    @empty
    @endforelse
</div>
