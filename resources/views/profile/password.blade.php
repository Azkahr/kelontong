@extends('layouts.main')
@section('container')
<style>
    body,html{
    height:100%;
}
h2{
    font-weight: bolder;
    color: #898dbf;
}

form{
    width:550px;
}

form *{
    font-weight: bold;
}

form label{
    font-size: 18px;
    color:#8f9096;
}

form .form-control,form .form-control:focus{
    border-color:transparent;
    border-bottom-color: #bebcc1;
    box-shadow:none;
}

form .btn{ 
    border-radius: 0px;
    border-color: transparent;
}

.btn.btn-default{
    background: #ebebeb;
    color:#8f9096;
}

.btn.btn-primary{
    background: #6c63ff;
    color:white;
}
.sidebar {
    height: 100vh !important;
    bottom: 0;
    padding-left:20px;
    font-size: 1.3rem;
    background: #6c63ff;
}

@media screen and (max-width:940px){
    .sidebar{
        font-size: 1rem;
        padding-left :0px;
    }
}


.sidebar .nav-link{
    margin-bottom: 20px;
    color:#dddce5;
}

.nav-link.active{
    color:#fff;
}

.main > .row{
    height: 100%;
}

@media screen and (max-width:768px){
    .content{
        padding-left:50px; 
        width: 100%;
        padding-top: 200px;
        padding-bottom: 50px;
    }
    
    form{
        width: 100%;
        margin:auto;
    }
    
}

.menu {
    position: absolute;
    right: 10%;
    top:30px;
    margin:auto;
    display: none;  
    cursor:pointer;
    z-index: 5;
    height: 33px;
    width:30px;
}

.bar,.bar:after,.bar:before {
    width:30px;
    height:3px;
    background: #6c63ff;
    transition: all 0.2s;
}

.bar{
    position: relative;
}

.bar:after {
    position: absolute;
    content: '';
    left:0;
    top:10px;
    transition: top 0.2s 0.2s,transform 0.2s;
}

.bar:before {
    position: absolute;
    content: '';
    left:0;
    bottom:10px;
    transition: bottom 0.2s 0.2s,transform 0.2s;
}
.bar.animate{
    background: transparent;
}
.bar.animate:after{
    top:0;
    transform: rotate(45deg);
    transition: top 0.2s ,transform 0.2s 0.2s;
    background: #fff;
}

.bar.animate:before{
    bottom:0;
    transform: rotate(-45deg);
    transition: bottom 0.2s,transform 0.2s  0.2s;
    background: #fff;
}

.expand-menu {
    position: absolute;
    z-index: 1;
    height: 100%;
    width: 100%;
    background: #6c63ff;
    transition: width 0.5s;
    width: 0%;
}

.expand-menu .nav-link{
    margin-left:auto;
    margin-right:auto;
    margin-bottom: 20px;
    color:#dddce5;
    font-size:1.5rem;
    display: none;
    opacity: 0;
    transition: all 0.5s;
}

.expand-menu .nav-link.animate{
    display: block;
}

.expand-menu .nav-link.animate-show{
    opacity:1;
}

.expand-menu .nav-link.active{
    color:#fff;
}

.expand-menu.animate{
    width : 100%;
}
</style>

<div class="container-fluid main" style="height:100vh;padding-left:0px;">        
    <div class="d-block d-md-none menu">
        <div class="bar"></div>
    </div>
    
    <div class="expand-menu nav flex-column">
        @if (auth()->user()->role == 'seller')
            <a href="/" class="nav-link active mt-auto"><i class="fas fa-home"></i> Home</a>
            <a href="/dashboard" class="mb-auto nav-link"><i class="fas fa-chart-line"></i> Dashboard</a>
        @else
            <a href="/" class="nav-link active mb-auto mt-auto"><i class="fas fa-home"></i> Home</a>
        @endif
    </div>
    
    <div class="row align-items-center" style="height:100%">
    <div class="col-md-3 d-none d-md-block" style="height:100%" > 
        <div class="container-fluid nav sidebar flex-column">
            @if (auth()->user()->role == 'seller')
                <a href="/" class="nav-link active mt-auto"><i class="fas fa-home"></i> Home</a>
                <a href="/dashboard" class="mb-auto nav-link"><i class="fas fa-chart-line"></i> Dashboard</a>
            @else
                <a href="/" class="nav-link active mb-auto mt-auto"><i class="fas fa-home"></i> Home</a>
            @endif
        </div>
    </div>
    
    <div class="col-md-9">
        <div class="container content clear-fix">
        <h2 class="mt-5 mb-5">Change password</h2>
        <div class="row" style="height:100%">
            @include('notify::components.notify')
            
            <div class="col-md-9">
                <div class="container">
                    <form action="/profile/password/{{ $user->id }}" method="post" class="mb-5">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="password_lama">Password lama</label>
                            <input type="password" class="form-control @error('password_lama') is-invalid @enderror" name="password_lama" id="password_lama">
                            @error('password_lama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Masukkan password baru</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirmation Password</label>
                            <input type="password" class="form-control @error('cpassword') is-invalid @enderror" id="cpassword" name="cpassword">
                            @error('cpassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Save Changes</button>

                                <a href="/profile/update/{{ auth()->user()->id }}" style="margin-left: 250px">Change profile?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

<script>
    $(document).ready(function(){
    
    $('.menu').on('click', function() {
		$('.bar').toggleClass('animate');
        $('.expand-menu').toggleClass('animate');
        $('.expand-menu .nav-link').toggleClass('animate');
        setTimeout(function(){
            $('.expand-menu .nav-link').toggleClass('animate-show');
        },500)
	})
    
})

        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            
            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
        
</script>
@endsection