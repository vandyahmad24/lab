@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Riwayat Pemeliharaan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('riwayat-pemeliharaan.index')}}">Riwayat Pemeliharaan</a>
                </li>
                <li class="breadcrumb-item active">Tambah Riwayat Pemeliharaan</li>
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
                            Tambah Riwayat Pemeliharaan
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="{{route('riwayat-pemeliharaan.update',$jadwal->id)}}"
                                        enctype='multipart/form-data'>
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <select name="alat_id" id="alat_id" class="form-control">
                                                <option disabled selected value>Pilih Alat</option>
                                                @foreach ($alat as $a)
                                                <option value="{{$a->id}}" {{$jadwal->alat_id == $a->id ? "selected":""}} data-pic="{{$a->pic->nama}}"
                                                    data-kategori="{{$a->kategori->nama ?? "-" }}"> {{$a->alat_kode}} || {{$a->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kategori Alat</label>
                                            <input type="text" name="nama" value="{{$jadwal->alat->kategori->nama ?? ""}}" id="kategori" class="form-control"
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">PIC</label>
                                            <input type="text" name="pic_id" id="pic_id" class="form-control" value={{$jadwal->alat->pic->nama ?? "-"}}
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Tanggal Pengecekan</label>
                                            <input type="date" name="tanggal_pengecekan" class="form-control" id="" value="{{$jadwal->tanggal_pengecekan}}"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Jenis Pemeliharaan</label>
                                            @php
                                                $explode = explode(",",$jadwal->jenis_pemeliharaan);
                                                // dd($explode);
                                            @endphp
                                            <div class="container">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="jenis_pemeliharaan[]" 
                                                        value="Monitoring Alat" 
                                                        @foreach ($explode as $e)
                                                            @if ($e=="Monitoring Alat")
                                                                checked
                                                            @endif
                                                        @endforeach
                                                        
                                                        >
                                                    <label class="form-check-label" for="inlineCheckbox1">Monitoring Alat</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="jenis_pemeliharaan[]"
                                                        value="Cleaning"
                                                        @foreach ($explode as $e)
                                                            @if ($e=="Cleaning")
                                                                checked
                                                            @endif
                                                        @endforeach
                                                        >
                                                    <label class="form-check-label" for="inlineCheckbox2">Cleaning</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="jenis_pemeliharaan[]"
                                                        value="Oiling"
                                                        @foreach ($explode as $e)
                                                            @if ($e=="Oiling")
                                                                checked
                                                            @endif
                                                        @endforeach
                                                        
                                                        >
                                                    <label class="form-check-label" for="inlineCheckbox3">Oiling</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="jenis_pemeliharaan[]"
                                                        value="Penggantian Consumable Parts"
                                                        @foreach ($explode as $e)
                                                            @if ($e=="Penggantian Consumable Parts")
                                                                checked
                                                            @endif
                                                        @endforeach
                                                        
                                                        >
                                                    <label class="form-check-label" for="inlineCheckbox4">Penggantian Consumable Parts</label>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kondisi Alat</label>
                                            <select name="kondisi_alat" id="kondisi_alat" class="form-control">
                                                <option disabled selected value>Pilih Kondisi</option>
                                                <option value="Baik" {{$jadwal->kondisi_alat=="Baik" ? "selected":""}} >Baik</option>
                                                <option value="Rusak Ringan" {{$jadwal->kondisi_alat=="Rusak Ringan" ? "selected":""}}  >Rusak Ringan</option>
                                                <option value="Rusak Berat" {{$jadwal->kondisi_alat=="Rusak Berat" ? "selected":""}}  >Rusak Berat</option>
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
        $("#alat_id").change(function () {
            let el = $(this).find('option:selected');
            let val = el.attr("data-kategori")
            let pic = el.attr("data-pic")
            $("#pic_id").val(pic)
            $("#kategori").val(val)

        });

    </script>
    @endsection
