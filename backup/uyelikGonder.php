<meta http-equiv="Content-Type" content="text/html; charset=latin5_turkish_ci" />
<?php
error_log("E_ALL");

include("includes/config.php");

$adsoyad = $_POST["adsoyad"];
$eposta= $_POST["eposta"];
$tel= $_POST["tel"];
$pfile= $_FILES["uploadfile2"]["name"];



$baglan = mysql_query("insert into tbl_uye (adsoyad,eposta,tel) values('$adsoyad','$eposta','$tel');") or die("Hata Kayit Eklenmedi");
           if($baglan){
            echo $pfile;		
			}
$baglan = mysql_query("select id from tbl_uye where adsoyad='".$adsoyad."' and eposta='".$eposta."' and tel = '".$tel."';") or die("Hata. Uyelik bulunamadı.");
           if($value=mysql_fetch_array($baglan)){
			$id=$value['id'];
			$pfile=$id."_".$pfile;
			
			$target_path = "images/uyeler/";

$target_path = $target_path . basename( $pfile); 

		if(move_uploaded_file($_FILES['uploadfile2']['tmp_name'], $target_path)) {
			echo "Bilgileriniz ".  basename( $pfile). 
			" Veritabanımıza Transfer Edimiştir.";
		} else{
			echo "işlemlerinizde hata var, lütfen tekrar deneyiniz.!";
		}
			
			$baglan = mysql_query("UPDATE tbl_uye SET resim = '$pfile' where id='$id';") or die("Hata Kayit Eklenmedi");
           if($baglan){
           echo $pfile;		
			}
			
			}
		   
?>
 <meta http-equiv="refresh" content="0; url=hasvak-uyelik.php" />