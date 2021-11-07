<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Permintaan Perbaikan</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: 15px;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: 15px;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>
  <h4 align="center">PERMINTAAN PERBAIKAN ALAT</h4>
  <table width="100%">
    <tr>
        <td align="left">
           Kepada Yth.
        </td>
    </tr>
    <tr>
      <td align="left">
        Bagian Pengadaan
     </td>
    </tr>
    <tr>
      <td align="left">
        di Tempat.
     </td>
    </tr>

  </table>
  <table width="100%" style="margin-top: 10px;">
    <tr>
      <td align="left">
        Permintaan perbaikan alat Laboratorium Pengujian Fisika Teksil dengan rincian sebagai berikut:
      </td>
    </tr>
  </table>
  
  <br/>

  <table width="50%" style="margin-left: 30px;">
      <tr>
        <td align="left">Nama Alat</td>
        <td align="left">{{$nama_alat}}</td>
      </tr>
      <tr>
        <td align="left">Kode Alat</td>
        <td align="left">{{$kode_alat}}</td>
      </tr>
      <tr>
        <td align="left">Lokasi</td>
        <td align="left">{{$lokasi}}</td>
      </tr>
      <tr>
        <td align="left">Tahun Perolehan </td>
        <td align="left">{{$tahun_perolehan}}</td>
      </tr>
      <tr>
        <td align="left">Kerusakan</td>
        <td align="left">{{$kerusakan}}</td>
      </tr>
      <tr>
        <td align="left">Rencana Perbaikan</td>
        <td align="left">{{$rencana_perbaikan}}</td>
      </tr>
  </table>
  <table width="100%" style="margin-top: 55px;">
    <tr align="center">
      <td>Plt. Kasie Pengujian</td>
      <td>Bandung, {{date("d-M-Y") }} <br>
        Penyedia Laboratorium</td>
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
    
    <tr align="center">
      <td>Drs. Srie Sunaryati, MM</td>
      <td>Rangga Safta Puri. S. Teks.</td>
    </tr> 
  </table>

</body>
</html>
