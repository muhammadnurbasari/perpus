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
<script src="../assets/jquery.min.js"></script>
<form method="POST" action="../config/proses_pinjam.php">
<div class="col-sm-10">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="title"><?= $page_title;  ?></h3><hr/>
			<img src="../images/icons8-user-account-30.png">
			<strong><?= $_SESSION['nama'] ; ?></strong>
		</div>

		<div class="panel-body">
			<div class="row">
				<div class="col-sm-6">		
					<div class="form-group">
						<label for="idPinjam">ID PINJAM :</label>
						<input class="form-control" type="text" name="header[id_pinjam]" value="<?= time(); ?>" disabled/>
					</div>
					<div class="form-group">
						<label>ANGGOTA :</label>
						<!-- menampilkan nama anggota berdasarkan id anggota ambil dari database -->
						<select name="idAnggota"  class="form-control" name="head[id_anggota]" required>
						 <option value="" disabled selected>---Pilih Anggota---</option>
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
						<input class="form-control" type="text" disabled name="head[tgl_pinjam]" value="<?= date('d/m/y')  ?>">
					</div>
					<div class="form-group">
						<label>Tanggal Kembali ( Tempo ) :</label>
						<input class="form-control" type="date" name="head[tgl_kembali]" required/>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<label><h3 class="title">Buku Yang Dipinjam :</h3></label><br/>
					<table class="table table-bordered">
						<thead>
							<th>BUKU</th>
							<th>JUMLAH</th>
							<th>AKSI</th>
						</thead>
						<tbody id="item_table"></tbody>
					</table>
					<button class="btn btn-success" type="button" name="add" id="add">Tambah</button><br/><br/>
				</div>
  			</div>
			<button class="btn btn-info" type="submit">Simpan</button><br/><br/>
		</div>
	</div>
</div>		
</form>
<script type="text/javascript">
	$(document).ready(function(){
		$("button#add").click(function(){
    		var html = '';
        	html += '<tr>';
        	html += '<td><select name="item[buku_id][]" class="form-control item_unit"><option value="">Pilih Buku</option><option value="Matematika">Matematika</option><option value="PPKN">PPKN</option></select></td>';
        	html += '<td><input type="number" name="item[qty][]" class="form-control item_quantity" /></td>';
        	html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
			$('#item_table').append(html);
  		});

		// delete list sparepart  
		$(document).on('click', '.remove', function(){
			$(this).closest('tr').remove();
		});
	});
</script>
<?php 
include 'footer.php';
?>
