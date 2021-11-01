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
                                            <label for="">Alat ID</label>
                                            <input type="text" name="alat_kode" class="form-control" id=""
                                                aria-describedby="emailHelp" value="{{$alat->alat_kode}}" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Nama Alat</label>
                                            <input type="text" name="nama" value="{{$alat->nama}}" class="form-control"
                                                id="" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="kategori">Kategori alat</label>
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
                                            <label for="">Nomer seri</label>
                                            <input type="number" name="no_seri" value="{{$alat->no_seri}}"
                                                class="form-control" id="" aria-describedby="emailHelp"
                                                placeholder="Nomer seri" required>
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
                                            <label for="lokasi">Lokasi alat</label>
                                            <select class="form-control" id="lokasi" name="lokasi_id">
                                                @foreach ($lokasi as $k)
                                                <option value="{{$k->id}}"
                                                    {{ $k->lokasi==$alat->lokasi ? 'selected':'' }}>{{$k->nama}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kondisi alat</label>
                                            <input type="text" name="kondisi" value="{{$alat->kondisi}}"
                                                class="form-control" id="" aria-describedby="emailHelp"
                                                placeholder="Kondisi alat" required>
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
                                            <input type="text" name="kalibrasi" value="{{$alat->kalibrasi}}"
                                                class="form-control" id="" aria-describedby="emailHelp"
                                                placeholder="Status Kalibrasi alat" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="periode_pemeliharaan">Periode Pemeliharaan</label>
                                            <select class="form-control" id="periode_pemeliharaan"
                                                name="periode_pemeliharaan">
                                                <option value="Januari" {{
                                                $alat->periode_pemeliharaan=="Januari" ? 'selected':'' }}>Januari
                                                </option>
                                                <option value="Februari"
                                                    {{$alat->periode_pemeliharaan=="Februari" ? 'selected':'' }}>
                                                    Februari</option>
                                                <option value="Maret"
                                                    {{$alat->periode_pemeliharaan=="Maret" ? 'selected':'' }}>Maret
                                                </option>
                                                <option value="April"
                                                    {{$alat->periode_pemeliharaan=="April" ? 'selected':'' }}>April
                                                </option>
                                                <option value="Mei"
                                                    {{$alat->periode_pemeliharaan=="Mei" ? 'selected':'' }}>Mei</option>
                                                <option value="Juni"
                                                    {{$alat->periode_pemeliharaan=="Juni" ? 'selected':'' }}>Juni
                                                </option>
                                                <option value="Juli"
                                                    {{$alat->periode_pemeliharaan=="Juli" ? 'selected':'' }}>Juli
                                                </option>
                                                <option value="Agustus"
                                                    {{$alat->periode_pemeliharaan=="Agustus" ? 'selected':'' }}>Agustus
                                                </option>
                                                <option value="September"
                                                    {{$alat->periode_pemeliharaan=="September" ? 'selected':'' }}>
                                                    September</option>
                                                <option value="Oktober"
                                                    {{$alat->periode_pemeliharaan=="Oktober" ? 'selected':'' }}>Oktober
                                                </option>
                                                <option value="November"
                                                    {{$alat->periode_pemeliharaan=="November" ? 'selected':'' }}>
                                                    November</option>
                                                <option value="Desember"
                                                    {{$alat->periode_pemeliharaan=="Desember" ? 'selected':'' }}>
                                                    Desember</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="periode_kalibrasi">Periode Kalibrasi</label>
                                            <select class="form-control" id="periode_kalibrasi"
                                                name="periode_kalibrasi">
                                                <option value="Januari" {{
                                                 $alat->periode_kalibrasi=="Januari" ? 'selected':'' }}>Januari
                                                </option>
                                                <option value="Februari"
                                                    {{$alat->periode_kalibrasi=="Februari" ? 'selected':'' }}>Februari
                                                </option>
                                                <option value="Maret"
                                                    {{$alat->periode_kalibrasi=="Maret" ? 'selected':'' }}>Maret
                                                </option>
                                                <option value="April"
                                                    {{$alat->periode_kalibrasi=="April" ? 'selected':'' }}>April
                                                </option>
                                                <option value="Mei"
                                                    {{$alat->periode_kalibrasi=="Mei" ? 'selected':'' }}>Mei</option>
                                                <option value="Juni"
                                                    {{$alat->periode_kalibrasi=="Juni" ? 'selected':'' }}>Juni</option>
                                                <option value="Juli"
                                                    {{$alat->periode_kalibrasi=="Juli" ? 'selected':'' }}>Juli</option>
                                                <option value="Agustus"
                                                    {{$alat->periode_kalibrasi=="Agustus" ? 'selected':'' }}>Agustus
                                                </option>
                                                <option value="September"
                                                    {{$alat->periode_kalibrasi=="September" ? 'selected':'' }}>September
                                                </option>
                                                <option value="Oktober"
                                                    {{$alat->periode_kalibrasi=="Oktober" ? 'selected':'' }}>Oktober
                                                </option>
                                                <option value="November"
                                                    {{$alat->periode_kalibrasi=="November" ? 'selected':'' }}>November
                                                </option>
                                                <option value="Desember"
                                                    {{$alat->periode_kalibrasi=="Desember" ? 'selected':'' }}>Desember
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="ik_alat">Ik Alat</label>
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
                                            <label for="pic">Pic</label>
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
