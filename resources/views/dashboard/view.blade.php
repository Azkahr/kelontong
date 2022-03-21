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
                                <div class="border p-2">{{ $orders->pincode }}</div>
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
                                    <label for="">Order status</label>
                                    <form action="/dashboard/update-order/{{ $orders->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="status" id="alasan" onchange="muncul()" >
                                            <option {{ $orders->status == "pending" ? 'selected' : '' }} value="pending">Pending</option>
                                            <option {{ $orders->status == "tolak" ? 'selected' : '' }} value="tolak">Tolak</option>
                                            <option {{ $orders->status == "beres" ? 'selected' : '' }} value="beres">Beres</option>
                                        </select>
                                        <div id="pesan" style="display: none">
                                            <label for="message">Alasan</label>
                                            <input type="text" name="message" id="message" class="form-control @error('message') is-invalid @enderror">
                                            @error('message')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
                                    </form>
                                    {{-- <form action="/dashboard/update-order/{{ $orders->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="terima">
                                        <button type="submit" class="btn btn-primary mt-3 float-end">Terima</button>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
var slideIndex = 0;
carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > x.length) {slideIndex = 1}
            x[slideIndex-1].style.display = "block";
            setTimeout(carousel, 2000);
        }

        function muncul(){
            var alasan = document.getElementById("alasan");
            var pesan = document.getElementById("pesan");

            if(alasan.value === "tolak"){
                pesan.style.display = "block";
                pesan.setAttribute("required", true);
            } else {
                pesan.style.display = "none";
            }
        }
</script>
@endsection