<?

if($_SESSION['buikadkk']){

?>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<link href="style/style.css" rel="stylesheet" type="text/css">

	<!-- Tarih alan� i�in gerekli css ve js dosyalar� ba�lang�c�--->

		<link type="text/css" rel="stylesheet" href="src/css/jscal2.css" />

		<script src="src/js/jscal2.js"></script>

		<script src="src/js/lang/tr.js"></script>

	<!-- Tarih alan� i�in gerekli css ve js dosyalar� biti�i--->

    

<? 

	$gelenid ="1";

	

	if ($gelenid != "" and !ctype_digit($gelenid))

		{

			/*

			Gelen id tamsay� de�il ise hata verdir

			*/			

			echo "<script>self.location = \"index.php?page=uyari&link=".$_SERVER['REQUEST_URI']."\"</script>";

		}

	else

		{

			$strmsg1 = "Ba�l�k veya A��klamalar i�erisine script komutu girilemez.!";

			$strmsg2 = "Ba�l�k Girmediniz. Kaydedilemez.!";

			$strmsg3 = "Buikad �yelik G�ncellendi.";

			$strmsg4 = "G�ncelleme s�ras�nda hata olu�tu... Girilen bilgiler kaydedilemedi. !";

			$strmsg5 = "Buikad �yelik Silindi";

			$strmsg6 = "Silme s�ras�nda hata olu�tu... Buikad �yelik Silinemedi !";

			

			if ($_GET["islem"]=="kaydet")

				{

					$aciklama=$_POST["aciklama"];

					$tmpaciklama=ucwords(strtolower($aciklama));			

		

					$aranacak='<script'; 



				    if (strpos($tmpaciklama, $aranacak) !== false)

						{ 

							echo "<script>self.location = \"index.php?page=buikad_uyelik_goruntule&islem=goster&mesaj=".$strmsg1."&id=".$_POST["id"]."\"</script>";

						}					

					else

						{

							if($aciklama=="")

								{

									echo "<script>self.location = \"index.php?page=buikad_uyelik_goruntule&islem=goster&mesaj=".$strmsg2."&id=".$_POST["id"]."\"</script>";

								}



							$sql_cumlesi = "update buikad_uyelik set aciklama='".$aciklama."' where id='1'";

									$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);

									if ($query_sonucu==true)

										{

											echo "<script>self.location = \"index.php?page=buikad_uyelik_goruntule&islem=goster&mesaj=".$strmsg3."\"</script>";

										}

									else

										{

											echo "<script>self.location = \"index.php?page=buikad_uyelik_goruntule&islem=goster&mesaj=".$strmsg4."\"</script>";	

										}

						}

				}

			elseif($_GET["islem"]=="goster")

					{

						$buikad_uyelik_tablosu = @mysql_query("select * from buikad_uyelik where id='1'",$veriyolu);

						$kayit_satiri = @mysql_fetch_array($buikad_uyelik_tablosu);

?>



<form action="index.php?page=buikad_uyelik_goruntule&islem=kaydet" method="post" enctype="multipart/form-data" name="frmBuikadUyelikgoruntule">

<input name="id" type="hidden" value="<?=$gelenid ?>">

<?

	$buikad_uyelik_tablosu = @mysql_query("select * from buikad_uyelik where id='1'",$veriyolu);

						$kayit_satiri = @mysql_fetch_array($buikad_uyelik_tablosu);

?>

<table width="700" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

  </tr>

  <tr>

    <td width="4" bgcolor="#F2F2F2">&nbsp;</td>

    <td width="643" height="340" valign="top"><table width="645" border="0" align="center" cellpadding="1" cellspacing="1">

      <tr>

        <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">BU�KAD �YEL�K D&Uuml;ZENLE</td>

        </tr>

      <tr>

        <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

        </tr>

      <tr>

        <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

        </tr>

      <tr>

        <td width="116" valign="top" class="basliksiyahkalin">A&ccedil;�klama</td>

        <td width="4" valign="top" class="basliksiyahkalin">:</td>

        <td width="515"><?php

$aciklama=$kayit_satiri["aciklama"];

$oFCKeditor = new FCKeditor('aciklama') ;

$oFCKeditor->BasePath = 'fckeditor/' ;

$oFCKeditor->Value = $aciklama ;

$oFCKeditor->Create() ;

?></td>

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