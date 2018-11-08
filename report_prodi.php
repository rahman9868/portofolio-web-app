<?php

//memanggil liibrary FPDF
require ('fpdf/fpdf.php');
//instance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF();

//membuat halaman baru
$pdf->AddPage();
//setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
//mencetak string
$pdf->Cell(190,7,'POLITEKNIK NEGERI PADANG',0,1,'C');
//$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR PROGRAM STUDI',0,1,'C');

//memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0,'C');
$pdf->Cell(75,6,'NAMA PROGRAM STUDI',1,0,'C');
$pdf->Cell(30,6,'JENJANG',1,0,'C');
$pdf->Cell(40,6,'ID PROGRAM STUDI',1,0,'C');
$pdf->Cell(40,6,'ID JURUSAN',1,1,'C');

$pdf->SetFont('Arial','',10);

mysql_connect('localhost','root','');
mysql_select_db('akademik');

$prodi = mysql_query("select * from prodi");
$no=1;
while($row=mysql_fetch_array($prodi)){
	$pdf->Cell(10,6,$no,1,0);
	$pdf->Cell(75,6,$row['nama_prodi'],1,0);
	$pdf->Cell(30,6,$row['jenjang'],1,0);
	$pdf->Cell(40,6,$row['id_prodi'],1,0);
	$pdf->Cell(40,6,$row['id_jurusan'],1,1);
	$no++;
}
$pdf->Output();
?>