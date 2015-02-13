<?php
include("includes/config.php");

$ad = $_POST["ad"];
$soyad= $_POST["soyad"];
$eposta= $_POST["eposta"];
$fadi = $_POST["fadi"];

$baglan = mysql_query("insert into ebulten (ad,soyad,eposta,fadi) values('$ad','$soyad','$eposta','$fadi');") or die("Hata Kayıt Eklenmedi");
           if($baglan){
            echo '<script>alert("Bilgileriniz başarılı bir şekilde kayıt edildi.!");</script>';
			
           }
           else{
            $this->session->set_flashdata("Bilgileriniz kayıt edilmedi!");
            header("Location: index.php");
           }
?>
<meta http-equiv="refresh" content="0; url=index.php" />