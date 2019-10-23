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
        <link href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <style type="text/css">
		   	button.back{
		    background: rgb(252, 52, 52);
		    color: white;
		    border: 1px solid rgb(252, 52, 52);
		    margin-top: 20px;
		    margin-left: 15px;
		    width: 100px;
		    height: 40px;
		    border-radius: 20px; }

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
<li >
<a href="hitung.php">Pencarian</a>
</li>
    <li class="active">
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
 	<div class="background" style="width: 100%;height: 1000px">
 	<div style="margin-left: 50px;">
 	           <button class="back">
              	 <i class=" fa fa-reply"></i>
               	<a href="daftar_smartphone.php" style="text-decoration:none;color: white;">Kembali</a>
	</button>
 				<?php
                include_once('./config/fungsi.php');

               $id = $_GET['id'];
                $data = mysqli_query($koneksi, "SELECT * FROM data_smartphone where id_smartphone='$id' ");
                 while($d = mysqli_fetch_array($data)){
                ?>
            <div class="animated fadeInLeftBig">
            <div class ="row" style="margin-left:10px;width:100%;margin-top:20px;">
                <div class="col-lg-12">
                    <div class="panel panel-success" style="border-radius: 15px;width: 670px;box-shadow: 0 0 15px">
                        <div class="panel-heading" style="border-radius: 25px;height: 30px">
                    <b><?php echo $d['merek'];?> | <?php echo $d['type'];?> </b></div>
                        <div class="panel-body">
                            <div class="specTblWrap">
                 <table class="detail" style="margin-left:10px" width="600px">
                

                <tbody>
                 <tr class="specTblCont">
                    <th class="ttl" colspan="2"><strong>Tahun Rilis</td>
                    <td><?php echo $d['tahun_rilis'];?></td>
              
               
                <tr class="specTblCont">
                    <th class="ttl" colspan="2"><strong>Harga</td>
                    <td width="750px"><?php echo $d['harga'];?></td>
                      

                </tr>
                <tr class="specTblCont">
                    <th class="ttl" colspan="2"><strong>Jaringan</th>
                     <td><?php echo $d['teknologi'];?></td>
                 </tr>
                  <tr class="specTblCont">
                    <th class="ttl" rowspan="3"><strong>Body</th>
                    <th class="ttl" width="350px"  >Dimensi</th>
                     <td><?php echo $d['dimensi'];?></td>
                 </tr>
                 <tr class="specTblCont" >
                    <th class="ttl">Berat</th>
                    <td><?php echo $d['berat'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th class="ttl">SIM</th>
                    <td><?php echo $d['sim'];?></td>
                </tr>
                  <tr class="specTblCont">
                    <th width="500px" rowspan="3"><strong>Display</th>
                    <th class="ttl">Type</th>
                     <td><?php echo $d['tipe_layar'];?></td>
                 </tr>
                 <tr class="specTblCont">
                    <th class="ttl">Ukuran</th>
                    <td><?php echo $d['ukuran_layar'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th class="ttl">Resolusi</th>
                    <td><?php echo $d['resolusi'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th rowspan="4"><strong>Platform</th>
                    <th class="ttl">OS</th>
                     <td><?php echo $d['os'];?></td>
                 </tr>
                 <tr class="specTblCont"> 
                    <th class="ttl">Chipset</th>
                    <td><?php echo $d['chipset'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th class="ttl">CPU</th>
                    <td><?php echo $d['processor'];?> | <?php echo $d['kecepatan_cpu'];?></td>
                </tr>
                  <tr class="specTblCont">
                    <th class="ttl">GPU</th>
                    <td><?php echo $d['gpu'];?></td>
                </tr>
                <tr class="specTblCont">
                    <th rowspan="3"><strong>Memory</th>
                    <th class="ttl">Eksternal</th>
                     <td><?php echo $d['card_slot'];?></td>
                 </tr>
                 <tr class="specTblCont">
                    <th class="ttl">Internal</th>
                    <td><?php echo $d['memori'];?></td>
                </tr>
                <tr class="specTblCont">
                    <th class="ttl">RAM</th>
                    <td><?php echo $d['ram'];?></td>
                </tr>
                <tr class="specTblCont">
                    <th rowspan="2"><strong>Kamera & Video</th>
                    <th class="ttl">Kamera</th>
                     <td><?php echo $d['kamera'];?></td>
                 </tr>
                 <tr class="specTblCont">
                    <th class="ttl">Video</th>
                    <td ><?php echo $d['kualitas_video'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th rowspan="4"><strong>Komunikasi</th>
                    <th class="ttl">WLAN</th>
                     <td><?php echo $d['wlan'];?></td>
                 </tr>
                 <tr class="specTblCont">
                    <th class="ttl">Bluetooth</th>
                    <td><?php echo $d['bluetooth'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th class="ttl">GPS</th>
                    <td><?php echo $d['gps'];?></td>
                </tr>
                  <tr class="specTblCont">
                    <th class="ttl">USB</th>
                    <td ><?php echo $d['usb'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th colspan="2"><strong> Fitur</th>
                    <td ><?php echo $d['fitur'];?></td>
                </tr>
                  <tr class="specTblCont">
                    <th rowspan="3"><strong>Baterai</th>
                    <th class="ttl">Kapasitas</th>
                     <td ><?php echo $d['baterai'];?></td>
                 </tr>
                 <tr class="specTblCont">
                    <th class="ttl">Tipe Baterai</th>
                    <td><?php echo $d['tipe_baterai'];?></td>
                </tr>
                <tr class="specTblCont">
                    <th class="ttl">Charging</th>
                    <td ><?php echo $d['charging'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th colspan="2"><strong> Warna</th>
                    <td ><?php echo $d['warna'];?></td>
                </tr>

                
                  
                
                    
            </tr>
            <?php
            }
            ?>
            </tbody> 
            </table>
        </div>
    </div>
</div>
            
   <div style="margin-left:700px;margin-top:-780px;position: absolute;">
    <div class="col-lg-12">
        <div class="panel panel-success" style="border-radius: 15px;width: 370px;box-shadow: 0 0 15px">
            <div class="panel-heading" style="border-radius: 25px;height: 30px"><b>Kriteria</b></div>
            <div class="panel-body">
            <div class="specTblWrap">
            <table class="detail" style="margin-left:10px" width="50px">
            <tr>
            <th></th>
                 <?php 
                $id = $_GET["id"];

                $nilaiSmartphone = getAmbilNilaiByIdSmartphone($id);

                foreach ($nilaiSmartphone as $key => $value) { ?>
                    <p> <?=$value['kriteria'] ?> = <?=$value['keterangan'];?> </p>

               <?php }

               $id = $_GET['id'];
                $data = mysqli_query($koneksi, "SELECT * FROM data_smartphone where id_smartphone='$id' ");
                 while($d = mysqli_fetch_array($data)){
                ?>
           
             <!--   <div style="margin-left:700px;margin-top:-780px;position: absolute;"> -->
            		<div class="animated fadeInRightBig">
                   <!--  <div class="panel panel-success" style="border-radius: 15px;width: 320px;box-shadow: 0 0 15px; float: right; ">
                        <div class="panel-heading" style="border-radius: 25px;height: 30px">
                    <b>Gambar</b></div>
                        <div class="panel-body"> 
                            <div class="specTblWrap"> -->
                 <table class="detail" style="margin-left:10px" width="50px">
                
                            
                 <img src="./admin/img/smartphone/<?php echo $d['gambar'];?>"width="300" height="300">
           
       
    </table>
</div>
</div>
</div>
</div>
</div>
             <?php
            }
            ?>
            </div>
            </div>
            </div>
            </div>
        </div>
 <script type="text/javascript" src="./js/vendor/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="./js/bandingkan.js"></script>
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