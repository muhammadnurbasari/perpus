<?php
session_start();
if (isset($_POST["btn_save"])) {
	$head = $_POST["head"];
	$detail = $_POST["item"];

	include 'crud.php';

	$conn = new db_crud();


	// menangkap dengan menggunakan variable super globals $_POST
	$id = time();
	$tglpinjam = date('y/m/d');
	$tglkembali = $head['tgl_kembali'];
	$idanggota = $head['id_anggota'];
	$createby = $_SESSION['id'];
	$createdate = date('Y-m-d');
	$status = 1;


	$query = "INSERT INTO peminjaman_header VALUES ('$id','$tglpinjam','$tglkembali','$idanggota','$createby','$createby','$createdate','$createdate','$status')";
	$eksHeader = $conn->create($query);

	for ($i = 0; $i < count($detail['buku_id']); $i++) {
		$buku = $detail['buku_id'][$i];
		$jumlah = $detail['qty'][$i];
		$query2 = " INSERT INTO peminjaman_detail VALUES ('$id','$buku','$jumlah')";
		$conn->create($query2);
	}

	echo "<script>
				alert('data berhasil disimpan');
				document.location.href = '../views/pinjam.php';
		</script>";
}else{
	echo "<script>
				alert('data gagal disimpan');
				document.location.href = '../views/pinjam.php';
		</script>";
}



	








 ?>