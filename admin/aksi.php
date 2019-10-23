include 'koneksi.php';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];
 
mysql_query("insert into user values('','$nama','$alamat','$pekerjaan')");
?>