<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap');
    nav{
        position: fixed;
        top: 0;
        width: 100%;
        height: 115px;
    }

    nav .top{
        background-color: #536aec;
        width: 100%;
        height: 60%;
        display: flex;
        justify-content:space-between;
        align-items: center;
    }

    nav .top .search input{
        margin: 7px 0px 0px 30px; 
        border: none;
        width: 300px;
        height: 35px;
        padding: 5px;
        border-radius: 6px;
        outline: none;
    }
    nav .top .search button{
        margin-bottom: 6px;
        color: white;
    }
    nav .top .search button:hover{
        color: black;
    }

    nav .middle{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    nav .logo{
        width: 250px;
        position: absolute;
        margin-bottom: 30px;
    }

    nav .bottom{
        background-color: #5266d9;
        width: 100%;
        height: 40%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    nav .bottom a{
        text-decoration: none;
        color: white;
        font-size: 17px;
        margin: 12px 0px 0px 0px;
        font-family: 'Spartan', sans-serif;
        font-weight: 700;
    }

    nav .bottom a:after{
        content: '';
        display: block;
        width: 0;
        height: 2px;
        transition: width .3s;
        background-color: white;
        margin: auto;
    }

     nav .bottom a:hover:after{
        width: 100%;
    }

    nav .bottom a:nth-child(2){
        margin: 12px 60px 0px 60px;
    }

    nav .bottom a:nth-child(3){
        margin: 12px 27px 0px 0px;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
    position: relative;
    display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #f1f1f1}

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
    display: block;
    }
</style>
<body>
    <nav>
        <div class="top">
                <form class="search" method="GET" action="/search">
                        <input type="text" placeholder="Cari..." name="search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            @auth
                <div style="display: flex; align-items:center; margin-right:60px; height:50px">
                    <img style="align-self: center; display: inline; width: 30px" src="{{ asset('assets/img/cart.png') }}" alt="cart">
                    <div class="dropdown">
                        <button class="dropbtn"><p style="margin:3px 0px 0px 15px; display: inline; font-size:20px; font-family:spartan; font-weight:700; color:white">{{ auth()->user()->name }}</p></button>
                        <div class="dropdown-content">
                            <a href="/dashboard">Dashboard</a>
                            <a href="#">Setting</a>
                            <form action="/logout" method="post">
                                @csrf
                                <a><button type="submit">Logout</button></a>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div style="display:inline-block; font-size:18px; margin-right:30px; font-family:spartan; font-weight:800">
                    <a style="color: white; margin-right:2.5px; text-decoration:none" href="/login">Login</a>
                    <a style="color: white; padding:5px 0px 5px 5px; border-left:3px solid white; text-decoration:none" href="/register">Register</a>
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
</body>
</html>


