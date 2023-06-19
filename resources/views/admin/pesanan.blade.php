@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">

        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="text-nowrap" style="width: 20px">No</th>
                    <th class="text-nowrap">Order ID</th>
                    <th class="text-nowrap">Pembeli</th>
                    <th class="text-nowrap">Jumlah Pesanan</th>
                    <th class="text-nowrap">Tanggal</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap" style="width: 170px">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanans as $index=>$item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $index }}</td>
                        <td>{{ $item->first()->pembeli->name }}</td>
                        <td>{{ $item->count() }}</td>
                        <td>{{ $item->first()->created_at_id() }}</td>
                        <td class="text-capitalize">{{ $item->first()->status }}</td>
                        <td>
                            <a class="btn btn-primary" href="#" role="button">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>
@endsection
