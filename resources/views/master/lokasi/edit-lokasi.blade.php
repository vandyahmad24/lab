@extends('layouts.home')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Master</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#calonindex">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('master-lokasi')}}">Master Lokasi</a></li>
                <li class="breadcrumb-item active">Edit lokasi</li>
            </ol>
            <div class="row">
                <div class="card mb-4">
                    <div class="card-header">
                        
                        Edit lokasi 
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{route('put-lokasi',$lokasi->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Lokasi</label>
                            <input type="text" name="kode" value="{{$lokasi->alat}}" class="form-control" id="" aria-describedby="emailHelp" placeholder="Nama Lokasi" required>
                          </div>
                        <div class="form-group">
                          <label for="">Nama Lokasi</label>
                          <input type="text" name="nama" class="form-control" id="" aria-describedby="emailHelp" value={{$lokasi->nama}} placeholder="Nama Kategori" required>
                          
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
