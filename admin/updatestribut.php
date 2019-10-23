<?php
include "../config/koneksi.php";
$id=$_POST['id'];
$atribut = $_POST['atribut'];
$keterangan = $_POST['keterangan'];
$bobot = $_POST['bobot'];

$query =mysqli_query($koneksi,"UPDATE kriteria_atribut SET atribut = '$atribut',keterangan = '$keterangan', bobot='$bobot' WHERE  = '$modal_id'");
 header('location:index.php');