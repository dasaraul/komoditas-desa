@extends('layouts.app')
  
@section('title', 'Edit Komoditas')
  
@section('contents')
    <h1 class="mb-0">Edit Komoditas</h1>
    <hr />
    <form action="{{ route('komoditis.update', $komoditi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Kode Komoditas</label>
                <input type="text" name="kode" class="form-control" placeholder="Kode Komoditas" value="{{ $komoditi->kode }}" >
                
                <label class="form-label">Nama Komoditas</label>
                <input type="text" name="nama_komoditi" class="form-control" placeholder="Nama Komoditas" value="{{ $komoditi->nama_komoditi }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection