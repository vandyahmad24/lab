@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>

            <div class="card mb-4">
                <div class="card-body">
                    Manajemen Alat Laboratorium Pengujian 
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Jumlah Alat</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{route('alat.index')}}">View Details</a>
                            <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z">
                                    </path>
                                </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Jumlah Kerusakan</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{route('data-kerusakan.index')}}">View
                                Details</a>
                            <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z">
                                    </path>
                                </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Jumlah Bahan</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{route('bahan.index')}}">View Details</a>
                            <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z">
                                    </path>
                                </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    Daftar Limit Bahan
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Stok</td>
                                    <td>Limit</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bahan as $b)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$b->nama_bahan}}</td>
                                    <td>
                                        @if ($b->stok <= $b->limit)
                                            <span class="text-danger">{{$b->stok}}</span>
                                            @else
                                            {{$b->stok}}
                                            @endif
                                    </td>
                                    <td>
                                        {{$b->limit}}
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            Jadwal Kalibrasi Bulan Ini
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Alat </td>
                                        <td>Jenis Kalibrasi</td>
                                        <td>Tanggal Kalibrasi</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal as $b)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$b->alat->alat_kode ?? "-"}} || {{$b->alat->nama ?? "-"}} </td>
                                        <td>{{$b->jenis_kalibrasi}}</td>
                                        <td>{{$b->tanggal_kalibrasi}}</td>
                                       <td>
                                        @php
                                        switch ($b->status_kalibrasi) {
                                            case 'proses-kalibrasi':
                                                $stat = "Proses Kalibrasi";
                                                break;
                                            case 'selesai':
                                                $stat = "Selesai";
                                                break;
                                            case 'tidak-dapat-diproses':
                                                $stat = "Tidak Dapat Diproses";
                                                break;
                                            
                                            default:
                                                $stat="";
                                                break;
                                        }
                                        @endphp   
                                        
                                        {{$stat}}</td>
                                    </tr>
                                    @endforeach
    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                           Jadwal Pemeliharaan Bulan ini
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Alat</td>
                                        <td>Tanggal Pemeliharaan</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemeliharaan as $b)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$b->alat->alat_kode ?? "-"}} || {{$b->alat->nama}} </td>
                                        <td>{{$b->tanggal_pemeliharaan}}</td>
                                        <td>{{$b->status_pelaksanaan}}</td>
                                    </tr>
                                    @endforeach
    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>

    @endsection
