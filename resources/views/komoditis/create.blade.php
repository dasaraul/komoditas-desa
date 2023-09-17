@extends('layouts.app')
  
@section('title', 'Create Komoditas')
  
@section('contents')
    <h1 class="mb-0">Add Komoditas</h1>
    <hr />
    <form action="{{ route('komoditis.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="kode" class="form-control" placeholder="Kode Komoditas">
                <input type="text" name="nama_komoditi" class="form-control" placeholder="Nama Komoditas">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection