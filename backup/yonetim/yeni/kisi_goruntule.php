<?
if($_SESSION['buikadkk']){
include("fckeditor/fckeditor.php"); 
?>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<link href="style/style.css" rel="stylesheet" type="text/css">
	<!-- Tarih alanı için gerekli css ve js dosyaları başlangıcı--->
		<link type="text/css" rel="stylesheet" href="src/css/jscal2.css" />
		<script src="src/js/jscal2.js"></script>
		<script src="src/js/lang/tr.js"></script>
	<!-- Tarih alanı için gerekli css ve js dosyaları bitişi--->
    
<? 
	$gelenid = $_GET["id"];
	
	if ($_GET["id"] != "" and !ctype_digit($_GET["id"]))
		{
			/*
			Gelen id tamsayı değil ise hata verdir
			*/			
			echo "<script>self.location = \"index.php?page=uyari&link=".$_SERVER['REQUEST_URI']."\"</script>";
		}
	else
		{
			
			$strmsg1 = "Sira No / Kişi Adı / Görevi Alanları içerisine script komutu girilemez.!";
			$strmsg2 = "Kişi Adı Girmediniz. Kaydedilemez.!";
			$strmsg3 = "Kişi Güncellendi.";
			$strmsg4 = "Güncelleme sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !";
			$strmsg5 = "Kişi Silindi";
			$strmsg6 = "Silme sırasında hata oluştu... Kişi Silinemedi !";
			
			if ($_GET["islem"]=="kaydet")
				{
					$grup_id = $_POST["grupid"];
					$sira_no = $_POST["sirano"];
					$kisi_adi = $_POST["kisiadi"];
					$kisi_gorevi = $_POST["gorevi"];
					$e_posta = $_POST["eposta"];
					$unvan = $_POST["unvan"];

					
					$tmp_sirano=ucwords(strtolower($sira_no));
					$tmp_kisiadi=ucwords(strtolower($kisi_adi));
					$tmp_gorevi=ucwords(strtolower($kisi_gorevi));
					$tmp_eposta=ucwords(strtolower($e_posta));
					$tmp_unvan=ucwords(strtolower($unvan));
					
					$aranacak='<script'; 
				    if (strpos($tmp_kisiadi, $aranacak) !== false || strpos($tmp_gorevi, $aranacak) !== false || strpos($tmp_sirano, $aranacak) !== false || strpos($tmp_eposta, $aranacak) !== false || strpos($tmp_unvan, $aranacak) !== false)
						{ 
							echo "<script>self.location = \"index.php?page=kisi_goruntule&islem=goster&mesaj=".$strmsg1."&id=".$_POST["id"]."\"</script>";
						}					
					else
						{
							if($_POST["kisiadi"]=="")
								{
									echo "<script>self.location = \"index.php?page=kisi_goruntule&islem=goster&mesaj=".$strmsg2."&id=".$_POST["id"]."\"</script>";
								}
							else
								{
									if($_POST["kadro"]=="on")
										{
											$kadro="1";
										}else{
											$kadro="0";
										}								
									$sql_cumlesi = "update kisiler set grupid='".$grup_id."', sirano='".$sira_no."', adi='".$kisi_adi."', gorevi='".$kisi_gorevi."', eposta='".$e_posta."', kadro='".$kadro."' , ozgecmis='".$_POST["ozgecmis"]."', unvan='".$_POST["unvan"]."', cinsiyet='".$_POST["cinsiyet"]."' where id=".$_POST["id"];

									$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);
									if ($query_sonucu==true)
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
													if ($_POST["eski_resim"] != "")
														{
															unlink("../images/kisiler/".$_POST["eski_resim"]);
														}
													$vtresimadi = $kayid.$iconadi;

													$vte = mysql_query("UPDATE kisiler SET resim='".$vtresimadi."' WHERE id='".$_POST["id"]."'",$veriyolu);																				
												}
											
											echo "<script>self.location = \"index.php?page=kisi_listele&mesaj=".$strmsg3."\"</script>";
										}
									else
										{
											echo "<script>self.location = \"index.php?page=kisi_listele&mesaj=".$strmsg4."\"</script>";	
										}
								}
						}
				}
			elseif($_GET["islem"]=="sil")
					{
						$sql= @mysql_query("select * from kisler where id=".$gelenid,$veriyolu);
						$sonuc=@mysql_fetch_array($sql);
						if ($sonuc)	
							{
								$eski_resim = $sonuc["resim"];
							}						
						
						$silme_sonucu= mysql_query("delete from kisiler where id=".$gelenid,$veriyolu);
						if ($silme_sonucu==true)
							{
								if ($eski_resim != "")
									{
										unlink("../images/gruplar/".$eski_resim);
									}									
								
								echo "<script>self.location = \"index.php?page=kisi_listele&mesaj=".$strmsg5."\"</script>";
							}
						else
							{
								echo "<script>self.location = \"index.php?page=kisi_listele&mesaj=".$strmsg6."\"</script>";
							}	
					}
			elseif($_GET["islem"]=="goster")
					{
						$duyuru_tablosu = @mysql_query("select * from kisiler where id=".$gelenid,$veriyolu);
						$kayit_satiri = @mysql_fetch_array($duyuru_tablosu);
?>


<form name="frmkisigoruntule" method="post" action="index.php?page=kisi_goruntule&islem=kaydet" enctype="multipart/form-data">
<input name="id" type="hidden" value="<?=$gelenid ?>">
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>
    </tr>
  <tr>
    <td width="5" bgcolor="#F2F2F2"></td>
    <td width="644"><table width="645" border="0" align="center" cellpadding="1" cellspacing="1">
      <tr>
        <td height="20" colspan="4" align="center" bgcolor="#999999" class="baslikbeyaz">KİŞİ D&Uuml;ZENLE</td>
      </tr>
      <tr>
        <td height="1" colspan="4" align="center" bgcolor="#808080"></td>
      </tr>
      <tr>
        <td height="20" colspan="4" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#CCCCCC" <? }?>class="basliksiyahkalin"><?=$_GET["mesaj"];?></td>
      </tr>
      <tr>
        <td class="basliksiyahkalin">Grup Adı</td>
        <td class="basliksiyahkalin">:</td>
        <td height="25" colspan="2"><select name="grupid" id="grupid">
  <?
			$gruplar = mysql_query("select * from hgruplar", $veriyolu);
			while($satir=mysql_fetch_array($gruplar))
					{
?>
          <option value="<?=$satir["id"];?>" <? if($satir["id"] == $kayit_satiri["grupid"]) {echo "selected";} ?>><?=$satir["grupadi"];?></option>
  <?
					}
?>
          </select></td>
      </tr>
      <tr>
        <td class="basliksiyahkalin">Sıra No</td>
        <td class="basliksiyahkalin">:</td>
        <td width="337" height="25"><input name="sirano" type="text" id="sirano" size="10" value="<?=$kayit_satiri["sirano"] ?>"/>
          <span class="basliksiyahkalin">
          <input type="checkbox" name="kadro" <? if($kayit_satiri["kadro"]=="1"){ echo "checked"; } ?>  />
Akademik Kadro</span></td>
        <td width="186" rowspan="7" align="center"><img src="../images/kisiler/<?=$kayit_satiri['resim'];?>" width="130" height="150" /></td>
      </tr>
      <tr>
        <td width="105" class="basliksiyahkalin">Kişi Adı</td>
        <td width="4" class="basliksiyahkalin">:</td>
        <td height="25"><input name="kisiadi" type="text" id="kisiadi" size="46" value="<?=$kayit_satiri["adi"] ?>" /></td>
        </tr>
 <tr>
        <td width="105" class="basliksiyahkalin">Cinsiyet</td>
        <td width="4" class="basliksiyahkalin">:</td>
        <td height="25" class="basliksiyahkalin"><input name="cinsiyet" type="radio" value="0" <? if($kayit_satiri["cinsiyet"]=="0"){ echo "checked"; }?>/>
        Bay 
          <input name="cinsiyet" type="radio" value="1" <? if($kayit_satiri["cinsiyet"]=="1"){ echo "checked"; }?>/>
          Bayan </td>
        </tr>        
      <tr>
        <td class="basliksiyahkalin">G&ouml;revi</td>
        <td class="basliksiyahkalin">:</td>
        <td><input name="gorevi" type="text" id="gorevi" size="46" value="<?=$kayit_satiri["gorevi"] ?>" /></td>
        </tr>
      <tr>
        <td class="basliksiyahkalin">Ünvanı / Meslek</td>
        <td class="basliksiyahkalin">:</td>
        <td><input name="unvan" type="text" id="gorevi" size="46" value="<?=$kayit_satiri["unvan"] ?>" /></td>
        </tr>        
      <tr>
        <td class="basliksiyahkalin">E-Posta</td>
        <td class="basliksiyahkalin">:</td>
        <td><input type="text" name="eposta" id="eposta" value="<?=$kayit_satiri["eposta"] ?>"/></td>
        </tr>
           <tr>
        <td class="basliksiyahkalin">Özgeçmiş</td>
        <td class="basliksiyahkalin">:</td>
        <td>	  <?php
	  $ozgecmis=$kayit_satiri["ozgecmis"];
$oFCKeditor = new FCKeditor('ozgecmis') ;
$oFCKeditor->BasePath = 'fckeditor/' ;
$oFCKeditor->Value = $ozgecmis ;
$oFCKeditor->Create() ;
?></td>
           </tr>
      <tr>
        <td class="basliksiyahkalin">Resim</td>
        <td class="basliksiyahkalin">:</td>
        <td colspan="2"><input name="resim" type="file" id="resim" size="46"/>
        <? if($kayit_satiri['resim']!==""){echo '&nbsp;&nbsp;<a target="_blank" href="../images/kisiler/'.$kayit_satiri['resim'].'">'.$kayit_satiri['resim'].'</a>';}?>
         <input name="eski_resim" value="<?=$kayit_satiri["resim"];?>" type="hidden"/></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" align="center"><input type="submit" name="button" id="button" value="Kaydet">
          <input type="reset" name="button2" id="button2" value="Temizle"></td>
      </tr>
      <tr>
        <td colspan="4" align="center">&nbsp;</td>
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
		}	
}
else
{
	header("Location:http://www.sanalnet.com/sip/");
	
}
?>