@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Riwayat Kalibrasi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Riwayat Kalibrasi</li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                    <a href="{{route('riwayat-kalibrasi.create')}}" class="btn btn-success mb-2">Tambah Data Riwayat Kalibrasi</a>
                    @endif
                    <a href="{{route('riwayat-kalibrasi.cetak')}}" class="btn btn-primary mb-2">Cetak</a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Riwayat Kalibrasi
                        </div>
                        <div class="card-body">
                            @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table id="#" class="datatables">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Alat</th>
                                            <th>Alat</th>
                                            <th>Jenis Kalibrasi</th>
                                            <th>Tanggal Kalibrasi</th>
                                            <th>Remark</th>
                                            <th>Sertifikat</th>
                                            @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jadwal as $a)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$a->alat->alat_kode ?? "-"}}</td>
                                            <td>{{$a->alat->nama ?? "-"}}</td>
                                            <td>{{ucwords($a->jenis_kalibrasi)}}</td>
                                            @php
                                            $originalDate = $a->tanggal_kalibrasi."-"."01";
                                            $newDate = date("m-Y", strtotime($originalDate));
                                            // dd($newDate);
                                            @endphp
                                            <td>{{$newDate}}</td>
                                            <td>{{$a->remark}}</td>
                                            <td>
                                                @if ($a->sertifikat)
                                                   <a href="{{asset('upload/'.$a->sertifikat)}}" class="btn btn-primary" download>Lihat Sertifikat</a>
                                                @else
                                                <a href="{{route('riwayat-kalibrasi.edit',$a->id)}}" class="btn btn-warning btn-sm">Belum Upload Sertifikat</a>
                                                @endif
                                                {{-- {{$a->sertifikat}} --}}
                                            </td>
                                            @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                            <td>
                                                <a href="{{route('riwayat-kalibrasi.edit',$a->id)}}"><i class="far fa-edit"></i></a>
                                                <a href="{{route('riwayat-kalibrasi.hapus',$a->id)}}"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach



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
