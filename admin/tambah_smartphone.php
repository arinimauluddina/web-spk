<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Sistem Pendukung Keputusan Pemilihan Smartphone</title>
        <link rel="shortcut icon" href="img/3.png"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/tambahbaru.css">
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
                <div class="overlay">
                    
                    <div class="side">
                            <!-- <img class="side" src="../admin/img/avatar.png"> -->
                            <br>
                    </div>
                    <ul class="nvbr">
                    <li><p class="nama"><img class="side" src="../admin/img/avatar.png">&nbsp;<?=$_SESSION ['adminname'] ?></p><li>
                    <!-- <div class="onl"> -->
                    <p class="ol"><img class="side2" src="../admin/img/smbl.png">Online</p></li></ul>
                    <!-- </div> -->
                    <ul class="list-unstyled CTAs" style="margin-left:20px;">
                  </ul>
                   
                    
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
                        </a></li>
                        <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate" style="color:#87CEFA"></i>
                            Kriteria
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="Kriteria.php">Kriteria</a></li>
                            <li><a href="nilai.php">Pembobotan</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        
                        <a href="user.php">
                            <i class="fa fa-user" style="color:	#EEE8AA;"></i>
                            Data Visitor
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled CTAs">
                    
                    <li style="margin-top:79px;">
                        <a href="export_excel.php" class="download" style="font-size:9px;"><i class="fa fa-download"></i>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Download Data </a>
                        
                    </li>
                    <li><a href="Website/index.html" class="article"><i class="fa fa-home"></i>  &nbsp; &nbsp; &nbsp; &nbsp; Halaman User</a></li>
                </ul>
            </nav>
        
            <!-- Page Content Holder -->
                <nav class="navbar-ats">
                    
                        <button class="kanan" style="margin-top:0px;">
                                <i class="glyphicon glyphicon-off" ></i>
                                    <a href="#">Logout</a>
                               </button>
                
                <div class="toggle">
                 <i class="glyphicon glyphicon-tasks" id="sidebarCollapse" style="cursor:pointer;"></i>
                </div>       
                      
            
                <div class="jdl">TAMBAH DATA <strong>S M A R T P H O N E</strong></div>
                <button class="back">
                    <i class=" fa fa-reply"></i>
                    <a href="data_smartphone.php">Kembali</a>
</button>
<div class ="row" style="margin-left:20px;margin-top:10px;">
      
                <div class="panel panel-success" style="border:2px solid #c7ecc7;width:370px;float:left">
                    <div class="panel-heading">
				    <b>Primary</b></div>
			        <div class="panel-body">
                <form method="post" action="../admin/tambah_aksi.php" enctype="multipart/form-data" style="border-radius:2px;">
                <div class="form-group " >
                <table>
                </div>
                   <tr>
                    <td><strong>Merek</strong></td>
                    <td><input type="text" class="form-control" name="merek" required ></td>
                    </tr>
                    <tr>
                       <td><strong>Tipe</strong></td>
                       <td><input type="text" class="form-control" name="type" required autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td><strong>Processor</strong></td>
                       <td><input type="text" name="processor" class="form-control" required></td>
                    </tr>
                    <tr>
                       <td><strong>RAM</td>
                       <td><input type="text" name="ram" class="form-control" required autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td><strong>Memori</td>
                       <td><input type="text" class="form-control" name="memori" required autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td><strong>Kamera</td>
                       <td><input type="text" class="form-control" name="kamera" required autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td><strong>Baterai</td>
                       <td><input type="text" class="form-control" name="baterai" required autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td><strong>Layar</td>
                       <td><input type="text" class="form-control" name="ukuran_layar" required autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td><strong>Harga</td>
                       <td><input type="text" class="form-control" name="harga" required autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td><strong>Gambar</td>
                       <td width="20%"><input type="file" id="imgInp" name="gambar"></td>

                    </tr>
                    <tr>
                       <td><strong></td>
                        <td><img src="../admin/img/no.jpg" style="margin-top: 20px" width="100" height="100" id="blah"/></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><button class="btn btn-primary" type="submit" value="SIMPAN" onclick="sweet()" style="margin-left:-50px;margin-top:10px;"><i class="fa fa-floppy-o"></i>&nbsp;SIMPAN</td>
                      <td><button class="btn btn-light" type="reset" value="RESET" style="margin-left:-230px;margin-top:10px;"><i class="fa fa-times"></i>&nbsp;RESET</td>
                    </tr>
                     </table>

</div>

</div>
</div>
</div>
<div class="row" style="margin-left:430px;margin-top:-700px;">
       
                <div class="panel panel-success" style="border:2px solid #c7ecc7;width:635px;float:left">
                    <div class="panel-heading">
                    <b>Sekunder</b></div>
                    <div class="panel-body">
                     <form method="post"  enctype="multipart/form-data" style="border-radius:2px;">
                <div class="form-group " >
                <table  width="600px" >
                </div>
                  <tr>
                    <td width="120px"></td>
                    <td width="150px"></td>
                  </tr>
                   <tr>
                    <td><strong>Tahun Rilis</strong></td>
                    <td></td>
                    <td><input type="text" class="form-control2" name="tahun_rilis" autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td><strong>Jaringan</strong></td>
                       <td>Teknologi</td>
                       <td><input type="text" class="form-control2" name="teknologi"  autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td rowspan="3"><strong>Body</strong></td>
                       <td>Dimensi</td>
                        <td><input type="text" name="dimensi" class="form-control2" autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td>Berat</td>
                       <td><input type="text" name="berat" class="form-control2" autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td>SIM</td>
                       <td><input type="text" class="form-control2" name="sim" autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td rowspan="2"><strong>Display</td>
                        <td>Tipe Layar</td>
                       <td><input type="text" class="form-control2" name="tipe_layar" autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td>Resolusi</td>
                       <td><input type="text" class="form-control2" name="resolusi" autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td rowspan="4"><strong>Platform</strong></td>
                        <td>OS</td>
                       <td><input type="text" class="form-control2" name="os" autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td>Chipset</td>
                       <td><input type="text" class="form-control2" name="chipset"  autocomplete="off"></td>
                    </tr>
                      <tr>
                       <td>Kecepatan CPU</td>
                       <td><input type="text" class="form-control2" name="kecepatan_cpu"  autocomplete="off"></td>
                    </tr>
                      <tr>
                       <td>GPU</td>
                       <td><input type="text" class="form-control2" name="gpu"  autocomplete="off"></td>
                    </tr>
                       <td><strong>Memory</strong></td>
                        <td>Card Slot</td>
                       <td><input type="text" class="form-control2" name="card_slot" autocomplete="off"></td>
                    </tr>
                      <td><strong>Kamera</strong></td>
                        <td>Kualitas Video</td>
                       <td><input type="text" class="form-control2" name="kualitas_video" autocomplete="off"></td>
                    </tr>
                      <td rowspan="4"><strong>Komunikasi</strong></td>
                        <td>WLAN</td>
                       <td><input type="text" class="form-control2" name="wlan" autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td>Bluetooth</td>
                       <td><input type="text" class="form-control2" name="bluetooth"  autocomplete="off"></td>
                    </tr>
                   <tr>
                       <td>GPS</td>
                       <td><input type="text" class="form-control2" name="gps"  autocomplete="off"></td>
                    </tr>
                     <tr>
                       <td>USB</td>
                       <td><input type="text" class="form-control2" name="usb"  autocomplete="off"></td>
                    </tr>
                     <td><strong>Lainnya</strong></td>
                        <td>Fitur</td>
                       <td><input type="text" class="form-control2" name="fitur" autocomplete="off"></td>
                    </tr>
                     <td rowspan="2"><strong>Baterai</strong></td>
                        <td>Tipe Baterai</td>
                       <td><input type="text" class="form-control2" name="tipe_baterai" autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td>Charging</td>
                       <td><input type="text" class="form-control2" name="charging"  autocomplete="off"></td>
                    </tr>
                     <td><strong>Warna</strong></td>
                        <td></td>
                       <td><input type="text" class="form-control2" name="warna" autocomplete="off"></td>
                    </tr>
                     <tr>
                      <td></td>
                      <td></td>
                     <td><button class="btn btn-light" type="reset" value="RESET" style="margin-left:-30px;margin-top:20px;"><i class="fa fa-times"></i>&nbsp;RESET</td>
                    </tr>
                    
                     </table>
                </form>
</div>


     
        
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
             function readURL(input) {
                  if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                      $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                  }
                }

                $("#imgInp").change(function() {
                  readURL(this);
                });
         </script>
  
    </body>
</html>
