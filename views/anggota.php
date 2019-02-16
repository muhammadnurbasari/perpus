<?php
session_start();
$page_title = "Anggota";
include 'header.php';
include 'side.php';


include '../config/crud.php';
$read = new db_crud();
$queryagt = "SELECT * FROM anggota WHERE is_active = '1' ";
$read_ang = $read->read($queryagt);
?>
<script src="../assets/jquery-3.3.1.js"></script>
<script src="../assets/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="../assets/jquery.dataTables.min.css">
<div class="col-sm-10">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3><?php echo $page_title; ?></h3><hr>
			<img src="../images/icons8-user-account-30.png">
			<strong><?= $_SESSION['nama']; ?></strong>
		</div>
	</div>
	<button class="btn btn-success" type="button" data-target="#tambah" data-toggle="modal">Tambah</button><br/><br/>
	<table id="dtAnggota" class="table table-striped">
		<thead>
			<th>ID</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Jurusan</th>
			<th>Jenis Kelamin</th>
			<th>Handphone</th>
			<th>Aksi</th>
		</thead>
		<tbody>
			<?php
			$no = 1;
				foreach ($read_ang as $fetch) :
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $fetch['npm']; ?></td>
				<td><?php echo $fetch['nama']; ?></td>
				<td><?php echo $fetch['jurusan']; ?></td>
				<td><?php echo $fetch['jenis_kelamin']; ?></td>
				<td><?php echo $fetch['no_tlp']; ?></td>
				<td>
					<a href="edit-anggota.php?id=<?= $fetch['id_anggota']; ?>" class="btn btn-warning">Edit</a> ||
					<a id="hapusmodal" href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapus" data-id="<?= $fetch['id_anggota']; ?>" data-nama="<?= $fetch['nama']; ?>"> Hapus</a>
				</td>
			</tr>
			<?php
				endforeach;
			?>
		</tbody>
	</table>
</div>
<?php
include 'footer.php';
?>




<!-- modal tambah anggota -->
<form method="POST" action="../config/proses_anggota.php?aksi=tambah">
<div class="modal fade" id="tambah" role="dialog">
	<div class="modal-dialog" style="width: 300px;">
		<div class="modal-content">
			<div class="modal-heading"><h3 style="text-align: center;" class="title"><strong><kbd>Tambah Anggota</kbd></strong></h3></div>
			<div class="modal-body">
				<div class="form-group">
					<input class="form-control" type="text" name="npm" autocomplete="off" placeholder="NPM...">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="nama" autocomplete="off" placeholder="Nama...">
				</div>
				<div class="form-group">
				<label>Jenis Kelamin :</label><br/>
					<label class="radio-inline">
						<input type="radio" name="jk" value="L">Laki-Laki
					</label>
					<label class="radio-inline">
						<input type="radio" name="jk" value="P">Perempuan
					</label>
				</div>
				<div class="form-group">
					<label for="alamat">Alamat :</label>
					<textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
				</div>
				<div class="form-group">
					<input type="number" name="telp" placeholder="No Telp .." class="form-control" >
				</div>
				<div class="form-group">
					<select name="jurusan" class="form-control">
						<option value="" disabled selected/>---Pilih Jurusan---</option>
						<option value="sistem informasi">Sistem Informasi</option>
						<option value="komputer akuntansi">Komputer Akuntansi</option>
						<option value="manajemen">Manajemen</option>
						<option value="akuntansi">Akuntansi</option>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" type="submit" name="tambah">Tambah</button>
				<button class="btn btn-danger" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>	
</form>
<!-- selesai modal tambah anggota -->


<!-- Script Tampil Hapus -->
 <script type="text/javascript">
	$(document).on("click","#hapusmodal", function(){
		var id = $(this).data('id');
		var nama = $(this).data('nama');
		
		$("#hapusAnggota #id").val(id);
		$("#hapusAnggota #nama").val(nama);
    })

	$(document).ready(function() {
		$('#dtAnggota').DataTable();
	});
  </script>





  <!-- Modal Hapus -->
    <div class="modal fade" id="hapus" role="dialog" >
      <div class="modal-dialog" style="width: 300px;">
        <form method="POST" action="../config/proses_anggota.php?aksi=hapus">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" style="text-align: center;"><kbd>Hapus??</kbd></h3>
          </div>
          <div class="modal-body" id="hapusAnggota">
            <input type="hidden" name="id" id="id">
           <strong style="font-style: italic;"> <input style="text-align: center;" type="text" class="form-control" name="nama" id="nama" disabled/></strong>
          </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit">Hapus</button>
            <button class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
        </div>
        </form>
      </div>
    </div>