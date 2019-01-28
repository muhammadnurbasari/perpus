<?php
session_start();

if (!isset($_SESSION['login'])) {
	header('Location: login.php');
}



	$page_title = "Perpustakaan";
	include 'header.php';
	include 'side.php';
	include 'content_awal.php';
	include 'footer.php';


?>