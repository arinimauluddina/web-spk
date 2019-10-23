<?php
//koneksi database
include '../config/koneksi.php';

//menangkap data id yang dikirim dari url

$id =$_GET['id'];


//menginput data ke databas
$query= "DELETE FROM kriteria where id_kriteria='$id'";
$sql = mysqli_query($koneksi, $query);

// die(print_r($query2));
if ($sql){ ?>
    <script language="javascript">


            // alert('Berhasil Dihapus');
        // document.location.href="kriteria.php";
    </script>
<?php
}else {
        trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $koneksi->error, E_USER_ERROR);
}
?>
