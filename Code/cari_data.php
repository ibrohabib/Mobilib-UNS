<?php 
	/* ===== www.dedykuncoro.com ===== */
	include_once "koneksi.php";

	$judul_buku = $_POST['keyword'];

	$query = mysqli_query($con, "SELECT * FROM master_buku WHERE judul_buku LIKE '%".$judul_buku."%'");

	$num_rows = mysqli_num_rows($query);

	if ($num_rows > 0){
		$json = '{"value":1, "results": [';

		while ($row = mysqli_fetch_array($query)){
			$char ='"';

			$json .= '{
				"no_bib": "'.str_replace($char,'`',strip_tags($row['no_bib'])).'", 
				"judul_buku": "'.str_replace($char,'`',strip_tags($row['judul_buku'])).'"
			},';
		}

		$json = substr($json,0,strlen($json)-1);
		
		$json .= ']}';

	} else {
		$json = '{"value":0, "message": "Data tidak ditemukan."}';
	}

	echo $json;

	mysqli_close($con);
?>