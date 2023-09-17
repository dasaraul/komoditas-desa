@extends('layouts.app')
  
@section('title', 'Create Desa')
  
@section('contents')
    <h1 class="mb-0">Add Desa</h1>
    <hr />
    <form action="{{ route('desas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="kode" class="form-control" placeholder="Kode Desa">
                <input type="text" name="nama_desa" class="form-control" placeholder="Nama Desa">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection