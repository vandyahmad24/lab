@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Riwayat Pemeliharaan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Riwayat Pemeliharaan</li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                    <a href="{{route('riwayat-pemeliharaan.create')}}" class="btn btn-success mb-2">Tambah Data Riwayat Pemeliharaan</a>
                   @endif
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Riwayat Pemeliharaan
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
                                            {{-- <th>PIC</th> --}}
                                            <th>Tanggal Pemeliharaan</th>
                                            {{-- <th>Jenis Pemeliharaan</th> --}}
                                            <th>Kondisi Alat</th>
                                            @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                            <th>Laporkan Kerusakan</th>
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jadwal as $a)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$a->alat->alat_kode}}</td>
                                            <td>{{$a->alat->nama ?? "-"}}</td>
                                            {{-- <td>{{$a->ata->pic->nama ?? "-"}}</td> --}}
                                            @php
                                            // $originalDate = $a->tanggal_kalibrasi."-"."01";
                                            $newDate = date("d-m-Y", strtotime($a->tanggal_pemeliharaan));
                                            // dd($newDate);
                                            @endphp
                                            <td>{{$newDate}}</td>
                                            {{-- <td>{{$a->jenis_pemeliharaan}}</td> --}}
                                            <td>{{$a->kondisi_alat}}</td>
                                            @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                            <td><a href="{{route('data-kerusakan.create',['alat_id'=>$a->alat->id])}}" class="btn btn-success btn-sm">Buat Laporan</a></td>
                                            <td>
                                                <a href="{{route('riwayat-pemeliharaan.edit',$a->id)}}"><i class="far fa-edit"></i></a>
                                                <a href="{{route('riwayat-pemeliharaan.hapus',$a->id)}}"><i class="fas fa-trash-alt"></i></a>
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
