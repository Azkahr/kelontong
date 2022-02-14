<nav>
    <div class="top">
            <form class="search" method="GET" action="/search">
                    <input type="text" placeholder="Cari..." name="search">
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
                        <a href="/dashboard">Dashboard</a>
                        <a href="#">Setting</a>
                        <form action="/logout" method="post">
                            @csrf
                            <a href=""><button id="logout" type="submit">Logout</button></a>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div style="display:inline-block; font-size:18px; margin-right:30px; margin-bottom:10px; font-family:spartan; font-weight:800">
                <a class="login" href="/login">Masuk</a>
                <div style="position:relative; top:8px; display:inline-block; height: 30px; border-left:3px solid white; margin:0px 10px 0px 10px"></div>
                <a class="register" href="/register">Daftar</a>
            </div>
        @endauth
    </div>

    <div class="middle">
        <img class="logo" src="{{ asset('assets/img/kelontong-shape.png') }}" alt="logo">
    </div>

    <div class="bottom">
        <a href="#">Makanan</a>
        <a href="#">Minuman</a>
        <a href="#">Snack</a>
    </div>
</nav>


