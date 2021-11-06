@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Permintaan bahan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('permintaan-bahan.index')}}">Permintaan Bahan</a></li>
            <li class="breadcrumb-item active">Tambah Permintaan</li>
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
                        @if (\Session::has('error'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{!! \Session::get('error') !!}</li>
                            </ul>
                        </div>
                        @endif

                        <div class="card-header">
                            Edit Permintaan
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="{{route('permintaan-bahan.update',$p->id)}}" enctype='multipart/form-data'>
                                        @csrf
                                        @method('PUT')
                                       
                                        <div class="form-group mb-2">
                                            <label for="">Nama</label>
                                            <input type="text" name="nama" class="form-control"
                                                value="{{$p->nama}}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Merek</label>
                                            <input type="text" name="merek" class="form-control"
                                                value="{{$p->merek}}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Satuan</label>
                                            <input type="text" name="satuan" class="form-control"
                                                value="{{$p->satuan}}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Kebutuhan</label>
                                            <input type="text" name="kebutuhan" class="form-control"
                                                value="{{$p->kebutuhan}}">
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    @endsection
