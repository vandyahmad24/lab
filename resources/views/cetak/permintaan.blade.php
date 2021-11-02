<!DOCTYPE html>
<html>

<head>
    <title>Permintaan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="row">
        <div class="container">
            <center>
                <h4>PERMINTAAN PERBAIKAN ALAT</h4>
            </center>
            <div style="line-height: normal">
                <p>Kepada Yth <br>
                    Bagian Pengadaan <br>
                    di Tempat</p>
            </div>
            <p class="mr-5">Permintaan perbaikan alat Laboratorium Pengujian Fisika
                Teksil
                dengan rincian sebagai berikut:</p>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <table class="table table-borderless">
                        <tr>
                            <td>1. Nama Alat</td>
                            <td>{{$nama_alat}}</td>
                        </tr>
                        <tr>
                            <td>2. Kode Alat</td>
                            <td>{{$kode_alat}}</td>
                        </tr>
                        <tr>
                            <td>3. Lokasi</td>
                            <td>{{$lokasi}}</td>
                        </tr>
                        <tr>
                            <td>4. Tahun Perolehan</td>
                            <td>{{$tahun_perolehan}}</td>
                        </tr>
                        <tr>
                            <td>5. Kerusakan</td>
                            <td>{{$kerusakan}}</td>
                        </tr>
                        <tr>
                            <td>6. Rencana Perbaikan</td>
                            <td>{{$rencana_perbaikan}}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

        <br>

    </div>
    </div>
</body>

</html>
