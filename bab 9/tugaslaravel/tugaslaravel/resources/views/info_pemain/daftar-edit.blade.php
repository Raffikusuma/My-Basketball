@extends('layouts.app')

@section('title', 'Edit Pemain Basket')

@section('content')
<style>
    body {
        background-image: url('{{ asset('images/dasboard.jpeg') }}');
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
    .form-group {
        margin-bottom: 1rem;
    }
    .btn-dashboard {
        background-color: burlywood;
        color: white;
    }
</style>

<div class="container mt-4">
    <h1 class="text-center">Edit Pemain Basket</h1>

    <!-- Form Edit Data -->
    <form method="POST" action="{{ route('info_pemain.update', $pemain->id_pemain) }}">
        @csrf
        @method('PUT') <!-- Metode PUT untuk pembaruan data -->
        <div class="row">
            <div class="col-md-3 form-group">
                <label for="nama_pemain">Nama Pemain</label>
                <input type="text" name="nama_pemain" value="{{ old('nama_pemain', $pemain->nama_pemain) }}" class="form-control" required>
            </div>
            <div class="col-md-3 form-group">
                <label for="posisi">Posisi</label>
                <input type="text" name="posisi" value="{{ old('posisi', $pemain->posisi) }}" class="form-control" required>
            </div>
            <div class="col-md-3 form-group">
                <label for="tim">Tim</label>
                <input type="text" name="tim" value="{{ old('tim', $pemain->tim) }}" class="form-control" required>
            </div>
            <div class="col-md-3 form-group">
                <button type="submit" class="btn btn-success btn-block">Update</button>
            </div>
        </div>
    </form>
<div class="kembali">
<a href="{{ url('/basket') }}" class="btn btn-secondary mt-4">Kembali ke Daftar Pemain</a>
</div>
   

</div>
@endsection
