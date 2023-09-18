@extends('layouts.jir')

@section('title', 'Detail Komoditas Desa')

@section('contents')
<style type="text/css" media="print">
    /* Gaya khusus untuk cetak di sini */
    /* Misalnya, Anda bisa menyembunyikan tombol cetak */
    .btn-print {
        display: none;
    }
</style>
<h1>Detail Komoditas Desa</h1>
<p>Nama Desa: {{ $komoditasDesa->desa->nama_desa }}</p>
<p>Nama Komoditas: {{ $komoditasDesa->kategori->kategori}}</p>
<p>Komoditi: {{ $komoditasDesa->komoditi->nama_komoditi }}</p>
<p>jumlah: {{ $komoditasDesa->jumlah  }}</p>
<a href="{{ route('komoditas_desa') }}" class="btn btn-primary">Kembali</a>
<button onclick="printPage()" class="btn btn-warning">Cetak</button>
@endsection