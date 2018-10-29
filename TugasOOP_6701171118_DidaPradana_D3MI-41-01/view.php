<br>
<br>
<a href="">Tambah Data</a> <!-- Ditambhkan bila ingin menginput data -->
<br>
<br>
<br><br><br>
<table border="1" align="center" width="70%">
	<tr>
		<th>Nim</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Action</th>
	</tr>
	<?php 
		require_once ("proses.php");
		$result = $proses->view();	
		if (mysqli_num_rows($result)>0) {
			while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $row['nim']?></td>
				<td><?php echo $row['nama']?></td>
				<td><?php echo $row['kelas']?></td>
				<td><a href="proses.php?delete=<?php echo $row['nim']; ?>"> Hapus</a> | <a href="edit.php?nim=<?php echo $row['nim']; ?>"> Edit</a></td>
			</tr>
			<?php
			}
		} else{
			echo "0 results";
		}
 	?>
 </table>