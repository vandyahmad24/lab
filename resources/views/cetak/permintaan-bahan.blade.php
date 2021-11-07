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
  <h4 align="center">PERMINTAAN BAHAN LABORATORIUM PENGUJIAN</h4>
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
        Permintaan bahan penunjang laboratorium pengujian fisika tekstil dengan rincian sebagai berikut:
      </td>
    </tr>
  </table>
  
  <br/>

  <table width="100%" style="margin-left: 30px;">
    <thead style="background-color: lightgray;">
          <tr align="left">
              <th>No</th>
              <th>Nama Bahan</th>
              <th>Merek</th>
              <th>Satuan</th>
              <th>Kebutuhan</th>
          </tr>
      </thead>
      <tbody>
          @php
              $i=1;
          @endphp
          @foreach ($pb as $p)
            <tr>
                
                <td>{{$i}}</td>
                <td>{{$p->nama}}</td>
                <td>{{$p->merek}}</td>
                <td>{{$p->satuan}}</td>
                <td>{{$p->kebutuhan}}</td>
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
