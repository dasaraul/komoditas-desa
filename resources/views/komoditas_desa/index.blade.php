@extends('layouts.app')

@section('title', 'Home Input to Dashboard')

@section('contents')
<style>
    select {
    padding: 5px;
    font-size: 14px;
    color: #333;
    border: 1px solid #b6b6b6;
    border-radius: 5px;
    background-color: #f8f8f8;
    appearance: none; 
    cursor: pointer;
    transition: border-color 0.3s;
    width: 100px; 
}

select:hover {
    border-color: #888;
}

select:focus {
    border-color: #007bff;
    outline: none;
}

option {
    padding: 5px 10px;
    background-color: #f8f8f8;
    color: #333;
}

option:checked,
option:selected {
    background-color: #007bff; 
    color: #fff;
}
</style>
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Data</h1>
    <a href="{{ route('komoditas_desa.create') }}" class="btn btn-primary">Add Komoditas Desa</a>
</div>
<form action="" method="GET">
    <div class="row">

        <div class="col-md-3">
            <label for="kategori_id">Status: </label>
            <select name="kategori_id" id="kategori_id" onchange="filterByKategori(this)">
                <option value="">All</option>
                @foreach($kategoriOptions as $kategori)
                <option value="{{ $kategori->id }}" {{ $kategori->kategori_id == $selectedKategoriId ? 'selected' : '' }}>
                    {{ $kategori->kategori }}
                </option>
                @endforeach
            </select>
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
            <th>Nama Produk</th>
            <th>Nama Konsumen</th>
            <th>Tanggal Dibeli</th>
            <th>Status</th>
            <th>Jumlah</th>
            <th>Action</th> <!-- Tambah kolom Action untuk tombol Edit dan Delete -->
        </tr>
    </thead>
    <tbody>
        @if($komoditasDesa->count() > 0)
        @foreach($filteredKomoditasDesa as $wir)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $wir->desa->nama_desa }}</td>
            <td class="align-middle">{{ $wir->komoditi->nama_komoditi }}</td>
            <td class="align-middle">{{ $wir->updated_at }}</td>
            <td class="align-middle">{{ $wir->kategori->kategori }}</td>
            <td class="align-middle">{{ $wir->jumlah }} pcs</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('komoditas_desa.edit', $wir->id)}}" type="button" class="btn btn-warning">
                        <i class="fas fa-pen"></i>
                    </a>
                    <a href="{{ route('komoditas_desa.show', $wir->id) }}" type="button" class="btn btn-primary">
                        <i class="fas fa-info-circle"></i>
                    </a>
                    <form action="{{ route('komoditas_desa.destroy', $wir->id) }}" method="POST" class="m-0" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> </button>
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
<script>
    function filterByKategori(select) {
        var selectedKategoriId = select.value; // Dapatkan nilai terpilih dari dropdown
        var url = '{{ route("komoditas_desa") }}'; // Ganti dengan URL ke halaman Anda

        // Tambahkan parameter kategori_id ke URL jika ada yang terpilih
        if (selectedKategoriId) {
            url += '?kategori_id=' + selectedKategoriId;
        }

        // Redirect ke URL yang baru
        window.location.href = url;
    }
</script>
@endsection