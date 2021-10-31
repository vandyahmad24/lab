@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Jadwal Pemeliharaan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('jadwal-pemeliharaan.index')}}">Jadwal Pemeliharaan</a></li>
                <li class="breadcrumb-item active">Tambah Jadwal Pemeliharaan</li>
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
                            Tambah Jadwal Pemeliharaan
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="{{route('jadwal-pemeliharaan.store')}}" enctype='multipart/form-data'>
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <select name="alat_id" id="alat_id" class="form-control">
                                                <option disabled selected value>Pilih Alat</option>
                                                @foreach ($alat as $a)
                                                    <option value="{{$a->id}}" data-kategori="{{$a->kategori->nama ?? "-" }}">{{$a->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kategori Alat</label>
                                            <input type="text" name="nama" id="kategori" class="form-control" 
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Tanggal Pemeliharaan</label>
                                            <input type="date" name="tanggal_pemeliharaan" class="form-control" id=""
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">PIC</label>
                                            <select name="pic_id" id="pic_id" class="form-control">
                                                <option disabled selected value>Pilih Pic</option>
                                                @foreach ($pic as $p)
                                                    <option value="{{$p->id}}">{{$p->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="form-group mb-2">
                                            <label for="">Status Pelaksanaan</label>
                                            <select name="status_pelaksanaan" id="" class="form-control">
                                                <option value="proses-kalibrasi">Proses Kalibrasi</option>
                                                <option value="selesai">Selesai</option>
                                                <option value="tidak-dapat-diproses">Tidak Dapat diproses</option>
                                            </select>
                                        </div> --}}



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

        $("#alat_id").change(function(){
            let el = $(this).find('option:selected');
            let val = el.attr("data-kategori")
           $("#kategori").val(val)

        });


    </script>
    @endsection
