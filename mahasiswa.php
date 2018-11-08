<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>

<h1>Biodata Mahasiswa</h1>
<table>
<form action="aksi_mahasiswa.php?proses=query" method="post">
<div class="form-group">
	<label>NIM</label>
	<input type="text" name="nim" placeholder="Nomor Induk Mahasiswa" required class="form-control">
</div>
<div class="form-group">
	<label>Nama Mahasiswa</label>
	<input type="text" name="nam_mhs" placeholder="Nama Mahasiswa" required class="form-control">
</div>
<div class="form-group">
	<label>Jenis Kelamin</label>
	<select name=jekel class="form-control">
	<option>L</option>
	<option>P</option>
	</select>
</div>
<div class="form-group">
	<label>E-Mail</label>
	<input type="text" name="email" placeholder="                                           @gmail.com" required class="form-control">
</div>
<div class="form-group">
	<label>ID Jurusan</label>
	<input type="text" name="id_jurusan" placeholder="ID Jurusan Mahasiswa" required class="form-control">
</div>
<div class="form-group">
	<label>ID Program Studi</label>
	<input type="text" name="id_prodi" placeholder="ID Program Studi Mahasiswa" required class="form-control">
</div>
<div class="form-group">
	<label>No. Telp</label>
	<input type="text" name="no_telp" placeholder="Nomor Telephone" required class="form-control">
</div>
<div class="form-group">
	<label>Alamat</label>
	<textarea cols=70 rows=3 name="alamat" class="form-control"></textarea>
</div>
<tr>
	<td></td>
	<td><button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save  "></i> Simpan</button>
	<button type="reset" name="reset" class="btn btn-danger"><i class="glyphicon glyphicon-refresh"></i> Reset</button></td>
</tr>
</form>
</table>
</br>
<a href="?page=mahasiswa&aksi=list" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Data Mahasiswa Yang Telah Dibuat</a>


<?php
break;
case 'list' :
?>

<h1> Data Mahasiswa </h1>
<a href="?page=mahasiswa&aksi=entri" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Entri Data Mahasiswa</a>
<a href="report_mhs.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Cetak </a>
<h1></h1>
<table class="table table-hover" id="dataTables-example">
<thead>
	<tr>
		<th>No</th>
		<th>NIM</th>
		<th>Nama Mahasiswa</th>
		<th>Jenis Kelamin</th>
		<th>Nama Jurusan</th>
		<th>Nama Program Studi</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
<?php
$q=mysql_query("SELECT * FROM mahasiswa,jurusan,prodi WHERE mahasiswa.id_jurusan=jurusan.id_jurusan AND mahasiswa.id_prodi=prodi.id_prodi");
$no=1;
while ($data=mysql_fetch_array($q)) {
?>
	<tr>
		<td> <?php echo $no; ?> </td>
		<td> <?php echo $data ['nim'] ?> </td>
		<td> <?php echo $data ['nam_mhs'] ?> </td>
		<td> <?php echo $data ['jekel'] ?> </td>
		<td> <?php echo $data ['nama_jurusan'] ?> </td>
		<td> <?php echo $data ['nama_prodi'] ?> </td>
		<td> 
		
		<a href="aksi_mahasiswa.php?proses=hapus&id_hapus=<?php echo $data['nim'] ?>" 
		onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini?')" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>    
		
		<a href="?page=mahasiswa&aksi=edit&id_edit=<?php echo $data['nim'] ?>" 
		onclick="return confirm('Apakah Anda Yakin Untuk Mengedit Data Ini?')" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
		
		</td>
	</tr>
<?php
$no++;
}
?>
</tbody>
</table>


<?php
break;
case 'edit' :
?>

<?php

$ambil=mysql_query("SELECT * FROM mahasiswa WHERE nim='$_GET[id_edit]'");
$data=mysql_fetch_array($ambil);
?>

<h1>Edit Data Mahasiswa</h1>
<form action="aksi_mahasiswa.php?proses=update" method="post">
<table>
<div class="form-group">
	<label>NIM</label>
	<input type="text" value="<?php echo $data['nim'] ?>" name="nim" class="form-control">
</div>
<div class="form-group">
	<label>Nama Mahasiswa</label>
	<input type="text" value="<?php echo $data['nam_mhs'] ?>" name="nam_mhs" required class="form-control">
</div>
<div class="form-group">
	<label>Jenis Kelamin</label>
	<select name=jekel class="form-control">
	<option>L</option>
	<option>P</option>
	</select>
</div>
<div class="form-group">
	<label>E-Mail</label>
	<input type="text" value="<?php echo $data['email'] ?>" name="email" required class="form-control">
</div>
<div class="form-group">
	<label>ID Jurusan</label>
	<input type="text" value="<?php echo $data['id_jurusan'] ?>" name="id_jurusan" required class="form-control">
</div>
<div class="form-group">
	<label>ID Program Studi</label>
	<input type="text" value="<?php echo $data['id_prodi'] ?>" name="id_prodi" required class="form-control">
</div>
<div class="form-group">
	<label>No. Telp</label>
	<input type="text" value="<?php echo $data['no_telp'] ?>" name="no_telp" required class="form-control">
</div>
<div class="form-group">
	<label>Alamat</label>
	<textarea cols=70 rows=3 value="<?php echo $data['alamat'] ?>"name="alamat" required class="form-control"></textarea>
</div>
<tr>
	<td></td>
	<td><button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save  "></i> Update</button>
	<button type="reset" name="reset" class="btn btn-danger"><i class="glyphicon glyphicon-refresh"></i> Reset</button></td>
</tr>
</form>
</table>
</br>
<a href="?page=mahasiswa&aksi=list" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali Ke Data Mahasiswa</a>

<?php
break;
}
?>
