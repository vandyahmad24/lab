@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Riwayat Kalibrasi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('riwayat-kalibrasi.index')}}">Riwayat Kalibrasi</a></li>
                <li class="breadcrumb-item active">Edit Riwayat Kalibrasi</li>
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
                            Edit Riwayat Kalibrasi
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="{{route('jadwal-kalibrasi.update',$jadwal->id)}}" enctype='multipart/form-data'>
                                        @method("PUT")
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <select name="alat_id" id="alat_id" class="form-control">
                                                <option disabled selected value>Pilih Alat</option>
                                                @foreach ($alat as $a)
                                                    <option value="{{$a->id}}"  data-kategori="{{$a->kategori->nama ?? "-" }}" 
                                                        {{$a->id==$jadwal->alat_id ?"selected":'-'}}
                                                        >{{$a->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kategori Alat</label>
                                            <input type="text" name="nama" id="kategori" class="form-control" value="{{$jadwal->alat->kategori->nama ??''}}"
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Jenis Kalibrasi</label>
                                            <select name="jenis_kalibrasi" id="" class="form-control">
                                                <option value="internal">Internal</option>
                                                <option value="eksternal">Eksternal</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Tanggal Kalibrasi</label>
                                            <input type="month" name="tanggal_kalibrasi" class="form-control" id="" value={{$jadwal->tanggal_kalibrasi}}
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Status Kalibrasi</label>
                                            <select name="status_kalibrasi" id="" class="form-control">
                                                <option value="proses-kalibrasi" {{$jadwal->status_kalibrasi=="proses-kalibrasi" ? "selected":'-'  }} >Proses Kalibrasi</option>
                                                <option value="selesai" {{$jadwal->status_kalibrasi=="selesai" ? "selected":'-'  }} >Selesai</option>
                                                <option value="tidak-dapat-diproses" {{$jadwal->status_kalibrasi=="tidak-dapat-diproses" ? "selected":'-'  }}  >Tidak Dapat diproses</option>
                                            </select>
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

        $("#alat_id").change(function(){
            let el = $(this).find('option:selected');
            let val = el.attr("data-kategori")
           $("#kategori").val(val)

        });


    </script>
    @endsection
