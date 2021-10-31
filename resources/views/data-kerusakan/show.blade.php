@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Kerusakan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('data-kerusakan.index')}}">Kerusakan</a></li>
                <li class="breadcrumb-item active">Data Kerusakan {{$kerusakan->alat->nama}}</li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Kerusakan {{$kerusakan->alat->nama}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="#" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Nama</th>
                                            <td>{{$kerusakan->alat->nama}}</td>
                                        </tr>
                                        <tr>
                                            <th>Kategori</th>
                                            <td>{{$kerusakan->alat->kategori->nama ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <th>PIC</th>
                                            <td>{{$kerusakan->pic->nama}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Temuan</th>
                                            <td>{{$kerusakan->tanggal_temuan}}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kerusakan</th>
                                            <td>{{$kerusakan->jenis_kerusakan}}</td>
                                        </tr>
                                        <tr>
                                            <th>Akibat</th>
                                            <td>{{$kerusakan->akibat}}</td>
                                        </tr>
                                        <tr>
                                            <th>Faktor</th>
                                            <td>{{$kerusakan->faktor}}</td>
                                        </tr>
                                        <tr>
                                            <th>Rencana</th>
                                            <td>{{$kerusakan->rencana}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status Permintaan</th>
                                            <td>{{$kerusakan->status_permintaan}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Foto</th>
                                            <td>
                                              
                                                <img src="{{asset('upload/'.$kerusakan->foto)}}" alt="" style="max-width:600px;width:100%">
                                            </td>
                                        </tr>
                                       



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
