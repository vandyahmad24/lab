@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Alat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('alat.index')}}">Alat</a></li>
                <li class="breadcrumb-item active">Data Alat {{$alat->nama}}</li>
            </ol>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('alat.cetak',$alat->id)}}" class="btn btn-primary">Cetak</a>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Alat {{$alat->nama}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="#" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>ID Alat</th>
                                            <td>{{$alat->alat_kode}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td>{{ucwords($alat->nama)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Kategori</th>
                                            <td>{{ucwords($alat->kategori->nama) ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <th>Merek</th>
                                            <td>{{ucwords($alat->merek)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tipe</th>
                                            <td>{{ucwords($alat->tipe)}}</td>
                                        </tr>
                                        <tr>
                                            <th>No Seri</th>
                                            <td>{{$alat->no_seri}}</td>
                                        </tr>
                                        <tr>
                                            <th>Software</th>
                                            <td>{{ucwords($alat->software)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tahun Perolehan</th>
                                            <td>{{ucwords($alat->tahun_perolehan)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Lokasi</th>
                                            <td> {{$alat->lokasi->kode ?? '-'}} || {{$alat->lokasi->nama ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <th>kondisi</th>
                                            <td>{{ucwords($alat->kondisi)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status Pengunaan</th>
                                            <td>{{ucwords($alat->status_pengunaan)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Kalibrasi </th>
                                            <td>{{ucwords($alat->kalibrasi)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Periode Pemeliharaan </th>
                                            <td>{{ucwords($alat->periode_pemeliharaan)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Periode Kalibrasi </th>
                                            <td>{{ucwords($alat->periode_kalibrasi)}}</td>
                                        </tr>
                                        <tr>
                                            <th>IK Alat </th>
                                            <td>{{ucwords($alat->ik_alat)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Manual Book </th>
                                            <td>{{ucwords($alat->manual_book)}}</td>
                                        </tr>
                                        <tr>
                                            <th>PIC </th>
                                            <td>{{ucwords($alat->pic->nama) ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <th>Komponen Alat </th>
                                            @php
                                            $komponen = explode(',',$alat->komponen_alat);
                                            @endphp
                                            <td>
                                                <ol>
                                                    @foreach ($komponen as $kom)
                                                    <li>{{ucwords($kom)}}</li>
                                                    @endforeach

                                                </ol>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Bahan Habis Pakai </th>
                                            @php
                                            $bahan = explode(',',$alat->bahan_habis_pakai);
                                            @endphp
                                            <td>
                                                <ol>
                                                    @foreach ($bahan as $b)
                                                    <li>{{ucwords($b)}}</li>
                                                    @endforeach

                                                </ol>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Foto</th>
                                            <td>

                                                <img src="{{asset('upload/'.$alat->foto)}}" alt=""
                                                    style="max-width:600px;width:100%">
                                            </td>
                                        </tr>




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    @endsection
