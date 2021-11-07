@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Laporan Equipment</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="card-header">
                            Buat Laporan Equipment
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="get" action="{{route('jadwal-pemeliharaan.store')}}"
                                        enctype='multipart/form-data'>
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label for="">Tanggal Mulai</label>
                                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                                        class="form-control" aria-describedby="emailHelp" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label for="">Tanggal Selesai</label>
                                                    <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                                                        class="form-control" aria-describedby="emailHelp" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label for="">Filter By</label>
                                                    <select name="filter" class="form-control">
                                                        <option value="data_alat">Data Alat</option>
                                                        <option value="riwayat_kalibrasi">Riwayat Kalibrasi</option>
                                                        <option value="riwayat_pemeliharaan">Riwayat Pemeliharaan</option>
                                                        <option value="riwayat_kerusakan">Riwayat Kerusakan</option>
                                                        <option value="riwayat_perbaikan">Riwayat Perbaikan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>




                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    {{-- script modal --}}
    <script>

    </script>
    @endsection
