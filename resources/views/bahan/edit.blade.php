@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Bahan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('bahan.index')}}">Bahan</a></li>
                <li class="breadcrumb-item active">Edit Bahan</li>
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
                            Edit Bahan
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="{{route('bahan.update',$bahan->id)}}" enctype='multipart/form-data'>
                                        @csrf
                                        @method('PUT')
                                        {{-- <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <select name="alat_id" id="alat_id" class="form-control">
                                                <option disabled selected value>Pilih Alat</option>
                                                @foreach ($alat as $a)
                                                    <option value="{{$a->id}}" data-pic={{$a->pic->nama}}  data-kategori="{{$a->kategori->nama ?? "-" }}"> {{$a->alat_kode}} || {{$a->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                        <div class="form-group mb-2">
                                            <label for="">Bahan ID</label>
                                            <input type="text" name="bahan_kode" class="form-control" id=""
                                                aria-describedby="emailHelp" value="{{$bahan->bahan_kode}}"  readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Nama Bahan</label>
                                            <input type="text" name="nama_bahan" value="{{$bahan->nama_bahan}}" class="form-control" id=""
                                                aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <select name="alat_id" id="alat_id" class="form-control">
                                                <option disabled selected value>Pilih Alat</option>
                                                @foreach ($alat as $a)
                                                    <option value="{{$a->id}}" {{$a->id==$bahan->alat_id?"selected":""}} > {{$a->alat_kode}} || {{$a->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Stok</label>
                                            <input type="number" name="stok" value="{{$bahan->stok}}" class="form-control" id=""
                                                aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Satuan</label>
                                            <select name="satuan_id" id="satuan_id" class="form-control">
                                                <option disabled selected value>Pilih Satuan</option>
                                                @foreach ($satuan as $a)
                                                    <option value="{{$a->id}}"  {{$a->id==$bahan->satuan_id?"selected":""}}  > {{$a->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kode Penyimpanan</label>
                                            <select name="kode_penyimpanan_id" id="kode_penyimpanan_id" class="form-control">
                                                <option disabled selected value>Pilih Kode Penyimpanan</option>
                                                @foreach ($kode as $a)
                                                    <option value="{{$a->id}}" {{$a->id==$bahan->kode_penyimpanan_id?"selected":""}} > {{$a->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Limit</label>
                                            <input type="number" name="limit" class="form-control" id=""
                                                aria-describedby="emailHelp" value="{{$bahan->limit}}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Merek</label>
                                            <input type="text" name="merek" class="form-control" id=""
                                                aria-describedby="emailHelp" value="{{$bahan->merek}}" required>
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

        // $("#alat_id").change(function(){
        //     let el = $(this).find('option:selected');
        //     let val = el.attr("data-kategori")
        //     let pic = el.attr("data-pic")
        //     $("#pic_id").val(pic)
        //    $("#kategori").val(val)

        // });


    </script>
    @endsection
