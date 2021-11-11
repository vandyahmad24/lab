@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Penggunaan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('penggunaan-bahan.index')}}">Penggunaan Bahan</a></li>
                <li class="breadcrumb-item active">Tambah Penggunaan</li>
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
                            Tambah Penggunaan
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="{{route('penggunaan-bahan.update',$pen->id)}}" enctype='multipart/form-data'>
                                       @method('PUT')
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">Bahan</label>
                                            <input type="text" value="{{$pen->bahan->nama_bahan}}" id="nama_alat" class="form-control"
                                            aria-describedby="emailHelp" readonly>
                                            {{-- <select name="bahan_id" id="bahan_id" class="form-control">
                                                <option disabled selected value>Pilih Bahan</option>
                                                @foreach ($bahan as $a)
                                                    <option value="{{$a->id}}" 
                                                      
                                                        data-alat="{{$a->alat->nama}}"
                                                        data-stok="{{$a->stok}}"
                                                        data-satuan="{{$a->satuan->nama}}"
                                                        data-penyimpanan="{{$a->KodePenyimpanan->nama}}"
                                                        
                                                    > {{$a->bahan_kode}} || {{$a->nama_bahan}}</option>
                                                @endforeach
                                            </select> --}}
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <input type="text" id="nama_alat" value="{{$bahan->alat->nama}}" class="form-control"
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Tanggal Digunakan</label>
                                            <input type="date" name="tanggal_digunakan" id="tanggal_penerimaan" class="form-control"
                                                aria-describedby="emailHelp" value="{{$pen->tanggal_digunakan}}" >
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Jumlah Digunakan</label>
                                            <input type="number"  name="jumlah_digunakan"  id="jumlah_diterima" class="form-control"
                                                aria-describedby="emailHelp" value="{{$pen->jumlah_digunakan}}" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Stok Bahan Sekarang</label>
                                            <input type="text" value="{{$bahan->stok}}" class="form-control" id="stok"
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Satuan</label>
                                            <input type="text" value="{{$bahan->satuan->nama}}"  class="form-control" id="satuan"
                                                aria-describedby="emailHelp" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kode Penyimpanan</label>
                                            <input type="text" value="{{$bahan->kodePenyimpanan->nama}}"  class="form-control" id="kode_penyimpanan"
                                                aria-describedby="emailHelp" readonly>
                                        </div>      
                                        <div class="form-group mb-2">
                                            <label for="">Merek</label>
                                            <input type="text" readonly  class="form-control" id="merek"
                                                aria-describedby="emailHelp" value="{{$bahan->merek}}" >
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
        // let total_stok=0
        // $("#bahan_id").change(function(){
        //     let el = $(this).find('option:selected');
        //     let alat = el.attr("data-alat")
        //     let stok = el.attr("data-stok")
        //     let satuan = el.attr("data-satuan")
        //     let penyimpanan = el.attr("data-penyimpanan")
            
        //     $("#nama_alat").val(alat)
        //     $("#stok").val(stok)
        //     $("#satuan").val(satuan)
        //     $("#kode_penyimpanan").val(penyimpanan)
        //     $("#total_stok").val(stok)
        //     total_stok=stok

        // });
        // $("#jumlah_diterima").keyup(function(){
        //     val = $(this).val();
        //     hasil = total_stok-val;
        //     $("#total_stok").val(hasil)
        //     console.log(hasil)
        // });

    </script>
    @endsection
