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
    <h4 align="center">LAPORAN RIWAYAT KALIBRASI</h4>


    <br />

    <table width="100%">

        <thead>
            <tr align="left">
                <th>No</th>
                <th>ID Alat</th>
                <th>Alat</th>
                <th>Jenis Kalibrasi</th>
                <th>Tanggal Kalibrasi</th>
                <th>Remark</th>
                <th>Sertifikat</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $a)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->alat->alat_kode ?? "-"}}</td>
                <td>{{$a->alat->nama ?? "-"}}</td>
                <td>{{$a->jenis_kalibrasi}}</td>
                @php
                $originalDate = $a->tanggal_kalibrasi."-"."01";
                $newDate = date("m-Y", strtotime($originalDate));
                // dd($newDate);
                @endphp
                <td>{{$newDate}}</td>
                <td>{{$a->remark}}</td>
                <td>
                    @if ($a->sertifikat)
                       <a href="{{asset('upload/'.$a->sertifikat)}}" class="btn btn-primary" download>Lihat Sertifikasi</a>
                    @else
                    <a href="{{route('riwayat-kalibrasi.edit',$a->id)}}" class="btn btn-warning btn-sm">Belum Upload Sertifikasi</a>
                    @endif
                    {{-- {{$a->sertifikat}} --}}
                </td>
              
            </tr>
            @endforeach



        </tbody>



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
