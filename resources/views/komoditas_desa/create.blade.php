@extends('layouts.app')
  
@section('title', 'Data Input Dashboard')
  
@section('contents')
    <h1 class="mb-0">Add Komoditas Desa</h1>
    <hr />
    <form action="{{ route('komoditas_desa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="desa_id">Nama Desa</label>
            <select class="form-control" id="desa_id" name="desa_id" required>
                <option value="" disabled selected>Pilih Nama Desa</option>
                @foreach($desas as $desa)
                    <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select class="form-control" id="kategori_id" name="kategori_id" required>
                <option value="" disabled selected>Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="komoditi_id">Komoditas</label>
            <select class="form-control" id="komoditi_id" name="komoditi_id" required>
                <option value="" disabled selected>Pilih Komoditas</option>
                @foreach($komoditis as $komoditi)
                    <option value="{{ $komoditi->id }}">{{ $komoditi->nama_komoditi }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah (KG)</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" required>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection