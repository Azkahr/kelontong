<div class="cartPage">
    <div class="container">
        <div class="card shadow">
            <div class="btnClose"><button id="btnClose"><span data-feather="x"></span></button></div>
            <div class="cart">
                
            </div>
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
    $(function(){
        $('.cartPage').hide();
        $('.cartBtn').click(function(){
            $('.cartPage').fadeIn(300);
            $('body').css('overflow', 'hidden');
            $.ajax({
                type: "GET",
                url: "{{ route('cart') }}",
                success: function (response) {
                    let data = response.data;
                    console.log(data);
                    $.each(data, function (i, e) { 
                         $('.cart').append(
                            `
                                <div class="row product_data">
                                    <div class="col-md-2">
                                        @php
                                            $image = explode(',', `+ e.products.image +`);
                                        @endphp
                                        <img src="{{ asset('storage/' . $image[0]) }}" alt=`+ e.products.product_name +`>
                                    </div>
                                    <div class="col-md-3 my-auto">
                                        <h3>`+ e.products.product_name +`</h3>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <h3>Rp.{{ number_format(`+ e.products.harga +`, 0,",",".") }}</h3>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <div class="text-center">
                                            <input type="hidden" class="products_id" value=`+ e.id +`>
                                            <label for="stok">Quantity</label>
                                            <div class="mb-3 d-flex justify-content-center flex-row">
                                                <button class="btn btn-primary changeQuantity decrement-btn">-</button>
                                                <input type="text" name="stok" class="form-control qty-input" value=`+ e.id +` style="width: 50px; background-color: white;" disabled>
                                                <button class="btn btn-primary changeQuantity increment-btn">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Delete</button>
                                    </div>
                                </div>
                            `
                        );
                    });
                }
            });
        });

        $('#btnClose').click(function(){
            $('.cartPage').fadeOut(300);
            $('body').css('overflow', 'initial');
        });
    });
</script>




