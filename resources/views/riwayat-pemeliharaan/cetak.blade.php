<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cetak Bahan</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: 15px;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: 15px;
        }

        .gray {
            background-color: lightgray
        }

    </style>

</head>

<body>
    <h4 align="center">LAPORAN RIWAYAT PEMELIHARAAN</h4>


    <br />

    <table width="100%">

        <thead>
            <tr align="left">
                <th>No</th>
                <th>ID Alat</th>
                <th>Alat</th>
                {{-- <th>PIC</th> --}}
                <th>Tanggal Pemeliharaan</th>
                {{-- <th>Jenis Pemeliharaan</th> --}}
                <th>Kondisi Alat</th>
                {{-- @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                <th>Laporkan Kerusakan</th>
                <th>Aksi</th>
                @endif --}}
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $a)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->alat->alat_kode}}</td>
                <td>{{$a->alat->nama ?? "-"}}</td>
                {{-- <td>{{$a->ata->pic->nama ?? "-"}}</td> --}}
                @php
                // $originalDate = $a->tanggal_kalibrasi."-"."01";
                $newDate = date("d-m-Y", strtotime($a->tanggal_pemeliharaan));
                // dd($newDate);
                @endphp
                <td>{{$newDate}}</td>
                {{-- <td>{{$a->jenis_pemeliharaan}}</td> --}}
                <td>{{$a->kondisi_alat}}</td>
                {{-- @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                <td><a href="{{route('data-kerusakan.create',['alat_id'=>$a->alat->id])}}" class="btn btn-success btn-sm">Buat Laporan</a></td>
                <td>
                    <a href="{{route('riwayat-pemeliharaan.edit',$a->id)}}"><i class="far fa-edit"></i></a>
                    <a href="{{route('riwayat-pemeliharaan.hapus',$a->id)}}"><i class="fas fa-trash-alt"></i></a>
                </td>
                @endif --}}
            </tr>
            @endforeach



        </tbody>
    </table>



    <table width="100%" style="margin-top: 55px;">
        <tr align="left">
            <td>Mengetahui,
                <br>
                Plt. Kasie Pengujian
            </td>
            <td></td>
        </tr>
        <tr align="center">
            <td>
                <br>
            </td>
            <td>
                <br>
            </td>
        </tr>
        <tr align="center">
            <td>
                <br>
            </td>
            <td>
                <br>
            </td>
        </tr>
        <tr align="center">
            <td>
                <br>
            </td>
            <td>
                <br>
            </td>
        </tr>
        <tr align="center">
            <td>
                <br>
            </td>
            <td>
                <br>
            </td>
        </tr>

        <tr align="left">
            <td>Dra. Srie Sunaryati, M.M.</td>
            <td></td>
        </tr>
    </table>

</body>

</html>
