<?php
	include_once('./config/fungsi.php');

	// $MEREK = $_POST["merek"];
	// $PROCESSOR = $_POST["processor"];
	// $RAM = $_POST["ram"];
	// $MEMORI = $_POST["memori"];
	// $KAMERA = $_POST["kamera"];
	// $BATERAI = $_POST["baterai"];
	// $LAYAR = $_POST["layar"];
	// $HARGA = $_POST["harga"];

    $keterangan_dan_bobot = [];
    
    foreach ($_POST as $key => $value){
        $key = str_replace('_', ' ', $key);
        
        array_push($keterangan_dan_bobot, getInfoKriteriaDanBobot($key,$value));
    }

	$total_dts = getTotalDataset();
	$inputs = [];
	foreach ($_POST as $value) {
	 	array_push($inputs, $value);
	}

	$query = "SELECT * FROM kriteria";

	$result = mysqli_query($koneksi, $query);
	$kriteria = [];

	while($data = mysqli_fetch_assoc($result)){
		array_push($kriteria, $data["kriteria"]);
	}

	$PERPARAMETER = [];
	$normalisasi = [];

    $total_kriteria = count($kriteria);
    $index = 0;

	for($i = 0; $i<$total_dts * $total_kriteria; $i++ ){
        if($i % ($total_dts-1) == 0 && $i != 0){
			foreach($kriteria as $key => $value){
                
                if($key % (count($kriteria)-1) == 0 && $key != 0){
                    if($index > (count($kriteria)-1)){
                        break;
                    }
                    array_push($PERPARAMETER, getDataPerParameter($kriteria[$index]));
                    $index++;
                }
			}
		}
    }   

	for($i = 0; $i < count($PERPARAMETER); $i++){
		array_push($normalisasi, hitungNormalisasi($PERPARAMETER[$i], $total_dts));
    }

	// $C1_TOTAL = getDataPerParameter("Merek");
	// $C2_TOTAL = getDataPerParameter("Processor");
	// $C3_TOTAL = getDataPerParameter("RAM");
	// $C4_TOTAL = getDataPerParameter("Memori");
	// $C5_TOTAL = getDataPerParameter("Kamera");
	// $C6_TOTAL = getDataPerParameter("Baterai");
	// $C7_TOTAL = getDataPerParameter("Ukuran Layar");
	// $C8_TOTAL = getDataPerParameter("Harga");

	// $total_data_per_parameter = count($C1_TOTAL);

	// dp($normalisasi);

	// array_push($normalisasi, hitungNormalisasi($C1_TOTAL, $total_dts));
	// array_push($normalisasi, hitungNormalisasi($C2_TOTAL, $total_dts));
	// array_push($normalisasi, hitungNormalisasi($C3_TOTAL, $total_dts));
	// array_push($normalisasi, hitungNormalisasi($C4_TOTAL, $total_dts));
	// array_push($normalisasi, hitungNormalisasi($C5_TOTAL, $total_dts));
	// array_push($normalisasi, hitungNormalisasi($C6_TOTAL, $total_dts));
	// array_push($normalisasi, hitungNormalisasi($C7_TOTAL, $total_dts));
	// array_push($normalisasi, hitungNormalisasi($C8_TOTAL, $total_dts));



	// ============= end hitung normalisasi ===============+

	// ========== start hitung normalisasi x bobot ========
	$baris = count($normalisasi);
	$kolom = $total_dts;

	// transpose normalisasi
	$normalisasi = transpose($baris, $kolom, $normalisasi);
    // input = bobot
	$hasilXBobot = [];
	for($i=0; $i<count($normalisasi); $i++){
		for($j=0; $j<count($normalisasi[$i]); $j++){
			array_push($hasilXBobot, $normalisasi[$i][$j] * $inputs[$j]);
		}
    }

	$final = toMatrix($baris, $kolom, $hasilXBobot);
	$TranposeFinal = transpose($kolom, $baris, $final); // transpose hasil perkalian
	// =========== end hitung normalisasi x bobot =============
	

	// ========== start hitung jarak positif negatif ======= //
	$APositif = [];
	$ANegatif = [];

	for($i = 0; $i<count($TranposeFinal); $i++){
		if($i == (count($TranposeFinal) - 1)){
			array_push($APositif, min($TranposeFinal[$i]));
			array_push($ANegatif, max($TranposeFinal[$i]));
		}else{
			array_push($APositif, max($TranposeFinal[$i]));
			array_push($ANegatif, min($TranposeFinal[$i]));
		}
    }
    
	$APositifCustom = [];
	$ANegatifCustom = [];

	// agar jadi matrix baris x kolom
	for($i = 0; $i<count($normalisasi); $i++){
		$APositifCustom[$i] = $APositif;
		$ANegatifCustom[$i] = $ANegatif;
	}

	// clear memory
	$APositif = [];
	$ANegatif = [];
	// -------------

	$jarakPositif = [];
	$jarakNegatif = [];
	$DPositif = [];
	$DNegatif = [];
	$V = []; // menampung list yang terpilih

	// perhitungan jarak ;

	for($i=0; $i<count($final); $i++){
		for($j=0; $j<count($final[0]); $j++){
			$jarakPositif[$i][$j] = pow($final[$i][$j] - $APositifCustom[$i][$j],2);
			$jarakNegatif[$i][$j] = pow($final[$i][$j] - $ANegatifCustom[$i][$j],2);
		}
		// (rumus halaman 59)
		$DPositif[$i] = hitungPositifNegatif($jarakPositif[$i]);
        $DNegatif[$i] = hitungPositifNegatif($jarakNegatif[$i]);

        // return;
		$V[$i] = $DNegatif[$i] / ( $DNegatif[$i] + $DPositif[$i] );
    }

    // dp($jarakPositif);
    // dp($jarakNegatif);
    
    
    // dp($DPositif);
    // dp($DNegatif);
    
	// ========== end hitung jarak positif negatif ======= //


	// ===== start tampilkan perangkingan === /
	$query = "SELECT * FROM data_smartphone";

	$data_smartphone = mysqli_query($koneksi, $query);
	$tampung_id = [];
	$i = 0;

	while($data = mysqli_fetch_array($data_smartphone)){
		$tampung_id[$i]["id"] = $data["id_smartphone"];
		$tampung_id[$i]["merek"] = $data["merek"];
		$tampung_id[$i]["type"] = $data["type"];
		$tampung_id[$i]["processor"] = $data["processor"];
		$tampung_id[$i]["ram"] = $data["ram"];
		$tampung_id[$i]["memori"] = $data["memori"];
		$tampung_id[$i]["ram"] = $data["ram"];
		$tampung_id[$i]["kamera"] = $data["kamera"];
		$tampung_id[$i]["baterai"] = $data["baterai"];
		$tampung_id[$i]["ukuran_layar"] = $data["ukuran_layar"];
		$tampung_id[$i]["harga"] = $data["harga"];
		$i++;
	}
	
	$json = json_encode($tampung_id);
	$arr = json_decode($json);

	foreach ($arr as $key => $value) {
		$arr[$key]->prob = $V[$key];
	}

	// sorting prob dari tinggi ke rendah
	usort($arr, function($a, $b){
	    return strcmp($b->prob, $a->prob);
    });
    
	$ambil_dari_atas_sebanyak = 30;
	$arr = array_slice($arr, 0, $ambil_dari_atas_sebanyak);
	// ===== end tampilkan perangkingan === 
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
        <link href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <style type="text/css">
	        .form-control {
		    width: 500px;
		    height: 30px;
		    border: none;
		    padding: 0px 0px 0px 0px;
		    margin-left: 10px;
		    margin-bottom: 10px;
		    color: #666;
		    border: 1px solid rgb(240, 230, 230);
		    border-radius: 8px;
		    box-shadow: rgba(0,0,0, 0) 0px 0px 8px; 
		    -moz-box-shadow: rgba(0,0,0, 0) 0px 0px 8px; 
		    -webkit-box-shadow: rgba(0,0,0, 0) 0px 0px 8px; 
			}
			.form-control:focus, .form-control:focus + .fa {
		    border-color: #F0F8FF;
		    color: grey;
		    border-radius: 8px;
		    background: #F0F8FF;
		    box-shadow: rgba(0,0,0, 0) 0px 0px 8px; 
		    -moz-box-shadow: rgba(0,0,0, 0) 0px 0px 8px; 
		    -webkit-box-shadow: rgba(0,0,0, 0) 0px 0px 8px;  
		    }
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
			button.back{
		    background: rgb(252, 52, 52);
		    color: white;
		    border: 1px solid rgb(252, 52, 52);
		    margin-top: 20px;
		    margin-left: 15px;
		    width: 100px;
		    height: 40px;
		    border-radius: 20px;
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
                     </div>
                        </div>
                    </div>
                </div>
            </div>
 </header>
 <body>
 	<div style="margin-left: 50px;">
 	           <button class="back">
               <i class=" fa fa-reply"></i>
               <a href="hitung.php" style="text-decoration:none;color: white;">Kembali</a>
</button>
 	</div>
 	<div class ="row" style="margin-left:50px;margin-top:10px;">
        <div class="col-lg-12">
                <div class="panel panel-success" style="border:2px solid #c7ecc7;width:98%;box-shadow: 0 0 15px">
                    <div class="panel-heading">
				    <b>Hasil Pencarian</b>
                    
            <?php foreach ($keterangan_dan_bobot as $key => $value):?>
                
             <span><?=$value['kriteria'].'='.$value['atribut'].',';?></span>
            <?php endforeach ?>

                    </div>

	<div style="margin-left: 20px;margin-top: 20px;">
	<form action="perbandingan.php" method="GET">
		<table>
			<tr>
			<td><input class="form-control" id="banding_1" name="banding_1"></td>
			<td><input class="form-control" id="banding_2" name="banding_2"></td>
			<button class="btn btn-success" style="float: right;margin-right: 90px;">Bandingkan</button>
		</table>
		</form>
</div>
	  <table class="demo-table" style="margin-left:50px;font-size: 12px;" width="90%" id="datatables">
		<thead>
			<tr>
				<th width="10px">No</th>
				<th>Merek</th>
				<th>Processor</th>
				<th>RAM</th>
				<th>Memori</th>
				<th>Kamera</th>
				<th>Baterai</th>
				<th>Ukuran Layar</th>
				<th width="150px">Harga</th>
				<th>Nilai</th>
				<th>Bandingkan</th>
				
			</tr>
		</thead>
		<tbody>	
			<?php 
			$i = 1;
			foreach ($arr as $key => $value) {
			?>
			<tr>
				<td style="text-align:center" ><?=$i++?></td>
				<td style="text-align:center;width: 100px;" ><?=$value->merek; ?> <?=$value->type ?></td>
				<td style="text-align:center" ><?=$value->processor; ?></td>
				<td style="text-align:center" ><?=$value->ram; ?></td>
				<td style="text-align:center" ><?=$value->memori; ?></td>
				<td style="text-align:center;width: 250px" ><?=$value->kamera; ?></td>
				<td style="text-align:center" ><?=$value->baterai; ?></td>
				<td style="text-align:center" ><?=$value->ukuran_layar; ?></td>
				<td style="text-align:center" ><?=$value->harga; ?></td>
				<td style="text-align:center" ><?=$value->prob; ?></td>
				<td style="text-align:center" ><button class="btn btn-info" onclick="setValueKeInput('<?=$value->id?>', '<?=$value->merek?>', '<?=$value->type?>' )">Bandingkan</button></td>
					
                   
				
                   
			</tr>
			   
			<?php } ?>
		</tbody>
	</table>
	 
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
<script>
	// ini menyiapkan dokumen agar siap grak :)
	$(document).ready(function(){
		// yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
		$('.view_data').click(function(){
			// membuat variabel id, nilainya dari attribut id pada button
			// id="'.$row['id'].'" -> data id dari database 
			var id = $(this).attr("id");
			
			// memulai ajax
			$.ajax({
				url: 'view.php',	// set url -> ini file yang menyimpan query tampil detail data siswa
				method: 'post',		// method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
				data: {id:id},		// nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
				success:function(data){		// kode dibawah ini jalan kalau sukses
					$('#data_siswa').html(data);	// mengisi konten dari -> <div class="modal-body" id="data_siswa">
					$('#myModal').modal("show");	// menampilkan dialog modal nya
				}
			});
		});
	});
	</script>
    
</html>