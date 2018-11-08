<?php
include ('koneksi.php');
if ($_GET['proses']=='query') 
{
//skrip untuk insert
	if(isset($_POST['submit']))
	{
		$query=mysql_query("INSERT INTO prodi (nama_prodi,jenjang,id_jurusan) 
		values ('$_POST[nama_prodi]','$_POST[jenjang]','$_POST[id_jurusan]')");
			if($query)
				header("location:index.php?page=prodi");
	}
}

else if ($_GET['proses']=='hapus')
{
//skrip untuk delete
	$hapus=mysql_query("DELETE FROM prodi WHERE id_prodi='$_GET[id_hapus]'");
		if ($hapus)
			header("location:index.php?page=prodi");
}

else if ($_GET['proses']=='update')
{
//skrip untuk edit
	$ubah = mysql_query ("UPDATE prodi SET
			nama_prodi	='$_POST[nama_prodi]',
			jenjang		='$_POST[jenjang]',
			id_jurusan	='$_POST[id_jurusan]' WHERE id_prodi='$_POST[id_prodi]'");
		if($ubah){
			header('location:index.php?page=prodi');
	}	
}	
?>