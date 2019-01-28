<?php 
session_start();
$page_title = "Tambah Pinjam";
include 'header.php';
include 'side.php';

include '../config/crud.php';
	$conn = new db_crud();
	// tampil anggota
	$query = " SELECT id_anggota, nama FROM anggota WHERE is_active = '1' ";
	$tampilAnggota = $conn->read($query);

	// tampil buku
	$query2 = " SELECT id_buku,judul FROM buku ";
	$tampilBuku = $conn->read($query2);



 ?>
 <!-- css -->
 <style type="text/css">
 	.no{
 		width: 30px;
 	}
 	#headertr{
 		width: 300px;
 	}
 	td{
 		text-align: center;
 	}
 	th{
 		text-align: center;
 	}
 </style>

<form method="POST" action="../config/proses_pinjam.php?aksi=tambah">
<div class="col-sm-10">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="title"><?= $page_title;  ?></h3><hr/>
			<img src="../images/icons8-user-account-30.png">
			<strong><?= $_SESSION['nama'] ; ?></strong>
		</div>

		<div class="panel-body">
			<button class="btn btn-primary" type="submit" name="simpan">Simpan</button><hr>
			<div class="row">
				<div class="col-sm-6">		
					<div class="form-group">
						<label for="idPinjam">ID PINJAM :</label>
						<input class="form-control" id="headertr" type="text" id="idPinjam" name="idPinjam" value="<?= time(); ?>" disabled/>
					</div>
					<div class="form-group">
						<label>ANGGOTA :</label>
						<!-- menampilkan nama anggota berdasarkan id anggota ambil dari database -->
						<select name="idAnggota"  class="form-control" id="headertr" required/>
						 <option value="" disabled selected/>---Pilih Anggota---</option>
						 <?php 
						 foreach ($tampilAnggota as $key) : ?>
						 	<option value="<?= $key['id_anggota']; ?>"><?= $key['id_anggota']?> --- <?= $key['nama'];  ?></option>
						 <?php endforeach; ?>
						 </select>
					</div>
				</div>
				<div class="col-sm-6">		
					<div class="form-group">
						<label>Tanggal Pinjam :</label>
						<input class="form-control" id="headertr" type="text" disabled name="tglPinjam" value="<?= date('m/d/y')  ?>">
					</div>
					<div class="form-group">
						<label>Tanggal Kembali ( Tempo ) :</label>
						<input class="form-control" id="headertr" type="date" name="tglKembali" required/>
					</div>
				</div>
			</div>
			<label><h3 class="title"><kbd>Buku Yang Dipinjam :</kbd></h3></label>
			<table class="table table-bordered">
				<thead>
					<th>NO</th>
					<th>BUKU</th>
					<th style="width: 100px;">JUMLAH</th>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					
					while ($no <= 3) { ?>
						<tr>
							<td class="no"><?= $no; ?></td>
							<td>
								<select class="form-control" name="buku">
									<option value="" selected/>---Pilih Buku---</option>
									<?php 
										foreach ($tampilBuku as $buku) { ?>
											<option value="<?= $buku['id_buku']; ?>"><?= $buku['id_buku'] ?>--- <?= $buku['judul']; ?></option>
									<?php } ?>
								</select>
							</td>
							<td><input class="form-control" name="jumlah" type="number"></td>
						</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>		
</form>

 <?php 
include 'footer.php';
  ?>
