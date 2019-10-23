<?php
	
	include_once("./config/koneksi.php");

	$id = $_GET["id"];

	$query = "SELECT * FROM rating WHERE id_emot = '$id'";

	$result = mysqli_query($koneksi, $query);
	$data_awal = mysqli_fetch_assoc($result);

	$jumlah = $data_awal["jumlah"];

	$fix = $jumlah + 1;

	$update = "UPDATE rating SET jumlah = $fix WHERE id_emot = '$id'";
	mysqli_query($koneksi, $update);


	$query = "SELECT * FROM rating WHERE id_emot = '$id'";

	$result = mysqli_query($koneksi, $query);
	$data_awal = mysqli_fetch_assoc($result);
	
    echo json_encode($data_awal);
