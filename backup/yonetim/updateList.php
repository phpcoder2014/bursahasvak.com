<?php 
session_start();
ob_start();
if($_SESSION['buikadkk']){
include("../includes/config.php");
$array	= $_POST['arrayorder'];

if ($_POST['mode'] == "haber_listele"){
	
	$count = 1;
	foreach ($array as $idval) {
		$query = "UPDATE haberler SET sirano = " . $count . " WHERE id = " . $idval;
		mysql_query($query) or die('Error, insert query failed');
		$count ++;	
	}
	echo 'All saved! refresh the page to see the changes';
}
if ($_POST['mode'] == "basin_listele"){
	
	$count = 1;
	foreach ($array as $idval) {
		$query = "UPDATE basinlar SET id = " . $count . " WHERE id = " . $idval;
		mysql_query($query) or die('Error, insert query failed');
		$count ++;	
	}
	echo 'All saved! refresh the page to see the changes';
}

if ($_POST['mode'] == "kisi_listele"){
	
	$count = 1;
	foreach ($array as $idval) {
		$query = "UPDATE kisiler SET sirano = " . $count . " WHERE id = " . $idval;
		mysql_query($query) or die('Error, insert query failed');
		$count ++;	
	}
	echo 'All saved! refresh the page to see the changes';
}
if ($_POST['mode'] == "slider_sil"){
	
	$count = 1;
	foreach ($array as $idval) {
		$query = "DELETE slider SET id = " . $count . " WHERE id = " . $idval;
		mysql_query($query) or die('Error, insert query failed');
		$count ++;	
	}
	echo 'All saved! refresh the page to see the changes';
}
if ($_POST['mode'] == "basin_sil"){
	
	$count = 1;
	foreach ($array as $idval) {
		$query = "DELETE basinlar SET id = " . $count . " WHERE id = " . $idval;
		mysql_query($query) or die('Error, insert query failed');
		$count ++;	
	}
	echo 'All saved! refresh the page to see the changes';
}

mysql_close($veriyolu);
}
else {
	echo 'Yetkisiz Giris.!';
}
?>