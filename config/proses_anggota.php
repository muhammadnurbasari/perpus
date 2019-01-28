<?php
session_start();
include 'crud.php';

$conn = new db_crud();
if (isset($_GET["aksi"])) {
$aksi = $_GET["aksi"];

if ($aksi === "tambah") {


// deklarasi id otomatis
	$id = time();

// menangkap dengan menggunakan variable super globals $_POST
	$npm = $_POST['npm'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$jurusan = $_POST['jurusan'];
	$createby = $_SESSION['id'];
	$createdate = date('d-m-y');
	$isactive = true;


	$query = "INSERT INTO anggota VALUES 
					('$id','$npm','$nama','$jk','$alamat','$telp','$jurusan','$createby','','$createdate','','$isactive')";

	$simpan = $conn->create($query);
	header('Location: ../views/anggota.php');

	




} 

// update anggota
if ($aksi === "edit") {
	$id = $_POST["id"];
	$npm = $_POST['npm'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$jurusan = $_POST['jurusan'];
	$updateBy = $_SESSION['id'];
	$updateDate = date('d-m-y');
	


	$query = "UPDATE anggota SET 
				npm = '$npm',
				nama = '$nama',
				jenis_kelamin = '$jk',
				alamat = '$alamat',
				no_tlp = '$telp',
				jurusan = '$jurusan',
				update_by = '$updateBy',
				update_date = '$updateDate'
				WHERE id_anggota = $id";


	$conn->update($query);

	header('Location: ../views/anggota.php');
	
}


// hapus anggota
if ($aksi === "hapus") {
	$id = $_POST['id'];
	$updateBy = $_SESSION['id'];

	$query = "UPDATE anggota SET is_active = 'FALSE', update_by = '$updateBy'  WHERE id_anggota='$id'";

	$conn->hapus($query);

	header('Location: ../views/anggota.php');
}

}


 ?>