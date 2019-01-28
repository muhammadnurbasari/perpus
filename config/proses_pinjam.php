<?php
session_start();
include 'crud.php';

$conn = new db_crud();
if (isset($_GET["aksi"])) {
$aksi = $_GET["aksi"];

if ($aksi === "tambah") {



// menangkap dengan menggunakan variable super globals $_POST
	$id = time();
	$tglpinjam = date('y/m/d');
	$tglkembali = $_POST['tglKembali'];
	$idanggota = $_POST['idAnggota'];
	$createBy = $_SESSION['id'];
	$createdate = date('y/m/d');
	$status = 1;
	


	$buku = $_POST['buku'];
	$jumlah = $_POST['jumlah'];
	$totalArray = count($buku);

		$query = "INSERT INTO peminjaman_header VALUES ('$id','$tglpinjam','$tglkembali','idanggota','$createBy','','$createdate','','$status')";
		$eksHeader = $conn->create($query);
		

		if ($eksHeader) {
			for ($i=0; $i < $totalArray; $i++) {
			$query2 = " INSERT INTO peminjaman_detail VALUES ('$id','$buku[$i]','$jumlah[$i]') ";
			$conn->create($query2);
			}
		}else{
			 echo $conn->error;   
		}
	// $query2 = " INSERT INTO peminjaman_detail VALUES ('$id','$buku','$jumlah') ";
	// $conn->create($query2);
	
	// for ($i=0; $i < $totalArray; $i++) {
	// 	$query2 = " INSERT INTO peminjaman_detail VALUES ('$id','$buku[$i]','$jumlah[$i]') ";
	// 	$conn->create($query2);
	// }
// header('Location: ../views/pinjam.php');


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