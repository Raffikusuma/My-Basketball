@extends('layouts.app') <!-- Menggunakan layout utama jika ada -->

@section('title', 'Daftar Pemain Basket')

@section('content')
<style>
    body {
        background-image: url('{{ asset('images/dasboard.jpeg') }}'); /* Sesuaikan dengan lokasi file */
        background-size: cover;
        background-position: center;
        color: white;
    }
    .container {
        background: rgba(0, 0, 0, 0.7);
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
    }
    table {
        color: white;
    }
    .btn-dashboard {
        background-color: burlywood;
        color: white;
    }
</style>

<div class="container mt-4">
    <h1 class="text-center">Daftar Pemain Basket</h1>


    <!-- Form Tambah Data -->
    <form method="POST" class="mb-4" action="{{ route('info_pemain.store') }}">
        @csrf <!-- Token CSRF Laravel untuk keamanan -->
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="nama_pemain" placeholder="Nama Pemain" class="form-control" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="posisi" placeholder="Posisi" class="form-control" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="tim" placeholder="Tim" class="form-control" required>
            </div>
            <div class="col-md-3">
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
            
        </div>
    </form>

    <!-- Tabel Data Pemain -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" style="width:20%">Nama Pemain</th>
                <th scope="col" style="width:20%">Posisi</th>
                <th scope="col" style="width:20%">Tim</th>
                <th scope="col" style="width:20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemain as $row)
            <tr>
                <td>{{ $row->nama_pemain }}</td>
                <td>{{ $row->posisi }}</td>
                <td>{{ $row->tim }}</td>
                <td>
                     <!-- Tombol Edit (mengarah ke halaman edit) -->
    <a href="{{ route('info_pemain.edit', $row->id_pemain) }}" class="btn btn-warning btn-sm">Edit</a>
    <!-- Form untuk Hapus -->
    <form action="{{ route('info_pemain.hapus', $row->id_pemain) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
    </form>
   
   
</td>

            </tr>
            @endforeach
        </tbody>
        <a href="{{ route('daftar.cetak') }}" class="cetak-btn">Cetak Data</a>
    </table>


</div>
@endsection
