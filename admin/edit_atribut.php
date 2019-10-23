<?php
include "../config/koneksi.php";
 $id=$_GET['id'];
 $modal=mysqli_query($koneksi,"SELECT * FROM kriteria_atribut WHERE id_kriteria='$id'");
 while($r=mysqli_fetch_array($modal)){
?>
<?php
