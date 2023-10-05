@extends('anggota.layout')
<!DOCTYPE html> 
<html> 
<head> 
 	<title>Laporan Data Anggota</title> 
</head> 
<body> 
 	<style type="text/css">  	 	table tr td,  	 	table tr th{ 
 	 	 	font-size: 9pt; 
 	 	} 
 	</style> 
 	<center> 
		<h5>SISTEM INFORMASI MANAJEMEN PERPUSTAKAAN ( SIPUS )</h4> 
 	 	<h5>Hasil Laporan Data Anggota</h4> 
 	</center>
	<h6>Tanggal : <?php $tgl=date('d - m - Y');
		echo $tgl; ?></h6> 
 	<table class="table table-bordered 2px" style="text-align:center;">
 	 	<thead> 
 	 	 	<tr> 
 	 	 	 	<th>No</th> 
 	 	 	 	<th>nama</th> 
 	 	 	 	<th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>No Telepon</th>
                <th>Tanggal Lahir</th>
 	 	 	</tr> 
 	 	</thead> 
 	 	<tbody> 
 	 	 	@foreach($data_anggotas as $pdf) 
 	 	 	<tr> 
 	 	 	 	<td>{{ $loop->iteration }}</td> 
 	 	 	 	<td>{{$pdf->nama}}</td> 
 	 	 	 	<td>{{$pdf->alamat}}</td> 
 	 	 	 	<td>{{$pdf->jeniskelamin}}</td>
                <td>{{$pdf->notelp}}</td>
                <td>{{$pdf->tanggallahir}}</td> 
 	 	 	</tr> 
 	 	 	@endforeach 
 	 	</tbody> 
 	</table> 
  
</body> 
</html>