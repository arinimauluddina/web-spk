<?php 

	include_once './config/koneksi.php';
	$query = "SELECT * FROM rating";

	$result = mysqli_query($koneksi, $query);

	while($d = mysqli_fetch_assoc($result)){ ?>

		<img onclick="addRating(<?=$d['id_emot']?>)" src="./img/emot/<?=$d['logo']?>">
		<p> <?=$d["keterangan"]?> </p>
		<p id="emot_rating_<?=$d['id_emot']?>"> <?=$d["jumlah"]?> </p>
	<?php } ?>


<script src="js/vendor/jquery-1.12.4.min.js"></script>	
<script type="text/javascript">
	function addRating(id){
	$.get("tambah_rating.php?id="+id, function(data){
		const response = JSON.parse(data);
    	$(`#emot_rating_${id}`).text(`${response.jumlah}`)
    });
}
</script>
