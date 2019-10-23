<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Sistem Pendukung Keputusan Pemilihan Smartphone</title>
        <link rel="shortcut icon" href="img/3.png"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
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
                            <li><a href="kriteria.php">Kriteria</a></li>
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
                                    <a href="logout.php">Logout</a>
                               </button>
                
                <div class="toggle">
                 <i class="glyphicon glyphicon-tasks" id="sidebarCollapse" style="cursor:pointer;"></i>
                </div>          
                      
           
                <div class="jdl">EDIT DATA <strong>S M A R T P H O N E</strong></div>
                <button class="back">
                    <i class=" fa fa-reply"></i>
                    <a href="data_smartphone.php">Kembali</a>
                </button>
                <div class ="row" style="margin-left:10px;width:100%;margin-top:10px;">
            <div class="col-lg-12">
                <div class="panel panel-success" style="border:2px solid #c7ecc7;width:370px;float:left">
                    <div class="panel-heading">
				    <b>Primary</b></div>
			        <div class="panel-body">
           <?php
           include '../config/koneksi.php';
           $id = $_GET['id'];
           $data = mysqli_query($koneksi, "SELECT * FROM data_smartphone where id_smartphone='$id' ");
           while($d = mysqli_fetch_array($data)){
               ?>
               <form method="post" action="update.php" enctype="multipart/form-data">
               <div class="form-group " > 
               <table>
                       <tr>
                           <td>Merek</td>
                           <td>
						<input type="hidden" name="id" value="<?php echo $d['id_smartphone']; ?>">
						<input  class="form-control" type="text" name="merek" value="<?php echo $d['merek']; ?>">
					</td>
				</tr>
				<tr>
					<td>Tipe</td>
					<td><input  class="form-control" type="text" name="type" value="<?php echo $d['type']; ?>"></td>
				</tr>
				<tr>
					<td>Processor</td>
					<td><input  class="form-control" type="text" name="processor" value="<?php echo $d['processor']; ?>"></td>
                </tr>
                <tr>
					<td>RAM</td>
					<td><input  class="form-control" type="text" name="ram" value="<?php echo $d['ram']; ?>"></td>
                </tr>
                <tr>
					<td>Memori</td>
					<td><input  class="form-control" type="text" name="memori" value="<?php echo $d['memori']; ?>"></td>
                </tr>
                <tr>
					<td>Kamera</td>
					<td><input type="text"   class="form-control" name="kamera" value="<?php echo $d['kamera']; ?>"></td>
                </tr>
                <tr>
					<td>Baterai</td>
					<td><input type="text"  class="form-control" name="baterai" value="<?php echo $d['baterai']; ?>"></td>
                </tr>
                <tr>
					<td>Layar</td>
					<td><input type="text"  class="form-control" name="ukuran_layar" value="<?php echo $d['ukuran_layar']; ?>"></td>
                </tr>
                <tr>
					<td>Harga</td>
					<td><input type="text"  class="form-control" name="harga" value="<?php echo $d['harga']; ?>"></td>
                </tr>
                <tr>
                    <td style="margin-top:180px;">Gambar</td>
                    <td><input type="checkbox" name="ubah_foto" value="true">Ceklis Jika Ingin mengubah foto<br></td>
					<td><input  style="margin-top:30px;margin-left:-210px;" type="file" name="gambar" id="imgInp" value="<?php echo $d['gambar']; ?>"></td>

                </tr>
                 <tr>
                       <td><strong></td>
                        <td><img style="margin-top: 20px" width="100" id="blah"/></td>
                    </tr>
                <div class="fileinput fileinput-new" data-provides="fileinput">
  
				<tr>
                <tr>
					<td></td>
                    <td><button class="btn btn-primary" type="submit" value="SIMPAN" style="margin-left:-50px;margin-top:10px;"><i class="fa fa-floppy-o"></i>&nbsp;SIMPAN</td>
                    <td><button class="btn btn-light" type="button" value="BATAL" value="RESET" style="margin-left:-150px;margin-top:10px;"><a href="data_smartphone.php"><i class="fa fa-times"></i>&nbsp;BATAL</td>
				</tr>		
				</tr>		
			</table>
            </div>

</div>
</div>

		<div  style="margin-left:390px;width:100%;margin-top:-100px;">
       
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
                    <td><input type="text" class="form-control2" name="tahun_rilis" value="<?php echo $d['tahun_rilis'];?>" autocomplete="off"></td>
                    </tr>
                    <tr>
                       <td><strong>Jaringan</strong></td>
                       <td>Teknologi</td>
                       <td><input type="text" class="form-control2" name="teknologi"  autocomplete="off" value="<?php echo $d['teknologi'];?>"></td>
                    </tr>
                    <tr>
                       <td rowspan="3"><strong>Body</strong></td>
                       <td>Dimensi</td>
                        <td><input type="text" name="dimensi" class="form-control2" autocomplete="off" value="<?php echo $d['dimensi'];?>"></td>
                    </tr>
                    <tr>
                       <td>Berat</td>
                       <td><input type="text" name="berat" class="form-control2" autocomplete="off" value="<?php echo $d['berat'];?>"></td>
                    </tr>
                    <tr>
                       <td>SIM</td>
                       <td><input type="text" class="form-control2" name="sim" autocomplete="off" value="<?php echo $d['sim'];?>"></td>
                    </tr>
                    <tr>
                       <td rowspan="2"><strong>Display</td>
                        <td>Tipe Layar</td>
                       <td><input type="text" class="form-control2" name="tipe_layar" autocomplete="off" value="<?php echo $d['tipe_layar'];?>"></td>
                    </tr>
                    <tr>
                       <td>Resolusi</td>
                       <td><input type="text" class="form-control2" name="resolusi" autocomplete="off" value="<?php echo $d['resolusi'];?>"></td>
                    </tr>
                    <tr>
                       <td rowspan="4"><strong>Platform</strong></td>
                        <td>OS</td>
                       <td><input type="text" class="form-control2" name="os" autocomplete="off" value="<?php echo $d['os'];?>"></td>
                    </tr>
                    <tr>
                       <td>Chipset</td>
                       <td><input type="text" class="form-control2" name="chipset"  autocomplete="off" value="<?php echo $d['chipset'];?>"></td>
                    </tr>
                      <tr>
                       <td>Kecepatan CPU</td>
                       <td><input type="text" class="form-control2" name="kecepatan_cpu"  autocomplete="off" value="<?php echo $d['kecepatan_cpu'];?>"></td>
                    </tr>
                      <tr>
                       <td>GPU</td>
                       <td><input type="text" class="form-control2" name="gpu"  autocomplete="off" value="<?php echo $d['gpu'];?>"></td>
                    </tr>
                       <td><strong>Memory</strong></td>
                        <td>Card Slot</td>
                       <td><input type="text" class="form-control2" name="card_slot" autocomplete="off" value="<?php echo $d['card_slot'];?>"></td>
                    </tr>
                      <td><strong>Kamera</strong></td>
                        <td>Kualitas Video</td>
                       <td><input type="text" class="form-control2" name="kualitas_video" autocomplete="off" value="<?php echo $d['kualitas_video'];?>"></td>
                    </tr>
                      <td rowspan="4"><strong>Komunikasi</strong></td>
                        <td>WLAN</td>
                       <td><input type="text" class="form-control2" name="wlan" autocomplete="off" value="<?php echo $d['wlan'];?>"></td>
                    </tr>
                    <tr>
                       <td>Bluetooth</td>
                       <td><input type="text" class="form-control2" name="bluetooth"  autocomplete="off" value="<?php echo $d['bluetooth'];?>"></td>
                    </tr>
                   <tr>
                       <td>GPS</td>
                       <td><input type="text" class="form-control2" name="gps"  autocomplete="off" value="<?php echo $d['gps'];?>"></td>
                    </tr>
                     <tr>
                       <td>USB</td>
                       <td><input type="text" class="form-control2" name="usb"  autocomplete="off" value="<?php echo $d['usb'];?>"></td>
                    </tr>
                     <td><strong>Lainnya</strong></td>
                        <td>Fitur</td>
                       <td><input type="text" class="form-control2" name="fitur" autocomplete="off" value="<?php echo $d['fitur'];?>"></td>
                    </tr>
                     <td rowspan="2"><strong>Baterai</strong></td>
                        <td>Tipe Baterai</td>
                       <td><input type="text" class="form-control2" name="tipe_baterai" autocomplete="off" value="<?php echo $d['tipe_baterai'];?>"></td>
                    </tr>
                    <tr>
                       <td>Charging</td>
                       <td><input type="text" class="form-control2" name="charging"  autocomplete="off" value="<?php echo $d['charging'];?>"></td>
                    </tr>
                     <td><strong>Warna</strong></td>
                        <td></td>
                       <td><input type="text" class="form-control2" name="warna" autocomplete="off" value="<?php echo $d['warna'];?>"></td>
                    </tr>
                     <tr>
                      <td></td>
                      <td></td>
                     <td><button class="btn btn-light" type="reset" value="RESET" style="margin-left:-30px;margin-top:20px;"><i class="fa fa-times"></i>&nbsp;RESET</td>
                    </tr>
                    
                     </table>
                </form>
</div>
		<?php 
	}
	?>

           

        </div>
         
     
                        </div>

                        
                          
                        </div>
                    </div>
                </nav>

           
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
