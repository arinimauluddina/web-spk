<?php
	
    include_once('koneksi.php');
    
	function dp($arr){
		die(print_r($arr));
	}

	function getTotalDataset(){
		$koneksi = mysqli_connect("localhost","root","","dbskripsi");
		$query = "SELECT count(*) as total_dataset FROM data_smartphone";

        $data = mysqli_query($koneksi,$query);
        $data = mysqli_fetch_assoc($data);
        
        return $data["total_dataset"];
	}

	function checkSelected($id_smartphone, $id_kriteria_attribut){
		$koneksi = mysqli_connect("localhost","root","","dbskripsi");
		$query_all = "SELECT * FROM nilai n
			join kriteria_atribut ka
			on ka.id_atribut = n.id_kriteria_attribut
		 WHERE id_smartphone = $id_smartphone AND n.id_kriteria_attribut = $id_kriteria_attribut";

		$data_yang_dipilih = [];
        $data = mysqli_query($koneksi,$query_all);
		$d = mysqli_fetch_assoc($data);

		return $d;
    }
    
    function getInfoKriteriaDanBobot($kriteria, $bobot){
        $koneksi = mysqli_connect("localhost","root","","dbskripsi");
		$query_all = "SELECT k.kriteria, ka.atribut FROM `kriteria` k
        JOIN kriteria_atribut ka
        on ka.id_kriteria = k.id_kriteria
        where k.kriteria = '$kriteria' and ka.bobot = $bobot";

        $data = mysqli_query($koneksi,$query_all);
		$d = mysqli_fetch_assoc($data);

        return $d;
    }

	function getMultiDataNilai($id_smartphone){
		$koneksi = mysqli_connect("localhost","root","","dbskripsi");
		$query_all = "SELECT * FROM nilai n
			join kriteria_atribut ka
			on ka.id_atribut = n.id_kriteria_attribut
		 WHERE id_smartphone = $id_smartphone";

		$data_yang_dipilih = [];
        $data = mysqli_query($koneksi,$query_all);

        $i = 1;
		while($d = mysqli_fetch_array($data)){
			$i++;
			$data_yang_dipilih[$i] = $d;
        }

        return $data_yang_dipilih;
	}

	function getMultiData($kriteria){
		$koneksi = mysqli_connect("localhost","root","","dbskripsi");
		$query_all = "SELECT * FROM kriteria_atribut ka JOIN kriteria kr ON ka.id_kriteria = kr.id_kriteria WHERE kr.kriteria = '$kriteria'";

		$data_yang_dipilih = [];
        $data = mysqli_query($koneksi,$query_all);

        $i = 1;
		while($d = mysqli_fetch_array($data)){
			$i++;
			$data_yang_dipilih[$i] = $d;
        }

        return $data_yang_dipilih;
	}

	function getDataPerParameter($kriteria){
		$koneksi = mysqli_connect("localhost","root","","dbskripsi");
		$query = "SELECT * FROM nilai n 
        JOIN kriteria_atribut ka on ka.id_atribut = n.id_kriteria_attribut 
        JOIN kriteria kr on kr.id_kriteria = ka.id_kriteria where kr.kriteria = '$kriteria'
        ORDER BY n.id_smartphone ASC
        ";

        

		$data_yang_dipilih = [];
        $data = mysqli_query($koneksi,$query);

        $i = 0;
		while($d = mysqli_fetch_array($data)){
			$data_yang_dipilih[$i] = $d["bobot"];
			$i++;
        }
        return $data_yang_dipilih;
	}

	function getAmbilNilaiByIdSmartphone($id_smartphone){
	$koneksi = mysqli_connect("localhost","root","","dbskripsi");
		$query = "SELECT * FROM nilai n JOIN kriteria_atribut ka on ka.id_atribut = n.id_kriteria_attribut JOIN kriteria kr on kr.id_kriteria = ka.id_kriteria where n.id_smartphone = '$id_smartphone'";

		$data_yang_dipilih = [];
        $data = mysqli_query($koneksi,$query);

        $i = 0;
		while($d = mysqli_fetch_array($data)){
			$data_yang_dipilih[$i] = $d;
			$i++;
        }

        return $data_yang_dipilih;	
	}

	function getAll(){
		$koneksi = mysqli_connect("localhost","root","","dbskripsi");
		$query = "SELECT count(*) as total_data_smartphone FROM data_smartphone";

		$data_yang_dipilih = [];
        $data = mysqli_query($koneksi,$query);

        return mysqli_fetch_array($data)["total_data_smartphone"];
	}

	function transpose($baris, $kolom, $array){
		$result = [];

		for($i=0; $i<$kolom; $i++){
			for($j=0; $j<$baris; $j++){
				$result[$i][$j] = $array[$j][$i];
			}
		}

		return $result;
	}

	function toMatrix($baris, $kolom, $array){
		$result = [];
		$index = 0;
		if($baris * $kolom == count($array)){
			for($i = 0; $i < count($array); $i+=$baris){
				$slice = array_slice($array, $i, $baris);

				array_push($result, $slice);
			}
		}
		return $result;
	}

	function sum($carry, $item)
	{
        $carry += $item;
        return $carry;
	}

	function hitungNormalisasi ($parameter, $base ) {
        $kumpulan_hitung = [];
        $akar = 0;
        for($i = 0; $i < $base; $i++){
            $akar += pow($parameter[$i], 2);
            
            $hitungan_akar = sqrt($akar);
        }

        for($i = 0; $i< $base; $i++){
            array_push($kumpulan_hitung, $parameter[$i] / $hitungan_akar);
        }
        
		return $kumpulan_hitung;
    }
    
    function hitungPositifNegatif($array){
        $hasil = 0;
        for($i = 0; $i < count($array); $i++){
            $hasil += $array[$i];
        }
        return sqrt($hasil);
    }
?>