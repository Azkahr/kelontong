@extends('layouts.main')
@section('container')
@include('partials/navbar')
<style>
    .container {
        padding-top: 150px;
    }
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="font-size: 2em; font-weight: bold">My Orders</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal Order</th>
                                    <th>Nomor Resi</th>
                                    <th>Total harga</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->no_resi }}</td>
                                        <td>Rp.{{ number_format($order->total_harga, 0,",",".") }}</td>
                                        @if ($order->status == "kirim")
                                            <td>Sedang dikirim</td>
                                        @elseif($order->status == "tolak")
                                            <td style="color: red; font-weight: bolder">Ditolak lihat alasannya di detail order</td>
                                        @else
                                            <td>{{ $order->status }}</td>
                                        @endif
                                        <td>
                                            <a href="{{ url('view-order', $order->id) }}" class="btn btn-primary">Order detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection