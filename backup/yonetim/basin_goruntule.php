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
			
			$baglan = mysql_query("select * from basinlar where id='$id';") or die("Hata Kayit Eklenmedi");
           if($baglan){
			}
			if ($myvalue = mysql_fetch_array($baglan)){
		
?>
<form action="index.php?page=basin_goruntule&islem=kaydet&id=<?php echo $myvalue["id"]; ?>" method="post" enctype="multipart/form-data" name="frmduyuruekle">
  <table width="700" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="3" bgcolor="#F2F2F2" height="5"></td>
    </tr>
    <tr>
      <td width="5" bgcolor="#F2F2F2">&nbsp;</td>
      <td width="381" valign="top"><table width="671" border="0" align="center" cellpadding="1" cellspacing="1">
        <tr>
          <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">BASIN HABERLERI GUNCELLEME</td>
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
          <td width="522" height="10" align="left"><input name="baslik" type="text" value="<?php echo $myvalue["baslik"]; ?>" size="47"/></td>
        </tr>
		<tr>
          <td align="left" valign="top" class="basliksiyahkalin">Detayli aciklama </td>
          <td align="left" valign="top" class="basliksiyahkalin">:</td>
          <td align="left"><textarea name="aciklama" cols="47" rows="6"><?php echo $myvalue["aciklama"]; ?></textarea></td>
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
          <td colspan="3" align="center"><input type="submit" name="button" id="button" value="Islemi Guncelle" />
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
			
			$baglan = mysql_query("delete from basinlar where id='$id';") or die("Hata Kayit Eklenmedi");
			if($baglan){
			echo "silme isleminiz gerceklesti";
			}
			else
			{ echo "iþlem hatasý $id";
			}
			}
			
			////////
			if ($_GET["islem"]=="kaydet"){ // tümleþik sayfadan formu kullanma get iþlemi
			
			$baslik 		= $_POST["baslik"];
			$aciklama		= $_POST["aciklama"];
			$pfile			= $_FILES["resim"]["name"];
		
			// veritabanýndaki slider tablomuzdaki id yi maximum id yi alýyoruz..			
			$id = $_GET["id"];
			
			// resmi upload ettikten idyi resmin yanýna yazdýrmak için update yapýyoruz..
			$baglan = mysql_query("UPDATE basinlar SET baslik = '$baslik', aciklama = '$aciklama' where id='$id';") or die("Hata Kayit Eklenmedi");
           if($baglan){
		    echo "<h2 style='width:100%; text-align:center;'>Basin icerigi guncellendi.<br/></h2>";
			}
			}	

}
else
{
	header("Location:http://www.bursahasvak.com/yonetim/");
}

?>