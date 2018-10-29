<?php 

/**
 * 
 */
class proses{

	private $conn;

	function __construct(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "dataoop";
		$this->conn = new mysqli($servername, $username, $password, $db);

		if ($this->conn->connect_error) {
    		die("Connection failed: " . $this->conn->connect_error);
		} 
	}

	public function view(){
		$sql ="SELECT * FROM mahasiswa";
		return mysqli_query($this->conn, $sql);
	}

	public function tambah(){
		$nama = $_POST['nama'];
		$nim = $_POST['nim'];
		$kelas = $_POST['kelas'];


		$sql ="INSERT INTO mahasiswa(nama, nim, kelas) VALUES ('$nama','$nim','$kelas')";
		if (mysqli_query($this->conn, $sql)) {

			echo "	<script>
         				alert('Data berhasil di tambah');
         				location='view.php';
         			</script>";	    	

	    }
	}

	public function delete($nim){
	    $delete = "DELETE FROM mahasiswa WHERE nim='$nim'";

	    if (mysqli_query($this->conn, $delete)) {
	        echo "<script> 
	                alert('Data berhasil dihapus!'); 
	                location='view.php';
	             </script>";
	    }else {
	        echo "Error: " . $delete . "<br?" . mysqli_error($this->conn);
	    }
	}
	public function edit(){
		
		$nama = $_POST['nama'];
		$nim = $_POST['nim'];
		$kelas = $_POST['kelas'];


		$sql = "UPDATE mahasiswa SET nama='$nama',kelas='$kelas' WHERE nim='$nim'";
		if (mysqli_query($this->conn, $sql) ) {
	        echo "<script> 
	                alert('Data berhasil di edit'); 
	                location='view.php';
	             </script>";
	    }else {
	        echo "Error: " . $sql . "<br?" . mysqli_error($this->conn);
	    }
	}

	public function select_data($nim){

	    $edit   = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
	    return mysqli_query($this->conn,$edit); 
	}

}

$proses = new proses();
if (isset($_GET['tambah'])) {
	$proses -> tambah();
}
if (isset($_GET['edit'])) {
	$proses -> edit();
}
if (isset($_GET['delete'])) {
	$proses -> delete($_GET['delete']);
}

?>