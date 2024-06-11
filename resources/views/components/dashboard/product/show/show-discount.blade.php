<div class="mb-3 single-discount-container">
    <span>{{ $discount->amount }} {{ $discount->type == 'percent' ? '%' : 'L.E.' }}</span>
    <span>{{ $discount->starts_at }} - {{ $discount->ends_at }}</span>
</div>
