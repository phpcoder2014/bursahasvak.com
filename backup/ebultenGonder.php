<?php
include("includes/config.php");

$ad = $_POST["ad"];
$soyad= $_POST["soyad"];
$eposta= $_POST["eposta"];
$fadi = $_POST["fadi"];

$baglan = mysql_query("insert into ebulten (ad,soyad,eposta,fadi) values('$ad','$soyad','$eposta','$fadi');") or die("Hata Kay�t Eklenmedi");
           if($baglan){
            echo '<script>alert("Bilgileriniz ba�ar�l� bir �ekilde kay�t edildi.!");</script>';
			
           }
           else{
            $this->session->set_flashdata("Bilgileriniz kay�t edilmedi!");
            header("Location: index.php");
           }
?>
<meta http-equiv="refresh" content="0; url=index.php" />