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
    <h4 align="center">LAPORAN BAHAN HABIS PAKAI</h4>


    <br />

    <table width="100%">

        <thead>
            <tr align="left">
                <th>No</th>
                <th>ID Bahan</th>
                <th>Nama Bahan</th>
                <th>Merek</th>
                <th>Nama Alat</th>
                <th>Kode Penyimpanan</th>
                <th>Stok</th>
                <th>Satuan</th>
              
                {{-- @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                <th>Aksi</th>
                @endif --}}
            </tr>
        </thead>
        <tbody>
            @foreach($bahan as $a)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->bahan_kode}}</td>
                <td>{{$a->nama_bahan}}</td>
                <td>{{$a->merek ?? "-"}}</td>
                <td>{{$a->alat->nama ?? "-"}}</td>
                <td>{{$a->KodePenyimpanan->nama ?? "-"}}</td>
                <td>{{$a->stok}}</td>
                <td>{{$a->satuan->nama ?? "-"}}</td>
               
                {{-- @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                <td>
                    <a href="{{route('bahan.show',$a->id)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('bahan.edit',$a->id)}}"><i class="far fa-edit"></i></a>
                    <a href="{{route('bahan.hapus',$a->id)}}"><i class="fas fa-trash-alt"></i></a>
                </td>
                @endif --}}
            </tr>
            @endforeach



        </tbody>
    </table>



   <table width="100%" style="margin-top: 55px;">
    <tr align="right">
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

    <tr align="right">
        <td>Dra. Srie Sunaryati, M.M.</td>
        <td></td>
    </tr>
</table>

</body>

</html>
