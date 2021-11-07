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
                                    <form method="POST" action="{{route('alat.update',$alat->alat_kode)}}" enctype='multipart/form-data'>
                                        @method("PUT")
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">ID Alat</label>
                                            <input type="text" name="alat_kode" class="form-control" id=""
                                                aria-describedby="emailHelp" value="{{$alat->alat_kode}}" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <input type="text" name="nama" value="{{$alat->nama}}" class="form-control"
                                                id="" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="kategori">Kategori Alat</label>
                                            <select class="form-control" id="kategori" name="kategori_id">
                                                @foreach ($kategori as $k)
                                                <option value="{{$k->id}}" {{ $k->id==$alat->id ? 'selected':'' }}>
                                                    {{$k->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Merek</label>
                                            <input type="text" name="merek" value="{{$alat->merek}}"
                                                class="form-control" id="" aria-describedby="emailHelp"
                                                placeholder="Merek" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Tipe</label>
                                            <input type="text" name="tipe" value="{{$alat->tipe}}" class="form-control"
                                                id="" aria-describedby="emailHelp" placeholder="tipe" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Nomer Seri</label>
                                            <input type="number" name="no_seri" value="{{$alat->no_seri}}"
                                                class="form-control" id="" aria-describedby="emailHelp"
                                                placeholder="Nomer Seri" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Software</label>
                                            <input type="text" name="software" value="{{$alat->software}}"
                                                class="form-control" id="" aria-describedby="emailHelp"
                                                placeholder="Software" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Tahun Perolehan</label>
                                            <input type="number" name="tahun_perolehan"
                                                value="{{$alat->tahun_perolehan}}" class="form-control" id=""
                                                aria-describedby="emailHelp" placeholder="Tahun Perolehan" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="lokasi">Lokasi Alat</label>
                                            <select class="form-control" id="lokasi" name="lokasi_id">
                                                @foreach ($lokasi as $k)
                                                <option value="{{$k->id}}"
                                                    {{ $k->lokasi==$alat->lokasi ? 'selected':'' }}>{{$k->nama}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kondisi Alat</label>
                                            
                                                <select name="kondisi" required id="" class="form-control">
                                                    <option disabled selected value>Kondisi Alat</option>
                                                    <option value="Baik" {{$alat->kondisi=="Baik" ? "selected":""}} >Baik</option>
                                                    <option value="Rusak Ringan" {{$alat->kondisi=="Rusak Ringan" ? "selected":""}} >Rusak Ringan</option>
                                                    <option value="Rusak Berat" {{$alat->kondisi=="Rusak Berat" ? "selected":""}} >Rusak Berat</option>
                                                </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="status_pengunaan">Status Penggunaan</label>
                                            <select class="form-control" id="status_pengunaan" name="status_pengunaan">

                                                <option value="aktif"
                                                    {{ $alat->status_pengunaan=="aktif" ? 'selected':'' }}>Aktif
                                                </option>
                                                <option value="tidak-aktif"
                                                    {{$alat->status_pengunaan=="tidak-aktif" ? 'selected':'' }}>Tidak
                                                    Aktif</option>

                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Status Kalibrasi</label>
                                            <select name="kalibrasi" id="" class="form-control">
                                                <option value="proses-kalibrasi" {{$alat->kalibrasi == "proses-kalibrasi" ? "selected":""}} >Proses Kalibrasi</option>
                                                <option value="selesai" {{$alat->kalibrasi == "selesai" ? "selected":""}}>Selesai</option>
                                                <option value="tidak-dapat-diproses" {{$alat->kalibrasi == "tidak-dapat-diproses" ? "selected":""}}>Tidak Dapat diproses</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="periode_pemeliharaan">Periode Pemeliharaan</label>
                                            <select class="form-control" id="periode_pemeliharaan"
                                                name="periode_pemeliharaan">
                                                <option value="1" {{
                                                    $alat->periode_pemeliharaan=="1" ? 'selected':'' }}>1
                                                    </option>
                                                    <option value="2"
                                                        {{$alat->periode_pemeliharaan=="2" ? 'selected':'' }}>
                                                        2</option>
                                                    <option value="3"
                                                        {{$alat->periode_pemeliharaan=="3" ? 'selected':'' }}>3
                                                    </option>
                                                    <option value="4"
                                                        {{$alat->periode_pemeliharaan=="4" ? 'selected':'' }}>4
                                                    </option>
                                                    <option value="5"
                                                        {{$alat->periode_pemeliharaan=="5" ? 'selected':'' }}>5</option>
                                                    <option value="6"
                                                        {{$alat->periode_pemeliharaan=="6" ? 'selected':'' }}>6
                                                    </option>
                                                    <option value="7"
                                                        {{$alat->periode_pemeliharaan=="7" ? 'selected':'' }}>7
                                                    </option>
                                                    <option value="8"
                                                        {{$alat->periode_pemeliharaan=="8" ? 'selected':'' }}>8
                                                    </option>
                                                    <option value="9"
                                                        {{$alat->periode_pemeliharaan=="9" ? 'selected':'' }}>
                                                        9</option>
                                                    <option value="10"
                                                        {{$alat->periode_pemeliharaan=="10" ? 'selected':'' }}>10
                                                    </option>
                                                    <option value="11"
                                                        {{$alat->periode_pemeliharaan=="11" ? 'selected':'' }}>
                                                        11</option>
                                                    <option value="12"
                                                        {{$alat->periode_pemeliharaan=="12" ? 'selected':'' }}>
                                                        12</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="periode_kalibrasi">Periode Kalibrasi</label>
                                            <select class="form-control" id="periode_kalibrasi"
                                                name="periode_kalibrasi">
                                                <option value="1" {{
                                                    $alat->periode_kalibrasi=="1" ? 'selected':'' }}>1
                                                    </option>
                                                    <option value="2"
                                                        {{$alat->periode_kalibrasi=="2" ? 'selected':'' }}>
                                                        2</option>
                                                    <option value="3"
                                                        {{$alat->periode_kalibrasi=="3" ? 'selected':'' }}>3
                                                    </option>
                                                    <option value="4"
                                                        {{$alat->periode_kalibrasi=="4" ? 'selected':'' }}>4
                                                    </option>
                                                    <option value="5"
                                                        {{$alat->periode_kalibrasi=="5" ? 'selected':'' }}>5</option>
                                                    <option value="6"
                                                        {{$alat->periode_kalibrasi=="6" ? 'selected':'' }}>6
                                                    </option>
                                                    <option value="7"
                                                        {{$alat->periode_kalibrasi=="7" ? 'selected':'' }}>7
                                                    </option>
                                                    <option value="8"
                                                        {{$alat->periode_kalibrasi=="8" ? 'selected':'' }}>8
                                                    </option>
                                                    <option value="9"
                                                        {{$alat->periode_kalibrasi=="9" ? 'selected':'' }}>
                                                        9</option>
                                                    <option value="10"
                                                        {{$alat->periode_kalibrasi=="10" ? 'selected':'' }}>10
                                                    </option>
                                                    <option value="11"
                                                        {{$alat->periode_kalibrasi=="11" ? 'selected':'' }}>
                                                        11</option>
                                                    <option value="12"
                                                        {{$alat->periode_kalibrasi=="12" ? 'selected':'' }}>
                                                        12</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="ik_alat">IK Alat</label>
                                            <select class="form-control" id="ik_alat" name="ik_alat">

                                                <option value="ada" {{$alat->ik_alat=="ada" ? "selected":""}}>Ada
                                                </option>
                                                <option value="tidak" {{$alat->ik_alat=="tidak" ? "selected":""}}>Tidak
                                                </option>

                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="manual_book">Manual Alat</label>
                                            <select class="form-control" id="manual_book" name="manual_book">

                                                <option value="ada" {{$alat->ik_alat=="ada" ? "selected":""}}>Ada
                                                </option>
                                                <option value="tidak" {{$alat->ik_alat=="tidak" ? "selected":""}}>Tidak
                                                </option>

                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="pic">PIC</label>
                                            <select class="form-control" id="pic" name="pic_id">
                                                @foreach ($pic as $k)
                                                <option value="{{$k->id}}" {{$k->id == $alat->pic_id ? "selected":""}}>
                                                    {{$k->nama}}</option>
                                                @endforeach

                                            </select>
                                        </div>


                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label for="">Komponen Alat</label>
                                        <input type="text" class="demo-default input-tag"
                                            value="{{$alat->komponen_alat}}" name="komponen_alat">

                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="">Bahan Habis Pakai</label>
                                        <input type="text" class="demo-default input-tag"
                                            value="{{$alat->bahan_habis_pakai}}" name="bahan_habis_pakai">

                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Foto Alat</label>
                                        <input type="file" name="foto" class="form-control" id=""
                                            aria-describedby="emailHelp" >
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Foto Lama</label>
                                        <img src="{{asset('upload/'.$alat->foto)}}" alt="" style="max-width:600px;width:100%">
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
        $(".input1").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
        $(".input2").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })

    </script>
    @endsection
