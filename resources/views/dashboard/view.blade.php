@extends('layouts.dmain')
@section('content')
<style>
    h4 {
        font-size: 2em; 
        font-weight: bolder;
    }

    h6 {
        font-size: 1.17em; 
        font-weight: bolder;
    }
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order View
                            <a href="{{ route('orders') }}" class="btn btn-primary float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Detail Pengiriman</h6>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border p-2">{{ $orders->fname }}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $orders->email }}</div>
                                <label for="">Nomor Contact</label>
                                <div class="border p-2">{{ $orders->no_hp }}</div>
                                <label for="">Alamat</label>
                                <div class="border p-2">
                                    {{ $orders->alamat }},
                                    {{ $orders->kota }},
                                    {{ $orders->provinsi }},
                                    {{ $orders->negara }}
                                </div>
                                <label for="">Kode Pos</label>
                                <div class="border p-2">{{ $orders->kode_pos }}</div>
                            </div>
                            <div class="col-md-6">
                                <h6>Order Details</h6>
                                <hr>
                                <table class="table mt-4">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Gambar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderItems as $order)
                                            <tr scope="row">
                                                <td>{{ $order->products->product_name }}</td>
                                                <td>{{ $order->qty }}</td>
                                                <td>Rp.{{ number_format($order->harga, 0,",",".") }}</td>
                                                <td>
                                                    @foreach (explode(',',$order->products->image) as $item)
                                                        @if (count(explode(',',$order->products->image)) > 1)
                                                            <img src="{{ asset('storage/' . $item) }}" width="100px" alt="{{ $order->products->product_name }}" class="mySlides">
                                                        @else
                                                            <img src="{{ asset('storage/' . $item) }}" width="100px" alt="{{ $order->products->product_name }}">
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4>Total : <span class="float-end">Rp.{{ number_format($orders->total_harga, 0,",",".") }}</span></h4>

                                <div class="mt-5">
                                    <label style="display:block" for="">Order status</label>
                                    @if ($orders->status == "kirim")
                                        <h6 class="h6 ms-1">Sedang dikirim</h6>
                                    @elseif($orders->status == "tolak")
                                        <h6 class="h6 ms-1">Ditolak</h6>
                                    @else
                                        <h6 class="h6 ms-1">{{ $orders->status }}</h6>
                                    @endif
                                    @if($orders->status == "pending")
                                        <button id="terimabtn" class="terima btn btn-success mt-3">Terima</button>
                                        <button id="tolakbtn" class="btn btn-danger mt-3">Tolak</button>
                                    @elseif($orders->status == "proses")
                                        <button style="" id="kirimbtn" class="btn btn-info mt-3">Dikirim</button>
                                    @elseif($orders->status == "kirim")
                                        <button style="" id="beresbtn" class="btn btn-info mt-3">Beres</button>
                                    @endif
                                    <form id="formKirim" action="/dashboard/update-order/{{ $orders->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="kirim">
                                    </form>
                                    <form id="formBeres" action="/dashboard/update-order/{{ $orders->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="beres">
                                    </form>
                                    <form id="formTerima" action="/dashboard/update-order/{{ $orders->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="proses">
                                    </form>
                                    <form id="formTolak" style="display:none" action="/dashboard/update-order/{{ $orders->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="tolak">
                                        <label for="" class="d-block m-0">Alasan</label>
                                        <input type="text" name="message" class="border border-3 d-inline-block m-0">
                                        <button type="submit" class="btn btn-danger mt-3">Tolak</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    
    $('#tolakbtn').click(function (e) { 
        $('#formTolak').css('display', 'block');
    });
    $('#terimabtn').click(function (e) { 
        $('#formTerima').submit();
        $('#formTolak').css('display', 'none');
        $('#tolakbtn').css('display', 'none');
        $('#terimabtn').css('display', 'none');
        $('#kirimbtn').css('display', 'block');
    });

    $('#kirimbtn').click(function (e) { 
        e.preventDefault();
        
        $('#formKirim').submit();
    });

    $('#beresbtn').click(function (e) { 
        e.preventDefault();
        
        $('#formBeres').submit();
    });

    // var slideIndex = 0;
    // carousel();
    
    //     function carousel() {
    //         var i;
    //         var x = document.getElementsByClassName("mySlides");
    //         for (i = 0; i < x.length; i++) {
    //             x[i].style.display = "none";
    //         }
    //         slideIndex++;
    //         if (slideIndex > x.length) {slideIndex = 1}
    //             x[slideIndex-1].style.display = "block";
    //             setTimeout(carousel, 2000);
    //         }
</script>
@endsection