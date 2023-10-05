@extends('petugas.layout')
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
 	 	<h5>Hasil Laporan Data Petugas</h4> 
 	</center>
	<h6>Tanggal : <?php $tgl=date('d - m - Y');
		echo $tgl; ?></h6> 
 	<table class="table table-bordered 2px" style="text-align:center;">
 	 	<thead> 
 	 	 	<tr> 
 	 	 	 	<th>No</th> 
 	 	 	 	<th>Nama Petugas</th> 
 	 	 	 	<th>Email</th>
                <th>Level</th>
                <th>Bergabung Pada</th>
 	 	 	</tr> 
 	 	</thead> 
 	 	<tbody> 
 	 	 	@foreach($users as $pdf) 
 	 	 	<tr> 
 	 	 	 	<td>{{ $loop->iteration }}</td> 
 	 	 	 	<td>{{$pdf->nama}}</td> 
 	 	 	 	<td>{{$pdf->email}}</td> 
 	 	 	 	<td>{{$pdf->level}}</td>
                <td>{{$pdf->tanggal_join}}</td>
 	 	 	</tr> 
 	 	 	@endforeach 
 	 	</tbody> 
 	</table> 
  
</body> 
</html>