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
$pdf->Cell(190,7,'DAFTAR MAHASISWA',0,1,'C');

//memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(30,6,'NIM',1,0,'C');
$pdf->Cell(65,6,'NAMA MAHASISWA',1,0,'C');
$pdf->Cell(27,6,'NO HP',1,0,'C');
$pdf->Cell(65,6,'ALAMAT',1,1,'C');

$pdf->SetFont('Arial','',10);

mysql_connect('localhost','root','');
mysql_select_db('akademik');

$mahasiswa = mysql_query("select * from mahasiswa");
$no=1;
while($row=mysql_fetch_array($mahasiswa)){
	$pdf->Cell(10,6,$no,1,0);
	$pdf->Cell(30,6,$row['nim'],1,0);
	$pdf->Cell(65,6,$row['nam_mhs'],1,0);
	$pdf->Cell(27,6,$row['no_telp'],1,0);
	$pdf->Cell(65,6,$row['alamat'],1,1);
	$no++;
}
$pdf->Output();
?>