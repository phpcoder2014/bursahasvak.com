<?

if($_SESSION['buikadkk']){

?>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<link href="style/style.css" rel="stylesheet" type="text/css">

    

<? 

	$_GET["id"]=$_GET["id"];

	$gelenid = $_GET["id"];



	if ($_GET["id"] != "" and !ctype_digit($_GET["id"]))

		{

			/*

			Gelen id tamsay� de�il ise hata verdir

			*/			

			echo "<script>self.location = \"index.php?page=uyari&link=".$_SERVER['REQUEST_URI']."\"</script>";

		}

	else

		{

			$strmsg1 = "Ba�l�k i�erisine script komutu girilemez.!";

			$strmsg2 = "Ba�l�k Girmediniz. Kaydedilemez.!";

			$strmsg3 = "Sol 3 Reklam G�ncellendi.";

			$strmsg4 = "G�ncelleme s�ras�nda hata olu�tu... Girilen bilgiler kaydedilemedi. !";

			$strmsg5 = "Sol 3 Reklam Silindi";

			$strmsg6 = "Silme s�ras�nda hata olu�tu... Sol 3 Reklam Silinemedi !";

			

			if ($_GET["islem"]=="kaydet")

				{

					$tnm_baslik = $_POST["baslik"];

					$tmp_baslik = ucwords(strtolower($tnm_baslik));



						 	$sql_cumlesi = "update sol3_reklam set baslik='".$tnm_baslik."' where id=".$_POST["id"];

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

													if ( strtolower($yuklenen_dosya_uzantisi) == strtolower("jpg") || strtolower($yuklenen_dosya_uzantisi) == strtolower("png") || strtolower($yuklenen_dosya_uzantisi) == strtolower("gif") )

														{

															$dosyaup=move_uploaded_file($tmp_dosyaadi, $vtdosyaadi);

															unlink($dosya_yol.$_POST["eski_swf"]);

															$vtdosyaadi = $kayid."_".$dosyaadi;

															$vte = mysql_query("UPDATE sol3_reklam SET swf='".$vtdosyaadi."' WHERE id='".$_POST["id"]."'",$veriyolu);

														}

													else

														{

															echo "<script>self.location = \"index.php?page=sol3_reklam_goruntule&islem=goster&mesaj=Y�klemek istedi�iniz dosya ".$uzanti." uzant�l� oldu�u i�in y�kleme yap�lamaz.\"</script>";	

														}

												}											

											/*swf upload sonu*/

																					

																																

											echo "<script>self.location = \"index.php?page=sol3_reklam_listele&islem=goster&mesaj=".$strmsg3."\"</script>";

										}

									else

										{

											echo "<script>self.location = \"index.php?page=sol3_reklam_goruntule&islem=goster&mesaj=".$strmsg4."\"</script>";	

										}

				

				}

			elseif($_GET["islem"]=="sil")

					{

						$sql= @mysql_query("select * from sol3_reklam where id=".$gelenid,$veriyolu);

						$sonuc=@mysql_fetch_array($sql);	

						$eski_swf = $sonuc["swf"];



						$silme_sonucu= mysql_query("delete from sol3_reklam where id=".$gelenid,$veriyolu);

						if ($silme_sonucu==true)

							{

								if ($eski_swf <> "") {unlink("../swf/".$eski_swf);}

								echo "<script>self.location = \"index.php?page=sol3_reklam_goruntule&islem=goster&mesaj=".$strmsg5."\"</script>";

							}

						else

							{

								echo "<script>self.location = \"index.php?page=sol3_reklam_goruntule&islem=goster&mesaj=".$strmsg6."\"</script>";

							}	

					}

			elseif($_GET["islem"]=="degistir1")

					{

						$sql_cumlesi = "update sol3_reklam set swf='' where id='1'";

						$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);

						echo "<script>self.location = \"index.php?page=sol3_reklam_goruntule&islem=goster&mesaj=Swf Dosya Silinmi�tir...\"</script>";

					}

			elseif($_GET["islem"]=="degistir2")

					{

						$sql_cumlesi = "update sol3_reklam set baslik='' where id='1'";

						$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);

						echo "<script>self.location = \"index.php?page=sol3_reklam_goruntule&islem=goster&mesaj=Script Silinmi�tir...\"</script>";

					}

			elseif($_GET["islem"]=="goster")

					{

						$swf_tablosu = @mysql_query("select * from sol3_reklam where id=".$gelenid,$veriyolu);

						$kayit_satiri = @mysql_fetch_array($swf_tablosu);

						

?>





<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<form action="index.php?page=sol3_reklam_goruntule&islem=kaydet" method="post" enctype="multipart/form-data" name="frmsol3_reklamgoruntule">

<input name="id" type="hidden" value="<?=$gelenid ?>">



<table width="800" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

    </tr>

  <tr>

    <td width="3" bgcolor="#F2F2F2"></td>

    <td width="857"><table width="771" border="0" align="center" cellpadding="1" cellspacing="1">

      <tr>

        <td height="20" colspan="4" align="center" bgcolor="#999999" class="baslikbeyaz">SOL  ALAN 3 REKLAMI D&Uuml;ZENLE</td>

      </tr>

      <tr>

        <td height="1" colspan="4" align="center" bgcolor="#808080"></td>

      </tr>

      <tr>

        <td height="20" colspan="4" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

      </tr>

      <tr>

        <td width="119" valign="top" class="basliksiyahkalin">URL</td>

        <td width="4" valign="top" class="basliksiyahkalin">:</td>

        <td width="423" height="25" valign="top" class="baslikgri12px">Http://

          <textarea name="baslik" id="baslik" cols="35" rows="3"><?=$kayit_satiri["baslik"];?></textarea>

          <br />

          �rne�in: (www.buikad.org)</td>

        <td width="212" align="center" valign="top">&nbsp;</td>

      </tr>       

      <tr>

        <td valign="top" class="basliksiyahkalin">Resim</td>

        <td valign="top" class="basliksiyahkalin">:</td>

        <td><input name="swf" type="file" id="swf" size="46" /><? if($kayit_satiri["swf"]!==""){echo '&nbsp;&nbsp;<a target="_blank" href="../swf/'.$kayit_satiri["swf"].'">'.$kayit_satiri["swf"].'</a>';}?><input name="eski_swf" value="<?=$kayit_satiri["swf"];?>" type="hidden" />          <br />
          <span class="baslikgri12px">Not: Resim Boyutu : w=127 px  h= 179 px</span></td>

        <td align="center">

		<? $ayir=split(".swf",$kayit_satiri["swf"]);

		?>

		<script type="text/javascript">

AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','src','../swf/<?=$kayit_satiri["swf"]?>','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../swf/<?=$kayit_satiri["swf"]?>' ); //end AC code

</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0">

          <param name="movie" value="../swf/<?=$kayit_satiri["swf"]?>" />

          <param name="quality" value="high" />

          <embed src="../swf/<?=$kayit_satiri["swf"]?>" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"></embed>

        </object></noscript><br />

        <a href="?page=sol3_reklam_goruntule&amp;islem=degistir1" class="hatamesaji">[   Sil ]</a></td>

      </tr>  

      <tr>

        <td colspan="4" class="hatamesaji">&nbsp;</td>

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