@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Alat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Alat</li>
            </ol>
            <div class="row">
                <div class="col-md-12">

                    <a href="{{route('alat.create')}}" class="btn btn-success mb-2">Tambah Data Alat</a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Alat
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
                                            <th>Alat ID</th>
                                            <th>Nama Alat</th>
                                            <th>Kategori Alat</th>
                                            <th>Status Penggunaan</th>
                                            <th>Status Kalibrasi</th>
                                            <th>PIC</th>
                                            <th>Tahun Perolehan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($alat as $a)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$a->alat_kode}}</td>
                                            <td>{{$a->nama}}</td>
                                            <td>{{$a->kategori->nama ?? '-'}}</td>
                                            <td>{{$a->status_pengunaan}}</td>
                                            <td>{{$a->kalibrasi}}</td>
                                            <td>{{$a->pic->nama ?? '-'}}</td>
                                            <td>{{$a->tahun_perolehan}}</td>
                                            <td>
                                                <a href="{{route('alat.show',$a->id)}}"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('alat.edit',$a->id)}}"><i class="far fa-edit"></i></a>
                                                <a href="{{route('alat.hapus',$a->id)}}"><i class="fas fa-trash-alt"></i></a>
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
