@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Jadwal Kalibrasi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Jadwal Kalibrasi</li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                    <a href="{{route('jadwal-kalibrasi.create')}}" class="btn btn-success mb-2">Tambah Data Jadwal Kalibrasi</a>
                    @endif
                    <a href="{{route('jadwal-kalibrasi.cetak')}}" class="btn btn-primary mb-2">Cetak</a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Jadwal Kalibrasi
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
                                            <th>Kategori Alat</th>
                                            <th>Jenis Kalibrasi</th>
                                            <th>Tanggal Kalibrasi</th>
                                            <th>Status Proses Kalibrasi</th>
                                            @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jadwal as $a)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$a->alat_id}}</td>
                                            <td>{{$a->alat->nama ?? "-"}}</td>
                                            <td>{{$a->alat->kategori->nama ?? "-"}}</td>
                                            <td>{{$a->jenis_kalibrasi}}</td>
                                            @php
                                            $originalDate = $a->tanggal_kalibrasi."-"."01";
                                            $newDate = date("m-Y", strtotime($originalDate));
                                            // dd($newDate);
                                            @endphp
                                            <td>{{$newDate}}</td>
                                            @php
                                            switch ($a->status_kalibrasi) {
                                                case 'proses-kalibrasi':
                                                    $stat = "Proses Kalibrasi";
                                                    break;
                                                case 'selesai':
                                                    $stat = "Selesai";
                                                    break;
                                                case 'tidak-dapat-diproses':
                                                    $stat = "Tidak Dapat Diproses";
                                                    break;
                                                case 'terjadwal':
                                                    $stat = "Terjadwal";
                                                    break;
                                                
                                                default:
                                                    $stat="";
                                                    break;
                                            }
                                            @endphp
                                            <td>{{$stat}}</td>
                                            <td>
                                                @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                                <a href="{{route('jadwal-kalibrasi.edit',$a->id)}}"><i class="far fa-edit"></i></a>
                                                <a href="{{route('jadwal-kalibrasi.hapus',$a->id)}}"><i class="fas fa-trash-alt"></i></a>
                                                @endif
                                            </td>
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
