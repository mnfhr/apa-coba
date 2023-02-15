@extends('dashboard.layouts.main')

@section('container')

<style>
    .group {
        display: flex;
        line-height: 28px;
        align-items: center;
        position: relative;
        max-width: 190px;
    }

    .input {
        width: 100%;
        height: 40px;
        line-height: 28px;
        padding: 0 1rem;
        padding-left: 2.5rem;
        border: 2px solid transparent;
        border-radius: 8px;
        outline: none;
        background-color: #fff;
        color: #0d0c22;
        transition: .3s ease;
    }

    .input::placeholder {
        color: #9e9ea7;
    }

    .input:focus,
    input:hover {
        outline: none;
        border-color: rgba(234, 76, 137, 0.4);
        background-color: #fff;
        box-shadow: 0 0 0 4px rgb(234 76 137 / 10%);
    }

    .icon {
        position: absolute;
        left: 1rem;
        fill: #9e9ea7;
        width: 1rem;
        height: 1rem;
    }
</style>

@if (!$search)
<div class="row mb-3 border-bottom">
    <div class="col-md-12">
        <h1 class="h2 text-center mt-2">Cari Pesanan</h1>
    </div>
    <div class="col-md-12 my-3">
        <form action="/resepsionis" method="POST">
            @csrf
            <div class="row">
                <label for="kode" class="col-sm-2 col-form-label">Booking ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kode" id="kode" placeholder="Search">
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

@else
@if (session()->has('success'))
<div class="alert alert-primary alert-dismissible fade show col-lg-12" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row mb-3 border-bottom">
    <div class="col-md-12">
        <h1 class="h2 text-center mt-2">Cari Pesanan</h1>
    </div>
    <div class="col-md-12 my-3">
        <form action="/resepsionis" method="POST">
            @csrf
            <div class="row">
                <label for="kode" class="col-sm-2 col-form-label">Booking ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kode" id="kode" placeholder="Search"
                        value="{{ $search }}">
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

@foreach ($pesanan as $item)
@if ($item->status == "DISETUJUI" || $item->status == "DIBAYAR" || $item->status == "CHECKIN")
<div class="card text-center mb-3">
    <div class="card-body">
        <h5 class="card-title">{{ $item->kode_booking }}</h5>
        <div class="row">
            <div class="col-sm-4">
                <p class="card-text">Pemesan : {{ $item->nama_pemesan }}</p>
                <p class="card-text">Tanggal Check-in : {{ $item->tgl_checkin }}</p>
                <p class="card-text">Tanggal Check-out : {{ $item->tgl_checkout }}</p>
            </div>
            <div class="col-sm-4">
                @if($item->status == "DISETUJUI")
                <p class="card-text">Status : <span class="bg-info text-white">{{ $item->status }}</span></p>
                @else
                <p class="card-text">Status : <span class="bg-success">{{ $item->status }}</span></p>
                @endif
                <p class="card-text">Nama Kamar : {{ $item->tipeKamars->nama }}</p>
                <p class="card-text">Total biaya : @rupiah($item->total)</p>
            </div>
            <div class="col-sm-4">
                @if ($item->status == "DISETUJUI")
                <form action="/resepsionis/bayar" method="POST">
                    @csrf
                    <input type="hidden" name="kode" value="{{ $item->kode_booking }}">
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </form>
                <button class="btn btn-success mt-2" disabled>Check-in</button>
                @endif
                @if($item->status == "DIBAYAR")
                <form action="/resepsionis/checkin" method="POST">
                    @csrf
                    <input type="hidden" name="kode" value="{{ $item->kode_booking }}">
                    <input type="hidden" name="jml_kamar" value="{{ $item->jml_kamar }}">
                    <input type="hidden" name="id_kamar" value="{{ $item->tipeKamars->id }}">
                    <input type="hidden" name="onbook" value="{{ $item->tipeKamars->onbook }}">
                    <input type="hidden" name="onuse" value="{{ $item->tipeKamars->onuse }}">
                    <button type="submit" class="btn btn-success">Check-in</button>
                </form>
                @endif
                @if($item->status == "CHECKIN")
                <p class="card-text">Telah Check-in</p>
                <form action="/resepsionis/checkout" method="POST">
                    @csrf
                    <input type="hidden" name="kode" value="{{ $item->kode_booking }}">
                    <input type="hidden" name="jml_kamar" value="{{ $item->jml_kamar }}">
                    <input type="hidden" name="id_kamar" value="{{ $item->tipeKamars->id }}">
                    <input type="hidden" name="stok" value="{{ $item->tipeKamars->stok }}">
                    <input type="hidden" name="onuse" value="{{ $item->tipeKamars->onuse }}">
                    <button type="submit" class="btn btn-info">Check-out</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>

@endif
@endforeach

@endif

@endsection