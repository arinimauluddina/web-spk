<?php 

    include_once '../config/fungsi.php';

    $query = mysqli_query($koneksi, "SELECT * FROM data_smartphone ORDER BY id_smartphone DESC");

    $data_smartphone = [];

    while($result = mysqli_fetch_assoc($query)){
        array_push($data_smartphone, $result);
    }

    $query = "SELECT * FROM kriteria";
    $result = mysqli_query($koneksi, $query);

    $kriteria = [];
    while($data = mysqli_fetch_assoc($result)){
        array_push($kriteria, $data);
    }
    

?>

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
        <link rel="stylesheet" href="css/datahp.css">
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
                  </ul>
                    
                    
                <ul class="list-unstyled components" style="margin-top:-30px;">
                    <li>
                        <a href="dashboard.php" >
                            <i class="glyphicon glyphicon-home" style="color:#CD5C5C;"></i>
                            Dashboard
                        </a>
                        </li>
                    <li >
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
                            <li  ><a href="kriteria.php">Kriteria</a></li>
                            <li class="active"><a href="nilai.php">Pembobotan</a></li>
                          
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
           
            <div class="jdl">DAFTAR <strong> PEMBOBOTAN </strong></div>
            <br>
             <div style="height:55px;color: white;margin-top: -10px;">
             
            </div>

                        
            <div id="wrap" style="margin-top:-40px;" >          
                <a class="bie-slide2" href="../admin/tambah_nilai.php" >
                    <span class="circle2"><i class="fa fa-plus" style="margin:5px 5px 5px 8px"></i></span>
                    <span class="title2">Tambah Data</span>
                    <span class="title-hover2">Click Here</span>
                </a>
                <a class="bie-slide" href="data_smartphone.php" style="margin-left:-15px">
                    <span class="circle"><i class="fa fa-refresh" style="margin:10px 10px 10px 10px"></i></span>
                    <span class="title"></span>
                    <span class="title-hover"></span>
                </a>
            </div>
           
         
        
           

            <div class ="row" style="margin-left:-3px;width:100%;margin-top:-30px;">
                <div class="col-lg-12">
                    <div class="panel panel-success" style="border:2px solid #c7ecc7;">
                        <div class="panel-body">
                 <table class="demo-table" style="margin-left:10px" id="datatables">
                    <thead>
                        <tr>
                            <th>Smartphone</th>
                            <?php foreach ($kriteria as $value): ?>
                                <th><?=$value['kriteria'];?></th>
                            <?php endforeach ?>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data_smartphone as $smartphone) { 
                                // dp($smartphone['merek']);
                            ?>
                        <tr>
                            <td style="text-align: left;height: 30px;"> <?=$smartphone['merek'].' '.$smartphone['type']; ?></td>
                            <?php foreach (getMultiDataNilai($smartphone['id_smartphone']) as $value): ?>
                                <td style="text-align: center;"> <?=$value['bobot']?> </td>
                            <?php endforeach ?>
                            <td style="text-align: center;">
                                <a href="tambah_nilai.php?id_smartphone=<?=$smartphone['id_smartphone'] ?>">Edit</a> 
                                
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>


                 </table>
            </div>
            </div>
            </div>
            </div>
        </div>
     
                 <div class="modal fade" id="detailModal" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
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
          <script language="javascript">
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    </script>
         <!-- JQuery -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- DataTable -->
        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
          <script>
            $(document).ready(function(){setTimeout(function(){$("#pesan").fadeIn('slow');}, 500);});
            setTimeout(function(){$("#pesan").fadeOut('slow');}, 3000);
        </script>
        
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

        function deleteItem(id){
            $.get("hapus_smartphone.php?id="+id, function(data){
            swal({
                    title: 'Alert',
                    text: 'Hapus Data?',
                    type: "warning",
                    closeOnConfirm : false,
                    confirmButtonColor: '#d9534f',
                    confirmButtonText:'Hapus',
                    showCancelButton: true,
                    },
                    function(){
                     swal("Deleted!", "Data berhasil dihapus", "success");
                });
            });
        }
        
	 
    </script>
     
      
    </body>
</html>
