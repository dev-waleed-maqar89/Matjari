<ul class="nav nav-tabs" id="myTab" role="tablist">
    @forelse ($sizes as $size)
        <li class="nav-item" role="presentation">
            <button @class(['nav-link', 'active' => $size->id == $mainColor->size_id]) id="size{{ $size->id }}-tab" data-bs-toggle="tab"
                data-bs-target="#size{{ $size->id }}" type="button" role="tab"
                aria-controls="size{{ $size->id }}" aria-selected="true">{{ $size->size }}</button>
        </li>
    @empty
    @endforelse
</ul>
<div class="tab-content" id="myTabContent">
    @forelse ($sizes as $size)
        <x-main.Product.Parts.singleSize :product="$product" :size="$size" :mainColor="$mainColor" />
    @empty
    @endforelse
</div>
