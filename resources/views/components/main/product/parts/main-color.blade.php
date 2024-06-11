<div class="text-center m-auto">
    <div class="single-product-main-color-details">
        <h4 class="">
            {{ $mainColor->size->size . ' | ' . $mainColor->Color }}
        </h4>
        <span>Price:
            @if ($mainColor->lastDiscount())
                <del>
                    {{ $mainColor->price }}
                </del>
                {{ $mainColor->newPrice }}
                <span class="d-block">
                    Offer ends on
                    {{ \Carbon\Carbon::parse($mainColor->lastDiscount()->ends_at)->format('D Y-M,d \a\t H:i') }}
                </span>
            @else
                {{ $mainColor->price }}
            @endif
        </span>
        <span class="d-block"> {{ $mainColor->quantity }} Available</span>
    </div>
    <div class="single-product-main-color-images-container">
        @forelse ($mainColor->pics as $pic)
            <x-main.product.parts.image :pic="$pic" />
        @empty
            <div class="">
                <x-main.product.parts.image />
            </div>
        @endforelse
    </div>
</div>
