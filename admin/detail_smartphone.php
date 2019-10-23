<?php 
                include '../config/fungsi.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Sistem Pendukung Keputusan Pemilihan Smartphone</title>
        <link rel="shortcut icon" href="img/3.png"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/detailhp.css">
    </head>
    <body>


        <?php session_start(); ?>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar" >

                <div class="sidebar-header">
                    <h3 style="margin:-5px 0px 6px 15px;">Administrator</h3>
                    <strong style="margin:-10px;">ADM</strong>
                </div>

                <div class="overlay" >
                    
                    <div class="side">
                        <!-- <img class="side" src="../admin/img/avatar.png"> -->
                        <br>
                            </div>
                            <div class="tanggal">
     <script src="js/tanggal.js" style="margin-left: 20px">
    
    </script></div><div class="jam" id="clock"></div>
    <script src="js/jam.js">
    
    
    </script>

                    <ul class="nvbr">
                    <li><p class="nama"><img class="side" src="../admin/img/avatar.png">&nbsp;<?=$_SESSION ['adminname'] ?></p><li>
                    <!-- <div class="onl"> -->
                    <p class="ol"><img class="side2" src="../admin/img/smbl.png">Online</p></li></ul>
                    <!-- </div> -->
                    <ul class="list-unstyled CTAs" style="margin-left:20px;">
                    <a href="#" class="ganti"></ul>
                    
                    
                <ul class="list-unstyled components" style="margin-top:-30px;">
                    <li>
                        <a href="dashboard.php" >
                            <i class="glyphicon glyphicon-home" style="color:#CD5C5C;"></i>
                            Dashboard
                        </a>
                        </li>
                    <li class="active">
                        <a href="data_smartphone.php">
                            <i class="glyphicon glyphicon-th-list" style="color:#8FBC8F"></i>
                            Data Smartphone
                        </a>
                        </li>
                        <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate" style="color:#87CEFA"></i>
                            Kriteria
                        </a>
                         <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="kriteria.php">Kriteria</a></li>
                            <li><a href="nilai.php">Pembobotan</a></li>
                          
                        </ul>
                    </li>
                    <li>
                        
                        <a href="user.php">
                        <i class="fa fa-user" style="color: #EEE8AA;"></i>
                            Data Visitor
                        </a>
                    </li>
                </ul>

                
                
                <ul class="list-unstyled CTAs">
                    
                    <li style="margin-top:10px;">
                        <a href="export_excel.php" class="download" style="font-size:9px;"><i class="fa fa-download"></i>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Download Data </a>
                        
                    </li>
                    <li><a href="../index.php" class="article"><i class="fa fa-home"></i>  &nbsp; &nbsp; &nbsp; &nbsp; Halaman User</a></li>
                </ul>
            </nav>
        
        
            <!-- Page Content Holder -->
             
                <nav class="navbar-ats">
                        <div>
                        <button class="kanan" style="margin-top:0px;">
                        <i class="fa fa-sign-out"></i>
                                    <a href="logout.php">Logout</a>
                               </button>
</div>
                
                <div class="toggle">
                 <i class="glyphicon glyphicon-tasks" id="sidebarCollapse" style="cursor:pointer;"></i>
                </div>       
           
            <div class="jdl">DETAIL <strong>S M A R T P H O N E</strong></div>

                             <button class="back">
                    <i class=" fa fa-reply"></i>
                    <a href="data_smartphone.php">Kembali</a>
</button>
                   
          
        
              
                <?php
                include '../config/koneksi.php';

               $id = $_GET['id'];
                $data = mysqli_query($koneksi, "SELECT * FROM data_smartphone where id_smartphone='$id' ");
                 while($d = mysqli_fetch_array($data)){
                ?>
            <div class ="row" style="margin-left:10px;width:100%;margin-top:20px;">
                <div class="col-lg-12">
                    <div class="panel panel-success" style="border-radius: 15px;width: 600px;box-shadow: 0 0 15px">
                        <div class="panel-heading" style="border-radius: 25px;height: 30px">
                    <b><?php echo $d['merek'];?> | <?php echo $d['type'];?> </b></div>
                        <div class="panel-body">
                            <div class="specTblWrap">
                 <table class="detail" style="margin-left:10px" width="520px">
                

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

   <div style="margin-left:600px;margin-top:-830px;position: absolute;">
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
             <!--   <div style="margin-left:700px;margin-top:-830px;position: absolute;">
            
                    <div class="panel panel-success" style="border-radius: 15px;width: 320px;box-shadow: 0 0 15px; float: right; ">
                        <div class="panel-heading" style="border-radius: 25px;height: 30px">
                    <b>Gambar</b></div>
                        <div class="panel-body"> 
                            <div class="specTblWrap"> -->
                 <table class="detail" style="margin-left:10px" width="50px">
                
                            
                 <img src="../admin/img/smartphone/<?php echo $d['gambar'];?>"width="300" height="300">
           
       
    </table>
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
     
 
        

        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
         <script src="js/jquery.min.js"></script>
         <script src="js/bootstrap.min.js"></script>
         <script src="js/ajax.js"></script>
         <script src="js/hapus.js"></script>
         <!-- JQuery -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- DataTable -->
        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $('#datatables').DataTable();
              });
           </script>
          
         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script> 
         
          <script>
            $(document).ready(function(){setTimeout(function(){$("#pesan").fadeIn('slow');}, 500);});
            setTimeout(function(){$("#pesan").fadeOut('slow');}, 3000);
        </script>
      
    </body>
</html>
