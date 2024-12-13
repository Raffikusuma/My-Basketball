@extends('layouts.app')

@section('title', 'Hapus Pencatatan Keuangan')

@section('content')

<div class="form-hapus" id="form-hapus">
  <h4>Ingin Menghapus Data ?</h4>
  <form action="{{ route('info_pemain.hapus', $row->id_pemain) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
</form>

  <a href="{{ route('informasi') }}" class="btn btn-simpan" id="btn-batal" style="width: 100%; margin: 20px auto; display: block;">
    No
  </a>
</div>
@endsection