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
                                    <th>Alasan ditolak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->no_resi }}</td>
                                        <td>Rp.{{ number_format($order->total_harga, 0,",",".") }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <a href="{{ url('view-order', $order->id) }}" class="btn btn-primary">View</a>
                                        </td>
                                        @if ($order->status == "tolak")
                                        <td>
                                            {{ $order->message }}
                                        </td>
                                        @endif
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