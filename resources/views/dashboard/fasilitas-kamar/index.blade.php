@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Fasilitas Kamar</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="table-responsive col-lg">
    <a href="/admin/fasilitas-kamar/create" class="btn btn-primary mb-3">Tambah Fasilitas Kamar Baru</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama Fasilitas</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fkamars as $fkamar)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if ($fkamar->img)
                    <div style="max-height: 350px; max-width: 300px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $fkamar->img) }}" class="img-fluid mt-4"
                            alt="{{ $fkamar->nama }}">
                    </div>
                    @else
                    <img src="https://source.unsplash.com/300x200?hotel-room" class="img-fluid mt-4"
                        alt="Kamar {{ $fkamar->nama }}">
                    @endif
                </td>
                <td>{{ $fkamar->nama }}</td>
                <td class="text-center">
                    <a href="/admin/fasilitas-kamar/{{ $fkamar->id }}/edit" class="badge bg-warning"><span
                            data-feather="edit"></span></a>
                    <form action="/admin/fasilitas-kamar/{{ $fkamar->id }}" method="POST" class="d-inline">
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