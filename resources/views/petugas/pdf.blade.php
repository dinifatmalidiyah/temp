<!DOCTYPE html>
<html>

<head>
	<title>Laporan Data</title>
	<style>
		/* Common styles for both screen and print */
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		.header {
			background-color: #f1f1f1;
			padding: 10px;
			text-align: center;
		}

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
</head>

<body>
	<div class="header">
		<div class="logo">
			<img src="assets/images/laporan/header.png" alt="Logo Laporan">
		</div>
	</div>
	<center>
		<h5>DAFTAR PETUGAS</h5>
		<h5>Laporan Data Petugas</h5>
	</center>

	<table class="table table-bordered 2px">
		<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nama Lengkap</th>
				<th>Jabatan</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $pdf)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $pdf->nik }}</td>
				<td>{{$pdf->nama}}</td>
				<td>{{$pdf->level}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>

</html>