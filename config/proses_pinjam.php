<?php
session_start();
include 'crud.php';

$conn = new db_crud();


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





 ?>