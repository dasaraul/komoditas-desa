@extends('layouts.app')

@section('title', 'Home Komoditas')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Komoditas</h1>
    <a href="{{ route('komoditis.create') }}" class="btn btn-primary">Add Komoditas</a>
</div>
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
            <th>Kode Komoditas</th>
            <th>Nama Komoditas</th>
            <th>Action</th> <!-- Tambah kolom Action untuk tombol Edit dan Delete -->
        </tr>
    </thead>
    <tbody>
        @if($komoditi->count() > 0)
        @foreach($komoditi as $rs)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $rs->kode }}</td>
            <td class="align-middle">{{ $rs->nama_komoditi }}</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('komoditis.edit', $rs->id)}}" type="button" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('komoditis.destroy', $rs->id) }}" method="POST" class="m-0" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="5">Komoditas not found</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection