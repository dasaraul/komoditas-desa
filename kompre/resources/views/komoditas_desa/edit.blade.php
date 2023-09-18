@extends('layouts.app')
  
@section('title', 'Edit Data Komoditas Desa')
  
@section('contents')
    <h1 class="mb-0">Edit Komoditas Desa</h1>
    <hr />
    <form action="{{ route('komoditas_desa.update', $komoditasDesa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="desa_id">Nama Desa</label>
            <select class="form-control" id="desa_id" name="desa_id" required>
                @foreach($desas as $desa)
                    <option value="{{ $desa->id }}" {{ $komoditasDesa->desa_id == $desa->id ? 'selected' : '' }}>
                        {{ $desa->nama_desa }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select class="form-control" id="kategori_id" name="kategori_id" required>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $komoditasDesa->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="komoditi_id">Komoditas</label>
            <select class="form-control" id="komoditi_id" name="komoditi_id" required>
                @foreach($komoditis as $komoditi)
                    <option value="{{ $komoditi->id }}" {{ $komoditasDesa->komoditi_id == $komoditi->id ? 'selected' : '' }}>
                        {{ $komoditi->nama_komoditi }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah (KG)</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $komoditasDesa->jumlah }}" required>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection