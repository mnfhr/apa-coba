@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tipe Kamar</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="table-responsive col-lg">
    <a href="/admin/tipe-kamar/create" class="btn btn-primary mb-3">Tambah Kamar Baru</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama Kamar</th>
                <th scope="col">Fasilitas</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Booking</th>
                <th scope="col">Digunakan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipe_kamars as $tipe_kamar)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if ($tipe_kamar->img)
                    <div style="max-height: 350px; max-width:300px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $tipe_kamar->img) }}" class="img-fluid mt-4"
                            alt="{{ $tipe_kamar->nama }}">
                    </div>
                    @else
                    <img src="https://source.unsplash.com/300x200?hotel-room" class="img-fluid mt-4"
                        alt="Kamar {{ $tipe_kamar->nama }}">
                    @endif
                </td>
                <td>{{ $tipe_kamar->nama }}</td>
                <td>
                    <ul>
                        @foreach($tipe_kamar->fasilitasKamars as $fkamar)
                        <li>{{ $fkamar->nama }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>@rupiah($tipe_kamar->harga)</td>
                <td>{{ $tipe_kamar->stok }}</td>
                <td>
                    @if($tipe_kamar->onbook)
                    {{ $tipe_kamar->onbook }}
                    @else
                    0
                    @endif
                </td>
                <td>
                    @if($tipe_kamar->onuse)
                    {{ $tipe_kamar->onuse }}
                    @else
                    0
                    @endif
                </td>
                <td class="text-center">
                    <a href="/admin/tipe-kamar/{{ $tipe_kamar->id }}/edit" class="badge bg-warning"><span
                            data-feather="edit"></span></a>
                    <form action="/admin/tipe-kamar/{{ $tipe_kamar->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Anda Yakin?')"><span
                                data-feather="x-circle"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection