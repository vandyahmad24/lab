@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Perbaikan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Perbaikan</li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                    <a href="{{route('data-perbaikan.create')}}" class="btn btn-success mb-2">Tambah Data Perbaikan</a>
                    @endif
                    <a href="{{route('data-perbaikan.cetak')}}" class="btn btn-primary mb-2">Cetak</a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Perbaikan
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
                                            <th>Tanggal Perbaikan</th>
                                            {{-- <th>Jenis Kerusakan</th> --}}
                                            {{-- <th>Jenis Perbaikan</th> --}}
                                            {{-- <th>Vendor</th> --}}
                                            <th>Bukti Perbaikan</th>
                                            <th>Kondisi Alat</th>
                                            @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($perbaikan as $a)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$a->alat->alat_kode}}</td>
                                            <td>{{$a->alat->nama ?? "-"}}</td>
                                            @php
                                            $originalDate = $a->tanggal_temuan."-"."01";
                                            $newDate = date("m-Y", strtotime($originalDate));
                                            // dd($newDate);
                                            @endphp
                                            <td>{{$newDate}}</td>
                                            {{-- <td>{{$a->jenis_kerusakan}}</td> --}}
                                            {{-- <td>{{$a->jenis_perbaikan}}</td> --}}
                                            {{-- <td>{{$a->vendor}}</td> --}}
                                            <td>
                                                <a href="{{asset('upload/'.$a->bukti_perbaikan)}}" download>
                                                <img src="{{asset('upload/'.$a->bukti_perbaikan)}}" alt="" style="max-width:600px;width:100%">
                                                </a>
                                            </td>
                                            <td>{{$a->kondisi_alat}}</td>
                                            @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                                            <td>
                                                {{-- <a href="{{route('data-kerusakan.show',$a->id)}}"><i class="fas fa-eye"></i></a> --}}
                                                <a href="{{route('data-perbaikan.edit',$a->id)}}"><i class="far fa-edit"></i></a>
                                                <a href="{{route('data-perbaikan.hapus',$a->id)}}"><i class="fas fa-trash-alt"></i></a>
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
