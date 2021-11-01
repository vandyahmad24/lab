@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Perbaiakn Alat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('data-perbaikan.index')}}">Perbaiakn Alat</a></li>
                <li class="breadcrumb-item active">Edit Perbaiakn Alat</li>
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
                            Edit Perbaiakn Alat
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="{{route('data-perbaikan.update',$perbaikan->id)}}" enctype='multipart/form-data'>
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <select name="alat_id" id="alat_id" class="form-control">
                                                <option disabled selected value>Pilih Alat</option>
                                                @foreach ($alat as $a)
                                                    <option value="{{$a->id}}" {{$a->id==$perbaikan->alat_id ? "selected":"-"}}  data-kategori="{{$a->kategori->nama ?? "-" }}" data-pic="{{$a->pic->nama}}" > {{$a->alat_kode}} || {{$a->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kategori Alat</label>
                                            <input type="text" name="nama" id="kategori" class="form-control" id="" value="{{$perbaikan->alat->kategori->nama ?? '-'}}"
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">PIC</label>
                                            <input type="text" name="pic_id" id="pic_id" class="form-control" id="" value="{{$perbaikan->alat->pic->nama ?? '-'}}"
                                                aria-describedby="emailHelp" readonly>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="">Tanggal Perbaikan</label>
                                            <input type="date" name="tanggal_perbaikan" class="form-control" id="" value="{{$perbaikan->tanggal_perbaikan}}"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Jenis Kerusakan</label>
                                            <textarea name="jenis_kerusakan" class="form-control" id="" cols="5" rows="5">{{$perbaikan->jenis_kerusakan}}</textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Jenis Perbaikan</label>
                                            <textarea name="jenis_perbaikan" class="form-control" id="" cols="5" rows="5">{{$perbaikan->jenis_perbaikan}}</textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Vendor/Supplier</label>
                                            <input type="text" name="vendor" class="form-control" id=""
                                                aria-describedby="emailHelp" value="{{$perbaikan->vendor}}">
                                        </div>
                                       
                                        <div class="form-group mb-2">
                                            <label for="">Bukti Perbaikan</label>
                                            <input type="file" name="bukti_perbaikan" class="form-control" id=""
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Foto Lama</label>
                                            <br>
                                            <img src="{{asset('upload/'.$perbaikan->bukti_perbaikan)}}" alt="" style="max-width:600px;width:100%">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kondisi Alat</label>
                                            <select name="kondisi_alat" id="" class="form-control">
                                                <option disabled selected value>Kondisi Alat</option>
                                                <option value="Baik" {{$perbaikan->kondisi_alat=="Baik" ? "selected":"-"}} >Baik</option>
                                                <option value="Rusak Ringan" {{$perbaikan->kondisi_alat=="Rusak Ringan" ? "selected":"-"}} >Rusak Ringan</option>
                                                <option value="Rusak Berat" {{$perbaikan->kondisi_alat=="Rusak Berat" ? "selected":"-"}} >Rusak Berat</option>
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
            let pic = el.attr("data-pic")
            $("#pic_id").val(pic)
           $("#kategori").val(val)

        });


    </script>
    @endsection
