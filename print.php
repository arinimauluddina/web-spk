<?php

  include_once './config/koneksi.php';
  $banding1 = $_GET["banding_1"];
  $banding2 = $_GET["banding_2"];
  $banding1 = explode(" ", $banding1);
  $banding2 = explode(" ", $banding2);

  $merek1 = $banding1[0];
  $type1 = array_slice($banding1, 1, (count($banding1)-1));
  $type1 = implode(" ", $type1);

  $merek2 = $banding2[0];
  $type2 = array_slice($banding2, 1, (count($banding2)-1));
  $type2 = implode(" ", $type2);

  $query1 = "SELECT * FROM data_smartphone
    WHERE merek = '$merek1' AND type = '$type1'";

  $query2 = "SELECT * FROM data_smartphone
    WHERE merek = '$merek2' AND type = '$type2'";

  $data_hasil_banding = [];

  $data1 = mysqli_query($koneksi, $query1);
  $data1 = mysqli_fetch_assoc($data1);
  
  array_push($data_hasil_banding, $data1);  
  $data2 = mysqli_query($koneksi, $query2);
  $data2 = mysqli_fetch_assoc($data2);

  array_push($data_hasil_banding, $data2);


 ob_start();

 ?>
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Cetak PDF</title>
    
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <style>
   table {border-collapse:collapse; table-layout:fixed;width: 630px;}
   table td {word-wrap:break-word;width: 20%;}
   </style>
</head>
<body>
  
<h1 style="text-align: center;">Data Smartphone</h1>
<hr>
<table border="1" width="70%">
  <tr >
      <th colspan="2"></th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <th> <?=$value["merek"]." ".$value["type"];?></th>
    <?php } ?>
    </tr> 


    <tr >
      <th  colspan="2">Harga</th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <td > <?=$value["harga"]; ?> </td>
    <?php } ?>
    </tr>
    <tr >
      <th colspan="2">Gambar</th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <td><img src="./admin/img/smartphone/<?=$value["gambar"]; ?>"width="300" height="300" ></td>
    <?php } ?>
    </tr>
  
      <tr >
      <th  colspan="2">Tahun Rilis</th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["tahun_rilis"]; ?> </td>
    <?php } ?>
    </tr>
      <tr >
      <th  colspan="2">Jaringan</th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["teknologi"]; ?> </td>
    <?php } ?>
    </tr>
    <tr>
      <th  rowspan="3">Body</th>
      <th   >Dimensi</th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["dimensi"]; ?> </td>
    <?php } ?>
    </tr>
    <tr >
      <th >Berat</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["berat"]; ?> </td>
      <?php } ?>
    </tr>
    <tr >
      <th>SIM</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["sim"]; ?> </td>
      <?php } ?>
    </tr>
    <tr >
      <th width="150px"rowspan="3">Display</th>
      <th >Type</th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["tipe_layar"]; ?> </td>
    <?php } ?>
    </tr>
    <tr >
      <th >Ukuran</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["ukuran_layar"]; ?> </td>
      <?php } ?>
    </tr>
    <tr >
      <th >Resolusi</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["resolusi"]; ?> </td>
      <?php } ?>
    </tr>
      <tr >
      <th rowspan="5">Platform</th>
      <th  width="150px" >OS</th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["os"]; ?> </td>
    <?php } ?>
    </tr>
    <tr >
      <th>Chipset</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["chipset"]; ?> </td>
      <?php } ?>
    </tr>
    <tr >
      <th >CPU</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["processor"]; ?> </td>
      <?php } ?>
    </tr>
      <tr>
      <th>Kecepatan CPU</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["kecepatan_cpu"]; ?> </td>
      <?php } ?>
    </tr>
      <tr>
      <th>GPU</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["gpu"]; ?> </td>
      <?php } ?>
    </tr>
    <tr >
      <th rowspan="3">Memory</th>
      <th  width="150px" >Internal</th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["memori"]; ?> </td>
    <?php } ?>
    </tr>
    <tr >
      <th >Eksternal</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["card_slot"]; ?> </td>
      <?php } ?>
    </tr>
    <tr>
      <th>RAM</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["ram"]; ?> </td>
      <?php } ?>
    </tr>
    <tr >
      <th rowspan="2">Kamera & Video</th>
      <th width="150px" >Kamera</th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["kamera"]; ?> </td>
    <?php } ?>
    </tr>
    <tr >
      <th>Video</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["kualitas_video"]; ?> </td>
      <?php } ?>
    </tr>
    <tr >
      <th  rowspan="4">Komunikasi</th>
      <th  width="150px" >WLAN</th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["wlan"]; ?> </td>
    <?php } ?>
    </tr>
    <tr >
      <th >Bluetooth</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["bluetooth"]; ?> </td>
      <?php } ?>
    </tr>
    <tr >
      <th >GPS</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["gps"]; ?> </td>
      <?php } ?>
    </tr>
    <tr >
      <th>USB</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["usb"]; ?> </td>
      <?php } ?>
    </tr>

      <tr >
      <th colspan="2">Fitur</th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["fitur"]; ?> </td>
    <?php } ?>
    </tr>
    <tr >
      <th rowspan="3">Baterai</th>
      <th width="150px" >Kapasitas</th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["baterai"]; ?> </td>
    <?php } ?>
    </tr>
    <tr >
      <th >Tipe Baterai</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["tipe_baterai"]; ?> </td>
      <?php } ?>
    </tr>
    <tr >
      <th >Charging</th>
      <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["charging"]; ?> </td>
      <?php } ?>
    </tr>
      <tr>
      <th colspan="2">Warna</th>
    <?php foreach ($data_hasil_banding as $value) { ?>
      <td> <?=$value["warna"]; ?> </td>
    <?php } ?>
    </tr>
  

</table>
</body>
</html>
<?php
// $html = ob_get_contents();
// ob_end_clean();
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';

// die(print_r($content));
        
require_once ('html2pdf/html2pdf.class.php');
// $pdf = new HTML2PDF('P','A4','en');

$filename = 'Hasil Perbandingan.pdf';
try
 {
  $html2pdf = new HTML2PDF('P','A1','en', false, 'ISO-8859-15',array(200, 0, 100, 80));
// ukuran, bawah
  // die(print_r($html2pdf));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content);
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
// die(print_r($pdf));
// $pdf->WriteHTML($html);
// $pdf->Output('Hasil Perbandingan.pdf', 'D');
?>