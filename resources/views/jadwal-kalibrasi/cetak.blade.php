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
    <h4 align="center">LAPORAN JADWAL KALIBRASI</h4>


    <br />

    <table width="100%">

        <thead>
            <tr align="left">
                <th>No</th>
                <th>ID Alat</th>
                <th>Alat</th>
                <th>Kategori Alat</th>
                <th>Jenis Kalibrasi</th>
                <th>Tanggal Kalibrasi</th>
                <th>Status Proses</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $a)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->alat_id}}</td>
                <td>{{$a->alat->nama ?? "-"}}</td>
                <td>{{$a->alat->kategori->nama ?? "-"}}</td>
                <td>{{$a->jenis_kalibrasi}}</td>
                @php
                $originalDate = $a->tanggal_kalibrasi."-"."01";
                $newDate = date("m-Y", strtotime($originalDate));
                // dd($newDate);
                @endphp
                <td>{{$newDate}}</td>
                @php
                switch ($a->status_kalibrasi) {
                    case 'proses-kalibrasi':
                        $stat = "Proses Kalibrasi";
                        break;
                    case 'selesai':
                        $stat = "Selesai";
                        break;
                    case 'tidak-dapat-diproses':
                        $stat = "Tidak Dapat Diproses";
                        break;
                    case 'terjadwal':
                        $stat = "Terjadwal";
                        break;
                    
                    default:
                        $stat="";
                        break;
                }
                @endphp
                <td>{{$stat}}</td>
                
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
