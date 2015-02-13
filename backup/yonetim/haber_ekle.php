<?
if($_SESSION['buikadkk']){
// session tanýmladýk.. þifremiz hala geçerli..
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/style.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="src/css/jscal2.css" />
<script src="src/js/jscal2.js"></script>
<script src="src/js/lang/tr.js"></script>
<?php
error_log("E_ALL"); // çýkan hatalarý detaylý gösterme.

			if ($_GET["islem"]=="kaydet"){ // tümleþik sayfadan formu kullanma get iþlemi
			
			$haberBaslik 		= $_POST["haberBaslik"];
			$kisaDetay			= $_POST["kisaaciklama"];
			$uzunDetay			= $_POST["uzunDetay"];
			$pfile				= $_FILES["resim"]["name"];

			// veritabanýndaki tablomuza buradan baðlanýyoruz..		
$baglan = mysql_query("insert into slider (title,kisadetay,uzundetay) values('".$haberBaslik."','".$kisaDetay."','".$uzunDetay."');") or die("Hata Kayit Eklenmedi");
           if($baglan){
            echo $pfile;		
			}
		
			// veritabanýndaki slider tablomuzdaki id yi maximum id yi alýyoruz..			
$baglan = mysql_query("select max(id) as maxid from slider;") or die("Hata. Uyelik bulunamadý.");
            if($baglan){
            echo $pfile;		
			}
		   if($value=mysql_fetch_array($baglan)){
			$id=$value['maxid'];
			echo $id;
			
			$pfile=$id."_".$pfile;
			
			$target_path = "images/slider/";

			$target_path = $target_path . basename( $pfile); 

			// resmi upload ediyoruz..
		if(move_uploaded_file($_FILES['resim']['tmp_name'], $target_path)) {
			echo "Bilgileriniz ".  basename( $pfile). 
			" Veritabanýmýza Transfer Edimiþtir.";
		} else{
			echo "iþlemlerinizde hata var, lütfen tekrar deneyiniz.!";
		}
			// resmi upload ettikten idyi resmin yanýna yazdýrmak için update yapýyoruz..
			$baglan = mysql_query("UPDATE slider SET link = 'haberDetay.php?id=$id' , image = '$target_path' where id='$id';") or die("Hata Kayit Eklenmedi");
           if($baglan){
           echo $pfile;		
			}
			
			}
}
?>
<form action="index.php?page=haber_ekle&islem=kaydet" method="post" enctype="multipart/form-data" name="frmduyuruekle">
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
          <td width="141" height="13" align="left" class="basliksiyahkalin">Haber Başlığı </td>
          <td width="8" align="left" class="basliksiyahkalin">:</td>
          <td width="522" height="10" align="left"><input name="haberBaslik" type="text" size="47"/></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="basliksiyahkalin">Kısa Aaçıklama </td>
          <td align="left" valign="top" class="basliksiyahkalin">:</td>
          <td align="left"><textarea name="kisaaciklama" id="kisaDetay" cols="47" rows="3"></textarea></td>
        </tr>
		<tr>
          <td align="left" valign="top" class="basliksiyahkalin">Detaylı Açıklama </td>
          <td align="left" valign="top" class="basliksiyahkalin">:</td>
          <td align="left"><textarea name="uzunDetay" id="uzunDetay" cols="47" rows="6"></textarea></td>
        </tr>
		  <tr>
		    <td align="left" valign="top"></td>
	      </tr>
        <tr>
		</td>
        </tr>
        <tr>
          <td valign="top" class="basliksiyahkalin">Resim</td>
          <td valign="top" class="basliksiyahkalin">:</td>
          <td valign="top" class="baslikgri12px">
		  <input name="resim" type="file" id="resim" size="45" />
            <br />
            <span class="hatamesaji">Not:   850 &times; 400 boyutlarında atmanız gerekmektedir.</span></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center"><input type="submit" name="button" id="button" value="Kaydet" />
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
else
{
	header("Location:http://www.bursahasvak.com/yonetim/");
}
?>