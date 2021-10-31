@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Master</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('master')}}">Master</a></li>
                <li class="breadcrumb-item active">Tambah Pic</li>
            </ol>
            <div class="row">
                <div class="card mb-4">
                    <div class="card-header">
                        
                        Tambah Pic 
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{route('pic.store')}}">
                        @csrf
                        <div class="form-group">
                          <label for="">Nama Pic</label>
                          <input type="text" name="nama" class="form-control" id="" aria-describedby="emailHelp" placeholder="Nama Pic" required>
                          
                        </div>
                       
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                      </form>
                    </div>
                </div>
             


            </div>
        </div>
    </main>


    {{-- script modal --}}
    @endsection
