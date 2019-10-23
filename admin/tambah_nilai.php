<?php 
    include_once '../config/fungsi.php';

    $id_smartphone = isset($_GET['id_smartphone']) ? $_GET['id_smartphone'] : null;

    $query = "SELECT * FROM kriteria ";
    $result = mysqli_query($koneksi, $query);
    
    $kriteria = [];
    $data_smartphone =  [];

    while($data = mysqli_fetch_assoc($result)){
        array_push($kriteria, $data);
    }

    $query = "SELECT * FROM data_smartphone";
    $query .= $id_smartphone != null ? " WHERE id_smartphone = $id_smartphone" : "";
    $result = mysqli_query($koneksi, $query);

    if($id_smartphone != null){
        $data_smartphone = mysqli_fetch_assoc($result);
    }else{
        while($data = mysqli_fetch_assoc($result)){
            array_push($data_smartphone, $data);
        } 
    }?>

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
                    <li><a href="index.php" class="article"><i class="fa fa-home"></i>  &nbsp; &nbsp; &nbsp; &nbsp; Halaman User</a></li>
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
           
            <div class="jdl">TAMBAH <strong> NILAI PEMBOBOTAN </strong></div>
            <br>

          <button class="btn btn-danger" style="margin-left: 10px;border-radius: 20px;">
                    <i class=" fa fa-reply"></i>
                    <a href="nilai.php">Kembali</a>
</button>

           
    <form action="proses_tambah_nilai.php" method="POST" style="margin-left: 20px;margin-top: 30px;">
        <?php if ($id_smartphone != null) { ?>
            <label> Smartphone:  <?=$data_smartphone["merek"].' '.$data_smartphone["type"];?></label>
            <input type="hidden" name="id_smartphone" value="<?=$id_smartphone?>">
            <input type="hidden" name="edit" value="true">
        <?php }else{ ?>
            <label>Pilih Smartphone</label>
            <select name="id_smartphone">
                <?php foreach ($data_smartphone as $smartphone) { ?>
               
                    <option value="<?=$smartphone['id_smartphone']?>"> <?=$smartphone['merek'].$smartphone['type'];; ?> </option>
                <?php } ?>
            </select>
            <input type="hidden" name="edit" value="false">
        <?php } ?>
        <br>

        <?php
            // buat edit
            if($id_smartphone != null){
                foreach ($kriteria as $value): ?>
                    <label><?=$value["kriteria"]?>:</label>
                    <select class="form-control" style="width: 900px" name="<?=$value['kriteria']?>"> 
                    <?php foreach (getMultiData($value['kriteria']) as $key => $value): ?>
                        <option <?=checkSelected($id_smartphone, $value['id_atribut'])['id_kriteria_attribut'] == $value['id_atribut'] ? "selected" : "" ?> value="<?=$value["id_atribut"]?>">
                            <?=$value["keterangan"]?> </option>
                    <?php endforeach ?>
                    </select>
                <?php endforeach ?>


            <?php } else{ 
                foreach ($kriteria as $value) { ?>
                    <label><?=$value["kriteria"]?>:</label>
                    <select class="form-control" style="width: 900px" name="<?=$value['kriteria']?>"> 
                    <?php foreach (getMultiData($value['kriteria']) as $key => $value) {?>
                        <option value="<?=$value["id_atribut"]?>"><?=$value["keterangan"]?></option>
                    <?php } ?>

                    </select>
                <?php } ?>
            <?php } ?>
        <br>
        <button class="btn btn-success " type="submit"><?= $id_smartphone != null ? 'Edit' : "Submit" ?></button>
        </form>
