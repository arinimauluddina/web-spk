<?php 
/** format tanggal Indo**/

date_default_timezone_set('Asia/Jakarta');
function tgl_ind($date) {

/** ARRAY HARI DAN BULAN**/	
		$Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		$Bulan = array("Januari","Febuari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nov","Desember");
		
/** MEMISAHKAN FORMAT TANGGAL, BULAN, TAHUN, DENGAN SUBSTRING**/		
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl = substr($date, 8, 2);
	$waktu = substr($date, 11, 8);		
	$hari = date("w", strtotime($date));
	
	$result = $Hari[$hari].", ".$tgl."-".$Bulan[(int)$bulan-1]."-".$tahun." ".$waktu."";
	return $result;
	} 

?>