@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
               <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>ID</td>
                                <td>{{ $barang->id}}</td>
                            </tr>
                            <tr>
                                <td>Merk</td>
                                <td>{{ $barang->merk }}</td>
                            </tr>
                            <tr>
                                <td>Spesifikasi</td>
                                <td>{{ $barang->spesifikasi}}</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>{{ $barang->stok}}</td>
                            </tr>
                            <tr>
                <th>Kategori_id</th>
                <td>
                    <a href="{{ route('kategori.show', $barang->kategori->id) }}">
                        {{ $barang->kategori->id }} 
                    </a>
                </td>
            </tr>

                        </table>
                    </div>
               </div>
            </div>

            

            

        </div>
        <div class="row">
            <br>
        </div>
        <div class="row">
            <div class="col-md-12  text-center">
                

                <a href="{{ route('barang.index') }}" class="btn btn-md btn-primary mb-3">Back</a>
            </div>
        </div>
    </div>
@endsection