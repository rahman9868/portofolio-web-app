<?php
include ('koneksi.php');
if ($_GET['proses']=='query') 
{
//skrip untuk insert
	if(isset($_POST['submit']))
	{
		$query=mysql_query("INSERT INTO dosen (nip,nama_dosen,jekel,email,no_telp,alamat) 
		values ('$_POST[nip]','$_POST[nama_dosen]','$_POST[jekel]','$_POST[email]','$_POST[no_telp]','$_POST[alamat]')");
			if($query)
				header("location:index.php?page=dosen");
	}
}

else if ($_GET['proses']=='hapus')
{
//skrip untuk delete
	$hapus=mysql_query("DELETE FROM dosen WHERE nip='$_GET[id_hapus]'");
		if ($hapus)
			header("location:index.php?page=dosen");
}

else if ($_GET['proses']=='update')
{
//skrip untuk edit
	$ubah = mysql_query ("UPDATE dosen SET
			nip				='$_POST[nip]',
			nama_dosen		='$_POST[nama_dosen]',
			jekel			='$_POST[jekel]',
			email			='$_POST[email]',
			no_telp			='$_POST[no_telp]',
			alamat			='$_POST[alamat]' 
			WHERE nip='$_POST[nip]'");
		if($ubah){
			header('location:index.php?page=dosen');
	}	
}	
?>