<?php 
session_start();
$page_title = "Transaksi Pinjam";
include 'header.php';
include 'side.php';
include '../config/crud.php';

$conn = new db_crud();


$query = " SELECT p.id_pinjam, p.tgl_pinjam, p.tgl_jatuh_tempo, anggota.nama, p.status FROM peminjaman_header AS p INNER JOIN anggota WHERE p.id_anggota = anggota.id_anggota ";

$tampilPinjams = $conn->read($query);


 ?>

<div class="col-sm-10">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="title"><?= $page_title;  ?></h3><hr/>
			<img src="../images/icons8-user-account-30.png">
			<strong><?= $_SESSION['nama'] ; ?></strong>
		</div>
	</div>
	<a href="tambah-pinjam.php" class="btn btn-primary">Tambah</a><hr>
	<table class="table table-bordered">
		<thead>
			<th>No</th>
			<th>ID Pinjam</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Tempo</th>
			<th>Nama Anggota</th>
			<th>Status</th>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach ($tampilPinjams as $tampilPinjam) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td> <a href="detail-pinjam.php?id=<?= $tampilPinjam['id_pinjam']; ?>"> <?= $tampilPinjam['id_pinjam'];  ?> </a></td>
					<td><?= $tampilPinjam['tgl_pinjam'];  ?></td>
					<td><?= $tampilPinjam['tgl_jatuh_tempo'];  ?></td>
					<td><?= $tampilPinjam['nama'];  ?></td>
					<td><?= $tampilPinjam['status'];  ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>









 <?php 
include 'footer.php';
  ?>