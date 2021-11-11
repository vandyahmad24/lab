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
    <h4 align="center">LAPORAN DATA PERBAIKAN</h4>


    <br />

    <table width="100%">
        <thead>
            <tr align="left">
                <th>No</th>
                <th>ID Alat</th>
                <th>Alat</th>
                <th>Tanggal Perbaikan</th>
                <th>Jenis Kerusakan</th>
                <th>Jenis Perbaikan</th>
                <th>Vendor</th>
                {{-- <th>Bukti Perbaikan</th> --}}
                <th>Kondisi Alat</th>
                {{-- @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                <th>Aksi</th>
                @endif --}}
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
                <td>{{$a->jenis_kerusakan}}</td>
                <td>{{$a->jenis_perbaikan}}</td>
                <td>{{$a->vendor}}</td>
                {{-- <td>
                    <a href="{{asset('upload/'.$a->bukti_perbaikan)}}" download>
                    <img src="{{asset('upload/'.$a->bukti_perbaikan)}}" alt="" style="max-width:600px;width:100%">
                    </a>
                </td> --}}
                <td>{{$a->kondisi_alat}}</td>
                {{-- @if  (Auth::user()->level=='admin' || Auth::user()->level=='internal')
                <td>
                    <a href="{{route('data-kerusakan.show',$a->id)}}"><i class="fas fa-eye"></i></a>
                    <a href="{{route('data-perbaikan.edit',$a->id)}}"><i class="far fa-edit"></i></a>
                    <a href="{{route('data-perbaikan.hapus',$a->id)}}"><i class="fas fa-trash-alt"></i></a>
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
