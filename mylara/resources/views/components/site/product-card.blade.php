 <article class="product-card">
 <a href="{{ route('product.details', $item ->id) }}">
        <div class="img-wrap">

            <span class="badge">
                New
            </span>

            <button class="wishlist" aria-label="Wishlist">
                ♡
            </button>

            @if ($item->image)
                <img src="{{ asset("$item->image") }}" alt="{{ $item->name }}" Image>
            @else
                <img src="https://placehold.net/product-400x400.png" alt="Placeholder">
            @endif

        </div>

        <div class="stock">
            <span class="dot"></span>
            In stock · {{ $item->quantity }} items
        </div>

        <a href="product.html" class="name">
            {{ $item->name }}
        </a> 

        <div class="price">
            <span class="now">{{ $item->price }}</span>
        </div>

        <div class="stars">
            ★★★★★
            <span class="count">(120)</span>
        </div>
 </a>
        <a href="javascript:void(0)" onClick="addToCart({{ $item->id }}, '{{ $item->name }}', {{ $item->price }}, '{{ $item->image ?? '' }}')" class="btn ">
            Order now →
        </a>

    </article>
