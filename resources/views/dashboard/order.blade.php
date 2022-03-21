@extends('layouts.dmain')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @include('notify::components.notify')
                    <div class="card-header">
                        <h4 style="font-size: 2em; font-weight: bold">New Orders
                            <a href="{{ route('history') }}" class="btn btn-info float-end">Order History</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tanggal Order</th>
                                    <th scope="col">Nomor Resi</th>
                                    <th scope="col">Total harga</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr scope="row">
                                        <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->no_resi }}</td>
                                        <td>Rp.{{ number_format($order->total_harga, 0,",",".") }}</td>
                                        <td>{{ $order->status == "pending" ? 'pending' : '' }}</td>
                                        <td>
                                            <a href="{{ route('viewOrder', $order->id) }}" class="btn btn-primary">View</a>
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