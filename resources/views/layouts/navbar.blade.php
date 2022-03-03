<nav>
    <div class="top">
            <form class="search" method="GET" action="/search">
                    <input type="text" placeholder="Cari..." name="search" value="{{ request('search') }}">
                    <button class="btnSearch btn btn-outline-light" type="submit">Search</button>
            </form>
        @auth
            <div style="display: flex; align-items:center; margin-right:75px; height:50px">
                <button class="cartBtn" v-on:click="showCart()">
                    <img class="cartImg" style="" src="{{ asset('assets/img/cart.png') }}" alt="cart">
                </button>
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
        <a href="/?category=sabun-mandi">Terigu</a>
        <a href="/?category=air-mineral">Air Mineral</a>
        <a href="/?category=obat">Obat</a>
        <a href="/?category=snack">Sabun Mandi</a>
        <a href="/?category=sembako">Sembako</a>
        <a href="/?category=snack">Sabun Cuci Piring</a>
        <a href="/?category=beras">Beras</a>
        <a href="/?category=mi-instan">Mi Instan</a>
        <a href="/?category=snack">Alat Tulis</a>
        <a href="/?category=snack">Gas</a>
        <a href="/?category=snack">Token Listrik</a>
        <a href="/?category=snack">Pulsa</a>
    </div>
</nav>


