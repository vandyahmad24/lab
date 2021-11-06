@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">User Managementn</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('user-management.index')}}">User Management</a>
                </li>
                <li class="breadcrumb-item active">Tambah User Management</li>
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

                        <div class="card-header">
                            Tambah User
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="{{route('user-management.store')}}"
                                        enctype='multipart/form-data'>
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">Nama</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Password Konfirmasi</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Level</label>
                                            <select name="level" id="" class="form-control">
                                                <option value="admin">Admin</option>
                                                <option value="internal">Internal Laboratorium</option>
                                                <option value="eksternal">Eksternal Laboratorium</option>
                                            </select>
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


    {{-- script modal --}}
    
    @endsection
