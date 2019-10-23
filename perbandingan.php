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

	$data_banding = [];

	$data1 = mysqli_query($koneksi, $query1);
	$data1 = mysqli_fetch_assoc($data1);
	
	array_push($data_banding, $data1);	
	$data2 = mysqli_query($koneksi, $query2);
	$data2 = mysqli_fetch_assoc($data2);

	array_push($data_banding, $data2);
?>

<!DOCTYPE html>
<html class="no-js" lang="">
<head>
		<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Sistem Pendukung Keputusan Pemilihan Laptop </title>
        <link rel="shortcut icon" href="img/3.png"/>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
       	<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,400italic,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/perbandingan.css">
         <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animated.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css"/>
        <link href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'/>
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <style type="text/css">
	        img.zoom {
		  
		    -webkit-transition: all .2s ease-in-out;
		    -moz-transition: all .2s ease-in-out;
		    -o-transition: all .2s ease-in-out;
		    -ms-transition: all .2s ease-in-out;
			}
			.transisi {
			-webkit-transform: scale(1.3); 
			-moz-transform: scale(1.3);
			-o-transform: scale(1.3);
			transform: scale(1.3);
			}
        </style>
</head>
<header>
 <div id="sticker" class="header-area">
                <div class="container">
                    <nav class=" ">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                    
                        <a class="navbar-brand page-scroll" href="#page-top"><img src="img/daaa.png" alt="" style="width:80px; height: 80px"></a>
                        </div>
                        <div class="collapse navbar-collapse main-menu" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav ">
    <li >
 <a href="index.php">Home</a>
</li>
<li class="active">
<a href="hitung.php">Pencarian</a>
</li>
    <li>
       <a  href="daftar_smartphone.php">Daftar Smartphone</a>
                               </li>                       
                                                     
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
               <div id="home" class="fun-fact-area fix area-margin">
                    <div class="head-overly"></div>
                <div class="container">
                    <div class="row">
                     </div>
                        </div>
                    </div>
                </div>
            </div>
 </header>
 <body>

 	<div class="jdlbanding">
 	<h4>Hasil Perbandingan</h4>
 	<hr width="50%" size="10px" />
 </div>
<table class="detail" width="70%">
	<tr class="specTblCont" >
			<th class="ttl" colspan="2"></th>
		<?php foreach ($data_banding as $value) { ?>
			<th> <?=$value["merek"]." ".$value["type"];?></th>
		<?php } ?>
		</tr> 

	<tbody>
		<tr class="specTblCont">
			<th class="ttl" colspan="2"><strong>Harga</th>
		<?php foreach ($data_banding as $value) { ?>
			<td > <?=$value["harga"]; ?> </td>
		<?php } ?>
		</tr>
			<tr class="specTblCont">
			<th class="ttl" colspan="2"><strong>Gambar</th>
		<?php foreach ($data_banding as $value) { ?>
			<td><img src="./admin/img/smartphone/<?=$value["gambar"]; ?>"width="300" height="300" ></td>
		<?php } ?>
		</tr>
	
			<tr class="specTblCont">
			<th class="ttl" colspan="2"><strong>Tahun Rilis</th>
		<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["tahun_rilis"]; ?> </td>
		<?php } ?>
		</tr>
		<tr>
			<tr class="specTblCont">
			<th class="ttl" colspan="2"><strong>Jaringan</th>
		<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["teknologi"]; ?> </td>
		<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl" rowspan="3"><strong>Body</th>
			<th class="ttl"  >Dimensi</th>
		<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["dimensi"]; ?> </td>
		<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">Berat</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["berat"]; ?> </td>
			<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">SIM</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["sim"]; ?> </td>
			<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th width="150px"rowspan="3"><strong>Display</th>
			<th class="ttl"  >Type</th>
		<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["tipe_layar"]; ?> </td>
		<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">Ukuran</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["ukuran_layar"]; ?> </td>
			<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">Resolusi</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["resolusi"]; ?> </td>
			<?php } ?>
		</tr>
			<tr class="specTblCont">
			<th class="ttl" rowspan="5"><strong>Platform</th>
			<th class="ttl" width="150px" >OS</th>
		<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["os"]; ?> </td>
		<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">Chipset</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["chipset"]; ?> </td>
			<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">CPU</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["processor"]; ?> </td>
			<?php } ?>
		</tr>
			<tr class="specTblCont">
			<th class="ttl">Kecepatan CPU</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["kecepatan_cpu"]; ?> </td>
			<?php } ?>
		</tr>
			<tr class="specTblCont">
			<th class="ttl">GPU</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["gpu"]; ?> </td>
			<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl" rowspan="3"><strong>Memory</th>
			<th class="ttl" width="150px" >Internal</th>
		<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["memori"]; ?> </td>
		<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">Eksternal</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["card_slot"]; ?> </td>
			<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">RAM</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["ram"]; ?> </td>
			<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl" rowspan="2"><strong>Kamera & Video</th>
			<th class="ttl" width="150px" >Kamera</th>
		<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["kamera"]; ?> </td>
		<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">Video</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["kualitas_video"]; ?> </td>
			<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl" rowspan="4"><strong>Komunikasi</th>
			<th class="ttl" width="150px" >WLAN</th>
		<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["wlan"]; ?> </td>
		<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">Bluetooth</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["bluetooth"]; ?> </td>
			<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">GPS</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["gps"]; ?> </td>
			<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">USB</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["usb"]; ?> </td>
			<?php } ?>
		</tr>
			<tr>
			<tr class="specTblCont">
			<th class="ttl" colspan="2"><strong>Fitur</th>
		<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["fitur"]; ?> </td>
		<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl" rowspan="3"><strong>Baterai</th>
			<th class="ttl" width="150px" >Kapasitas</th>
		<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["baterai"]; ?> </td>
		<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">Tipe Baterai</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["tipe_baterai"]; ?> </td>
			<?php } ?>
		</tr>
		<tr class="specTblCont">
			<th class="ttl">Charging</th>
			<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["charging"]; ?> </td>
			<?php } ?>
		</tr>
			<tr>
			<tr class="specTblCont">
			<th class="ttl" colspan="2"><strong>Warna</th>
		<?php foreach ($data_banding as $value) { ?>
			<td> <?=$value["warna"]; ?> </td>
		<?php } ?>
		</tr>
	
	</tbody>
</table>
<br>
<br>
<div id="wrap" style="text-align: center;">



<a class="bie-slide2" href="hitung.php">

  <span class="circle2"><i class="fa fa-reply"></i></span>

  <span class="title2">CARI LAGI</span>

  <span class="title-hover2">Click here</span>

</a>

<a class="bie-slide" href="print.php?banding_1=<?=$_GET['banding_1']?>&banding_2=<?=$_GET['banding_2']?>">

  <span class="circle"><i class="fa fa-print"></i></span>

  <span class="title">PRINT</span>

  <span class="title-hover">Click here</span>

</a>
<a class="bie-slide2" href="index.php" onclick="berhasil()" >

  <span class="circle2"><i class="fa fa-check-square-o"></i></span>

  <span class="title2">SELESAI</span>

  <span class="title-hover2">Click here</span>

</a>

</div>

<div style="margin-left: 250px;">
	<h4>Your Reaction ?</h4>
<?php 

	include_once './config/koneksi.php';
	$query = "SELECT * FROM rating";

	$result = mysqli_query($koneksi, $query); ?>

	<div style="display: flex">
	<?php while($d = mysqli_fetch_assoc($result)){ ?>
		<div style="flex-grow: 1">
		<img onclick="addRating(<?=$d['id_emot']?>)" src="./img/emot/<?=$d['logo']?>" class="zoom" width="100">
		<br></br>
		<p style="margin-left: 20px;"> <?=$d["keterangan"]?> </p>
		<p style="margin-left: 25px;" id="emot_rating_<?=$d['id_emot']?>"> <?=$d["jumlah"]?> </p>
		</div>
	<?php } ?>
	</div>
</div>
	<br>
	<br>
	<br>


</body>
<script src="js/vendor/jquery-1.12.4.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/owl.carousel.min.js"></script>

    <script src="js/easing.js"></script>
    
    <script src="js/jquery.appear.js"></script>

    <script src="js/animated.js"></script>

    <script src="js/jquery.mixitup.min.js"></script>

    <script src="js/wow.min.js"></script>
  
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.js"></script>

    <script src="js/plugins.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

    <script src="js/main.js"></script>
    <script type="text/javascript">
	function addRating(id){
	$.get("tambah_rating.php?id="+id, function(data){
		const response = JSON.parse(data);
    	$(`#emot_rating_${id}`).text(`${response.jumlah}`)
    });
}
</script>
<script>
$(document).ready(function(){
    $('.zoom').hover(function() {
        $(this).addClass('transisi');
    }, function() {
        $(this).removeClass('transisi');
    });
});  
</script>
<script type="text/javascript">
   function berhasil() {
        swal({
            title: "THANK YOU ",
            type: "success",
            timer : 4000,
            showConfirmButton: false
           
          }),(function() {
            window.location="redirectURL";
          });
    }
    </script>  
</html>
