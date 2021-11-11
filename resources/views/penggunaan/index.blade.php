@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Penggunaan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Penggunaan</li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                    <a href="{{route('penggunaan-bahan.create')}}" class="btn btn-success mb-2">Tambah Data Penggunaan</a>
                    @endif
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Penggunaan
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
                                            <th>ID Bahan</th>
                                            <th>Nama Bahan</th>
                                            <th>Kode Penyimpanan</th>
                                            <th>Tanggal Penggunaan</th>
                                            <th>Jumlah digunakan</th>
                                            <th>Satuan</th>
                                            <th>Merek</th>
                                            @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($penerimaan as $a)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$a->bahan->bahan_kode ?? "-"}}</td>
                                            <td>{{$a->bahan->nama_bahan ?? "-"}}</td>
                                            <td>{{$a->bahan->KodePenyimpanan->nama ?? "-"}}</td>
                                            <td>{{$a->tanggal_digunakan}}</td>
                                            <td>{{$a->jumlah_digunakan}}</td>
                                            <td>{{$a->bahan->satuan->nama ?? "-"}}</td>
                                            <td>{{$a->bahan->merek}}</td>
                                            @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                            <td>
                                                {{-- <a href="{{route('penerimaan-bahan.show',$a->id)}}"><i class="fas fa-eye"></i></a> --}}
                                                <a href="{{route('penggunaan-bahan.edit',$a->id)}}"><i class="far fa-edit"></i></a>
                                                <a href="{{route('penggunaan-bahan.hapus',$a->id)}}" onclick="confirm('Histori Penggunaan akan hilang');" ><i class="fas fa-trash-alt"></i></a>
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
