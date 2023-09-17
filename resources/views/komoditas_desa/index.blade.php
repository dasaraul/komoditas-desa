@extends('layouts.app')

@section('title', 'Home Komoditas Desa')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Desa</h1>
    <a href="{{ route('komoditas_desa.create') }}" class="btn btn-primary">Add Komoditas Desa</a>
</div>
<form action="" method="GET">
<div class="row">

<div class="col-md-3">
<label>Filter by Status</label>
<select name="status" class="form-select">
<option value="">Select Status</option>
<option value="Sudah Panen" {{ Request::get('kategori') == 'Sudah Panen' ? 'selected' : 'Sudah Panen' }}>Sudah Panen</option>
<option value="Masih Tanam" {{ Request::get('kategori') == 'Masih Tanam' ? 'selected' : '' }}>Masih Tanam</option>

</select>
</div>
<div class="col-md-6">
<button type="submit" class="btn btn-primary">Filter</button>
</div>
</div>
</form>
<hr>
<hr />
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nama Desa</th>
            <th>Nama Komoditas</th>
            <th>Tanggal Data Dibuat</th>
            <th>Status</th>
            <th>Jumlah</th>
            <th>Action</th> <!-- Tambah kolom Action untuk tombol Edit dan Delete -->
        </tr>
    </thead>
    <tbody>
        @if($komoditasDesa->count() > 0)
        @foreach($komoditasDesa as $wir)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $wir->desa->nama_desa }}</td>
            <td class="align-middle">{{ $wir->komoditi->nama_komoditi }}</td>
            <td class="align-middle">{{ $wir->updated_at }}</td>
            <td class="align-middle">{{ $wir->kategori->kategori }}</td>
            <td class="align-middle">{{ $wir->jumlah }} KG</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('komoditas_desa.edit', $wir->id)}}" type="button" class="btn btn-warning">
                        <i class="fas fa-pen"></i>
                    </a>
                    <form action="{{ route('komoditas_desa.destroy', $wir->id) }}" method="POST" class="m-0" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="5">Komoditas Desa not found</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection