<?php 
$page_title = "Edit-Anggota";
include 'header.php';
include 'side.php';
include '../config/crud.php';

$id = $_GET['id'];

$query = "SELECT * FROM anggota WHERE id_anggota = $id";

$conn = new db_crud();

$tampilAnggota = $conn->read($query);

// createdby 

$created = "SELECT user.nama_user FROM user INNER JOIN anggota ON user.id_user = anggota.created_by WHERE anggota.id_anggota = '$id' ";

$tampilCreatedAnggota = $conn->read($created);


// update by

$updateBy = "SELECT user.nama_user FROM user INNER JOIN anggota ON user.id_user = anggota.update_by WHERE anggota.id_anggota = '$id' ";

$tampilEditAnggota = $conn->read($updateBy);


?>
<form action="../config/proses_anggota.php?aksi=edit" method="POST">
<div class="col-sm-10" style="background-color: #ffffff;">
	

	<div class="panel panel-primary" style="width: 700px;float: left;">
		<div class="panel-heading"><h3 style="text-align: center;"><?= $page_title; ?></h3></div>
		<div class="panel-body">
			<div class="form-group">
				<input class="form-control" type="hidden" name="id" value="<?= $tampilAnggota[0]['id_anggota']; ?>">
			</div>
			<div class="form-group">
				<label>NPM :</label>
				<input class="form-control" type="text" name="npm" value="<?= $tampilAnggota[0]['npm'];  ?>">
			</div>
			<div class="form-group">
				<label>NAMA :</label>
				<input class="form-control" type="text" name="nama" value="<?= $tampilAnggota[0]['nama'];  ?>">
			</div>
			<div class="form-group">
				<label>Jenis Kelamin :</label><br/>
				<?php 
					$lakilaki = "";
					$perempuan = "";


					if ($tampilAnggota[0]['jenis_kelamin'] === "L") {
						$lakilaki = 'checked';
					}else{
						$perempuan = 'checked';
					}
				 ?>



				<label class="radio-inline">
					<input type="radio" name="jk" value="L" <?= $lakilaki; ?>>Laki-Laki
				</label>
				<label class="radio-inline">
					<input type="radio" name="jk" value="P" <?= $perempuan; ?>>Perempuan
				</label>
			</div>
			<div class="form-group">
				<label>Alamat :</label>
				<textarea class="form-control" name="alamat" rows="3"><?= $tampilAnggota[0]['alamat']; ?></textarea>
			</div>
			<div class="form-group">
				<label>Telephone :</label>
				<input class="form-control" type="number" name="telp" value="<?= $tampilAnggota[0]['no_tlp']  ?>">
			</div>
			<div class="form-group">
				<label>Jurusan :</label>
				<select name="jurusan" class="form-control">
					<?php 
					$jurusan_1 = "";
					$jurusan_2 = "";
					$jurusan_3 = "";
					$jurusan_4 = "";

					if ($tampilAnggota[0]['jurusan'] === "sistem informasi") {
						$jurusan_1 = 'selected';
					}elseif ($tampilAnggota[0]['jurusan'] === "komputer akuntansi") {
						$jurusan_2 = 'selected';
					}elseif ($tampilAnggota[0]['jurusan'] === "manajemen") {
						$jurusan_3 = 'selected';
					}else{
						$jurusan_4 = 'selected';
					}
					 ?>
					 <option value="" disabled/>---Pilih Jurusan---</option>
					 <option value="sistem informasi" <?= $jurusan_1; ?>>Sistem Informasi</option>
					 <option value="komputer akuntansi" <?= $jurusan_2; ?>>Komputer Akuntansi</option>
					 <option value="manajemen" <?= $jurusan_3; ?>>Manajemen</option>
					 <option value="akuntansi" <?= $jurusan_4; ?>>Akuntansi</option>
				</select>
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-block" type="submit" name="edit">UPDATE</button>
			</div>
		</div>
		
	</div>
<!-- detail anggota -->
<div style="margin-left: 720px;">
	<h2><kbd>Detail Anggota</kbd></h2>
	<ul>
		<li><h5>Npm : <?= $tampilAnggota[0]['npm']; ?></h5></li>
		<li><h5>Nama : <?= $tampilAnggota[0]['nama']; ?></h5></li>
		<li><h5>Alamat : <?= $tampilAnggota[0]['alamat']; ?></h5></li>
		<li><h5>Handphone : <?= $tampilAnggota[0]['no_tlp']; ?></h5></li>
	</ul>
	<ul>
		<li><strong>Created By : <?= $tampilCreatedAnggota[0]['nama_user']; ?> </strong></li>

		<?php if (!$tampilEditAnggota) { ?>
				<li><strong>Update By : - </strong></li>
		<?php	} else { ?>
				<li><strong>Last Update By : <?= $tampilEditAnggota[0]['nama_user']; ?> </strong></li>
		<?php }  ?>
		
	</ul>
</div>
</div>
</form>
<?php 
include 'footer.php';
?>