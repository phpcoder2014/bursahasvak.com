<?

if($_SESSION['buikadkk']){

?>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<link href="style/style.css" rel="stylesheet" type="text/css">

    

<? 

	$_GET["id"]="1";

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

			$strmsg1 = "Başlık içerisine script komutu girilemez.!";

			$strmsg2 = "Başlık Girmediniz. Kaydedilemez.!";

			$strmsg3 = "Sağ Reklam Güncellendi.";

			$strmsg4 = "Güncelleme sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !";

			$strmsg5 = "Sağ Reklam Silindi";

			$strmsg6 = "Silme sırasında hata oluştu... Sağ Reklam Silinemedi !";

			

			if ($_GET["islem"]=="kaydet")

				{

					$tnm_baslik = $_POST["baslik"];

					$tmp_baslik = ucwords(strtolower($tnm_baslik));



						 	$sql_cumlesi = "update sag_reklam set baslik='".$tnm_baslik."' where id=".$_POST["id"];

									$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);

									if ($query_sonucu==true)

										{

											/*swf upload*/

											if ($_FILES["swf"]["name"])

												{

										 			$dosya_yol="../swf/";

													$dosyaadi= isimkontrol($_FILES["swf"]["name"]);

													$kayid=time();

													$vtdosyaadi = $dosya_yol.$kayid."_".$dosyaadi;

													$yuklenen_dosya_uzantisi=substr($dosyaadi,-3);

													$tmp_dosyaadi = $_FILES["swf"]["tmp_name"];

													if ( strtolower($yuklenen_dosya_uzantisi) == strtolower("swf") || strtolower($yuklenen_dosya_uzantisi) == strtolower("doc") || strtolower($yuklenen_dosya_uzantisi) == strtolower("gif") || strtolower($yuklenen_dosya_uzantisi) == strtolower("jpg"))

														{

															$dosyaup=move_uploaded_file($tmp_dosyaadi, $vtdosyaadi);

															unlink($dosya_yol.$_POST["eski_swf"]);

															$vtdosyaadi = $kayid."_".$dosyaadi;

															$vte = mysql_query("UPDATE sag_reklam SET swf='".$vtdosyaadi."' WHERE id='".$_POST["id"]."'",$veriyolu);

														}

													else

														{

															echo "<script>self.location = \"index.php?page=sag_reklam_goruntule&islem=goster&mesaj=Yüklemek istediğiniz dosya ".$uzanti." uzantılı olduğu için yükleme yapılamaz.\"</script>";	

														}

												}											

											/*swf upload sonu*/

																					

																																

											echo "<script>self.location = \"index.php?page=sag_reklam_goruntule&islem=goster&mesaj=".$strmsg3."\"</script>";

										}

									else

										{

											echo "<script>self.location = \"index.php?page=sag_reklam_goruntule&islem=goster&mesaj=".$strmsg4."\"</script>";	

										}

				

				}

			elseif($_GET["islem"]=="sil")

					{

						$sql= @mysql_query("select * from sag_reklam where id=".$gelenid,$veriyolu);

						$sonuc=@mysql_fetch_array($sql);	

						$eski_swf = $sonuc["swf"];



						$silme_sonucu= mysql_query("delete from sag_reklam where id=".$gelenid,$veriyolu);

						if ($silme_sonucu==true)

							{

								if ($eski_swf <> "") {unlink("../swf/".$eski_swf);}

								echo "<script>self.location = \"index.php?page=sag_reklam_goruntule&islem=goster&mesaj=".$strmsg5."\"</script>";

							}

						else

							{

								echo "<script>self.location = \"index.php?page=sag_reklam_goruntule&islem=goster&mesaj=".$strmsg6."\"</script>";

							}	

					}

			elseif($_GET["islem"]=="degistir1")

					{

						$sql_cumlesi = "update sag_reklam set swf='' where id='1'";

						$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);

						echo "<script>self.location = \"index.php?page=sag_reklam_goruntule&islem=goster&mesaj=Swf Dosya Silinmiştir...\"</script>";

					}

			elseif($_GET["islem"]=="degistir2")

					{

						$sql_cumlesi = "update sag_reklam set baslik='' where id='1'";

						$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);

						echo "<script>self.location = \"index.php?page=sag_reklam_goruntule&islem=goster&mesaj=Script Silinmiştir...\"</script>";

					}

			elseif($_GET["islem"]=="goster")

					{

						$swf_tablosu = @mysql_query("select * from sag_reklam where id=".$gelenid,$veriyolu);

						$kayit_satiri = @mysql_fetch_array($swf_tablosu);

						

?>





<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<form action="index.php?page=sag_reklam_goruntule&islem=kaydet" method="post" enctype="multipart/form-data" name="frmsag_reklamgoruntule">

<input name="id" type="hidden" value="<?=$gelenid ?>">



<table width="800" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

    </tr>

  <tr>

    <td width="3" bgcolor="#F2F2F2"></td>

    <td width="857"><table width="771" border="0" align="center" cellpadding="1" cellspacing="1">

      <tr>

        <td height="20" colspan="4" align="center" bgcolor="#999999" class="baslikbeyaz">SAĞ ALAN REKLAMI D&Uuml;ZENLE</td>

      </tr>

      <tr>

        <td height="1" colspan="4" align="center" bgcolor="#808080"></td>

      </tr>

      <tr>

        <td height="20" colspan="4" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

      </tr>

      <tr>

        <td width="144" valign="top" class="basliksiyahkalin">Reklam Scripti</td>

        <td width="4" valign="top" class="basliksiyahkalin">:</td>

        <td width="306" height="25" valign="top"><textarea name="baslik" id="baslik" cols="45" rows="5"><?=$kayit_satiri["baslik"];?></textarea></td>

        <td width="306" align="center" valign="top"><?=$kayit_satiri["baslik"];?>

          <br />

          <a href="?page=sag_reklam_goruntule&amp;islem=degistir2" class="hatamesaji">[ Reklam Scripti Sil ]</a></td>

      </tr>       

      <tr>

        <td valign="top" class="basliksiyahkalin">Swf</td>

        <td valign="top" class="basliksiyahkalin">:</td>

        <td><input name="swf" type="file" id="swf" size="46" /><? if($kayit_satiri["swf"]!==""){echo '&nbsp;&nbsp;<a target="_blank" href="../swf/'.$kayit_satiri["swf"].'">'.$kayit_satiri["swf"].'</a>';}?><input name="eski_swf" value="<?=$kayit_satiri["swf"];?>" type="hidden" />          </td>

        <td align="center">

		<? $ayir=split(".swf",$kayit_satiri["swf"]);

		?>

		<script type="text/javascript">

AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','src','../swf/<?=$ayir[0];?>','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../swf/<?=$ayir[0];?>' ); //end AC code

</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0">

          <param name="movie" value="../swf/<?=$kayit_satiri["swf"]?>" />

          <param name="quality" value="high" />

          <embed src="../swf/<?=$kayit_satiri["swf"]?>" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"></embed>

        </object></noscript><br />

        <a href="?page=sag_reklam_goruntule&amp;islem=degistir1" class="hatamesaji">[ Swf Dosyayı Sil ]</a></td>

      </tr>  

      <tr>

        <td colspan="3" class="hatamesaji">*Not :Sağ alanda reklam için Reklam Scripti veya Swf dosya atmanız gerekmektedir.</td>

        <td class="hatamesaji">&nbsp;</td>

      </tr>

      <tr>

        <td colspan="4" align="center">&nbsp;</td>

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

	header("Location:http://www.buikad.org/yonetim/");

	

}

?>