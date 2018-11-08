<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>

<h1>Data Dosen</h1>
</br>
<table>
<form action="aksi_dosen.php?proses=query" method="post">
<div class="form-group row">
	<label class="col-sm-2 col-form-label">NIP</label>
	<div class="col-sm-10">
		<input type="text" name="nip" placeholder="Nomor Induk Pegawai" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Nama Dosen</label>
	<div class="col-sm-10">
		<input type="text" name="nama_dosen" placeholder="Nama Dosen" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
	<div class="col-sm-10">
	<select name=jekel class="form-control">
	<option>L</option>
	<option>P</option>
	</select>
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">E-Mail</label>
	<div class="col-sm-10">
		<input type="text" name="email" placeholder="				@gmail.com" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">No Telp</label>
	<div class="col-sm-10">
		<input type="text" name="no_telp" placeholder="Nomor Telepon" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Alamat</label>
	<div class="col-sm-10">
	<textarea cols=70 rows=3 name="alamat" class="form-control"></textarea>
	</div>
</div>
<tr></tr>
<tr>
	<td></td>
	<td><button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save  "></i> Simpan</button>
	<button type="reset" name="reset" class="btn btn-danger"><i class="glyphicon glyphicon-refresh"></i> Reset</button></td>
</tr>
</form>
</table>
</br>
<a href="?page=dosen&aksi=list" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Data Dosen Yang Telah Dibuat</a>

<?php
break;
case 'list' :
?>

<h1> Data Dosen </h1>
<a href="?page=dosen&aksi=entri" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Entri Data Dosen</a>
<a href="report_dosen.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Cetak </a>
<h1></h1>
<table class="table table-hover" id="dataTables-example">
<thead>
	<tr>
		<th>No</th>
		<th>NIP</th>
		<th>Nama Dosen</th>
		<th>Jenis Kelamin</th>
		<th>E-Mail</th>
		<th>No Telp</th>
		<th>Alamat</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
<?php 
$q=mysql_query("SELECT * FROM dosen"); 		
$no=1;
while ($data=mysql_fetch_array($q)) {
?>
	<tr>
		<td> <?php echo $no; ?> </td>
		<td> <?php echo $data ['nip'] ?> </td>
		<td> <?php echo $data ['nama_dosen'] ?> </td>
		<td> <?php echo $data ['jekel'] ?> </td>
		<td> <?php echo $data ['email'] ?> </td>
		<td> <?php echo $data ['no_telp'] ?> </td>
		<td> <?php echo $data ['alamat'] ?> </td>
		<td> <a href="aksi_dosen.php?proses=hapus&id_hapus=<?php echo $data['nip'] ?>" 
		onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini?')" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>    
		
		<a href="?page=dosen&aksi=edit&id_edit=<?php echo $data['nip'] ?>"
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

$ambil=mysql_query("SELECT * FROM dosen WHERE nip='$_GET[id_edit]'");
$data=mysql_fetch_array($ambil);
?>

<h1>Edit Data Dosen</h1>
<form action="aksi_dosen.php?proses=update" method="post">
<table>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">NIP</label>
	<div class="col-sm-10">
		<input type="text" value="<?php echo $data['nip'] ?>" name="nip" class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Nama Dosen</label>
	<div class="col-sm-10">
		<input type="text" value="<?php echo $data['nama_dosen'] ?>" name="nama_dosen" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
	<div class="col-sm-10">
	<select name=jekel class="form-control">
	<option>L</option>
	<option>P</option>
	</select>
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">E-Mail</label>
	<div class="col-sm-10">
		<input type="text" value="<?php echo $data['email'] ?>" name="email" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">No Telp</label>
	<div class="col-sm-10">
		<input type="text" value="<?php echo $data['no_telp'] ?>" name="no_telp" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Alamat</label>
	<div class="col-sm-10">
	<textarea cols=70 rows=3 value="<?php echo $data['alamat'] ?>" name="alamat" class="form-control"></textarea>
	</div>
</div>
<tr>
	<td></td>
	<td>
	<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save  "></i> Update</button>
	<button type="reset" name="reset" class="btn btn-danger"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
	</td>
</tr>
</form>
</table>
</br>
<a href="?page=dosen&aksi=list" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali Ke Data Dosen</a>

<?php
break;
}
?>
