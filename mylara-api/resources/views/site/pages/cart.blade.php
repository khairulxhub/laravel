@extends('site.layouts.master')"
@section('title', 'cart')
@section('content')
    <main id="main">

       <section class="page-head">
            <div class="container">
                <div class="crumbs"><a href="index.html">Home</a> <span class="sep">›</span> <span>Shopping cart</span>
                </div>
                <h1>Your cart</h1>
                <p>Ready to ship. Free delivery on this order. Estimated arrival 21 – 23 May.</p>
                @if (session('success'))
                    <div
                        style="margin-top: var(--s7); padding: var(--s6); background: linear-gradient(135deg, var(--indigo), var(--card-purple)); color: var(--paper); border-radius: var(--r-lg); position: relative; overflow: hidden">
                        <div
                            style="position: absolute; inset: 0; background-image: radial-gradient(circle at 80% 20%, rgba(255,255,255,0.18) 0, transparent 40%); pointer-events: none">
                        </div>
                        <div style="position: relative">
                            <h5 style="color: var(--paper); font-size: var(--text-xl); margin-bottom: var(--s3)">
                                {{ session('success') }}
                            </h5>
                            <a href="/" class="btn btn--paper">Continue Shopping →</a>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <section class="section">
            <div class="container">
              
                <div class="cart-layout">

                    <div>
                        <div class="cart-list">
                            <article class="cart-row">
                                <div class="pic"><img
                                        src="https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=200&q=80&auto=format&fit=crop"
                                        alt="" /></div>
                                <div class="info">
                                    <div class="name">Apple HomePod 2nd Gen Speaker</div>
                                    <div class="variant">White · Stereo pair · No AppleCare</div>
                                </div>
                                <div class="qty">
                                    <button data-act="-" aria-label="Decrease">−</button>
                                    <input type="text" value="1" inputmode="numeric" aria-label="Quantity" />
                                    <button data-act="+" aria-label="Increase">+</button>
                                </div>
                                <span class="subtotal">$280</span>
                                <button class="remove" aria-label="Remove">✕</button>
                            </article>


                        </div>

                        <div style="margin-top: var(--s5); display: flex; gap: var(--s3); flex-wrap: wrap">
                            <a href="/" class="btn btn--ghost">← Continue shopping</a>
                            <button class="btn btn--ghost">Update cart</button>
                        </div>

                        <!-- Trust strip -->
                        <div
                            style="margin-top: var(--s7); display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--s4); padding: var(--s5); background: var(--bg); border-radius: var(--r)">
                            <div style="display:flex; align-items:center; gap:var(--s3)">
                                <div
                                    style="width:40px; height:40px; background:var(--indigo-soft); color:var(--indigo); border-radius:999px; display:grid; place-items:center; font-size:18px">
                                    ⚡</div>
                                <div>
                                    <div style="font-family:var(--ff-display); font-weight:700; font-size:var(--text-sm)">
                                        Free fast
                                        shipping</div>
                                    <div style="font-family:var(--ff-mono); font-size:11px; color:var(--fg-mute)">2 — 3
                                        business days
                                    </div>
                                </div>
                            </div>
                            <div style="display:flex; align-items:center; gap:var(--s3)">
                                <div
                                    style="width:40px; height:40px; background:var(--indigo-soft); color:var(--indigo); border-radius:999px; display:grid; place-items:center; font-size:18px">
                                    ↺</div>
                                <div>
                                    <div style="font-family:var(--ff-display); font-weight:700; font-size:var(--text-sm)">
                                        30-day free
                                        returns</div>
                                    <div style="font-family:var(--ff-mono); font-size:11px; color:var(--fg-mute)">No
                                        questions asked</div>
                                </div>
                            </div>
                            <div style="display:flex; align-items:center; gap:var(--s3)">
                                <div
                                    style="width:40px; height:40px; background:var(--indigo-soft); color:var(--indigo); border-radius:999px; display:grid; place-items:center; font-size:18px">
                                    ★</div>
                                <div>
                                    <div style="font-family:var(--ff-display); font-weight:700; font-size:var(--text-sm)">
                                        2-year warranty
                                    </div>
                                    <div style="font-family:var(--ff-mono); font-size:11px; color:var(--fg-mute)">On every
                                        Sprylo order
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <aside class="cart-summary">
                        <h3>Order summary</h3>

                        {{-- <div class="promo-input">
              <input type="text" placeholder="Promo code" />
              <button>Apply</button>
            </div> --}}

                        <div class="cart-line"><span>Subtotal · 3 items</span><span
                                style="font-family:var(--ff-display); font-weight:600; color:var(--ink)" id="subtotal">$00.00</span>
                        </div>
                        <div class="cart-line"><span>Shipping</span><span
                                style="color: var(--emerald); font-weight: 600" id="shippingCost">$00.00</span></div>
                        <div class="cart-line"><span>Estimated tax</span><span
                                style="font-family:var(--ff-display); font-weight:600; color:var(--ink)" id="tax">$00.60</span>
                        </div>
                        {{-- <div class="cart-line"><span>Promo · WELCOME20</span><span
                style="color: var(--rose); font-family:var(--ff-display); font-weight:600">−$56.00</span></div> --}}

                        <div class="cart-line is-total"><span>Total</span><span id="total">$00.00</span></div>

                        <a href="javascript:;" class="btn-proceed btn btn--indigo btn--block">Proceed to checkout →</a>

                        <form class="checkout-form" action="{{ route('orders.store') }}" method="POST">
                          @csrf
                          <h3>Checkout</h3>
                            <div class="field-row">
                                <div class="field">
                                    <label for="c-first">Name</label>
                                    <input id="c-first" type="text" name="name" required="" placeholder="Mira">
                                </div>
                                <div class="field">
                                    <label for="c-last">Phone</label>
                                    <input id="c-last" type="tel" name="phone" required="" placeholder="0151 123 456">
                                </div>
                            </div>
                            <div class="field">
                                <label for="c-topic">Choose a payment method</label>
                                <select id="c-topic" name="payment_method">
                                    <option value="1">Cash on delivery</option>
                                    <option value="2" disabled>bKash</option>
                                    <option value="3" disabled>Visa / Mastercard</option>
                                </select>
                            </div>
                            <div class="field">
                                <label for="c-msg">Shipping Address</label>
                                <textarea name="shipping_address" id="c-msg" required=""
                                    placeholder="12 Mothijheel, Dhaka-100"></textarea>
                            </div>
                            <input type="hidden" name="items" value="">
                            <button type="submit" class="btn btn--indigo btn--block"> Order Now</button>  
                            {{-- <a href="#" class="btn btn--indigo btn--block">Order Now →</a> --}}
                        </form>



                        <div
                            style="display: flex; justify-content: center; gap: var(--s3); margin-top: var(--s5); flex-wrap: wrap">
                            <span
                                style="font-family: var(--ff-mono); font-size: 11px; color: var(--fg-mute); padding: 6px 10px; background: var(--paper); border-radius: 4px">VISA</span>
                            <span
                                style="font-family: var(--ff-mono); font-size: 11px; color: var(--fg-mute); padding: 6px 10px; background: var(--paper); border-radius: 4px">MASTERCARD</span>
                            <span
                                style="font-family: var(--ff-mono); font-size: 11px; color: var(--fg-mute); padding: 6px 10px; background: var(--paper); border-radius: 4px">AMEX</span>
                            <span
                                style="font-family: var(--ff-mono); font-size: 11px; color: var(--fg-mute); padding: 6px 10px; background: var(--paper); border-radius: 4px">PAYPAL</span>
                            <span
                                style="font-family: var(--ff-mono); font-size: 11px; color: var(--fg-mute); padding: 6px 10px; background: var(--paper); border-radius: 4px">APPLE
                                PAY</span>
                        </div>

                        <p
                            style="margin-top: var(--s5); font-size: 11px; font-family: var(--ff-mono); color: var(--fg-mute); text-align: center; line-height: 1.6">
                            Encrypted checkout · SSL secured. Your payment information is never stored on our servers.</p>
                    </aside>

                </div>
            </div>
        </section>

    </main>
@endsection
@section('style')
    <style>
       .checkout-form {
        display: none; 
       }
        
        </style>
        @endsection 
@section('script')
@if(session('success'))
   <script>
    cart.emptyCart();
    </script>
@endif
    <script>
      //cart work
        // console.log(cart.getCart());
        var cartlist = document.querySelector('.cart-list');

        function printCart() {
            var list = cart.getCart();
            document.querySelector('.checkout-form input[name="items"]').value = JSON.stringify(list);
            var html = '';
            var subtotal = 0;
            list.forEach(item => {
                //  <img src="${item.img ? "{{ asset(':img') }}".replace(':img', item.img)  : "https://placehold.net/400x400.png"}"
                //   alt="">

                let img = item.img ? "{{ asset(':img') }}".replace(':img', item.img) :
                    "https://placehold.net/400x400.png";
                html += ` <article class="cart-row">
                <div class="pic"><img
                    src="${img}"
                    alt="" /></div>
                <div class="info">
                  <div class="name">${item.name}</div>
                  <div class="variant">$${item.price}</div>
                </div>
                <div class="qty">
                  <button  onClick="decreaseQuantity(${item.id}) " data-act="-" aria-label="Decrease">−</button>
                  <input type="text" value="${item.quantity}" inputmode="numeric" aria-label="Quantity" />
                  <button onClick="increaseQuantity(${item.id})" data-act="+" aria-label="Increase">+</button>
                </div>
                <span class="subtotal">$${item.price * item.quantity}</span>
                <button class="remove" aria-label="Remove" onClick="removeFromCart(${item.id})">✕</button>
              </article>`;

                subtotal += parseFloat(item.price * item.quantity);
            });

            cartlist.innerHTML = html;
            document.querySelector('#subtotal').innerText = '$' + subtotal.toFixed(2);
            document.querySelector('#shippingCost').innerText = `$${(subtotal > 0 ? 30 : 0).toFixed(2)}`;
            document.querySelector('#tax').innerText = '$' + (subtotal * 0.05).toFixed(2);
            document.querySelector('#total').innerText = '$' + (subtotal +(subtotal > 0 ? 30 : 0) + subtotal * 0.05).toFixed(2);
        }
       

        printCart();

        function removeFromCart(id) {
            cart.removeItem(id);
            printCart();
            printItemsNumber();
        }

        function increaseQuantity(id) {
            cart.increaseQuantity(id);
            printCart();
        }

        function decreaseQuantity(id) {
            cart.decreaseQuantity(id);
            printCart();
        }
       //======================================== 
     // order form 

     document.querySelector('.btn-proceed').addEventListener('click', function(e) {
       this.style.display = 'none';
       document.querySelector('.checkout-form').style.display = 'block';
     })
     
    </script>
@endsection
