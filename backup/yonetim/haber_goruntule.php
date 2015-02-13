<?
if($_SESSION['buikadkk']){
// session tanýmladýk.. þifremiz hala geçerli..
?>
<meta http-equiv="Content-Type" content="text/html; charset=latin5_turkish_ci" />
<link href="style/style.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="src/css/jscal2.css" />
<script src="src/js/jscal2.js"></script>
<script src="src/js/lang/tr.js"></script>
<?php
error_log("E_ALL"); // çýkan hatalarý detaylý gösterme.


		 if ($_GET["islem"]=="goster"){ 
			$id = $_GET["id"];
			
			$baglan = mysql_query("select * from slider where id='$id';") or die("Hata Kayit Eklenmedi");
           if($baglan){
			}
			if ($myvalue = mysql_fetch_array($baglan)){

?>
<form action="index.php?page=haber_goruntule&islem=kaydet&id=<?php echo $myvalue["id"]; ?>" method="post" enctype="multipart/form-data" name="frmduyuruekle">
  <table width="700" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="3" bgcolor="#F2F2F2" height="5"></td>
    </tr>
    <tr>
      <td width="5" bgcolor="#F2F2F2">&nbsp;</td>
      <td width="381" valign="top"><table width="671" border="0" align="center" cellpadding="1" cellspacing="1">
        <tr>
          <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">YENI HABER ( BANNER ) EKLE</td>
        </tr>
        <tr>
          <td height="1" colspan="3" align="center" bgcolor="#808080"></td>
        </tr>
        <tr>
          <td height="20" colspan="3" align="center" bgcolor="#FF0000" class="baslik_beyaz_14"></td>
        </tr>
        <tr>
          <td width="141" height="13" align="left" class="basliksiyahkalin">Haber Basligi </td>
          <td width="8" align="left" class="basliksiyahkalin">:</td>
          <td width="522" height="10" align="left"><input name="haberBaslik" type="text" value="<?php echo $myvalue["title"]; ?>" size="47"/></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="basliksiyahkalin">Kisa aciklama </td>
          <td align="left" valign="top" class="basliksiyahkalin">:</td>
          <td align="left"><textarea name="kisaaciklama" id="kisaDetay" cols="47" rows="3"><?php echo $myvalue["kisadetay"]; ?></textarea></td>
        </tr>
		<tr>
          <td align="left" valign="top" class="basliksiyahkalin">Detayli aciklama </td>
          <td align="left" valign="top" class="basliksiyahkalin">:</td>
          <td align="left"><textarea name="uzunDetay" id="uzunDetay" cols="47" rows="6"><?php echo $myvalue["uzundetay"]; ?></textarea></td>
        </tr>
		  <tr>
		    <td align="left" valign="top"></td>
	      </tr>
        <tr>
		</td>
        </tr>
  
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center"><input type="submit" name="button" id="button" value="Haberi Guncelle" />
           <input type="reset" name="button2" id="button2" value="Temizle" /></td>
        </tr>
        <tr>
          <td colspan="3" align="center">&nbsp;</td>
        </tr>
      </table></td>
      <td width="5" bgcolor="#F2F2F2">&nbsp;</td>
    </tr>
    <tr>
      <td height="5" colspan="3" bgcolor="#F2F2F2"></td>
    </tr>
  </table>
</form>
<?
}
}
		else if ($_GET["islem"]=="sil"){ 
			$id = $_GET["id"];
			
			$baglan = mysql_query("delete from slider where id='$id';") or die("Hata Kayit Eklenmedi");
			if($baglan){
			echo "silme iþleminiz gerçekleþti";
			}
			else
			{ echo "iþlem hatasý $id";
			}
			}	
			
			if ($_GET["islem"]=="kaydet"){ // tümleþik sayfadan formu kullanma get iþlemi
			
			$haberBaslik 		= $_POST["haberBaslik"];
			$kisaDetay			= $_POST["kisaaciklama"];
			$uzunDetay			= $_POST["uzunDetay"];
			$pfile				= $_FILES["resim"]["name"];
		
			// veritabanýndaki slider tablomuzdaki id yi maximum id yi alýyoruz..			
			$id = $_GET["id"];
			
			// resmi upload ettikten idyi resmin yanýna yazdýrmak için update yapýyoruz..
			$baglan = mysql_query("UPDATE slider SET title = '$haberBaslik',kisadetay = '$kisaDetay', uzundetay = '$uzunDetay' where id='$id';") or die("Hata Kayit Eklenmedi");
           if($baglan){
		    echo "<h2 style='width:100%; text-align:center;'>Haber icerigi guncellendi.<br/></h2><h4 style='width:100%; text-align:center;'>NOT : Bu haberin resmini degistirmek istiyorsanýz bu haberi<br/>silin yeniden olusturun.</h4>";
			}
			}	
			
}
else
{
	header("Location:http://www.bursahasvak.com/yonetim/");
}
?>