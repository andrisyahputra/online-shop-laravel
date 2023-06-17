@extends('layouts.index')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-6">
                <img src="{{ Storage::url($produk->foto) }}" alt="{{ Storage::url($produk->foto) }}" class="img-fluid rounded-3">,
            </div>
            <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                <h3>{{ $produk->nama }}</h3>
                <span class="badge rounded-pill text-bg-warning px-3 mt-2 py-1">{{ $produk->kategori->nama }}</span>
                <div class="mt-3" style="white-space: pre-line">
                    {{ $produk->deskripsi }}
                </div>
                <h4 class="text-success mt-3">Rp {{ number_format($produk->harga) }}</h4>
                <div class="mt-3 d-flex gap-3">
                    <form action="{{ route('keranjang.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                        <button class="btn btn-dark">Tambah Keranjang</button>
                    </form>
                    <button type="button" class="btn btn-dark">Beli</button>
                </div>
            </div>
        </div>
    </div>
@endsection
