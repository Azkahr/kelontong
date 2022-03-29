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
                <input type="hidden" name="products_id" id="products_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate this product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="h4 text-center">Beri review untuk product ini</h4>
                    <div class="rating-css">
                        <div class="star-icon">
                            @if ($user_rating)
                                @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                    <input type="radio" value="{{ $i }}" name="product_rating" checked id="rating{{ $i }}">
                                    <label for="rating{{ $i }}" class="fa fa-star"></label>
                                @endfor
                                @for ($j = $user_rating->stars_rated+1; $j <= 5; $j++)
                                    <input type="radio" value="{{ $j }}" name="product_rating" id="rating{{ $j }}">
                                    <label for="rating{{ $j }}" class="fa fa-star"></label>
                                @endfor
                            @else
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
                            @endif
                        </div>
                    </div>
                    @if ($review)
                        ulasan anda sebelumnya
                        <textarea class="form-control" name="user_review" rows="5" placeholder="{{ $review->user_review }}">{{ $review->user_review }}</textarea>
                    @else
                        <textarea class="form-control" name="user_review" rows="5" placeholder="Tulis ulasan..."></textarea>
                    @endif
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
                                                        <input type="hidden" name="orderItems_id" id="orderItems_id">
                                                        <button type="button" value="{{ $orderI->products->id }}" class="ratingBtn btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
    $('#transaksi-container').on('click', '.ratingBtn', function (e) { 
        e.preventDefault();
        let product_id = $(e.target).val();
        $('#products_id').val(product_id);

        let orderItems_id = $(e.target).val();
        $('#orderItems_id').val(orderItems_id);
    });
</script>
@endsection