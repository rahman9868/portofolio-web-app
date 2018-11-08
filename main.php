<?php
include ('koneksi.php');
$page=isset($_GET['page']) ? $_GET['page'] : 'home';
if ($page=='home') include ('home.php');
if ($page=='mahasiswa') include ('mahasiswa.php');
if ($page=='jurusan') include ('jurusan.php');
if ($page=='prodi') include ('prodi.php');
if ($page=='matakuliah') include ('matakuliah.php');
if ($page=='user') include ('user.php');
if ($page=='dosen') include ('dosen.php');

?>