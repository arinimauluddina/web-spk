<?php
//koneksi database
include '../config/koneksi.php';

//menangkap data id yang dikirim dari url

$id =$_GET['id'];

$query = "SELECT * FROM data_smartphone WHERE id_smartphone='$id' ";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);

if(is_file ("../admin/img/smartphone/".$data['gambar']))
unlink ("../admin/img/smartphone/".$data['gambar']);



//menginput data ke database
$query2 = "DELETE from data_smartphone where id_smartphone='$id'";
$sql2 = mysqli_query($koneksi, $query2);

// die(print_r($query2));

if($sql2){
    // header("location:../admin/data_smartphone.php");

    $status = ["done" => true, "item" => $id];
    echo json_encode($status);
}else{

    $status = ["done" => false, "item" => $id];
    echo json_encode($status);
    // echo "Data Gagal Dihapus. <a href='../admin/data_smartphone.php'>Kembali</a>";
}



?>