@extends('layouts.app')
  
@section('title', 'Create Kategori')
  
@section('contents')
    <h1 class="mb-0">Add Kategori</h1>
    <hr />
    <form action="{{ route('kategoris.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="kode" class="form-control" placeholder="Kode Kategori">
                <input type="text" name="kategori" class="form-control" placeholder="Kategori">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection