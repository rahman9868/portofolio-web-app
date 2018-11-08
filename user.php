<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>

<h1>Daftar User</h1>
<table>
<form action="aksi_user.php?proses=query" method="post">
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Username</label>
	<div class="col-sm-10">
		<input type="text" name="username" placeholder="Username" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Password</label>
	<div class="col-sm-10">
		<input type="password" name="password" placeholder="Password" required class="form-control">
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Level</label>
	<div class="col-sm-10">
		<input type="text" name="level" placeholder="Level" required class="form-control">
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
<a href="?page=user&aksi=list" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Data User Yang Telah Dibuat</a>

<?php
break;
case 'list' :
?>

<h1> Data User </h1>
<a href="?page=jurusan&aksi=entri" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Daftar User</a>
<h1></h1>
<table class="table table-hover" width=100%>
	<tr>
		<th>No</th>
		<th>Username</th>
		<th>Password</th>
		<th>Level</th>
		<th>Aksi</th>
	</tr>
<?php 
$q=mysql_query("SELECT * FROM user"); 		
$no=1;
while ($data=mysql_fetch_array($q)) {
?>
	<tr>
		<td> <?php echo $no; ?> </td>
		<td> <?php echo $data ['username'] ?> </td>
		<td> <?php echo $data ['password'] ?> </td>
		<td> <?php echo $data ['level'] ?> </td>
		<td> <a href="aksi_user.php?proses=hapus&id_hapus=<?php echo $data['username'] ?>" 
		onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini?')" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>    
		
		<a href="?page=user&aksi=edit&id_edit=<?php echo $data['username'] ?>" 
		onclick="return confirm('Apakah Anda Yakin Untuk Mengedit Data Ini?')" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
		
		</td>
	</tr>
<?php
$no++;
}
?>
</table>



<?php
break;
case 'edit' :
?>

<?php

$ambil=mysql_query("SELECT * FROM user WHERE username='$_GET[id_edit]'");
$data=mysql_fetch_array($ambil);
?>

<h1>Edit Data User</h1>
<form action="aksi_user.php?proses=update" method="post">
<table>
<tr>
	<td>Username</td>
	<td><input type="text" value="<?php echo $data['username'] ?>" name="username" required></td>
</tr>
<tr>
	<td>Password</td>
	<td><input type="password" value="<?php echo $data['password'] ?>" name="password" required></td>
</tr>
<tr>
	<td>Level</td>
	<td><input type="text" value="<?php echo $data['level'] ?>"name="level" required></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Update">
	<input type="reset" name="reset" value="Reset">
	<a href="?page=user&aksi=list"><input type="submit" value="Kembali ke Data User"></a></td>
</tr>
</form>
</table>


<?php
break;
}
?>
