
<?php
include_once '../config/fungsi.php';
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
        <link rel="stylesheet" href="css/detailatribut.css">
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
                        <li class="active">
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
           
            <div class="jdl"> DETAIL KRITERIA <strong>S M A R T P H O N E</strong></div>
           
   
           
                             <button class="kembalikriteria">
                    <i class=" fa fa-reply"></i>
                    <a href="kriteria.php">Kembali</a>
</button>



    <?php 
    if (isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
    }
    $errors = array();

    //add proses
    if(isset($_POST['add_atribut'])){
        $id_kriteria = $_POST['id_kriteria'];
        $atribut = $_POST['atribut'];
        $keterangan = $_POST['keterangan'];
        $bobot = $_POST['bobot'];
        //validasi form
    if(empty($atribut)){
        $errors['atribut'] = "Atribut tidak boleh kosong";
    }
    if(empty($keterangan)){
        $errors['keterangan']="Bobot tidak boleh kosong";
    }
   
    if(empty($bobot)){
        $errors['bobot'] = "Bobot tidak boleh kosong";
    }
    
    if(empty($errors)){

        $sql = "INSERT INTO kriteria_atribut VALUES('','$id_kriteria','$atribut','$keterangan','$bobot')";
        $result = mysqli_query($koneksi,$sql);
        if($result){
            $_SESSION['message']='<p class="alert alert-success">Data berhasil ditambah</p>';
            echo "<script>window.location.href='kriteria_atribut.php?kriteria=$id_kriteria'</script>";
        }
        else{
            $_SESSION['message']='<p class="alert alert-error">Data gagal ditambah</p>';
            
            echo "<script>window.location.href='kriteria_atribut.php?kriteria=$id_kriteria'</script>";
        }
    }
    }

    //get atribut data to edit
    if(isset($_GET['edit_atribut'])){
        $id_atribut = $_GET['edit_atribut'];
        $data = "SELECT * FROM kriteria_atribut WHERE id_atribut = '$id_atribut'";
        $result = mysqli_query($koneksi,$data);
        $data_atribut = mysqli_fetch_assoc($result);
    }
    //update atribut data
    if(isset($_POST['edit_atribut'])){
        $id_kriteria = $_POST['id_kriteria'];
        $id_atribut = $_POST['id_atribut'];
        $atribut = $_POST['atribut'];
        $keterangan = $_POST['keterangan'];
        $bobot = $_POST['bobot'];
        //validasi form
    if(empty($atribut)){
        $errors['$atribut'] = "Atribut tidak boleh kosong";
    }
    if(empty($keterangan)){
        $errors['$keterangan']="Bobot tidak boleh kosong";
    }
   
    if(empty($bobot)){
        $errors['$bobot'] = "Rumus tidak boleh kosong";
    }
    
    if(empty($errors)){
        $id = $_GET['kriteria'];
        $sql = "UPDATE kriteria_atribut SET atribut='$atribut', keterangan='$keterangan',bobot='$bobot' WHERE id_atribut='$id_atribut'";
        $result = mysqli_query($koneksi,$sql);
        if($result){
            $_SESSION['message']='<p class="alert alert-success">Data berhasil diubah</p>';
            echo "<script>window.location.href='kriteria_atribut.php?kriteria=$id'</script>";
        }
        else{
            $_SESSION['message']='<p class="alert alert-error">Data gagal diubah</p>';
            
            echo "<script>window.location.href='kriteria_atribut.php?kriteria=$id'</script>";
        }
    }
    }

    $kriteria = $_GET['kriteria'];
    $sql_kriteria = "SELECT * FROM kriteria WHERE id_kriteria='$kriteria'";
    $result_kriteria = mysqli_query($koneksi,$sql_kriteria);
    $data_kriteria = mysqli_fetch_assoc($result_kriteria);
    ?>

    <div class ="row" style="margin-left:10px;width:80%;margin-top:10px;">
        <div class="col-lg-12">
            <div class="panel panel-success" style="border:2px solid #c7ecc7; border-radius: 20px">
                <div class="panel-heading" style="border-radius: 15px;"><b>Kriteria :&nbsp; <?php echo  $data_kriteria['kriteria']?></b></div>
                    <div class="panel-body">
                    <form method="post"  enctype="multipart/form-data" style="border-radius:2px;">
                    <div class="form-group " >
                    <label style="width: 80px">Atribut</label>
                    <input type="hidden" class="form-control2" name="id_kriteria" value="<?php echo $kriteria?>">
                    <input type="hidden" class="form-control2" name="id_atribut" value="<?php echo empty($data_atribut)?'':$data_atribut['id_atribut']?>">
                    <input type="text" class="form-control2"  name="atribut" value="<?php echo empty($data_atribut)?'':$data_atribut['atribut']?>"> 
                     <?php echo (empty($errors['atribut']))?'':$errors['atribut']; ?><br><br>

                    <label style="width: 80px">Keterangan</label>
                    <input type="text" class="form-control2" name="keterangan" value="<?php echo empty($data_atribut)?'':$data_atribut['keterangan']?>"> 
                    <?php echo (empty($errors['keterangan']))?'':$errors['keterangan']; ?>
                    <br><br>

                    <label style="width: 80px">Bobot</label>
                    <input  class="form-control2" type="text" name="bobot" value="<?php echo empty($data_atribut)?'':$data_atribut['bobot']?>"> (range : 1-5)
                    <?php echo (empty($errors['bobot']))?'':$errors['bobot']; ?>
                    <br><br>
                    <?php if(isset($_GET['edit_atribut'])){?>

                    <input type="submit" name="edit_atribut" value="Ubah Atribut" class="btn btn-primary" style="border-radius: 8px">
                    <?php } else { ?>
                    <input type="submit" name="add_atribut" value="Tambah Atribut" class="tombol-simpan btn btn-primary" style="border-radius: 8px">
                    <?php } ?>
                    </form>


                    <table class="demo-table" width="700px" style="margin-left:50px">
                        <thead>
                            <tr>
                                <th style="width:0px">No</th>
                                <th style="width:180px">Atribut</th>
                                <th style="width:0px">Keterangan</th>
                                <th style="width:0px">Bobot</th>
                                <th style="width: 180px"  >Aksi</th>       
                            </tr>
                        </thead>
                        <tbody>

                 
                        <?php
                        $no =1;
                        $data = mysqli_query($koneksi,"SELECT * FROM kriteria_atribut where id_kriteria ='$kriteria'");
                        while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td style="text-align:center"><?php echo $no++; ?></td>
                            <td style="text-align:center"><?php echo $d['atribut'];?></td>
                            <td style="text-align:center"><?php echo $d['keterangan'];?></td>
                            <td style="text-align:center"><?php echo $d['bobot'];?></td>
                            <td style="text-align:center">
                                <a class="bedit" href="kriteria_atribut.php?kriteria=<?=$d['id_kriteria']?>&edit_atribut=<?=$d['id_atribut'];?>"><i class="fa fa-pencil-square-o" ></i> Edit</a>
                               <!--  <a href="hapus_smartphone.php ?id=<?php echo $d['id_smartphone'];?>">
                    <button class="bsee" onclick="return confirm ('Apakah Yakin dihapus');"><i class="fa fa-eye" style="font-size:15px;"></i></button></a>  -->
                                <a href="#" onclick="delete_confirm('.$data['id_kriteria'].','.$data['id_atribut'].')"><i class="fa fa-trash-o"></i>Hapus</a></td>
                   
                    <!-- <button  onclick="confirm_modal('delete_atribut.php?id=<?php echo $d['id'];?>');" class="bdelete"><i class="fa fa-trash-o"></i>&nbsp; Hapus</button></a>
                     </td> -->
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
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script> 
         
          <script>

    function delete_confirm(id1, id2){
        var id_kriteria = id1;
        var id_atribut = id2;
        var confirmModal = $('<div class="modal hide fade">'+
            '<div class="modal-header">'+
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
            '<h3>Konfirmasi</h3></div>'+
            '<div class="modal-body"><p>Anda yakin ingin menghapus?</p></div>'+
            '<div class="modal-footer"><a href="#" class="btn" data-dismiss="modal">Batal</a>'+
            '<a href="#" class="btn btn-primary" id="okButton">Hapus</a></div></div>');
        confirmModal.find("#okButton").click(function(event){
            confirmModal.modal('hide');
            window.location.href = 'kriteria_atribut.php?delete_atribut&kriteria='+id_kriteria+'&atribut='+id_atribut;
        });
        confirmModal.modal('show');      
            
    }
</script>

     
      
    </body>
</html>
