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
$pdf->Cell(190,7,'DAFTAR MATA KULIAH',0,1,'C');

//memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0,'C');
$pdf->Cell(18,6,'KODE',1,0,'C');
$pdf->Cell(75,6,'NAMA MATA KULIAH',1,0,'C');
$pdf->Cell(40,6,'SKS',1,0,'C');
$pdf->Cell(40,6,'JUMLAH JAM',1,1,'C');

$pdf->SetFont('Arial','',10);

mysql_connect('localhost','root','');
mysql_select_db('akademik');

$matakuliah = mysql_query("select * from matakuliah");
$no=1;
while($row=mysql_fetch_array($matakuliah)){
	$pdf->Cell(10,6,$no,1,0);
	$pdf->Cell(18,6,$row['kode'],1,0);
	$pdf->Cell(75,6,$row['nama_makul'],1,0);
	$pdf->Cell(40,6,$row['sks'],1,0);
	$pdf->Cell(40,6,$row['jam'],1,1);
	$no++;
}
$pdf->Output();
?>