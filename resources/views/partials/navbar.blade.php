<nav>
    <div class="top">
            <form class="search" method="GET" action="/search">
                    <input type="text" placeholder="Cari..." name="search" value="{{ request('search') }}">
                    <button class="btnSearch btn btn-outline-light" type="submit">Search</button>
            </form>
        @auth
            <div style="display: flex; align-items:center; margin-right:75px; height:50px">
                @if (session('cart'))
                    <a href="/cart">
                        <button class="cartBtn" v-on:click="showCart()">
                            <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
                            <img class="cartImg" style="" src="{{ asset('assets/img/cart.png') }}" alt="cart">
                        </button>
                    </a>
                @else
                    <a href="/cart">
                        <button class="cartBtn" v-on:click="showCart()">
                            <img class="cartImg" style="" src="{{ asset('assets/img/cart.png') }}" alt="cart">
                        </button>
                    </a>
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
        <a href="/search/?">Terigu</a>
        <a href="/search/?">Air Mineral</a>
        <a href="/search/?">Obat</a>
        <a href="/search/?">Sabun Mandi</a>
        <a href="/search/?">Sembako</a>
        <a href="/search/?">Sabun Cuci Piring</a>
        <a href="/search/?">Beras</a>
        <a href="/search/?">Mi Instan</a>
        <a href="/search/?">Alat Tulis</a>
        <a href="/search/?">Gas</a>
        <a href="/search/?">Token Listrik</a>
        <a href="/search/?">Pulsa</a>
    </div>
</nav>


