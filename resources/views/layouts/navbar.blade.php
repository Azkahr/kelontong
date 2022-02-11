<style>
    nav{
        position: fixed;
        top: 0;
        width: 100%;
        height: 115px;
    }

    nav .top{
        background-color: #536aec;
        width: 100%;
        height: 50%;
    }

    nav .bottom{
        background-color: #5266d9;
        width: 100%;
        height: 50%;
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
</style>
<nav>
    <div class="top">
        
    </div>
    <div class="middle">
        <img class="logo" src="{{ asset('assets/img/kelontong-shape.png') }}" alt="logo">
    </div>
    <div class="bottom">

    </div>
</nav>