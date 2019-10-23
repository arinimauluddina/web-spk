<?php
	include_once './config/fungsi.php';

	$query = "SELECT * FROM kriteria";

	$result = mysqli_query($koneksi, $query);
	$kriteria = [];

	while($data = mysqli_fetch_assoc($result)){
		array_push($kriteria, $data);
	}
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
        <link rel="stylesheet" href="css/hitung.css">
         <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animated.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
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
                    <table width="700px">
                    	<tr><img src="img/blank.png" width="180">               
                    	</tr>
                    	<tr style="width: 120px">
                    	 <img src="img/samsung.png" width="100" class="animated infinite tada">
                    	</tr>
                    	<tr><img src="img/blank.png" width="50">               
                    	</tr>
                    	<tr>
                    	 <img src="img/asus.png" width="100" class="animated infinite tada">
                    	</tr>
                    	<tr><img src="img/blank.png" width="50">               
                    	</tr>
                    	<tr>
                    	 <img src="img/huawei.png" width="50" class="animated infinite tada">
                    	</tr>
                    	<tr><img src="img/blank.png" width="50">               
                    	</tr>
                    	<tr>
                    	 <img src="img/mi.png" width="50" class="animated infinite tada">
                    	</tr>
                    	<tr><img src="img/blank.png" width="50">               
                    	</tr>
                    	<tr>
                    	 <img src="img/oppo.png" width="100" class="animated infinite tada">
                    	</tr>
                    	<tr><img src="img/blank.png" width="50">               
                    	</tr>
                    	<tr>
                    	 <img src="img/vivo.png" width="100" class="animated infinite tada">
                    	</tr>
                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 </header>
<body>
	
	<div class="background">
	
                          
	<div class="judul">
		<h6>Pilihlah kriteria smartphone yang kamu inginkan pada form dibawah ini</h6>
	</div>
	<div class="isi">
	<form action="proses_hitung.php" method="POST">

		<?php foreach ($kriteria as $value) { ?>
			<label><?=$value["kriteria"]?>:</label>
			<select class="form-control" style="width: 900px" name="<?=$value['kriteria']?>"> 
			<?php foreach (getMultiData($value['kriteria']) as $key => $value) {?>
				<option value="<?=$value["bobot"]?>"><?=$value["atribut"]?></option>
			<?php } ?>
			</select>
		<?php } ?>
		<br>
		<input class="oke" type="submit" value="Proses">
	</form>
</div>
</div>
</div>
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

    <script src="js/main.js"></script>
    
</html>