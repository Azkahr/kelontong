<div class="cartPage">
    <div class="card shadow col-8 h-75">
        <div class="btnClose">
            <button id="btnClose"><span data-feather="x"></span></button id="btnClose">
        </div>
        <div class="card-body overflow-auto">
            @php $total = 0; @endphp
            @foreach ($carts as $cart)
                <div class="product_data" style="width:100; display:flex; justify-content:flex-end;">
                    <div class="col-md-2">
                        @foreach (explode(',',$cart->products->image) as $item)
                            @if (count(explode(',',$cart->products->image)) > 1)
                                <img src="{{ asset('storage/' . $item) }}" alt="{{ $cart->products->product_name }}" class="mySlides">
                            @else
                                <img src="{{ asset('storage/' . $item) }}" alt="{{ $cart->products->product_name }}">
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-3 my-auto">
                        <h3>{{ $cart->products->product_name }}</h3>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h3>Rp.{{ number_format($cart->products->harga, 0,",",".") }}</h3>
                    </div>
                    <div class="col-md-2 my-auto">
                        <div class="text-center">
                            <input type="hidden" class="products_id" value="{{ $cart->products_id }}">
                            <label for="stok">Quantity</label>
                            <div class="mb-3 d-flex justify-content-center flex-row">
                                <button class="btn btn-primary changeQuantity decrement-btn">-</button>
                                <input type="text" name="stok" class="form-control qty-input" value="{{ $cart->qty }}" style="width: 50px; background-color: white;" disabled>
                                <button class="btn btn-primary changeQuantity increment-btn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Delete</button>
                    </div>
                </div>
                @php $total += $cart->products->harga * $cart->qty; @endphp
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total : Rp.{{ number_format($total, 0,",",".") }}</h6>
            <button class="btn btn-success float-end">Checkout</button>
        </div>
    </div>
</div>

<nav>
    <div class="top">
            <form class="search" method="GET" action="/search">
                    <input type="text" placeholder="Cari..." name="search" value="{{ request('search') }}">
                    <button class="btnSearch btn btn-outline-light" type="submit">Search</button>
            </form>
        @auth
            <div style="display: flex; align-items:center; margin-right:75px; height:50px">
                @if (auth()->check())
                    <button class="cartBtn">
                        <img class="cartImg" style="" src="{{ asset('assets/img/cart.png') }}" alt="cart">
                    </button>
                @endif
                <div class="dropdown">
                    <button class="dropbtn">
                        <p style="margin-left:7px; display: inline; font-size:20px; font-family:spartan; font-weight:700; color:white">
                            {{ auth()->user()->name }}
                        </p>
                    </button>
                    <div class="dropdown-content">
                        @if (auth()->user()->role == 'seller')
                                <a href="/dashboard">Dashboard</a>
                        @endif
                        <a href="/profile/update/{{ auth()->user()->id }}">Setting</a>
                        <form action="/logout" method="post">
                            @csrf
                            <button style="margin-left: 16px; margin-bottom: 15px; margin-top: 10px;" id="logout" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div style="display:inline-block; font-size:18px; margin-right:30px; margin-bottom:10px; font-family:spartan; font-weight:800">
                <a class="login" href="/login">Masuk</a>
                <div style="position:relative; top:8px; display:inline-block; height: 30px; border-left:3px solid white; margin:0px 10px 0px 10px"></div>
                <a class="register" href="/register-user">Daftar</a>
            </div>
        @endauth
    </div>

    <div class="middle">
        <a class="home" href="/"><img class="logo" src="{{ asset('assets/img/kelontong-shape.webp') }}" alt="logo"></a>
    </div>

    <div class="bottom">
        <a href="/search?search=Kopi">Kopi</a>
        <a href="/search?search=Air Mineral">Air Mineral</a>
        <a href="/search?search=Obat">Obat</a>
        <a href="/search?search=Sabun Mandi">Sabun Mandi</a>
        <a href="/search?search=Sembako">Sembako</a>
        <a href="/search?search=Sabun Cuci Piring">Sabun Cuci Piring</a>
        <a href="/search?search=Beras">Beras</a>
        <a href="/search?search=Mi Instan">Mi Instan</a>
        <a href="/search?search=Alat Tulis">Alat Tulis</a>
        <a href="/search?search=Gas">Gas</a>
        <a href="/search?search=Token Listrik">Token Listrik</a>
        <a href="/search?search=Pulsa">Pulsa</a>
    </div>
</nav>

<script>
    $('.cartPage').hide();
    $(function(){
        $('.cartBtn').click(function(){
            $('.cartPage').fadeIn(300);
            $('body').css('overflow', 'hidden');
        });

        $('#btnClose').click(function(){
            $('.cartPage').fadeOut(300);
            $('body').css('overflow', 'initial');
            $('.cart').empty();
        });

        $('.increment-btn').click(function (e) { 
            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(inc_value);
            value = isNaN(value) ? 0 : value;
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        });
        
        $('.decrement-btn').click(function (e) { 
            var dec_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(dec_value);
            value = isNaN(value) ? 0 : value;
            if(value > 1){
                value--;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $('.delete-cart-item').click(function (e) { 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var products_id = $(this).closest('.product_data').find('.products_id').val();
            let remE = $(this).parents('.product_data');
            remE.remove();
            $.ajax({
                method: "POST",
                url: "/delete-cart",
                data: {
                    'products_id' : products_id,
                },
                dataType: 'json',
            });
        });

        $('.changeQuantity').click(function (e) { 
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var products_id = $(this).closest('.product_data').find('.products_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();
            data = {
                'products_id' : products_id,
                'qty' : qty,
            }
            $.ajax({
                method: "POST",
                url: "/update-cart",
                data: data,
                success: function (response) {
                    window.location.reload();
                    Swal.fire(response.status);
                }
            });
        });
    });
</script>




