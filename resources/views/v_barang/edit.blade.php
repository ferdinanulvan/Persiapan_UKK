@extends('layouts.adm-main')

@section('content')

    <div class="container">

    
        <h2>Edit Barang</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="merk">Merk</label>
                <input type="text" name="merk" class="form-control" value="{{ $barang->merk }}">
            </div>

            <div class="form-group">
                <label for="seri">Seri</label>
                <input type="text" name="seri" class="form-control" value="{{ $barang->seri }}">
            </div>

            <div class="form-group">
                <label for="spesifikasi">Spesifikasi</label>
                <textarea name="spesifikasi" class="form-control">{{ $barang->spesifikasi }}</textarea>
            </div>


            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori_id" class="form-control">
                    @foreach($kategori as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $barang->kategori_id ? 'selected' : '' }}>
                            {{ $category->deskripsi }} - {{ $category->kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection