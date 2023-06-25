@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <h5>Order id : {{ $pesanans->first()->order_id }}</h5>
        <ul class="p-0" style="list-style: none">
            <li>Pembeli : {{ $pesanans->first()->pembeli->name }}</li>
            <li>Tanggal : {{ $pesanans->first()->created_at }}</li>
        </ul>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-nowrap" style="width: 20px">No</th>
                        <th class="text-nowrap">Produk</th>
                        <th class="text-nowrap">Harga</th>
                        <th class="text-nowrap">Kuantitas</th>
                        <th class="text-nowrap">Total</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($pesanans) --}}
                    @foreach ($pesanans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ number_format($item->harga) }}</td>
                            <td>{{ $item->kuantitas }}</td>
                            <td>{{ number_format($item->total) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <h4>Sub Total : Rp {{ number_format($subtotal) }}</h4>
        </div>
        <div class="d-flex justify-content-end mt-3 gap-3">
            <a class="btn btn-danger" href="#" role="button">Tolak</a>
            <a class="btn btn-primary" href="#" role="button">Terima</a>
            <a class="btn btn-success" href="#" role="button">Kirim</a>
        </div>
    </div>
</div>
@endsection
