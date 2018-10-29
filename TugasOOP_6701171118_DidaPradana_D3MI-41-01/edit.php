<?php 
	require_once ('proses.php');
	$nim     = $_GET['nim'];
	$sql = $proses -> select_data($nim);
    $row    = mysqli_fetch_assoc($sql);
 ?>

<table>
	<form method="post" enctype="multipart/form-data" action="proses.php?edit=<?php echo $row['nim']; ?>">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
		</tr>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="text" name="nim" value="<?php echo $row['nim']; ?>"></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><input type="text" name="kelas" value="<?php echo $row['kelas']; ?>"></td>
		</tr>
			<td><input type="submit" name="kirim" value="Edit"></td>
		</tr>
		</form>
</table>

<?php 



 ?>