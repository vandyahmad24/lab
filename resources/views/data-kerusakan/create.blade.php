@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Kerusakan Alat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('data-kerusakan.index')}}">Kerusakan Alat</a></li>
                <li class="breadcrumb-item active">Tambah Kerusakan Alat</li>
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
                            Tambah Kerusakan Alat
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="{{route('data-kerusakan.store')}}" enctype='multipart/form-data'>
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <select name="alat_id" id="alat_id" class="form-control">
                                                <option disabled selected value>Pilih Alat</option>
                                                @foreach ($alat as $a)
                                                    <option value="{{$a->id}}"
                                                        @if ($alat_ada!=null)
                                                        {{$a->id==$alat_ada->id ? "selected":""}}
                                                        @endif
                                                        data-pic={{$a->pic->nama}}  data-kategori="{{$a->kategori->nama ?? "-" }}"> {{$a->alat_kode}} || {{$a->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kategori Alat</label>
                                            <input type="text" name=""
                                            @if ($alat_ada!=null)
                                                value="{{$alat_ada->kategori->nama}}"
                                            @endif
                                            id="kategori" class="form-control" id=""
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">PIC</label>
                                            <input type="text" name="pic_id"
                                            @if ($alat_ada!=null)
                                                value="{{$alat_ada->pic->nama}}"
                                            @endif
                                            id="pic_id" class="form-control" id=""
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Tanggal Temuan</label>
                                            <input type="date" name="tanggal_temuan" class="form-control" id=""
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Jenis Kerusakan</label>
                                            <textarea name="jenis_kerusakan" class="form-control" id="" cols="5" rows="5"></textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Akibat</label>
                                            <textarea name="akibat" class="form-control" id="" cols="5" rows="5"></textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Faktor</label>
                                            <textarea name="faktor" class="form-control" id="" cols="5" rows="5"></textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Rencana</label>
                                            <textarea name="rencana" class="form-control" id="" cols="5" rows="5"></textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Foto Fisik Kerusakan</label>
                                            <input type="file" name="foto" class="form-control" id=""
                                                aria-describedby="emailHelp">
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
