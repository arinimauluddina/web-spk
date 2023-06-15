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
            button.bsee{
            text-decoration: none;
            transition: ease all 0.3s;
            width: 30px;
            height: 30px;
            -webkit-border-radius: 50%;
            background: #ADD8E6;
            opacity: 0.8;
            border: 1px solid #ADD8E6;
            color: #fafafa;
            border-radius: 50px;
            margin-bottom: 3px;
            text-align: center;
            position: center;
            }
            button.bsee:hover{
            width: 30px;
            height: 30px;
            background: rgb(86, 165, 243);
            opacity: 0.8;
            border: 1px solid rgb(86, 165, 243);
            color: #fafafa;
            border-radius: 50px;
            margin-bottom: 3px;
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
 	

            <div class ="row" style="margin-left:-3px;width:100%;margin-top:30px;">
                <div class="col-lg-12">
                    <div class="panel panel-success" style="border:2px solid #c7ecc7;">
                        <div class="panel-body">
                 <table class="demo-table" style="margin-left:10px" id="datatables">
            
                <thead>
                <tr>
                    <th style="width:0px">No</th>
                    <th style="width:80px">Merek</th>
                    <th style="width:130px">Tipe</th>
                    <th style="width:20px">Processor</th>
                    <th style="width:40px">RAM</th>
                    <th style="width:-5px">Memori</th>
                    <th style="width:120px">Kamera</th>
                    <th>Baterai</th>
                    <th style="width:40px">Ukuran Layar</th>
                    <th style="width:120px">Harga</th>
                    <th style="width:20px">Gambar</th>
                    <th  >Aksi</th>
             
                    
                 
                </tr>
                </thead>
                <tbody>
                <?php
           include_once('./config/fungsi.php');

            $no =1;
            $data = mysqli_query($koneksi,"SELECT * FROM data_smartphone ORDER BY id_smartphone DESC");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align:center"><?php echo $d['merek'];?></td>
                    <td style="text-align:center"><?php echo $d['type'];?></td>
                    <td style="text-align:center" ><?php echo $d['processor'];?></td>
                    <td style="text-align:center" ><?php echo $d['ram'];?></td>
                    <td style="text-align:center" ><?php echo $d['memori'];?></td>
                    <td style="text-align:center" ><?php echo $d['kamera'];?></td>
                    <td style="text-align:center" ><?php echo $d['baterai'];?></td>
                    <td style="text-align:center" ><?php echo $d['ukuran_layar'];?></td>
                    <td style="text-align:center" ><?php echo $d['harga']; ?></td>
                    <td><img src="admin/img/smartphone/<?php echo $d['gambar'];?>"width="100"></td>
                     <td style="text-align:center">
                    <a href="detail.php?id=<?php echo $d['id_smartphone'];?>" >
                    <button class="bsee" data-toggle="modal" data-target="#detailModal"><i class="fa fa-pencil-square-o" style="font-size:15px;"></i></button></a> 
                     </td>
                

                    

                    
            </tr>
            <?php
            }
            ?>
            </tbody> 
            </table>
            </div>
            </div>
            </div>
            </div>
        </div>

        </body>
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
      <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">
            $(document).ready(function(){
                $('#datatables').DataTable();
              });
           </script>
           </html>