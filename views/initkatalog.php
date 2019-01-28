<?php
      					include '../config/crud.php';
                // instansiasi object 
      					$conn = new db_crud();

                // generate halaman
                $jumlahPerHalaman = 5;
                $jumlahData = count($conn->read("SELECT * FROM buku WHERE is_active = '1' "));
                $jumlahHalaman = ceil($jumlahData / $jumlahPerHalaman);
                $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
                $indeksData = ( $halamanAktif * $jumlahPerHalaman) - $jumlahPerHalaman;

                // query menampilkan buku
                $querybuku = "SELECT * FROM buku WHERE is_active = '1'  LIMIT $indeksData,$jumlahPerHalaman";
      					$read = $conn->read($querybuku);

                // menampilkan total buku
                $querytotal = "SELECT SUM(qty) FROM buku";
                $totbuk = $conn->read($querytotal);
?>