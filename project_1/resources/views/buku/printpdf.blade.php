@extends('buku.layout')
<!DOCTYPE html> 
<html> 
<head> 
 	<title>Laporan Data Kumpulan Buku</title> 
</head> 
<body> 
 	<style type="text/css">table tr td, table tr th{ 
 	 	 	font-size: 9pt; 
 	 	} 
 	</style> 
 	<center> 
		<h5>SISTEM INFORMASI MANAJEMEN PERPUSTAKAAN ( SIPUS )</h4> 
 	 	<h5>Hasil Laporan Data Kumpulan Buku</h4> 
 	</center>
	<h6>Tanggal : <?php $tgl=date('d - m - Y');
		echo $tgl; ?></h6> 
 	<table class="table table-bordered 2px">
 	 	<thead> 
 	 	 	<tr> 
 	 	 	 	<th>Id Buku</th> 
 	 	 	 	<th>Judul Buku</th> 
 	 	 	 	<th>Nama Kategori</th>
                <th>Nama Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Jumlah Halaman</th>
                <th>Diinput Oleh</th>
 	 	 	</tr> 
 	 	</thead> 
 	 	<tbody> 
 	 	 	@foreach($data_bukus as $pdf) 
 	 	 	<tr> 
 	 	 	 	<td>{{$pdf->id }}</td> 
 	 	 	 	<td>{{$pdf->judul_buku}}</td> 
 	 	 	 	<td>{{$pdf->data_kategori->nama_kategori}}</td> 
 	 	 	 	<td>{{$pdf->nama_pengarang}}</td>
                <td>{{$pdf->penerbit}}</td>
                <td>{{$pdf->tahun_terbit}}</td> 
                <td>{{$pdf->jumlah_halaman}}</td> 
                <td>{{$pdf->user->nama}}</td> 
 	 	 	</tr> 
 	 	 	@endforeach 
 	 	</tbody> 
 	</table> 
  
</body> 
</html>