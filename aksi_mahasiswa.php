<?php
include ('koneksi.php');
if ($_GET['proses']=='query') 
{
//skrip untuk insert
	if(isset($_POST['submit']))
	{ 

	$query=mysql_query("INSERT INTO mahasiswa (nim,nam_mhs,jekel,email,id_jurusan,id_prodi,no_telp,alamat) 
	values ('$_POST[nim]','$_POST[nam_mhs]','$_POST[jekel]','$_POST[email]','$_POST[id_jurusan]','$_POST[id_prodi]','$_POST[no_telp]','$_POST[alamat]')"); 
	if($query)
		header("location:index.php?page=mahasiswa");
	}
}


else if ($_GET['proses']=='hapus')
{
//skrip untuk delete
$hapus=mysql_query("DELETE FROM mahasiswa WHERE nim='$_GET[id_hapus]'");
if ($hapus)
	header("location:index.php?page=mahasiswa");
}


else if ($_GET['proses']=='update')
{
//skrip untuk update
$ubah = mysql_query ("UPDATE mahasiswa SET
				  nim			='$_POST[nim]',
				  nam_mhs		='$_POST[nam_mhs]',
				  jekel			='$_POST[jekel]',
				  email			='$_POST[email]',
				  id_jurusan	='$_POST[id_jurusan]',
				  id_prodi		='$_POST[id_prodi]',
				  no_telp		='$_POST[no_telp]',
				  alamat		='$_POST[alamat]' WHERE nim='$_POST[nim]'");
if($ubah){
	header('location:index.php?page=mahasiswa');
}
}