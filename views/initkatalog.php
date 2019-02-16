<?php
  include '../config/crud.php';
  // instansiasi object 
  $conn = new db_crud();

  // query menampilkan buku
  $querybuku = "SELECT * FROM buku WHERE is_active = '1'";
  $read = $conn->read($querybuku);
?>