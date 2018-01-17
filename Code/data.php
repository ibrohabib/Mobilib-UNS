<?php 
	include_once "koneksi.php";

	$query = mysqli_query($con, "SELECT * FROM master_buku ORDER BY judul_buku ASC");
	
	$json = array();	
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}
	
	echo json_encode($json);
	
	mysqli_close($con);
?>