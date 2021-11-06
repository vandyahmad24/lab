@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Permintaan Bahan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item active">Permintaan Bahan</li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                    <a href="{{route('permintaan-bahan.create')}}" class="btn btn-success mb-2">Tambah Permintaan Bahan</a>
                   @endif
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Permintaan Bahan
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
                                            <th>Nama</th>
                                            <th>Merek</th>
                                            <th>Satuan</th>
                                            <th>Kebutuhan</th>
                                            @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pb as $a)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$a->nama}}</td>
                                            <td>{{$a->merek}}</td>
                                            <td>{{$a->satuan}}</td>
                                            <td>{{$a->kebutuhan}}</td>
                                            @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                            <td>
                                                <a href="{{route('permintaan-bahan.show',$a->id)}}"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('permintaan-bahan.edit',$a->id)}}"><i class="far fa-edit"></i></a>
                                                <a href="{{route('permintaan-bahan.hapus',$a->id)}}"><i class="fas fa-trash-alt"></i></a>
                                               
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
