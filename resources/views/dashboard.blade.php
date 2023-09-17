@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary mb-1">
                            <h5 class="card-title">Jumlah Desa</h5>
                        </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <p class="card-text">{{ $jumlahDesa }}</p>
                            </div>
                    </div>
                            <div class="col-auto">
                        <i class="fas fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success mb-1">
                            <h5 class="card-title">Jumlah Komoditas</h5>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <p class="card-text">{{ $jumlahKomoditas }}</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info mb-1">
                            <h5 class="card-title">Jumlah Komoditas Tanam</h5>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <p class="card-text">{{ $jumlahKomoditasTanam }} KG</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning mb-1">
                            <h5 class="card-title">Jumlah Komoditas Panen</h5>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><p class="card-text">{{ $jumlahKomoditasPanen }} KG</p></div>
                        </div>
                        <div class="col-auto">
                        <i class="bi bi-bag-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<table class="table table-hover mt-4">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nama Desa</th>
            <th>Nama Komoditas</th>
            <th>Tanggal Data Dibuat</th>
            <th>Status</th>
            <th>Jumlah</th>
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