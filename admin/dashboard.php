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
        <link rel="stylesheet" type="text/css" href="../admin/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/dashboard.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
    </head>
    <body>
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
    
    <!-- Menampilkan Hari, Bulan dan Tahun -->
    <div class="tanggal">
     <script src="js/tanggal.js" style="margin-left: 10px">
    
    </script></div><div class="jam" id="clock"></div>
    <script src="js/jam.js">
    
    
    </script>
    <?php session_start()?>
                    <ul class="nvbr">
                    <li><p class="nama"><img class="side" src="../admin/img/avatar.png">&nbsp;<?=$_SESSION ['adminname'] ?></p><li>
                    <!-- <div class="onl"> -->
                    <p class="ol"><img class="side2" src="../admin/img/smbl.png">Online</p></li></ul>
                    <!-- </div> -->
                    <ul class="list-unstyled CTAs" style="margin-left:20px;">
                    </ul>
                    
                    
                <ul class="list-unstyled components" style="margin-top:-30px;">
                    <li class="active">
                        <a href="dashboard.php" >
                            <i class="glyphicon glyphicon-home" style="color:#CD5C5C;"></i>
                            Dashboard
                        </a>
                        </li>
                    <li>
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
               
           
            <div class="jdl"><?php 
    $tanggal = mktime(date('m'), date("d"), date('Y'));
    date_default_timezone_set("Asia/Jakarta");
    $jam = date ("H:i:s");
    $a = date ("H");
    if (($a>=6) && ($a<=11)) {
        echo " <b> Selamat Pagi,  </b>";
    }else if(($a>=11) && ($a<=15)){
        echo "  Selamat  Pagi,  ";
    }elseif(($a>15) && ($a<=18)){
        echo " Selamat Siang, ";
    }else{
        echo " <b> Selamat Malam, </b>";
    }
 ?> <strong><?=$_SESSION["nama_lengkap"] ?></strong></div>
             <section class="content">
      <!-- Small boxes (Stat box) -->

      <?php 
        include "../config/koneksi.php";

        // die($koneksi);
          $query_all = "select TABLE_NAME 
          as name, table_rows as row from `information_schema`.`tables` where table_schema = 'dblima'";
            $data = mysqli_query($koneksi,$query_all);
            $tampung_semua_sum = [];
            // die(print_r($query_all));
            while($d = mysqli_fetch_array($data)){
              $tampung_semua_sum[$d["name"]] = $d["row"];
            }

      ?>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 style="color: white"><?=$tampung_semua_sum["visitor"]?></h3>

              <p style="color: white">Data Pengunjung</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-person"></i>
            </div>
            <a href="user.php" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green" style="margin-left: 10px">
            <div class="inner">
              <h3 style="color: white">5</h3>

              <p style="color: white">Data Smartphone</p>
            </div>
            <div class="icon">
              <i class="ion-android-phone-portrait"></i>
            </div>
            <a href="data_smartphone.php" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow" style="margin-left: -10px">
            <div class="inner">
              <h3 style="color: white"><?=$tampung_semua_sum["kriteria"] ?></h3>

              <p style="color: white">Data Kriteria</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-list"></i>
            </div>
            <a href="kriteria.php" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red" style="margin-left: -30px">
            <div class="inner">
              <h3 style="color: white"><?=$tampung_semua_sum["nilai"] ?></h3>

              <p style="color: white">Data Pembobotan</p>
            </div>
            <div class="icon">
              <i class="ion-android-document"></i>
            </div>
            <a href="nilai.php" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>   
                    
                <div class ="row" style="margin-left:-3px;width:100%;margin-top:10px;">
                <div class="col-lg-12">
                    <div class="panel panel-success" style="border:2px solid #c7ecc7;">
                        <div class="panel-body">
                          <table class="info" border="0" height="100px" >
                            <tr>
                            <th width="130px"></th>
                            <th width="20px"></th>
                            <th width="450px"></th>
                            <th width="130px"></th>
                            <th width="20px"></th>
                            <th width="150px"></th>
                          </tr>
                            <tr>
                              <td>Nama Lengkap</td>
                              <td>:</td>
                              <td><?=$_SESSION["nama_lengkap"] ?></</td>
                              <td>Server</td>
                              <td>:</td>
                              <td>Localhost</td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td>:</td>
                              <td><?=$_SESSION['email'] ?></</td> 
                            </tr>
                                          
                             
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
      
                 <table class="demo-table" style="margin-left:350px">
            
                <thead>
                <tr>
                    <th style="width:0px">No</th>
                    <th style="width:80px">Merek</th>
                    <th style="width:130px">Jumlah</th>
             
                 
                </tr>
                </thead>
                <tbody>
                <?php
            include '../config/koneksi.php';
            $no =1;
            $hasil1 = mysqli_query($koneksi,"SELECT count(*) as jum FROM data_smartphone WHERE merek = 'Samsung' ");
            $data1 = mysqli_fetch_row($hasil1);
            $jumlah1 = $data1[0];

            $hasil2 = mysqli_query($koneksi,"SELECT count(*) as jum FROM data_smartphone WHERE merek = 'Xiaomi' ");
            $data2 = mysqli_fetch_row($hasil2);
            $jumlah2 = $data2[0];

            $hasil3 = mysqli_query($koneksi,"SELECT count(*) as jum FROM data_smartphone WHERE merek = 'OPPO' ");
            $data3 = mysqli_fetch_row($hasil3);
            $jumlah3 = $data3[0];


            $hasil4 = mysqli_query($koneksi,"SELECT count(*) as jum FROM data_smartphone WHERE merek = 'VIVO' ");
            $data4 = mysqli_fetch_row($hasil4);
            $jumlah4 = $data4[0];

            $hasil5 = mysqli_query($koneksi,"SELECT count(*) as jum FROM data_smartphone WHERE merek = 'HUAWEI' ");
            $data5 = mysqli_fetch_row($hasil5);
            $jumlah5 = $data5[0];

            $hasil6 = mysqli_query($koneksi,"SELECT count(*) as jum FROM data_smartphone WHERE merek = 'Lenovo' ");
            $data6 = mysqli_fetch_row($hasil6);
            $jumlah6 = $data6[0];

            $hasil7 = mysqli_query($koneksi,"SELECT count(*) as jum FROM data_smartphone WHERE merek = 'ASUS' ");
            $data7 = mysqli_fetch_row($hasil7);
            $jumlah7 = $data7[0];
         
                ?>
                <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align: center;">Samsung</td>
                    <td style="text-align:center"><?php echo $jumlah1 = $data1[0]; ?></td>
                 
                </tr>
                 <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align: center;">Xiaomi</td>
                    <td style="text-align:center"><?php echo $jumlah2 = $data2[0]; ?></td>
                 
                </tr>
                 <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align: center;">OPPO</td>
                    <td style="text-align:center"><?php echo $jumlah3 = $data3[0]; ?></td>
                 
                </tr>
                 <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align: center;">Vivo</td>
                    <td style="text-align:center"><?php echo $jumlah4 = $data4[0]; ?></td>
                 
                </tr>
                 <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align: center;">Huawei</td>
                    <td style="text-align:center"><?php echo $jumlah5 = $data5[0]; ?></td>
                 
                </tr>
                 <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align: center;">Lenovo</td>
                    <td style="text-align:center"><?php echo $jumlah6 = $data6[0]; ?></td>
                 
                </tr>
                 <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td style="text-align: center;">ASUS</td>
                    <td style="text-align:center"><?php echo $jumlah7 = $data7[0]; ?></td>
                 
                </tr>
            <?php
            ?>
            </tbody> 
            </table>
               

                
    




        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
          


    </body>
</html>