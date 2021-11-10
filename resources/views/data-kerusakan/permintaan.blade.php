@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Permintaan Alat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('data-kerusakan.index')}}">Permintaan Alat</a></li>
                <li class="breadcrumb-item active">Cetak Permintaan Alat</li>
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
                            Cetak Permintaan Alat
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="{{route('data-kerusakan.permintaan.cetak')}}" enctype='multipart/form-data'>
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">ID Alat</label>
                                            <input type="text" value="{{$kerusakan->alat->alat_kode ?? '-'}}" id="kategori" class="form-control" id=""
                                                aria-describedby="emailHelp" readonly>
                                                <input type="hidden" name="alat_id" value="{{$kerusakan->alat->id ?? '-'}}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <input type="text" value="{{$kerusakan->alat->nama ?? '-'}}" id="kategori" class="form-control" id=""
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                       
                                        <div class="form-group mb-2">
                                            <label for="">Kerusakan</label>
                                            <input type="text" name="kerusakan" value="{{$kerusakan->jenis_kerusakan}}" id="kategori" class="form-control" id=""
                                                aria-describedby="emailHelp" >
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Rencana Perbaikan</label>
                                            <input type="text" name="rencana_perbaikan" id="kategori" class="form-control" id="" value="{{$kerusakan->rencana}}"
                                                aria-describedby="emailHelp" >
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
