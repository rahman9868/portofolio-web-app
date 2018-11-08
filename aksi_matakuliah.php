<?php
include ('koneksi.php');
if ($_GET['proses']=='query') 
{
//skrip untuk insert
	if(isset($_POST['submit']))
	{
		$query=mysql_query("INSERT INTO matakuliah (kode,nama_makul,sks,jam) 
		values ('$_POST[kode]','$_POST[nama_makul]','$_POST[sks]','$_POST[jam]')");
			if($query)
				header("location:index.php?page=matakuliah");
	}
}

else if ($_GET['proses']=='hapus')
{
//skrip untuk delete
	$hapus=mysql_query("DELETE FROM matakuliah WHERE kode='$_GET[id_hapus]'");
		if ($hapus)
			header("location:index.php?page=matakuliah");
}

else if ($_GET['proses']=='update')
{
//skrip untuk edit
	$ubah = mysql_query ("UPDATE matakuliah SET
			kode			='$_POST[kode]',
			nama_makul		='$_POST[nama_makul]',
			sks				='$_POST[sks]',
			jam				='$_POST[jam]' 
			WHERE kode='$_POST[kode]'");
		if($ubah){
			header('location:index.php?page=matakuliah');
	}	
}	
?>