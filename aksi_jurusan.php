<?php
include ('koneksi.php');
if ($_GET['proses']=='query') 
{
//skrip untuk insert
	if(isset($_POST['submit']))
	{
		$query=mysql_query("INSERT INTO jurusan (nama_jurusan,jenjang) 
		values ('$_POST[nama_jurusan]','$_POST[jenjang]')");
		if($query)
			header("location:index.php?page=jurusan");
	}
}

else if ($_GET['proses']=='hapus')
{
//skrip untuk delete
	$hapus=mysql_query("DELETE FROM jurusan WHERE id_jurusan='$_GET[id_hapus]'");
		if ($hapus)
			header("location:index.php?page=jurusan");
}

else if ($_GET['proses']=='update')
{
//skrip untuk edit
	$ubah = mysql_query ("UPDATE jurusan SET
				  nama_jurusan	='$_POST[nama_jurusan]',
				  jenjang		='$_POST[jenjang]' WHERE id_jurusan='$_POST[id_jurusan]'");
		if($ubah){
			header('location:index.php?page=jurusan');
		}
}		
?>