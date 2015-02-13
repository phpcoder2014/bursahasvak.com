<?
if($_SESSION['buikadkk']){
include("fckeditor/fckeditor.php"); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<link href="style/style.css" rel="stylesheet" type="text/css">
<? 
 
	
	if ($_GET["islem"]=="kaydet")
		{	
			if ( $_POST["grupid"] == 0 )
				{
					echo "<script>self.location = \"index.php?page=kisi_ekle&mesaj=Grup Seçilmemiş, Kaydedilemez.! \"</script>";
				}
			else
				{	
		
					$kisi_adi=$_POST["kisiadi"];
					$kisi_gorevi = $_POST["gorevi"];
					$sira_no = $_POST["sirano"];
					$grup_id = $_POST["grupid"];
					$e_posta = $_POST["eposta"];
					$unvan = $_POST["unvan"];					
					
					$tmp_sirano=ucwords(strtolower($_POST["sirano"]));
					$tmp_kisiadi=ucwords(strtolower($kisi_adi));
					$tmp_gorevi=ucwords(strtolower($gorevi));
					$tmp_eposta=ucwords(strtolower($e_posta));
					$tmp_unvan=ucwords(strtolower($unvan));					
					
					$aranacak='<script'; 

					if (strpos($tmp_grupadi, $aranacak) !== false || strpos($tmp_gorevi, $aranacak) !== false || strpos($tmp_sirano, $aranacak) !== false || strpos($tmp_eposta, $aranacak) !== false || strpos($tmp_unvan, $aranacak) !== false)
						{ 
							echo "<script>self.location = \"index.php?page=kisi_ekle&mesaj=Sira No / Kisi Adı / Görevi / E-Posta Alanları içerisine script komutu girilemez! \"</script>";
						}
					else
						{
							if($_POST["kisiadi"]<>"" )
								{
									if($_POST["kadro"]=="on")
										{
											$kadro="1";
										}else{
											$kadro="0";
										}
									$sql_cumlesi = "insert into kisiler (sirano, grupid, adi, gorevi, eposta,kadro,ozgecmis,unvan,cinsiyet) values ('".$sira_no."','".$grup_id."','".$kisi_adi."','".$kisi_gorevi."','".$e_posta."','".$kadro."','".$_POST["ozgecmis"]."','".$_POST["unvan"]."','".$_POST["cinsiyet"]."')";
		
									$sonuc=mysql_query($sql_cumlesi,$veriyolu);
									$sonid=mysql_insert_id($veriyolu);
									if ($sonuc==true)
										{				
											if ($_FILES["resim"]["name"])
												{
													$icon_yol="../images/kisiler/";
													$iconadi= isimkontrol($_FILES["resim"]["name"]);
													$kayid=time();
													$vtresimadi = $icon_yol.$kayid."_".$iconadi;											
													$yuklenen_resim_uzantisi=substr($iconadi,-3);
		
													$iconup=move_uploaded_file($_FILES["resim"]["tmp_name"],$vtresimadi);
													$resimadi = $vtresimadi;
													$kresyeni= $icon_yol.$kayid.$iconadi;
													sin_boyutla_ozel($resimadi,$kresyeni,400,480);
													unlink($resimadi);
													$vtresimadi = $kayid.$iconadi;
													$vte = mysql_query("UPDATE kisiler SET resim='".$vtresimadi."' WHERE id='".$sonid."'",$veriyolu);																						
												}								
											
											echo "<script>self.location = \"index.php?page=kisi_listele&mesaj=Yeni Kisi Eklendi !\"</script>";
										}
									else
										{
											echo "<script>self.location = \"index.php?page=kisi_listele&mesaj=Kayıt sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !\"</script>";		
										}	
								}
							else
								{
									echo "<script>self.location = \"index.php?page=grup_ekle&mesaj=Kisi Adı Girmediniz. Kaydedilemez!\"</script>";
								}
						}
				}
		}
?> 
      
    
<form action="index.php?page=kisi_ekle&islem=kaydet" method="post" enctype="multipart/form-data" name="frmkisiekle">
  <table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>
    </tr>
  <tr>
    <td width="5" bgcolor="#F2F2F2"></td>
    <td width="644"><table width="655" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td height="20" colspan="3" align="center" bgcolor="#999999" class="hatamesaji"><span class="baslikbeyaz">YENİ KİŞİ EKLE</span></td>
    </tr>
    <tr>
      <td height="1" colspan="3" align="center" bgcolor="#808080"></td>
    </tr>
    <tr>
      <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#CCCCCC" <? }?>class="basliksiyahkalin"><?=$_GET["mesaj"];?></td>
    </tr>
    <tr>
      <td width="103" height="31" class="basliksiyahkalin">Grup Adı</td>
      <td width="4" class="basliksiyahkalin">:</td>
      <td width="548" height="25"><select name="grupid" id="grupid">
        <option value="0" selected="selected">Grup Se&ccedil;iniz...</option>

        
        <?
			$siniflar = mysql_query("select * from hgruplar", $veriyolu);
			while($satir=mysql_fetch_array($siniflar))
					{
		?>
        <option value="<?=$satir["id"];?>"><?=$satir["grupadi"];?></option>        
        <?
					}
		?>
        </select></td>
    </tr>
    <tr>
      <td class="basliksiyahkalin">Sıra No</td>
      <td class="basliksiyahkalin">:        </td>
      <td height="25"><span class="basliksiyahkalin">
        <input name="sirano" type="text" id="sirano" size="10" />
        <input type="checkbox" name="kadro" />      
        Akademik Kadro</span></td>
    </tr>
    <tr>
      <td class="basliksiyahkalin">Kişi Adı</td>
      <td class="basliksiyahkalin">:</td>
      <td height="25"><input name="kisiadi" type="text" id="kisiadi" size="46" /></td>
    </tr>
    <tr>
      <td class="basliksiyahkalin">Cinsiyet</td>
      <td class="basliksiyahkalin">:</td>
      <td height="25" class="basliksiyahkalin"><input type="radio" name="cinsiyet" value="0" />
        Bay 
        <input type="radio" name="cinsiyet" value="1" />
        Bayan</td>
    </tr>
    <tr>
      <td class="basliksiyahkalin">G&ouml;revi</td>
      <td class="basliksiyahkalin">:</td>
      <td><input name="gorevi" type="text" id="gorevi" size="46" /></td>
    </tr>
    <tr>
      <td class="basliksiyahkalin">Ünvanı / Meslek</td>
      <td class="basliksiyahkalin">:</td>
      <td><input name="unvan" type="text" id="unvan" size="46" /></td>
    </tr>
    <tr>
      <td class="basliksiyahkalin">E-Posta</td>
      <td class="basliksiyahkalin">:</td>
      <td><input name="eposta" type="text" id="eposta" size="46" /></td>
    </tr>
    <tr>
      <td class="basliksiyahkalin">Özgeçmişi</td>
      <td class="basliksiyahkalin">:</td>
      <td><?php
$oFCKeditor = new FCKeditor('ozgecmis') ;
$oFCKeditor->BasePath = 'fckeditor/' ;
$oFCKeditor->Value = '' ;
$oFCKeditor->Create() ;
?>	</td>
    </tr>
    <tr>
      <td class="basliksiyahkalin">Resim</td>
      <td class="basliksiyahkalin">:</td>
      <td><input name="resim" type="file" id="resim" size="46" /></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="submit" name="button" id="button" value="Kaydet">
        <input type="reset" name="button2" id="button2" value="Temizle"></td>
    </tr>
    <tr>
      <td colspan="3" align="center">&nbsp;</td>
    </tr>
    </table></td>
    <td width="5" bgcolor="#F2F2F2"></td>
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
	header("Location:http://www.sanalnet.com/sip/");
	
}
?>