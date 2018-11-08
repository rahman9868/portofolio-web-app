<?php
include ('koneksi.php');
$pass=md5($_POST['password']);
if ($_GET['proses']=='query') 
{
//skrip untuk insert
	if(isset($_POST['submit']))
	{
		$query=mysql_query("INSERT INTO user (username,password,level) 
		values ('$_POST[username]','$pass','$_POST[level]')");
			if($query)
				header("location:index.php?page=user");
	}
}

else if ($_GET['proses']=='hapus')
{
//skrip untuk delete
	$hapus=mysql_query("DELETE FROM user WHERE username='$_GET[id_hapus]'");
		if ($hapus)
			header("location:index.php?page=user");
}

else if ($_GET['proses']=='update')
{
//skrip untuk edit
	$ubah = mysql_query ("UPDATE user SET
			username	='$_POST[username]',
			password	='$pass',
			level		='$_POST[level]' WHERE username='$_POST[username]'");
		if($ubah){
			header('location:index.php?page=user');
	}	
}	
?>