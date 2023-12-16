<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laporan</title>
</head>

<body>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid;
            padding-left: 5px;
            text-align: center;
        }

        .judul {
            text-align: center;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }

        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
        }
    </style>
    <div class="header">
        <div class="logo">
            <img src="assets/images/laporan/header.png" alt="Logo Laporan">
        </div>
    </div><br><br>
    <div class="container" style="margin-top:-40px;">
        <h3 style="text-align:center;text-transform: uppercase;">Laporan Data Perbaikan</h3>
        <p style="text-align: center;">Periode: {{ $tanggalAwal }} sampai {{ $tanggalAkhir }}</p>
        <table class="table table-bordered nowrap">

            <table class="table table-bordered 2px" style="text-align:center;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No.Registrasi</th>
                        <th>Nama Mesin</th>
                        <th>Tanggal Permintaan</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataLaporan as $pdf)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pdf->no_registrasi }}</td>
                        <td>{{ $pdf->datamesin->nama_mesin }}</td>
                        <td>{{ $pdf->tanggal_permintaan }}</td>
                        <td>{{ $pdf->datamesin->workshop->nama_workshop }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

</body>

</html>