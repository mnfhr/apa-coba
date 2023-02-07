@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kamar</h1>
</div>

<div class="col-lg-8">
    <form action="/admin/tipe-kamar/{{ $tipe_kamar->id }}" method="POST" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kamar</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                value="{{ old('nama', $tipe_kamar->nama) }}" required autofocus>
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga Kamar</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga"
                value="{{ old('harga', $tipe_kamar->harga) }}" required min="1">
            @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok Kamar</label>
            <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" id="stok"
                value="{{ old('stok', $tipe_kamar->stok) }}" required min="1">
            @error('stok')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="fkamar" class="form-label">Fasilitas Kamar</label>
            <select class="js-example-basic-multiple form-select" name="fasilitas[]" multiple="multiple" id="fkamar"
                required>
                @foreach ($fkamars as $fkamar)
                <option value="{{ $fkamar->id }}" @foreach ($tipe_kamar->fasilitasKamars as $value)
                    @if ($value->id == $fkamar->id)
                    selected
                    @endif
                    @endforeach
                    >
                    {{ $fkamar->nama }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label @error('img') is-invalid @enderror">Foto Kamar</label>
            <input type="hidden" name="oldImage" value="{{ $tipe_kamar->img }}">
            @if ($tipe_kamar->img)
            <img src="{{ asset('storage/' . $tipe_kamar->img) }}" class="img-preview img-fluid col-sm-5 mb-3 d-block">
            @else
            <img class="img-preview img-fluid col-sm-5 mb-3">
            @endif
            <input type="file" name="img" id="img" class="form-control" onchange="previewImage()">
            @error('img')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Perbarui Kamar</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

    function previewImage() {
        const image = document.querySelector("#img");
        const imgPreview = document.querySelector(".img-preview");

        imgPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREevent) {
            imgPreview.src = oFREevent.target.result;
        }
    }
</script>

@endsection