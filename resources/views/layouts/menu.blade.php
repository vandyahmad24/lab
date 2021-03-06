<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            {{-- menu untuk admin --}}
            {{-- @if (Auth::user()->level=='admin') --}}
            <div class="nav">
                <a class="nav-link" href="{{route('home')}}">
                    Dashboard
                </a>
                {{-- <a class="nav-link" href="{{route('master')}}">
                    Data Master
                </a> --}}
                @if (Auth::user()->level=='admin')
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#master" aria-expanded="false" aria-controls="master">
                    Data Master
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                @endif
               
                <div class="collapse" id="master" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('master-kategori')}}">Kategori</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('master-lokasi')}}">Lokasi</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('master-pic')}}">PIC</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('satuan.index')}}">Satuan</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('kode-penyimpanan.index')}}">Kode Penyimpanan</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('user-management.index')}}">User Management</a>
                    </nav>
                </div>
                <a class="nav-link" href="{{route('alat.index')}}">
                    Data Alat
                </a>
               
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#kalibrasi" aria-expanded="false" aria-controls="kalibrasi">
                    Kalibrasi
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="kalibrasi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('jadwal-kalibrasi.index')}}">Jadwal Kalibrasi</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('riwayat-kalibrasi.index')}}">Riwayat Kalibrasi</a>
                    </nav>
                </div>
                
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pemeliharaanperbaikan" aria-expanded="false" aria-controls="pemeliharaanperbaikan">
                    
                    Pemeliharaan & Perbaikan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pemeliharaanperbaikan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('jadwal-pemeliharaan.index')}}">Jadwal Pemeliharaan</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('riwayat-pemeliharaan.index')}}">Riwayat Pemeliharaan</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('data-kerusakan.index')}}">Kerusakan Alat</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('data-perbaikan.index')}}">Perbaikan Alat</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#habispakai" aria-expanded="false" aria-controls="habispakai">
                    
                   Bahan Habis Pakai
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="habispakai" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('bahan.index')}}">Persediaan Bahan</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('penerimaan-bahan.index')}}">Penerimaan Bahan</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('penggunaan-bahan.index')}}">Pengunaan Bahan</a>
                    </nav>
                </div>
                <a class="nav-link" href="{{route('permintaan-bahan.index')}}">
                    Data Permintaan
                </a>
                {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#laporan" aria-expanded="false" aria-controls="laporan">
                    
                    Laporan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="laporan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('laporan-equipment')}}">Equipment Inventory</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('riwayat-pemeliharaan.index')}}">Laporan Kerusakan</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('data-kerusakan.index')}}">Data Bahan Habis Pakai</a>
                    </nav>
                   
                </div>
                 --}}
            </div>
            {{-- @endif --}}
          
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Login Sebagai</div>
            {{Auth::user()->jabatan}} <br> Level: {{Auth::user()->level}}
        </div>
    </nav>
</div>