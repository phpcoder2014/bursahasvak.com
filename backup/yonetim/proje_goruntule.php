<?

if($_SESSION['buikadkk']){

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

			$strmsg3 = "Proje Güncellendi.";

			$strmsg4 = "Güncelleme sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !";

			$strmsg5 = "Proje Silindi";

			$strmsg6 = "Silme sırasında hata oluştu... Proje Silinemedi !";

			

			if ($_GET["islem"]=="kaydet")

				{

					$baslik=$_POST["baslik"];

					$tmpbaslik=ucwords(strtolower($baslik));



					$aciklama=$_POST["aciklama"];

					$tmpaciklama=ucwords(strtolower($aciklama));								



					$tarih=$_POST["tarih"];	

		

					$aranacak='<script'; 



				    if (strpos($tmpbaslik, $aranacak) !== false || strpos($tmpkisaaciklama, $aranacak) !== false || strpos($tmpaciklama, $aranacak) !== false)

						{ 

							echo "<script>self.location = \"index.php?page=proje_goruntule&islem=goster&mesaj=".$strmsg1."&id=".$_POST["id"]."\"</script>";

						}					

					else

						{

							if($baslik=="")

								{

									echo "<script>self.location = \"index.php?page=proje_goruntule&islem=goster&mesaj=".$strmsg2."&id=".$_POST["id"]."\"</script>";

								}

							$tarih_bol = split("-",$tarih);

							$kayit_gun=$tarih_bol[0];

							$kayit_ay=$tarih_bol[1];

							$kayit_yil=$tarih_bol[2]; 

							$degistirilen_tarih=$kayit_yil."-".$kayit_ay."-".$kayit_gun;



							$sql_cumlesi = "update projeler set baslik='".$baslik."', aciklama='".$aciklama."' where id=".$_POST["id"];

									$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);

									if ($query_sonucu==true)

										{

/*pdf upload*/

											if ($_FILES["pdf"]["name"])

												{

										 			$dosya_yol="../images/projeler/";

													$dosyaadi= isimkontrol($_FILES["pdf"]["name"]);

													$kayid=time();

													$vtdosyaadi = $dosya_yol.$kayid."_".$dosyaadi;

													$yuklenen_dosya_uzantisi=substr($dosyaadi,-3);

													$tmp_dosyaadi = $_FILES["pdf"]["tmp_name"];

													if ( strtolower($yuklenen_dosya_uzantisi) == strtolower("pdf") || strtolower($yuklenen_dosya_uzantisi) == strtolower("doc") )

														{

															$dosyaup=move_uploaded_file($tmp_dosyaadi, $vtdosyaadi);

															unlink($dosya_yol.$_POST["eski_pdf"]);

															$vtdosyaadi = $kayid."_".$dosyaadi;

															$vte = mysql_query("UPDATE projeler SET pdf='".$vtdosyaadi."' WHERE id='".$_POST["id"]."'",$veriyolu);

														}

													else

														{

															echo "<script>self.location = \"index.php?page=pdf_goruntule&mesaj=Yüklemek istediğiniz dosya ".$uzanti." uzantılı olduğu için yükleme yapılamaz.\"</script>";	

														}

												}											

											/*pdf upload sonu*/										

											if ($_FILES["resim"]["name"])

												{

											 		$icon_yol="../images/projeler/";

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

												

															sin_boyutla_ozel($resimadi,$kresyeni,80,80);

															sin_boyutla_ozel($resimadi,$bresyeni,400,400); 

												

															unlink($resimadi);

															

															if ($eski_resim <> "")

																{

																	unlink("../images/projeler/buyuk/".$_POST["eski_resim"]);

																	unlink("../images/projeler/kucuk/".$_POST["eski_resim"]);

																}

															$vtresimadi = $kayid.$iconadi;

															$vte=mysql_query("UPDATE projeler SET resim='".$vtresimadi."' WHERE id='".$_POST["id"]."'",$veriyolu);																				

														}

													else

														{

															echo "<script>self.location = \"index.php?page=proje_goruntule&mesaj=Yüklemek istediğiniz resim ".$uzanti." olduğu için yükleme yapılamaz.\"</script>";	

														}

												}

											echo "<script>self.location = \"index.php?page=proje_listele&mesaj=".$strmsg3."\"</script>";

										}

									else

										{

											echo "<script>self.location = \"index.php?page=proje_listele&mesaj=".$strmsg4."\"</script>";	

										}

						}

				}

			elseif($_GET["islem"]=="sil")

					{

						$sql= @mysql_query("select * from projeler where id=".$gelenid,$veriyolu);

						$sonuc=@mysql_fetch_array($sql);

						if ($sonuc)	

							{

								$eski_resim = $sonuc["resim"];

							}						



						$silme_sonucu= mysql_query("delete from projeler where id=".$gelenid,$veriyolu);

						if ($silme_sonucu==true)

							{

								if ($eski_resim != "")

									{

								if ($eski_pdf <> "") {unlink("../images/projeler/".$eski_pdf);}

										unlink("../images/projeler/buyuk/".$eski_resim);

										unlink("../images/projeler/kucuk/".$eski_resim);

									}								

								echo "<script>self.location = \"index.php?page=proje_listele&mesaj=".$strmsg5."\"</script>";

							}

						else

							{

								echo "<script>self.location = \"index.php?page=proje_listele&mesaj=".$strmsg6."\"</script>";

							}	

					}

			elseif($_GET["islem"]=="goster")

					{

						$proje_tablosu = @mysql_query("select * from projeler where id=".$gelenid,$veriyolu);

						$kayit_satiri = @mysql_fetch_array($proje_tablosu);



						$tarih_bol = split("-",$kayit_satiri["tarih"]);

						$kayit_yil=$tarih_bol[0];

						$kayit_ay=$tarih_bol[1];

						$kayit_gun=$tarih_bol[2]; 

						$gunun_tarihi=$kayit_gun."-".$kayit_ay."-".$kayit_yil;

?>



<form action="index.php?page=proje_goruntule&islem=kaydet" method="post" enctype="multipart/form-data" name="frmProjegoruntule">

<input name="id" type="hidden" value="<?=$gelenid ?>">

<?

	$proje_tablosu = @mysql_query("select * from projeler where id=".$_GET["id"],$veriyolu);

						$kayit_satiri = @mysql_fetch_array($proje_tablosu);

?>

<table width="700" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

  </tr>

  <tr>

    <td width="4" bgcolor="#F2F2F2">&nbsp;</td>

    <td width="643" height="340"><table width="645" border="0" align="center" cellpadding="1" cellspacing="1">

      <tr>

        <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">PROJE D&Uuml;ZENLE</td>

        </tr>

      <tr>

        <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

        </tr>

      <tr>

        <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

        </tr>

      <tr>

        <td width="116" class="basliksiyahkalin">Proje Başlığı</td>

        <td width="4" class="basliksiyahkalin">:</td>

        <td width="515" height="25"><input name="baslik" type="text" id="baslik" size="46" value="<?=$kayit_satiri["baslik"] ?>" /></td>

      </tr>

      <tr>

        <td valign="top" class="basliksiyahkalin">A&ccedil;ıklama</td>

        <td valign="top" class="basliksiyahkalin">:</td>

        <td valign="top"><?php

$aciklama=$kayit_satiri["aciklama"];

$oFCKeditor = new FCKeditor('aciklama') ;

$oFCKeditor->BasePath = 'fckeditor/' ;

$oFCKeditor->Value = $aciklama ;

$oFCKeditor->Create() ;

?></td>

      </tr>

      <tr>

        <td valign="top" class="basliksiyahkalin">Resim</td>

        <td valign="top" class="basliksiyahkalin">:</td>

        <td valign="top"><input name="resim" type="file" id="resim" size="45" /><input name="eski_resim" value="<?=$kayit_satiri["resim"];?>" type="hidden" /><br /><? if($kayit_satiri['resim']!==""){echo '&nbsp;&nbsp;<a target="_blank" href="../images/projeler/buyuk/'.$kayit_satiri['resim'].'"><img src="../images/projeler/kucuk/'.$kayit_satiri['resim'].'" width="80" border="0"></a>';}?></td>

      </tr>

      <tr>

        <td valign="top" class="basliksiyahkalin">Pdf</td>

        <td valign="top" class="basliksiyahkalin">:</td>

        <td><input name="pdf" type="file" id="pdf" size="46" />

            <input name="eski_pdf" value="<?=$kayit_satiri["pdf"];?>" type="hidden" /><br /><? if($kayit_satiri['pdf']!==""){echo '&nbsp;&nbsp;<a target="_blank" href="../images/projeler/'.$kayit_satiri['pdf'].'">Dosyayı Göster</a>';}?>

        </td>

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

	header("Location:http://www.buikad.org/yonetim/");

	

}

?>