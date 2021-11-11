@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Alat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('alat.index')}}">Alat</a></li>
                <li class="breadcrumb-item active">Tambah Alat</li>
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
                            Tambah alat
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form method="POST" action="{{route('alat.store')}}" enctype='multipart/form-data'>
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">ID Alat</label>
                                            <input type="text" name="alat_kode" class="form-control" id=""
                                                aria-describedby="emailHelp"  required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <input type="text" name="nama" class="form-control" id=""
                                                aria-describedby="emailHelp"  required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="kategori">Kategori Alat</label>
                                            <select class="form-control" id="kategori" name="kategori_id">
                                                @foreach ($kategori as $k)
                                                <option value="{{$k->id}}">{{$k->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Merek</label>
                                            <input type="text" name="merek" class="form-control" id=""
                                                aria-describedby="emailHelp" placeholder="Merek" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Tipe</label>
                                            <input type="text" name="tipe" class="form-control" id=""
                                                aria-describedby="emailHelp" placeholder="tipe" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Nomer Seri</label>
                                            <input type="text" name="no_seri" class="form-control" id=""
                                                aria-describedby="emailHelp" placeholder="Nomer Seri" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Software</label>
                                            <input type="text" name="software" class="form-control" id=""
                                                aria-describedby="emailHelp" placeholder="Software" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Tahun Perolehan</label>
                                            <input type="number" name="tahun_perolehan" class="form-control" id=""
                                                aria-describedby="emailHelp" placeholder="Tahun Perolehan" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="lokasi">Lokasi Alat</label>
                                            <select class="form-control" id="lokasi" name="lokasi_id">
                                                @foreach ($lokasi as $k)
                                                <option value="{{$k->id}}"> {{$k->kode}} || {{$k->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kondisi Alat</label>
                                                <select name="kondisi" required id="" class="form-control">
                                                    <option disabled selected value>Kondisi Alat</option>
                                                    <option value="Baik">Baik</option>
                                                    <option value="Rusak Ringan">Rusak Ringan</option>
                                                    <option value="Rusak Berat">Rusak Berat</option>
                                                </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="status_pengunaan">Status Penggunaan</label>
                                            <select class="form-control" id="status_pengunaan" name="status_pengunaan">
                                               
                                                <option value="aktif">Aktif</option>
                                                <option value="tidak-aktif">Tidak Aktif</option>
                                               
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Status Kalibrasi</label>
                                            <input type="text" name="kalibrasi" value="-" class="form-control" readonly>
                                            {{-- <select name="kalibrasi" id="" class="form-control">
                                                <option value="proses-kalibrasi">Proses Kalibrasi</option>
                                                <option value="selesai">Selesai</option>
                                                <option value="tidak-dapat-diproses">Tidak Dapat diproses</option>
                                            </select> --}}
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="periode_pemeliharaan">Periode Pemeliharaan</label>
                                            <select class="form-control" id="periode_pemeliharaan" name="periode_pemeliharaan">
                                                
                                                @php
                                                    // $i=1;
                                                    for($i=1; $i<=12; $i++){
                                                        echo "<option value='$i'>$i</option>";
                                                    }
                                                @endphp
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="periode_kalibrasi">Periode Kalibrasi</label>
                                            <select class="form-control" id="periode_kalibrasi" name="periode_kalibrasi">
                                                
                                                @php
                                                    // $i=1;
                                                    for($i=1; $i<=12; $i++){
                                                        echo "<option value='$i'>$i</option>";
                                                    }
                                                @endphp
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="ik_alat">IK Alat</label>
                                            <select class="form-control" id="ik_alat" name="ik_alat">
                                               
                                                <option value="ada">Ada</option>
                                                <option value="tidak">Tidak</option>
                                               
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="manual_book">Manual Alat</label>
                                            <select class="form-control" id="manual_book" name="manual_book">
                                               
                                                <option value="ada">Ada</option>
                                                <option value="tidak">Tidak</option>
                                               
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="pic">PIC</label>
                                            <select class="form-control" id="pic" name="pic_id">
                                                @foreach ($pic as $k)
                                                <option value="{{$k->id}}">{{$k->nama}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                        

                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                  
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label for="">Komponen Alat</label> 
                                        <input type="text"  class="demo-default input-tag" value="" name="komponen_alat" required>		
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Bahan Habis Pakai</label>
                                        <input type="text" class="demo-default input-tag" value="" name="bahan_habis_pakai" required>	
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Foto Alat</label>
                                        <input type="file" name="foto" class="form-control" id=""
                                            aria-describedby="emailHelp"  required>
                                        </div>
                                    </form>
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
     
    
    

    </script>
    @endsection
