@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Bahan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Bahan</li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                    <a href="{{route('bahan.create')}}" class="btn btn-success mb-2">Tambah Data Bahan</a>
                    @endif
                    <a href="{{route('bahan.cetak')}}" class="btn btn-primary mb-2">Cetak</a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Bahan
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
                                            <th>Merek</th>
                                            <th>Nama Alat</th>
                                            <th>Kode Penyimpanan</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                           
                                            @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bahan as $a)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$a->bahan_kode}}</td>
                                            <td>{{$a->nama_bahan}}</td>
                                            <td>{{$a->merek ?? "-"}}</td>
                                            <td>{{$a->alat->nama ?? "-"}}</td>
                                            <td>{{$a->KodePenyimpanan->nama ?? "-"}}</td>
                                            <td>{{$a->stok}}</td>
                                            <td>{{$a->satuan->nama ?? "-"}}</td>
                                           
                                            @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                            <td>
                                                {{-- <a href="{{route('bahan.show',$a->id)}}"><i class="fas fa-eye"></i></a> --}}
                                                <a href="{{route('bahan.edit',$a->id)}}"><i class="far fa-edit"></i></a>
                                                <a href="{{route('bahan.hapus',$a->id)}}"><i class="fas fa-trash-alt"></i></a>
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
