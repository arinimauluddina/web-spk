<?php 

include_once '../config/fungsi.php';

$penilaian = $_POST;

$id_smartphone = $_POST['id_smartphone'];
$edit = $_POST['edit'];


$query = "SELECT id_nilai FROM nilai WHERE id_smartphone = $id_smartphone";

$result = mysqli_query($koneksi, $query);
$nilais = [];

while($d = mysqli_fetch_assoc($result)){
	array_push($nilais, $d);
}

$i = 0;
foreach ($penilaian as $key => $value) {
	if($key == 'id_smartphone' || $key == 'edit'){
		continue;
	}
	$id_nilai = $nilais[$i]['id_nilai'];

	if($edit == "true"){
		mysqli_query($koneksi, "UPDATE nilai SET id_kriteria_attribut = $value WHERE id_smartphone = $id_smartphone AND id_nilai = $id_nilai");
	}else{
		mysqli_query($koneksi, "INSERT INTO nilai( id_smartphone, id_kriteria_attribut ) VALUES($id_smartphone, $value)");
	}
	$i++;
}


header("location:../admin/nilai.php");
