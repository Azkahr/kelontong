@extends('layouts.main')
@section('headC')
    <link rel="stylesheet" href="{{ asset('assets/css/transaksi.css') }}">
@endsection
@section('container')
@include('partials/navbar')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('addRating') }}" method="POST">
                @csrf
                <input type="hidden" name="orderItems_id" id="orderItems_id">
                <input type="hidden" name="products_id" id="products_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="h4 text-center">Beri review untuk product ini</h4>
                    <div class="rating-css">
                        <div class="star-icon" id="star-icon">
                        </div>
                    </div>
                    <textarea class="form-control" name="user_review" id="textArea" rows="5" placeholder="Tulis ulasan..." required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="font-size: 2em; font-weight: bold">My Orders</h4>
                </div>
                <div class="card-body" id="transaksi-container">
                    <table>
                        @foreach ($orders as $order)
                            <td>
                                Tanggal Order : {{ date('d-m-Y', strtotime($order->created_at)) }}
                            </td>
                            <td>
                                Nomor Resi : {{ $order->no_resi }}
                            </td>
                            <td>
                                <a href="{{ url('view-order', $order->id) }}" class="btn btn-primary">View</a>
                            </td>
                            <tr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderItems as $orderI)
                                            <tr>
                                                <td>{{ $orderI->products->product_name }}</td>
                                                <td>{{ $orderI->products->category->name }}</td>
                                                <td>Rp.{{ number_format($orderI->products->harga, 0,",",".") }}</td>
                                                @if ($orderI->order->status == "kirim")
                                                    <td>Sedang dikirim</td>
                                                @elseif($orderI->order->status == "tolak")
                                                    <td style="color: red; font-weight: bolder">Ditolak lihat alasannya di detail order</td>
                                                @else
                                                    <td>{{ $orderI->order->status }}</td>
                                                @endif
                                                @if ($orderI->order->status == "beres")
                                                    <td>
                                                        <input type="hidden" value="{{ $orderI->id }}" id="orderitemV">
                                                        <button type="button" value="{{ $orderI->products->id }}" class="ratingBtn btn btn-primary" data-name="{{ $orderI->products->product_name }}" @if ($orderI->rating == null) data-rating=null @else data-rating="{{$orderI->rating->stars_rated}}" data-review={{ $orderI->rating->user_review }} @endif data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Beri Rating
                                                        </button>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </tr>
                            <hr class="my-3">
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
$(function () {
    $('#exampleModal').modal({backdrop: 'static', keyboard: false})  
    $('#transaksi-container').on('click', '.ratingBtn', function (e) { 
        e.preventDefault();

        let product_id = $(e.target).val();
        let orderItemsV = $(e.target).siblings('#orderitemV').val();
        let stars_rated = $(e.target).data('rating');
        let review = $(e.target).data('review');
        console.log(review);
        $('#products_id').val(product_id);
        $('#orderItems_id').val(orderItemsV);
        $('#textArea').val(review);
        $('#exampleModalLabel').text($(e.target).data('name'));

        if (stars_rated == null || stars_rated == undefined) {
            $('#star-icon').append(
                `
                <input type="radio" value="1" name="product_rating" checked id="rating1">
                <label for="rating1" class="fa fa-star"></label>
                <input type="radio" value="2" name="product_rating" id="rating2">
                <label for="rating2" class="fa fa-star"></label>
                <input type="radio" value="3" name="product_rating" id="rating3">
                <label for="rating3" class="fa fa-star"></label>
                <input type="radio" value="4" name="product_rating" id="rating4">
                <label for="rating4" class="fa fa-star"></label>
                <input type="radio" value="5" name="product_rating" id="rating5">
                <label for="rating5" class="fa fa-star"></label>
                `
            );
        } else {
            for (let index = 1; index <= 5; index++) {
                if (stars_rated === index) {
                    let valueI = parseInt(index);
                    $('#star-icon').append(
                        `
                        <input type="radio" value="`+ valueI +`" name="product_rating" checked id="rating`+ valueI +`">
                        <label for="rating`+ valueI +`" class="fa fa-star"></label>
                        `
                    );
                }else{
                    let valueI = parseInt(index);
                    $('#star-icon').append(
                        `
                            <input type="radio" value="`+ valueI +`" name="product_rating" id="rating`+ valueI +`">
                            <label for="rating`+ valueI +`" class="fa fa-star"></label>
                        `
                    );
                }
                
            }
        }
    });

    $('.btn-close').click(function (e) { 
        e.preventDefault();
        setTimeout(() => {
            $('#star-icon').empty();
        }, 100);
    });
});
</script>
@endsection