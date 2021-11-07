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
  <h4 align="center">LAPORAN DATA ALAT</h4>
  
  
  <br/>

  <table width="100%" >
    <thead style="background-color: lightgray;">
          <tr align="left">
              <th>No</th>
              <th>ID Alat</th>
              <th>Nama Alat</th>
              <th>Kategori</th>
              <th>No Seri</th>
              <th>Software</th>
              <th>Kondisi</th>
              <th>Kalibrasi</th>
          </tr>
      </thead>
      <tbody>
          @php
              $i=1;
          @endphp
          @foreach ($alat as $p)
            <tr>
                
                <td>{{$i}}</td>
                <td>{{$p->alat_kode}}</td>
                <td>{{$p->nama}}</td>
                <td>{{$p->kategori->nama ?? "-"}}</td>
                <td>{{$p->no_seri}}</td>
                <td>{{$p->software}}</td>
                <td>{{$p->kondisi}}</td>
                <td>{{$p->kalibrasi}}</td>
            </tr> 
            @php
                    $i++;
                @endphp
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
