@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">User Management</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item active">User Management</li>
            </ol>
            <div class="row">
                <div class="col-md-12">

                    <a href="{{route('user-management.create')}}" class="btn btn-success mb-2">Tambah User </a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            User Management
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
                                            <th>Nama </th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $a)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$a->name}}</td>
                                            <td>{{$a->email}}</td>
                                            <td>{{$a->level}}</td>
                                            <td>{{$a->jabatan}}</td>
                                            <td>
                                                <a href="{{route('user-management.edit',$a->id)}}"><i class="far fa-edit"></i></a>
                                                {{-- @if ($a->id  == Au)
                                                    
                                                @endif --}}
                                                <a href="{{route('user-management.hapus',$a->id)}}"><i class="fas fa-trash-alt"></i></a>
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
