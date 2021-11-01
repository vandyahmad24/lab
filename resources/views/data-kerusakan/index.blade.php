@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Kerusakan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Kerusakan</li>
            </ol>
            <div class="row">
                <div class="col-md-12">

                    <a href="{{route('data-kerusakan.create')}}" class="btn btn-success mb-2">Tambah Data Kerusakan</a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Kerusakan
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
                                            <th>Alat</th>
                                            <th>Kategori Alat</th>
                                            <th>PIC</th>
                                            <th>Tanggal Temuan</th>
                                            <th>Jenis Kerusakan</th>
                                            <th>Permintaan Perbaikan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kerusakan as $a)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$a->alat->alat_kode ?? "-"}}</td>
                                            <td>{{$a->alat->nama ?? "-"}}</td>
                                            <td>{{$a->alat->kategori->nama ?? "-"}}</td>
                                            <td>{{$a->alat->pic->nama ?? "-"}}</td>
                                            @php
                                            $originalDate = $a->tanggal_temuan."-"."01";
                                            $newDate = date("m-Y", strtotime($originalDate));
                                            // dd($newDate);
                                            @endphp
                                            <td>{{$newDate}}</td>
                                            <td>{{$a->jenis_kerusakan}}</td>
                                            <td><a href="#" class="btn btn-primary btn-sm">Ajukan Permintaan</a></td>
                                            <td>
                                                <a href="{{route('data-kerusakan.show',$a->id)}}"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('data-kerusakan.edit',$a->id)}}"><i class="far fa-edit"></i></a>
                                                <a href="{{route('data-kerusakan.hapus',$a->id)}}"><i class="fas fa-trash-alt"></i></a>
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
