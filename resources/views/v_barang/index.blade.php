@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <h2>Daftar Barang</h2>

        <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Create Barang</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('Gagal'))
            <div class="alert alert-danger">
                {{ session('Gagal') }}
            </div>
        @endif

        <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Merk</th>
                    <th>Seri</th>
                    <th width=30%>Spesifikasi</th>
                    <th>Stok</th>
                    <th>Kategori_id</th>
                    <th width=30%>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $barang)
                    <tr>
                        <td>{{ $barang->id }}</td>
                        <td>{{ $barang->merk }}</td>
                        <td>{{ $barang->seri }}</td>
                        <td>{{ $barang->spesifikasi }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>
                        <a href="{{ route('kategori.show', $barang->kategori->id) }}">
                                {{ $barang->kategori->id }} 
                            </a>

                        </td>
                        <td>
                            <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-info"><i class="bi bi-eye"></i> Show</a>
                            <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')"><i class="bi bi-trash"></i> Delete</button>  
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    <div class="d-flex justify-content">
    {{ $barangs->links('pagination::bootstrap-4') }}
    </div>

    </div>
@endsection