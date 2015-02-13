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

			

			$strmsg1 = "Başlık Alanı içerisine script komutu girilemez.!";

			$strmsg2 = "Başlık Girmediniz. Kaydedilemez.!";

			$strmsg3 = "Mesaj Güncellendi.";

			$strmsg4 = "Güncelleme sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !";

			$strmsg5 = "Mesaj Silindi";

			$strmsg6 = "Silme sırasında hata oluştu... Mesaj Silinemedi !";

			

			if ($_GET["islem"]=="kaydet")

				{

					$kisiid = $_POST["kisiid"];

					$baslik = str_replace("'","`",$_POST["baslik"]);


					$tmp_baslik=ucwords(strtolower($baslik));

					

					$aranacak='<script'; 

				    if (strpos($tmp_baslik, $aranacak) !== false)

						{ 

							echo "<script>self.location = \"index.php?page=mesaj_goruntule&islem=goster&mesaj=".$strmsg1."&id=".$_POST["id"]."\"</script>";

						}					

					else

						{

							if($_POST["baslik"]=="")

								{

									echo "<script>self.location = \"index.php?page=mesaj_goruntule&islem=goster&mesaj=".$strmsg2."&id=".$_POST["id"]."\"</script>";

								}

							else

								{							

									$sql_cumlesi = "update mesajlar set kisiid='".$kisiid."', baslik='".$baslik."', kisamesaj='".str_replace("'","`",$_POST["kisamesaj"])."', mesaj='".str_replace("'","`",$_POST["mesaj"])."' where id=".$_POST["id"];

									$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);

									if ($query_sonucu==true)

										{																					

											echo "<script>self.location = \"index.php?page=mesaj_listele&mesaj=".$strmsg3."\"</script>";

										}

									else

										{

											echo "<script>self.location = \"index.php?page=mesaj_listele&mesaj=".$strmsg4."\"</script>";	

										}

								}

						}

				}

			elseif($_GET["islem"]=="sil")

					{

						$sql= @mysql_query("select * from mesajlar where id=".$gelenid,$veriyolu);

						$sonuc=@mysql_fetch_array($sql);

						if ($sonuc)	

							{

								$eski_resim = $sonuc["resim"];

							}						

						

						$silme_sonucu= mysql_query("delete from mesajlar where id=".$gelenid,$veriyolu);

						if ($silme_sonucu==true)

							{

								if ($eski_resim != "")

									{

										unlink("../images/gruplar/".$eski_resim);

									}									

								

								echo "<script>self.location = \"index.php?page=mesaj_listele&mesaj=".$strmsg5."\"</script>";

							}

						else

							{

								echo "<script>self.location = \"index.php?page=mesaj_listele&mesaj=".$strmsg6."\"</script>";

							}	

					}

			elseif($_GET["islem"]=="goster")

					{

						$duyuru_tablosu = @mysql_query("select * from mesajlar where id=".$gelenid,$veriyolu);

						$kayit_satiri = @mysql_fetch_array($duyuru_tablosu);

?>
<form name="frmkisigoruntule" method="post" action="index.php?page=mesaj_goruntule&islem=kaydet" enctype="multipart/form-data">

<input name="id" type="hidden" value="<?=$gelenid ?>">

<table width="700" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

    </tr>

  <tr>

    <td width="5" bgcolor="#F2F2F2"></td>

    <td width="644"><table width="645" border="0" align="center" cellpadding="1" cellspacing="1">

      <tr>

        <td height="20" colspan="4" align="center" bgcolor="#999999" class="baslikbeyaz">MESAJ D&Uuml;ZENLE</td>

      </tr>

      <tr>

        <td height="1" colspan="4" align="center" bgcolor="#808080"></td>

      </tr>

      <tr>

        <td height="20" colspan="4" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

      </tr>

      <tr>

        <td class="basliksiyahkalin">Grup Adı</td>

        <td class="basliksiyahkalin">:</td>

        <td height="25" colspan="2"><select name="kisiid" id="kisiid">

  <?

			$gruplar = mysql_query("select * from kisiler", $veriyolu);

			while($satir=mysql_fetch_array($gruplar))

					{

?>

          <option value="<?=$satir["id"];?>" <? if($satir["id"] == $kayit_satiri["kisiid"]) {echo "selected";} ?>><?=$satir["adi"];?></option>

  <?

					}

?>

          </select></td>

      </tr>

      <tr>
        
        <td width="105" class="basliksiyahkalin">Başlık</td>
        
        <td width="4" class="basliksiyahkalin">:</td>
        
        <td width="337" height="25"><input name="baslik" type="text" id="baslik" size="46" value="<?=$kayit_satiri["baslik"] ?>" /></td>
        <td width="186" align="center" valign="top" class="baslikgri12px">&nbsp;</td>
        
      </tr>

           <tr>
             
             <td valign="top" class="basliksiyahkalin">Kısa Mesaj</td>
             
             <td valign="top" class="basliksiyahkalin">:</td>
             
             <td valign="top">	  <?php

	  $ozgecmis=$kayit_satiri["kisamesaj"];

$oFCKeditor = new FCKeditor('kisamesaj') ;

$oFCKeditor->BasePath = 'fckeditor/' ;

$oFCKeditor->Value = $ozgecmis ;

$oFCKeditor->Create() ;

?></td>
             <td width="186" align="center" valign="top" class="baslikgri12px">&nbsp;</td>
             
           </tr>

        <tr>

        <td valign="top" class="basliksiyahkalin"> Mesajı</td>

        <td valign="top" class="basliksiyahkalin">:</td>

        <td valign="top">	  <?php

	  $mesaj=$kayit_satiri["mesaj"];

$oFCKeditor = new FCKeditor('mesaj') ;

$oFCKeditor->BasePath = 'fckeditor/' ;

$oFCKeditor->Value = $mesaj ;

$oFCKeditor->Create() ;

?></td>
        <td width="186" align="center" valign="top" class="baslikgri12px">&nbsp;</td>

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

	header("Location:http://www.buikad.org/yonetim/");

	

}

?>