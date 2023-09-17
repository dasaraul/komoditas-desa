@extends('layouts.app')
  
@section('title', 'Edit Desa')
  
@section('contents')
    <h1 class="mb-0">Edit Desa</h1>
    <hr />
    <form action="{{ route('desas.update', $desa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Kode Desa</label>
                <input type="text" name="kode" class="form-control" placeholder="Kode Desa" value="{{ $desa->kode }}" >
                
                <label class="form-label">Kategori</label>
                <input type="text" name="nama_desa" class="form-control" placeholder="Nama Desa" value="{{ $desa->nama_desa }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection