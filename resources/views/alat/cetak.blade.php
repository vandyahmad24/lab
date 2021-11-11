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
    <h4 align="center">LAPORAN DATA ALAT</h4>


    <br />

    <table width="100%">
        
            <tr align="left">
                <th>ID Alat</th>
                <td>{{$alat->alat_kode}}</td>
            </tr>
            <tr align="left">
                <th>Nama</th>
                <td>{{$alat->nama}}</td>
            </tr>
            <tr align="left">
                <th>Kategori</th>
                <td>{{$alat->kategori->nama ?? '-'}}</td>
            </tr>
            <tr align="left">
                <th>Merek</th>
                <td>{{$alat->merek}}</td>
            </tr>
            <tr align="left">
                <th>Tipe</th>
                <td>{{$alat->tipe}}</td>
            </tr>
            <tr align="left">
                <th>No Seri</th>
                <td>{{$alat->no_seri}}</td>
            </tr>
            <tr align="left">
                <th>Software</th>
                <td>{{$alat->software}}</td>
            </tr>
            <tr align="left">
                <th>Tahun Perolehan</th>
                <td>{{$alat->tahun_perolehan}}</td>
            </tr>
            <tr align="left">
                <th>Lokasi</th>
                <td> {{$alat->lokasi->kode ?? '-'}} || {{$alat->lokasi->nama ?? '-'}}</td>
            </tr>
            <tr align="left">
                <th>kondisi</th>
                <td>{{$alat->kondisi}}</td>
            </tr>
            <tr align="left">
                <th>Status Pengunaan</th>
                <td>{{$alat->status_pengunaan}}</td>
            </tr>
            <tr align="left">
                <th>Kalibrasi </th>
                <td>{{$alat->kalibrasi}}</td>
            </tr>
            <tr align="left">
                <th>Periode Pemeliharaan </th>
                <td>{{$alat->periode_pemeliharaan}}</td>
            </tr>
            <tr align="left">
                <th>Periode Kalibrasi </th>
                <td>{{$alat->periode_kalibrasi}}</td>
            </tr>
            <tr align="left">
                <th>IK Alat </th>
                <td>{{$alat->ik_alat}}</td>
            </tr>
            <tr align="left">
                <th>Manual Book </th>
                <td>{{$alat->manual_book}}</td>
            </tr>
            <tr align="left">
                <th>PIC </th>
                <td>{{$alat->pic->nama ?? '-'}}</td>
            </tr>
            <tr align="left">
                <th>Komponen Alat </th>
                @php
                $komponen = explode(',',$alat->komponen_alat);
                @endphp
                <td>
                    <ol>
                        @foreach ($komponen as $kom)
                        <li>{{$kom}}</li>
                        @endforeach

                    </ol>
                </td>
            </tr>
            <tr align="left">
                <th>Bahan Habis Pakai </th>
                @php
                $bahan = explode(',',$alat->bahan_habis_pakai);
                @endphp
                <td>
                    <ol>
                        @foreach ($bahan as $b)
                        <li>{{$b}}</li>
                        @endforeach

                    </ol>
                </td>
            </tr>
            <tr align="left">
                {{-- <th>Foto</th>
                <td>

                    <img src="{{asset('upload/'.$alat->foto)}}" alt="" style="max-width:600px;width:100%">
                </td> --}}
            </tr>
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
