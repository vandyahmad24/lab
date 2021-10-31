@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Master</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Master</li>
            </ol>
            <div class="row">
                <div class="col-md-6">

                    <a href="{{route('add-kategori')}}" class="btn btn-success mb-2">Tambah Data Kategori</a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Kategori
                        </div>
                        <div class="card-body">
                            @if (\Session::has('successkategori'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('successkategori') !!}</li>
                                </ul>
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table id="#" class="datatables">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($kategori as $k)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$k->nama}}</td>
                                            <td>
                                                <a href="{{route('edit-kategori',$k->id)}}"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="{{route('delete-kategori',$k->id)}}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{route('add-lokasi')}}" class="btn btn-success mb-2">Tambah Data Lokasi</a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Lokasi
                        </div>
                        <div class="card-body">
                            @if (\Session::has('successlokasi'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('successlokasi') !!}</li>
                                </ul>
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table id="#" class="datatables">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lokasi as $l)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$l->nama}}</td>
                                            <td>
                                                <a href="{{route('edit-lokasi',$l->id)}}"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="{{route('delete-lokasi',$l->id)}}"
                                                    class="btn btn-danger">Delete</a>
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
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('pic.create')}}" class="btn btn-success mb-2">Tambah Data PIC</a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data PIC
                        </div>
                        <div class="card-body">
                            @if (\Session::has('successpic'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('successpic') !!}</li>
                                </ul>
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table id="#" class="datatables">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pic as $p)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$p->nama}}</td>
                                            <td>
                                                <a href="{{route('pic.edit',$p->id)}}"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="{{route('pic.hapus',$p->id)}}"
                                                    class="btn btn-danger">Delete</a>
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
