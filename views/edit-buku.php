<?php 
$page_title = "Edit-Buku";
include 'header.php';
include 'side.php';
include '../config/crud.php';

$id = $_GET['id'];

$query = "SELECT * FROM buku WHERE id_buku = $id";

$conn = new db_crud();

$tampilEdit = $conn->read($query);

// createdby 

$created = "SELECT user.nama_user FROM user INNER JOIN buku ON user.id_user = buku.created_by WHERE buku.id_buku = '$id' ";

$tampilCreated = $conn->read($created);


// update by

$updateBy = "SELECT user.nama_user FROM user INNER JOIN buku ON user.id_user = buku.update_by WHERE buku.id_buku = '$id' ";

$tampilUpdate = $conn->read($updateBy);



?>
<form action="../config/proses_buku.php?aksi=edit" method="POST" enctype="multipart/form-data">
<div class="col-sm-10" style="background-color: #ffffff;">
	

	<div class="panel panel-primary" style="width: 700px;float: left;">
		<div class="panel-heading"><h3 style="text-align: center;"><?= $page_title; ?></h3></div>
		<div class="panel-body">
			<div class="form-group">
				<input class="form-control" type="hidden" name="id" value="<?= $tampilEdit[0]['id_buku']; ?>">
			</div>
			<div class="form-group">
				<input class="form-control" type="hidden" name="gambarlama" value="<?= $tampilEdit[0]['photo']; ?>">
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="judul" value="<?= $tampilEdit[0]['judul']; ?>">
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="penerbit" value="<?= $tampilEdit[0]['penerbit']; ?>">
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="pengarang" value="<?= $tampilEdit[0]['pengarang']; ?>">
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="tahun" value="<?= $tampilEdit[0]['tahun_terbit']; ?>">
			</div>
			<div class="form-group">
				<select name="kategori" class="form-control">
					<?php 
						$selected_1 = "";
						$selected_2 = "";
						$selected_3 = "";
						$selected_4 = "";

						if ($tampilEdit[0]['kategori'] == "sistem informasi") {
							$selected_1 = 'selected';
						}

						if ($tampilEdit[0]['kategori'] == "komputer akuntansi") {
							$selected_2 = 'selected';
						}

						if ($tampilEdit[0]['kategori'] == "manajemen") {
							$selected_3 = 'selected';
						}

						if ($tampilEdit[0]['kategori'] == "akuntansi") {
							$selected_4 = 'selected';
						}
						?>

						<option disabled/>---Pilih Kategori---</option>
						<option value="sistem informasi" <?= $selected_1; ?>>Sistem Informasi</option>
						<option value="komputer akuntansi" <?= $selected_2; ?>>Komputer Akuntansi</option>
						<option value="manajemen" <?= $selected_3; ?>>Manajemen</option>
						<option value="akuntansi" <?= $selected_4; ?>>Akuntansi</option>
				</select>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="isbn" placeholder="ISBN.... (boleh dikosongkan)" value="<?= $tampilEdit[0]['isbn']; ?>">
			</div>
			<div class="form-group">
				<img src="../images/books/<?= $tampilEdit[0]['photo']; ?>" style="width: 50px;">
				<input class="form-control" type="file" name="photo">
			</div>
			<div class="form-group">
				<input class="form-control" type="number" name="qty" value="<?= $tampilEdit[0]['qty']; ?>">
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-block" type="submit" name="edit">UPDATE</button>
			</div>
		</div>
		
	</div>

<!-- detail buku -->
<div style="margin-left: 720px;">
	<h2><kbd>Detail Buku</kbd></h2>
	<img src="../images/books/<?= $tampilEdit[0]['photo']; ?>" style="width: 300px;">
	<ul>
		<li><h5>Judul : <?= $tampilEdit[0]['judul']; ?></h5></li>
		<li><h5>Pengarang : <?= $tampilEdit[0]['pengarang']; ?></h5></li>
		<li><h5>Penerbit : <?= $tampilEdit[0]['penerbit']; ?></h5></li>
		<li><h5>Stock : <?= $tampilEdit[0]['qty']; ?></h5></li>
	</ul>
	<ul>
		<li><strong>Created By : <?= $tampilCreated[0]['nama_user']; ?> </strong></li>

		<?php if (!$tampilUpdate) { ?>
				<li><strong>Update By : - </strong></li>
		<?php	} else { ?>
				<li><strong>Last Update By : <?= $tampilUpdate[0]['nama_user']; ?> </strong></li>
		<?php }  ?>
		
	</ul>
</div>
</div>
</form>
<?php 
include 'footer.php';
?>