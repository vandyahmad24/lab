@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Penerimaan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('penerimaan-bahan.index')}}">Penerimaan Bahan</a></li>
                <li class="breadcrumb-item active">Tambah Penerimaan</li>
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
                            Tambah Penerimaan
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="{{route('penerimaan-bahan.store')}}" enctype='multipart/form-data'>
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">Bahan</label>
                                            <select name="bahan_id" id="bahan_id" class="form-control">
                                                <option disabled selected value>Pilih Bahan</option>
                                                @foreach ($bahan as $a)
                                                {{-- @php
                                                    var_dump($a->bahan);
                                                @endphp --}}
                                                    <option value="{{$a->id}}" 
                                                      
                                                        data-alat="{{$a->alat->nama}}"
                                                        data-stok="{{$a->stok}}"
                                                        data-satuan="{{$a->satuan->nama}}"
                                                        data-penyimpanan="{{$a->KodePenyimpanan->nama}}"
                                                        
                                                    > {{$a->bahan_kode}} || {{$a->nama_bahan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <input type="text" id="nama_alat" class="form-control"
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Tanggal Penerimaan</label>
                                            <input type="date" name="tanggal_penerimaan" id="tanggal_penerimaan" class="form-control"
                                                aria-describedby="emailHelp" >
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Jumlah diterima</label>
                                            <input type="number"  name="jumlah_diterima"  id="jumlah_diterima" class="form-control"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Stok Bahan</label>
                                            <input type="text"  class="form-control" id="stok"
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Satuan</label>
                                            <input type="text"  class="form-control" id="satuan"
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kode Penyimpanan</label>
                                            <input type="text"  class="form-control" id="kode_penyimpanan"
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Total Stok</label>
                                            <input type="number"  class="form-control" id="total_stok"
                                                aria-describedby="emailHelp" readonly value="0">
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
        let total_stok=0
        $("#bahan_id").change(function(){
            let el = $(this).find('option:selected');
            let alat = el.attr("data-alat")
            let stok = el.attr("data-stok")
            let satuan = el.attr("data-satuan")
            let penyimpanan = el.attr("data-penyimpanan")
            
            $("#nama_alat").val(alat)
            $("#stok").val(stok)
            $("#satuan").val(satuan)
            $("#kode_penyimpanan").val(penyimpanan)
            $("#total_stok").val(stok)
            total_stok=stok

        });
        $("#jumlah_diterima").keyup(function(){
            val = $(this).val();
            hasil = total_stok-val;
            $("#total_stok").val(hasil)
            console.log(hasil)
        });

    </script>
    @endsection
