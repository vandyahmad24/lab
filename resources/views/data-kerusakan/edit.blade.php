@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Kerusakan Alat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('data-kerusakan.index')}}">Kerusakan Alat</a></li>
                <li class="breadcrumb-item active">Edit Kerusakan Alat</li>
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
                            Edit Kerusakan Alat
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="{{route('data-kerusakan.update',$kerusakan->id)}}" enctype='multipart/form-data'>
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <select name="alat_id" id="alat_id" class="form-control">
                                                <option disabled selected value>Pilih Alat</option>
                                                @foreach ($alat as $a)
                                                    <option value="{{$a->id}}" data-kategori="{{$a->kategori->nama ?? "-" }}" {{$a->id==$kerusakan->alat_id ? "selected":"-"}} >{{$a->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kategori Alat</label>
                                            <input type="text" name="nama" id="kategori" class="form-control" id="" value={{$kerusakan->alat->kategori->id}}
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Nama PIC</label>
                                            <select name="pic_id" id="" class="form-control">
                                                <option disabled selected value>Pilih PIC</option>
                                                @foreach ($pic as $p)
                                                <option value="{{$p->id}}" {{$p->id==$kerusakan->pic_id ? "selected":"-"}}  >{{$p->nama}}</option> 
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Tanggal Temuan</label>
                                            <input type="date" name="tanggal_temuan" class="form-control" id="" value={{$kerusakan->tanggal_temuan}}
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Jenis Kerusakan</label>
                                            <textarea name="jenis_kerusakan" class="form-control" id="" cols="5" rows="5">{{$kerusakan->jenis_kerusakan}}</textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Akibat</label>
                                            <textarea name="akibat" class="form-control" id="" cols="5" rows="5">{{$kerusakan->akibat}}</textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Faktor</label>
                                            <textarea name="faktor" class="form-control" id="" cols="5" rows="5">{{$kerusakan->faktor}}</textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Rencana</label>
                                            <textarea name="rencana" class="form-control" id="" cols="5" rows="5">{{$kerusakan->rencana}}</textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Foto Fisik Kerusakan</label>
                                            <input type="file" name="foto" class="form-control" id=""
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Foto Lama</label>
                                            <br>
                                            <img src="{{asset('upload/'.$kerusakan->foto)}}" alt="" style="max-width:600px;width:100%">
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
