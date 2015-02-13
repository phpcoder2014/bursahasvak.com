<meta http-equiv="Content-Type" content="text/html; charset=latin5_turkish_ci" />
<?php
include("includes/config.php");

$adsoyad = $_POST["adsoyad"];
$eposta= $_POST["eposta"];
$tel= $_POST["tel"];
$konu= $_POST["konu"];
$mesaj = $_POST["mesaj"];

$baglan = mysql_query("insert into tbl_iletisim (adsoyad,eposta,tel,konu,mesaj) values('$adsoyad','$eposta','tel','$konu','$mesaj');") or die("Hata Kayit Eklenmedi");
           if($baglan){
            echo '("Bilgileriniz basarili bir sekilde kayit edildi.!")';
			
           }
?>
<meta http-equiv="refresh" content="0; url=iletisim.php" />