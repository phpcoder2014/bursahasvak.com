<?

if($_SESSION['buikadkk']){

?>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<link href="style/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript">



/***********************************************

* Textarea Maxlength script- � Dynamic Drive (www.dynamicdrive.com)

* This notice must stay intact for legal use.

* Visit http://www.dynamicdrive.com/ for full source code

***********************************************/



function ismaxlength(obj){

var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""

if (obj.getAttribute && obj.value.length>mlength)

obj.value=obj.value.substring(0,mlength)

}



</script>

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

			$strmsg3 = "Komisyon ��eri�i G�ncellendi.";

			$strmsg4 = "G�ncelleme s�ras�nda hata olu�tu... Girilen bilgiler kaydedilemedi. !";

			$strmsg5 = "Komisyon ��eri�i Silindi";

			$strmsg6 = "Silme s�ras�nda hata olu�tu... Komisyon ��eri�i Silinemedi !";

			

			if ($_GET["islem"]=="kaydet")

				{

					$aciklama=$_POST["aciklama"];

					$tmpaciklama=ucwords(strtolower($aciklama));			

		

					$aranacak='<script'; 



				    if (strpos($tmpaciklama, $aranacak) !== false)

						{ 

							echo "<script>self.location = \"index.php?page=komisyon_goruntule&islem=goster&mesaj=".$strmsg1."&id=".$_POST["id"]."\"</script>";

						}					

					else

						{

							if($aciklama=="")

								{

									echo "<script>self.location = \"index.php?page=komisyon_goruntule&islem=goster&mesaj=".$strmsg2."&id=".$_POST["id"]."\"</script>";

								}



							$sql_cumlesi = "update komisyon set aciklama='".$aciklama."' where id='".$_POST["id"]."'";

									$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);

									if ($query_sonucu==true)

										{

											echo "<script>self.location = \"index.php?page=komisyon_listele&mesaj=".$strmsg3."\"</script>";

										}

									else

										{

											echo "<script>self.location = \"index.php?page=komisyon_listele&mesaj=".$strmsg4."\"</script>";	

										}

						}

				}

			elseif($_GET["islem"]=="goster")

					{

						$komisyon_tablosu = @mysql_query("select * from komisyon where id='".$_GET["id"]."'",$veriyolu);

						$kayit_satiri = @mysql_fetch_array($komisyon_tablosu);

?>



<form action="index.php?page=komisyon_goruntule&islem=kaydet" method="post" enctype="multipart/form-data" name="frmBuikadUyelikgoruntule">

<input name="id" type="hidden" value="<?=$_GET["id"] ?>">

<?

	$komisyon_tablosu = @mysql_query("select * from komisyon where id='".$_GET["id"]."'",$veriyolu);

						$kayit_satiri = @mysql_fetch_array($komisyon_tablosu);

?>

<table width="700" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

  </tr>

  <tr>

    <td width="4" bgcolor="#F2F2F2">&nbsp;</td>

    <td width="643" height="340" valign="top"><table width="645" border="0" align="center" cellpadding="1" cellspacing="1">

      <tr>

        <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">KOM�SYON D&Uuml;ZENLE</td>

        </tr>

      <tr>

        <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

        </tr>

      <tr>

        <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

        </tr>

      <tr>

        <td width="116" valign="top" class="basliksiyahkalin"><?php echo $kayit_satiri["baslik"];?> ��eri�i</td>

        <td width="4" valign="top" class="basliksiyahkalin">:</td>

        <td width="515" valign="top"><?php

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