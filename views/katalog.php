<?php
session_start();

if (!isset($_SESSION['login'])) {
  header('Location: ../login.php');
}


$page_title = "Katalog Buku";
include 'header.php';
include 'side.php';
include 'initkatalog.php';
?>
<div class="col-sm-10" style="background-color: #ffffff;height: 550px;"> 

      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3><?php echo $page_title ; ?></h3><hr>
          <img src="../images/icons8-user-account-30.png">
          <strong>
            <?= $_SESSION['nama']; ?>
          </strong>
        </div>
      </div>
      <a href="#" id="tambah_buku" data-toggle="modal" data-target="#tambah" class="btn btn-success">Tambah</a><br/>
      <strong>Total Buku : <kbd><?= $totbuk[0]['SUM(qty)']; ?></kbd></strong>

    <table class="table table-stripped">
              <thead>
                <tr>
                  <th>NO.</th>
                  <th>PHOTO</th>
                  <th>JUDUL BUKU</th>
                  <th>KATEGORI</th>
                  <th>PENGARANG</th>
                  <th>PENERBIT</th>
                  <th>TAHUN</th>
                  <th>STOCK</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody id="myTable">
              <?php
                // perulangan menampilakn buku dari database
                $no = $indeksData + 1;
      					foreach($read as $fetch) :
      				?>
              	<tr>
                  <td><?= $no++;?></td>
                  <td><img src="../images/books/<?= $fetch['photo']; ?>" style="width: 35px;"></td>
                  <td><?= $fetch['judul'];?></td>
                  <td><?= $fetch['kategori'];?></td>
                  <td><?= $fetch['pengarang'];?></td>
                  <td><?= $fetch['penerbit'];?></td>
                  <td><?= $fetch['tahun_terbit'];?></td>
                  <td><?= $fetch['qty'];?></td>
                  <td>
                    <a href="edit-buku.php?id=<?= $fetch['id_buku'];?>"><button class="btn btn-warning">Edit</button></a>||
                    <a id="hapusmodal" class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapus" data-id="<?= $fetch['id_buku'];?>" data-judul="<?= $fetch['judul'];?>">Hapus</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
      </table>
      <!-- Halaman -->
      <?php for ($i=1; $i <= $jumlahHalaman ; $i++) : ?>
        <ul class="pagination">
          <li><a  href="?halaman=<?= $i;  ?>"><?= $i;  ?></a></li>
        </ul>
      <?php endfor; ?>

</div>
<!-- Mulai Modal input -->
<div class="modal fade" id="tambah" role="dialog">
            <div class="modal-dialog">
              <form action="../config/proses_buku.php?aksi=tambah" method="POST" enctype="multipart/form-data">
              <!--modal content-->
              <div class="modal-content" style="width: 400px;margin-left: 130px;">
                <div class="modal-header">
                  <h3 class="modal-title"><kbd>Tambah BUKU</kbd></h3>
                </div>
                <div class="modal-body" id="modal-tambah">
                    <div class="form-group">
                      <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul Buku..." >
                    </div>
                    <div class="form-group">
                      <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Penerbit..." >
                    </div>
                    <div class="form-group">
                      <input type="text" name="pengarang" class="form-control" id="pengarang" placeholder="Pengarang...">
                    </div>
                    <div class="form-group">
                      <input type="number" name="tahunterbit"  class="form-control" id="tahunterbit" placeholder="Tahun Terbit...">
                    </div>
                    <div class="form-group">
                      <select name="kategori" class="form-control">
                        <option disabled selected/>---- Pilih Kategori----</option>
                        <option value="sistem informasi">Sistem Informasi</option>
                        <option value="komputer akuntansi">Komputer Akuntansi</option>
                        <option value="manajemen">Manajemen</option>
                        <option value="akuntansi">Akuntansi</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="number" name="isbn"  class="form-control" id="isbn" placeholder="ISBN...(Boleh dikosongkan)">
                    </div>
                    <div class="form-group">
                      <label>Photo :</label>
                      <input type="file" name="photo"  class="form-control" id="photo" placeholder="Photo">
                    </div>
                    <div class="form-group">
                      <input type="number" name="qty"  class="form-control" id="qty" placeholder="Quantity">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success" name="tambah">Tambah</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
              </form>
            </div>
          </div>
          <!-- selesai modal input-->  


    <!-- Modal Hapus -->
    <div class="modal fade" id="hapus" role="dialog" >
      <div class="modal-dialog" style="width: 300px;">
        <form method="POST" action="../config/proses_buku.php?aksi=hapus">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" style="text-align: center;"><kbd>Hapus??</kbd></h3>
          </div>
          <div class="modal-body" id="hapusbuku">
            <input type="hidden" name="id" id="id">
           <strong style="font-style: italic;"> <input style="text-align: center;" type="text" class="form-control" name="judul" id="judul" disabled/></strong>
          </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit">Hapus</button>
            <button class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
        </div>
        </form>
      </div>
    </div>


<!-- Script Tampil Hapus -->
 <script type="text/javascript">
    $(document).on("click","#hapusmodal", function(){
      var id = $(this).data('id');
      var judul = $(this).data('judul');
      
      $("#hapusbuku #id").val(id);
      $("#hapusbuku #judul").val(judul);
     
    })
  </script>







 <?php
 include 'footer.php';
 ?>