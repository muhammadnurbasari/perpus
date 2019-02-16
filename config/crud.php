<?php
include 'database.php';

/**
* 
*/
class db_crud extends db_connect
{
	
	public function __construct()
	{
		$this->connect();
	}
/*CREATE*/	
public function create($query)
{
	$result = $this->conn->query($query);
		
	return $result;
		
}
/*SELESAI CREATE*/


/*READ*/	
public function read($query)
	{
			$result = $this->conn->query($query);
			$rows = [];

			while ($row = $result->fetch_assoc()) :
				$rows[] =$row;
			endwhile;

			return $rows;
	}
/*SELESAI READ*/


// UPDATE

public function update($query)
{
	$result = $this->conn->query($query);
	
	return $result;
}


// SELESAI UPDATE



public function hapus($query)
{
	$result = $this->conn->query($query);
	
	return $result;
}





// UPLOAD
public function upload()
{
	$fileName = $_FILES['photo']['name'];
	$ukuranFile = $_FILES['photo']['size'];
	$eror = $_FILES['photo']['error'];
	$tmpname = $_FILES['photo']['tmp_name'];

	// cek ekstensi file
	$ekstensiGambarValid = array("jpg","png","jpeg");
	$x = explode('.', $fileName);
	$ekstensi = strtolower(end($x));


	if (!in_array($ekstensi, $ekstensiGambarValid)) {
		echo "<script>
				alert('ekstensi not valid');
				document.location.href = '../views/katalog.php';
		</script>";
		return;
	}

	// cek gambar tidak dipilih
	if ($eror === 4) {
		echo "<script>
				alert('Pilih Gambar Terlebih Dahulu');
				document.location.href = '../views/katalog.php';
		</script>";
		return;
	}

	// cek ukuran gambar
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('gambar terlalu besar');
				document.location.href = '../views/katalog.php';
		</script>";
		return;
	}



	// gambar siap upload
	// generate kode unik terlebih dahulu

	$fileNameBaru = uniqid();
	$fileNameBaru .= '.';
	$fileNameBaru .= $ekstensiGambar;


	move_uploaded_file($tmpname, '../images/books/' .$fileNameBaru);
	return $fileNameBaru;

}

// SELESAI UPLOAD
}
?>