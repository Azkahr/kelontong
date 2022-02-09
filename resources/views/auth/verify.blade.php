<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>{{ $title }}</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Spartan:wght@500&display=swap');
    html, body { 
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>
<body>
    <div class="row justify-content-center">
        <div class="col-md-5">    
            @if (session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show col-md-6" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    
    <div class="d-flex justify-content-center align-items-center text-light" style="width: 100%; height:100%; font-family: 'Open Sans', sans-serif;">
        <div style="padding:20px; background-color:#536aec; border-radius:15px" class="d-flex flex-column align-items-center">
            <div style="margin-bottom: 30px">
                <img src="{{ asset('assets/img/snack-booth.png') }}" width="35px" style="filter:invert(100%);" alt="logo">
                <span style="font-family: 'Spartan', sans-serif;">Kelontong.ID</span>
            </div>
            <div>
                <p>Hai, {{ auth()->user()->name }}</p>
                <p>Kami Udah Kirim Verifikasi Ke Email Kamu, Tolong Di Cek Ya</p>
                <p>Kalau Masih Belum Diterima Kamu Bisa Kirim Ulang Dengan Tombol Di Bawah</p>
            </div>
            <button class="btn btn-info"><a style="text-decoration:none; color:white" href="{{ route('verification.resend') }}">Kirim Ulang Verifikasi</a></button>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>