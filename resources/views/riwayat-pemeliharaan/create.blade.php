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
                                    <form method="POST" action="{{route('riwayat-pemeliharaan.store')}}"
                                        enctype='multipart/form-data'>
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <select name="alat_id" id="alat_id" class="form-control">
                                                <option disabled selected value>Pilih Alat</option>
                                                @foreach ($alat as $a)
                                                <option value="{{$a->id}}" data-pic="{{$a->pic->nama}}"
                                                    data-kategori="{{$a->kategori->nama ?? "-" }}"> {{$a->alat_kode}} || {{$a->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kategori Alat</label>
                                            <input type="text" name="nama" id="kategori" class="form-control"
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">PIC</label>
                                            <input type="text" name="pic_id" id="pic_id" class="form-control"
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        {{-- <div class="form-group mb-2">
                                            <label for="">PIC</label>
                                            <select name="pic_id" id="pic_id" class="form-control">
                                                <option disabled selected value>Pilih Pic</option>
                                                @foreach ($pic as $p)
                                                <option value="{{$p->id}}">{{$p->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                        <div class="form-group mb-2">
                                            <label for="">Tanggal Pengecekan</label>
                                            <input type="date" name="tanggal_pengecekan" class="form-control" id=""
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Jenis Pemeliharaan</label>
                                            <div class="container">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="jenis_pemeliharaan[]"
                                                        value="Monitoring Alat">
                                                    <label class="form-check-label" for="inlineCheckbox1">Monitoring Alat</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="jenis_pemeliharaan[]"
                                                        value="Cleaning">
                                                    <label class="form-check-label" for="inlineCheckbox2">Cleaning</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="jenis_pemeliharaan[]"
                                                        value="Oiling">
                                                    <label class="form-check-label" for="inlineCheckbox3">Oiling</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="jenis_pemeliharaan[]"
                                                        value="Penggantian Consumable Parts">
                                                    <label class="form-check-label" for="inlineCheckbox4">Penggantian Consumable Parts</label>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kondisi Alat</label>
                                            <select name="kondisi_alat" id="kondisi_alat" class="form-control">
                                                <option disabled selected value>Pilih Kondisi</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Rusak Ringan">Rusak Ringan</option>
                                                <option value="Rusak Berat">Rusak Berat</option>
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
