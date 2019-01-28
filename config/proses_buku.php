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
	$judul = htmlspecialchars($_POST["judul"]);
	$penerbit = htmlspecialchars($_POST["penerbit"]);
	$pengarang = htmlspecialchars($_POST["pengarang"]);
	$tahun = htmlspecialchars($_POST["tahunterbit"]);
	$kategori = htmlspecialchars($_POST["kategori"]);
	$isbn = htmlspecialchars($_POST["isbn"]);
	$gambar = htmlspecialchars($conn->upload());
	$qty = htmlspecialchars($_POST["qty"]);
	$createby = $_SESSION['id'];
	$createdate = date('y-m-d');
	$isactive =true;

	if (!$gambar) {
		return false;
	}



	$query = "INSERT INTO buku VALUES 
					('$id','$judul','$penerbit','$pengarang','$tahun','$kategori','$isbn','$gambar','$qty','$createby','','$createdate','','$isactive')";

	$conn->create($query);
	header('Location: ../views/katalog.php');

	




} 


if ($aksi === "edit") {
	$id = $_POST["id"];
	$judul = htmlspecialchars($_POST["judul"]);
	$penerbit = htmlspecialchars($_POST["penerbit"]);
	$pengarang = htmlspecialchars($_POST["pengarang"]);
	$tahun = htmlspecialchars($_POST["tahun"]);
	$kategori = htmlspecialchars($_POST["kategori"]);
	$isbn = htmlspecialchars($_POST["isbn"]);
	$gambarLama = $_POST['gambarlama'];
	$qty = htmlspecialchars($_POST["qty"]);
	$updateBy = $_SESSION['id'];
	$updateDate = date('y-m-d');
	$isactive =1;

	if ($_FILES['photo']['error'] === 4) {
		$gambar = $gambarLama;
	} else{
		$gambar = $conn->upload();
	}


	$query = "UPDATE buku SET 
				judul = '$judul',
				penerbit = '$penerbit',
				pengarang = '$pengarang',
				tahun_terbit = '$tahun',
				kategori = '$kategori',
				isbn = '$isbn',
				photo = '$gambar',
				qty = '$qty',
				update_date = '$updateDate',
				update_by ='$updateBy'
				WHERE id_buku = $id";


	$conn->update($query);

	header('Location: ../views/katalog.php');
	
}



if ($aksi === "hapus") {
	$id = $_POST['id'];
	$updateBy = $_SESSION['id'];

	$query = "UPDATE buku SET is_active = 'FALSE', update_by = '$updateBy'  WHERE id_buku='$id'";

	$conn->hapus($query);

	header('Location: ../views/katalog.php');
}









}

 ?>