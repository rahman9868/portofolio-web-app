<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>

<h1>Data Mata Kuliah</h1>
</br>
<table>
<form action="aksi_matakuliah.php?proses=query" method="post">
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Kode</label>
	<div class="col-sm-10">
		<input type="text" name="kode" placeholder="Kode Mata Kuliah" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Nama Mata Kuliah</label>
	<div class="col-sm-10">
		<input type="text" name="nama_makul" placeholder="Nama Mata Kuliah" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">SKS</label>
	<div class="col-sm-10">
		<input type="text" name="sks" placeholder="SKS" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Jumlah Jam</label>
	<div class="col-sm-10">
		<input type="text" name="jam" placeholder="Banyak Jam" required class="form-control">
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
<a href="?page=matakuliah&aksi=list" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Data Mata Kuliah Yang Telah Dibuat</a>

<?php
break;
case 'list' :
?>

<h1> Data Mata Kuliah </h1>
<a href="?page=matakuliah&aksi=entri" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Entri Data Mata Kuliah</a>
<a href="report_matakuliah.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Cetak </a>
<h1></h1>
<table class="table table-hover" id="dataTables-example">
<thead>
	<tr>
		<th>No</th>
		<th>Kode</th>
		<th>Nama Mata Kuliah</th>
		<th>SKS</th>
		<th>Jumlah Jam</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
<?php 
$q=mysql_query("SELECT * FROM matakuliah"); 		
$no=1;
while ($data=mysql_fetch_array($q)) {
?>
	<tr>
		<td> <?php echo $no; ?> </td>
		<td> <?php echo $data ['kode'] ?> </td>
		<td> <?php echo $data ['nama_makul'] ?> </td>
		<td> <?php echo $data ['sks'] ?> </td>
		<td> <?php echo $data ['jam'] ?> </td>
		<td> <a href="aksi_matakuliah.php?proses=hapus&id_hapus=<?php echo $data['kode'] ?>" 
		onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini?')" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>    
		
		<a href="?page=matakuliah&aksi=edit&id_edit=<?php echo $data['kode'] ?>"
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

$ambil=mysql_query("SELECT * FROM matakuliah WHERE kode='$_GET[id_edit]'");
$data=mysql_fetch_array($ambil);
?>

<h1>Edit Data Mata Kuliah</h1>
<form action="aksi_matakuliah.php?proses=update" method="post">
<table>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Kode</label>
	<div class="col-sm-10">
		<input type="text" value="<?php echo $data['kode'] ?>" name="kode" class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Nama Mata Kuliah</label>
	<div class="col-sm-10">
		<input type="text" value="<?php echo $data['nama_makul'] ?>" name="nama_makul" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">SKS</label>
	<div class="col-sm-10">
		<input type="text" value="<?php echo $data['sks'] ?>" name="sks" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Jumlah Jam</label>
	<div class="col-sm-10">
		<input type="text" value="<?php echo $data['jam'] ?>"name="jam" required class="form-control">
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
<a href="?page=matakuliah&aksi=list" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali Ke Data Mata Kuliah</a>

<?php
break;
}
?>
