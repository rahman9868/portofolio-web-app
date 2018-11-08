<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>

<h1>Data Jurusan</h1>
</br>
<table>
<form action="aksi_jurusan.php?proses=query" method="post">
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Nama Jurusan</label>
	<div class="col-sm-10">
		<input type="text" name="nama_jurusan" placeholder="Masukkan Nama Jurusan" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Jenjang</label>
	<div class="col-sm-10">
		<input type="text" name="jenjang" placeholder="Masukkan Jenjang" required class="form-control"></td>
	</div>
</div>
<tr>
	<td></td>
	<td><button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save  "></i> Simpan</button>
	<button type="reset" name="reset" class="btn btn-danger"><i class="glyphicon glyphicon-refresh"></i> Reset</button></td>
</tr>
</form>
</table>
</br>
<a href="?page=jurusan&aksi=list" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Data Jurusan Yang Telah Dibuat</a>


<?php
break;
case 'list' :
?>

<h1> Data Jurusan </h1>
<a href="?page=jurusan&aksi=entri" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Entri Data Jurusan </a>
<a href="report_jurusan.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Cetak </a>
<h1></h1>
<table class="table table-hover" id="dataTables-example">
<thead>
	<tr>
		<th>No</th>
		<th>Nama Jurusan</th>
		<th>Jenjang</th>
		<th>ID Jurusan</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
<?php
$q=mysql_query("SELECT * FROM jurusan"); 		
$no=1;
while ($data=mysql_fetch_array($q)) {
?>
	<tr>
		<td> <?php echo $no; ?> </td>
		<td> <?php echo $data ['nama_jurusan'] ?> </td>
		<td> <?php echo $data ['jenjang'] ?> </td>
		<td> <?php echo $data ['id_jurusan'] ?> </td>
		<td>
		<a href="aksi_jurusan.php?proses=hapus&id_hapus=<?php echo $data['id_jurusan'] ?>"  
		onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini?')" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>   
		
		<a href="?page=jurusan&aksi=edit&id_edit=<?php echo $data['id_jurusan'] ?>"
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
$ambil=mysql_query("SELECT * FROM jurusan WHERE id_jurusan='$_GET[id_edit]'");
$data=mysql_fetch_array($ambil);
?>

<h1>Edit Data Jurusan</h1>
</br>
<form action="aksi_jurusan.php?proses=update" method="post">
<table>
<tr>
	<td></td>
	<td><input type="hidden" value="<?php echo $data['id_jurusan'] ?>" name="id_jurusan"></td>
</tr>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Nama Jurusan</label>
	<div class="col-sm-10">
		<input type="text" value="<?php echo $data['nama_jurusan'] ?>" name="nama_jurusan" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Jenjang</label>
	<div class="col-sm-10">
		<input type="text" value="<?php echo $data['jenjang'] ?>" name="jenjang" required class="form-control">
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
<a href="?page=jurusan&aksi=list" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali Ke Data Jurusan</a>

<?php
break;
}
?>
