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

  <table width="100%" style="margin-left: 30px;">
    <thead style="background-color: lightgray;">
          <tr align="left">
              <th>No</th>
              <th>Kode Alat</th>
              <th>Nama Alat</th>
              <th>Tahun Perolehan</th>
              <th>Kerusakan</th>
              <th>Rencana Perbaikan</th>
          </tr>
      </thead>
      <tbody>
          @php
              $i=1;
          @endphp
          @foreach ($kerusakan as $p)
            <tr>
                
                <td>{{$i}}</td>
                <td>{{$p->alat->alat_kode ?? "-"}}</td>
                <th>{{$p->alat->nama ?? "-"}}</th>
                <td>{{$p->alat->tahun_perolehan}}</td>
                <td>{{$p->jenis_kerusakan}}</td>
                <td>{{$p->rencana}}</td>
            </tr> 
            @php
                    $i++;
                @endphp
          @endforeach
          
      </tbody>
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
