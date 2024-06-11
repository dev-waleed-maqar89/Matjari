<div class="">
    @if ($pic)
        <img src="{{ asset($pic->image->src) }}" alt="">
    @else
        <img src="{{ asset('images/products/no-image.jpeg') }}" alt="">
    @endif
</div>
