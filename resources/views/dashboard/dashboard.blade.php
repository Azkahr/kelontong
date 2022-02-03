@extends('layouts/dmain')
@section('color')
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
@endsection
@section('content')
<div class="row d-flex justify-content-evenly">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a style="opacity:0" class="opacity-5 text-white" href="javascript:;"></a>
                    </li>
                    <li style="opacity:0" class="breadcrumb-item text-sm text-white active" aria-current="page">
                        Dashboard
                    </li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0" style="font-size: 23px">
                    Welcome to Dashboard, {{ auth()->user()->name }}
                </h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                </div>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div style="transform:scale(1.4)">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                    </div>
                                </div sty>
                            </a>
                        </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    
    <!-- Info 1 -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Produk</p>
                            <h5 class="font-weight-bolder">
                            "jumlah produk"
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle d-flex align-items-center justify-content-center">
                            <img src="assets/img/box.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Info 2 -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Quantity</p>
                            <h5 class="font-weight-bolder">
                        total quantity
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle d-flex align-items-center justify-content-center">
                            <img src="assets/img/layers.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Info 3 -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Jenis Produk</p>
                            <h5 class="font-weight-bolder">
                            jenis produk
                            </h5>
                            <p class="mb-0">
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle d-flex align-items-center justify-content-center">
                            <img src="assets/img/filter.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center" style="margin-top:100px">
    <table class="table-striped table-sm">
        <thead>
            <tr>
                <th class="border px-4 py-2">Nama Product</th>
                <th class="border px-4 py-2">Desc</th>
                <th class="border px-4 py-2">Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="border px-4 py-2">{{ $product->product_name }}</td>
                    <td class="border px-4 py-2">{{ $product->desc }}</td>
                    <td class="border px-4 py-2">{{ $product->qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection