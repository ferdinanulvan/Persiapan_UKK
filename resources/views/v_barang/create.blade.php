@extends('layouts.adm-main')

@section('content')

    <div class="container">
        <h1>Create Barang</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="merk">Merk:</label>
                <input type="text" name="merk" class="form-control" id="merk" value="{{ old('merk') }}">
            </div>

            <div class="form-group">
                <label for="seri">Seri:</label>
                <input type="text" name="seri" class="form-control" id="seri" value="{{ old('seri') }}">
            </div>

            <div class="form-group">
                <label for="spesifikasi">Spesifikasi:</label>
                <textarea name="spesifikasi" class="form-control" id="spesifikasi">{{ old('spesifikasi') }}</textarea>
            </div>

            <!-- <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" name="stok" class="form-control" id="stok" value="{{ old('stok', 0) }}">
            </div> -->

            <div class="form-group">
                <label for="kategori_id">Deskripsi:</label>
                <select name="kategori_id" class="form-control" id="kategori_id">
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->deskripsi }} - {{ $item->kategori }}</option>
                    @endforeach
                </select>
            </div>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Create Barang</button>
        </form>
    </div>
@endsection