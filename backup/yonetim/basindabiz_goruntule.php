<?

if($_SESSION['buikadkk']){


?>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="style/style.css" rel="stylesheet" type="text/css">

	<!-- Tarih alanı için gerekli css ve js dosyaları başlangıcı--->

		<link type="text/css" rel="stylesheet" href="src/css/jscal2.css" />

		<script src="src/js/jscal2.js"></script>

		<script src="src/js/lang/tr.js"></script>

	<!-- Tarih alanı için gerekli css ve js dosyaları bitişi--->

    

<? 

	$gelenid ="1";

	

	if ($gelenid != "" and !ctype_digit($gelenid))

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

			$strmsg3 = "Hakkımızda İçeriği Güncellendi.";

			$strmsg4 = "Güncelleme sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !";

			$strmsg5 = "Basında Biz İçeriği Silindi";

			$strmsg6 = "Silme sırasında hata oluştu... Basında Biz İçeriği Silinemedi !";

			

			if ($_GET["islem"]=="kaydet")

				{

					$aciklama=$_POST["aciklama"];

					$tmpaciklama=ucwords(strtolower($aciklama));			

		

					$aranacak='<script'; 



				    if (strpos($tmpaciklama, $aranacak) !== false)

						{ 

							echo "<script>self.location = \"index.php?page=basindabiz_goruntule&islem=goster&mesaj=".$strmsg1."&id=".$_POST["id"]."\"</script>";

						}					

					else

						{

							if($aciklama=="")

								{

									echo "<script>self.location = \"index.php?page=basindabiz_goruntule&islem=goster&mesaj=".$strmsg2."&id=".$_POST["id"]."\"</script>";

								}



			mysql_query("SET NAMES 'utf8'");
			mysql_query("SET CHARACTER SET utf8");							
							
							$sql_cumlesi = "update basindabiz set aciklama='".$aciklama."' where id='1'";

									$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);
									


									if ($query_sonucu==true)

										{

											echo "<script>self.location = \"index.php?page=basindabiz_goruntule&islem=goster&mesaj=".$strmsg3."\"</script>";

										}

									else

										{

											echo "<script>self.location = \"index.php?page=basindabiz_goruntule&islem=goster&mesaj=".$strmsg4."\"</script>";	

										}

						}

				}

			elseif($_GET["islem"]=="goster")

					{

						$tuzuk_tablosu = @mysql_query("select * from basindabiz where id='1'",$veriyolu);

						$kayit_satiri = @mysql_fetch_array($tuzuk_tablosu);

?>



<form action="index.php?page=basindabiz_goruntule&islem=kaydet" method="post" enctype="multipart/form-data" name="frmBuikadUyelikgoruntule">

<input name="id" type="hidden" value="<?=$gelenid ?>">

<?

	$tuzuk_tablosu = @mysql_query("select * from basindabiz where id='1'",$veriyolu);

						$kayit_satiri = @mysql_fetch_array($tuzuk_tablosu);

?>

<table width="700" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

  </tr>

  <tr>

    <td width="4" bgcolor="#F2F2F2">&nbsp;</td>

    <td width="643" height="340" valign="top"><table width="645" border="0" align="center" cellpadding="1" cellspacing="1">

      <tr>

        <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">Hakkımızda D&Uuml;ZENLE</td>

     </tr>

      <tr>

        <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

        </tr>

      <tr>

        <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

        </tr>

      <tr>

        <td width="116" valign="top" class="basliksiyahkalin">Hakkımızda İçeriği</td>

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