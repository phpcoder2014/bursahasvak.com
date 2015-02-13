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
			$strmsg1 = "Başlık veya Açıklamalar içerisine script komutu girilemez.!";
			$strmsg2 = "Başlık Girmediniz. Kaydedilemez.!";
			$strmsg3 = "Öğrenci İşleri Güncellendi.";
			$strmsg4 = "Güncelleme sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !";
			$strmsg5 = "Öğrenci İşleri Silindi";
			$strmsg6 = "Silme sırasında hata oluştu... Öğrenci İşleri Silinemedi !";
			
			if ($_GET["islem"]=="kaydet")
				{
					$baslik=$_POST["baslik"];
					$tmpbaslik=ucwords(strtolower($baslik));

					$aciklama=$_POST["aciklama"];
					$tmpaciklama=ucwords(strtolower($aciklama));	
							
					$basliken=$_POST["basliken"];
					$tmpbasliken=ucwords(strtolower($basliken));

					$aciklamaen=$_POST["aciklamaen"];
					$tmpaciklamaen=ucwords(strtolower($aciklamaen));	

					$baslikit=$_POST["baslikit"];
					$tmpbaslikit=ucwords(strtolower($baslikit));

					$aciklamait=$_POST["aciklamait"];
					$tmpaciklamait=ucwords(strtolower($aciklamait));
		
					$aranacak='<script'; 

				    if (strpos($tmpbaslik, $aranacak) !== false || strpos($tmpbasliken, $aranacak) !== false)
						{ 
							echo "<script>self.location = \"index.php?page=ogr_goruntule&islem=goster&mesaj=".$strmsg1."&id=".$_POST["id"]."\"</script>";
						}					
					else
						{
							if($baslik=="")
								{
									echo "<script>self.location = \"index.php?page=ogr_goruntule&islem=goster&mesaj=".$strmsg2."&id=".$_POST["id"]."\"</script>";
								}

							$sql_cumlesi = "update ogr set baslik='".$baslik."', basliken='".$basliken."', baslikit='".$baslikit."', aciklama='".$aciklama."', aciklamaen='".$aciklamaen."',aciklamait = '".$aciklamait."' where id=".$_POST["id"];
									$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);
									if ($query_sonucu==true)
										{
											if ($_FILES["resim"]["name"])
												{
											 		$icon_yol="../images/ogr/";
													$iconadi= isimkontrol($_FILES["resim"]["name"]);
													$kayid=time();
													$vtresimadi = $icon_yol.$kayid."_".$iconadi;											
													$yuklenen_resim_uzantisi=substr($iconadi,-3);
													if (resimuzantikontrolu($yuklenen_resim_uzantisi) == true)
														{
															$iconup=move_uploaded_file($_FILES["resim"]["tmp_name"],$vtresimadi);
															$resimadi = $vtresimadi;
														
															$bresyeni= $icon_yol."buyuk/".$kayid.$iconadi;
															$kresyeni= $icon_yol."kucuk/".$kayid.$iconadi;
												
															sin_boyutla_ozel($resimadi,$kresyeni,200,200);
															sin_boyutla_ozel($resimadi,$bresyeni,400,400); 
												
															unlink($resimadi);
															
															if ($eski_resim <> "")
																{
																	unlink("../images/ogr/buyuk/".$_POST["eski_resim"]);
																	unlink("../images/ogr/kucuk/".$_POST["eski_resim"]);
																}
															$vtresimadi = $kayid.$iconadi;
															$vte=mysql_query("UPDATE ogr SET resim='".$vtresimadi."' WHERE id='".$_POST["id"]."'",$veriyolu);																				
														}
													else
														{
															echo "<script>self.location = \"index.php?page=ogr_goruntule&mesaj=Yüklemek istediğiniz resim ".$uzanti." olduğu için yükleme yapılamaz.\"</script>";	
														}
												}
											echo "<script>self.location = \"index.php?page=ogr_listele&mesaj=".$strmsg3."\"</script>";
										}
									else
										{
											echo "<script>self.location = \"index.php?page=ogr_listele&mesaj=".$strmsg4."\"</script>";	
										}
						}
				}
			elseif($_GET["islem"]=="sil")
					{
						$sql= @mysql_query("select * from ogr where id=".$gelenid,$veriyolu);
						$sonuc=@mysql_fetch_array($sql);
						if ($sonuc)	
							{
								$eski_resim = $sonuc["resim"];
							}						

						$silme_sonucu= mysql_query("delete from ogr where id=".$gelenid,$veriyolu);
						if ($silme_sonucu==true)
							{
								if ($eski_resim != "")
									{
										unlink("../images/ogr/buyuk/".$eski_resim);
										unlink("../images/ogr/kucuk/".$eski_resim);
									}								
								echo "<script>self.location = \"index.php?page=ogr_listele&mesaj=".$strmsg5."\"</script>";
							}
						else
							{
								echo "<script>self.location = \"index.php?page=ogr_listele&mesaj=".$strmsg6."\"</script>";
							}	
					}
			elseif($_GET["islem"]=="goster")
					{
						$ogr_tablosu = @mysql_query("select * from ogr where id=".$gelenid,$veriyolu);
						$kayit_satiri = @mysql_fetch_array($ogr_tablosu);

						$tarih_bol = split("-",$kayit_satiri["tarih"]);
						$kayit_yil=$tarih_bol[0];
						$kayit_ay=$tarih_bol[1];
						$kayit_gun=$tarih_bol[2]; 
						$gunun_tarihi=$kayit_gun."-".$kayit_ay."-".$kayit_yil;
?>

<form action="index.php?page=ogr_goruntule&islem=kaydet" method="post" enctype="multipart/form-data" name="frmduyurugoruntule">
<input name="id" type="hidden" value="<?=$gelenid ?>">
<?
	$ogr_tablosu = @mysql_query("select * from ogr where id=".$_GET["id"],$veriyolu);
						$kayit_satiri = @mysql_fetch_array($ogr_tablosu);
?>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>
  </tr>
  <tr>
    <td width="4" bgcolor="#F2F2F2">&nbsp;</td>
    <td width="643" height="340"><table width="645" border="0" align="center" cellpadding="1" cellspacing="1">
      <tr>
        <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">ÖĞRENCİ İŞLERİ D&Uuml;ZENLE</td>
        </tr>
      <tr>
        <td height="1" colspan="3" align="center" bgcolor="#808080"></td>
        </tr>
      <tr>
        <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#CCCCCC" <? }?>class="basliksiyahkalin"><?=$_GET["mesaj"];?></td>
        </tr>
      <tr>
        <td class="basliksiyahkalin"> Başlık (Tr)</td>
        <td class="basliksiyahkalin">:</td>
        <td height="25"><input name="baslik" type="text" id="baslik" size="46" value="<?=$kayit_satiri["baslik"] ?>" /></td>
      </tr>
      <tr>
        <td class="basliksiyahkalin"> Başlık (En)</td>
        <td class="basliksiyahkalin">:</td>
        <td height="25"><input name="basliken2" type="text" id="basliken2" size="46" value="<?=$kayit_satiri["basliken"] ?>" /></td>
      </tr>
      <tr>
        <td width="116" class="basliksiyahkalin"> Başlık (İt)</td>
        <td width="4" class="basliksiyahkalin">:</td>
        <td width="515" height="25"><input name="basliken" type="text" id="basliken" size="46" value="<?=$kayit_satiri["basliken"] ?>"></td>
      </tr>
      <tr>
        <td valign="top" class="basliksiyahkalin">İçerik (Tr)</td>
        <td valign="top" class="basliksiyahkalin">:</td>
        <td><?php
	  $aciklama=$kayit_satiri["aciklama"];
$oFCKeditor = new FCKeditor('aciklama') ;
$oFCKeditor->BasePath = 'fckeditor/' ;
$oFCKeditor->Value = $aciklama ;
$oFCKeditor->Create() ;
?></td>
      </tr>
      <tr>
        <td valign="top" class="basliksiyahkalin">İçerik (En)</td>
        <td valign="top" class="basliksiyahkalin">:</td>
        <td><?php
	  $aciklamaen=$kayit_satiri["aciklamaen"];
$oFCKeditor = new FCKeditor('aciklamaen') ;
$oFCKeditor->BasePath = 'fckeditor/' ;
$oFCKeditor->Value = $aciklamaen ;
$oFCKeditor->Create() ;
?></td>
      </tr>
      <tr>
        <td valign="top" class="basliksiyahkalin">İçerik (İt)</td>
        <td valign="top" class="basliksiyahkalin">:</td>
        <td><?php
	  $aciklamait=$kayit_satiri["aciklamait"];
$oFCKeditor = new FCKeditor('aciklamait') ;
$oFCKeditor->BasePath = 'fckeditor/' ;
$oFCKeditor->Value = $aciklamait ;
$oFCKeditor->Create() ;
?></td>
      </tr>
      <tr>
        <td class="basliksiyahkalin">Resim</td>
        <td class="basliksiyahkalin">:</td>
        <td><input name="resim" type="file" id="resim" size="45" /><? if($kayit_satiri['resim']!==""){echo '&nbsp;&nbsp;<a target="_blank" href="../images/ogr/buyuk/'.$kayit_satiri['resim'].'">'.$kayit_satiri['resim'].'</a>';}?><input name="eski_resim" value="<?=$kayit_satiri["resim"];?>" type="hidden" /></td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
        </tr>
      <tr>
        <td colspan="3" align="center"><input type="submit" name="button" id="button" value="Kaydet">
          <input type="reset" name="button2" id="button2" value="Temizle"></td>
        </tr>
      <tr>
        <td height="18" colspan="3" align="center">&nbsp;</td>
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
?>	
<?
}
else
{
	header("Location:http://www.sanalnet.com/sip/");
	
}
?>