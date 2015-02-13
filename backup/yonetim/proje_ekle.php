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

 

	

	if ($_GET["islem"]=="kaydet")

		{	

			$baslik=str_replace("'","`",$_POST["baslik"]);

			$tmpbaslik=ucwords(strtolower($baslik));



			$aciklama=str_replace("'","`",$_POST["aciklama"]);

			$tmpaciklama=ucwords(strtolower($aciklama));





			$aranacak='<script'; 



		    if (strpos($tmpbaslik, $aranacak) !== false || strpos($tmpaciklama, $aranacak) !== false)

				{ 



					echo "<script>self.location = \"index.php?page=proje_ekle&mesaj=Başlık veya Açıklama alanları içerisine script komutu girilemez! \"</script>";



				}

			else

				{

					if ($baslik=="")

					{

						echo "<script>self.location = \"index.php?page=proje_ekle&mesaj=Başlık Girmediniz. Kaydedilemez!\"</script>";

					}

			

					$sql_cumlesi = "insert into projeler (baslik, aciklama) values ('".$baslik."','".$aciklama."')";

					$sonuc=mysql_query($sql_cumlesi,$veriyolu);

					$sonid=mysql_insert_id($veriyolu);

						if ($sonuc==true)

							{	

/*pdf upload*/

									if ($_FILES["pdf"]["name"])

										{

								 			$dosya_yol="../images/projeler/";

											$dosyaadi= isimkontrol($_FILES["pdf"]["name"]);

											$kayid=time();

											$vtdosyaadi = $dosya_yol."tr_".$kayid."_".$dosyaadi;

											$yuklenen_dosya_uzantisi=substr($dosyaadi,-3);

											$tmp_dosyaadi = $_FILES["pdf"]["tmp_name"];



											if(strtolower($yuklenen_dosya_uzantisi) == strtolower("pdf") || strtolower($yuklenen_dosya_uzantisi) == strtolower("doc") )

												{

													$dosyaup=move_uploaded_file($tmp_dosyaadi, $vtdosyaadi);

													$vtdosyaadi = "tr_".$kayid."_".$dosyaadi;

													$vte = mysql_query("UPDATE projeler SET pdf='".$vtdosyaadi."' WHERE id='".$sonid."'",$veriyolu);

												}

											else

												{

													echo "<script>self.location = \"index.php?page=proje_ekle&mesaj=Yüklemek istediğiniz dosya ".$uzanti." uzantılı olduğu için yükleme yapılamaz.\"</script>";	

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

												$vtresimadi = $kayid.$iconadi;

												$vte = mysql_query("UPDATE projeler SET resim='".$vtresimadi."' WHERE id='".$sonid."'",$veriyolu);																						

											}

										else

											{

												echo "<script>self.location = \"index.php?page=proje_ekle&mesaj=Yüklemek istediğiniz resim ".$uzanti." olduğu için yükleme yapılamaz.\"</script>";	

											}

									}

								echo "<script>self.location = \"index.php?page=proje_listele&mesaj=Yeni Proje Eklendi !\"</script>";

							}

						else

							{

								echo "<script>self.location = \"index.php?page=proje_listele&mesaj=Kayıt sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !\"</script>";		

							}	

				}

		}

	//// Bugünün Tarihini Belirleme Başlangıcı

	$gun=date("d");

	$ay=date("m");

	$yil=date("Y");

	$gunun_tarihi=$gun."-".$ay."-".$yil;

	//// Bugünün Tarihini Belirleme Bitişi 

?> 

<form action="index.php?page=proje_ekle&islem=kaydet" method="post" enctype="multipart/form-data" name="frmduyuruekle">

  <table width="700" border="0" cellspacing="0" cellpadding="0">

    <tr>

      <td colspan="3" bgcolor="#F2F2F2" height="5"></td>

    </tr>

    <tr>

      <td width="5" bgcolor="#F2F2F2">&nbsp;</td>

      <td width="381" valign="top"><table width="671" border="0" align="center" cellpadding="1" cellspacing="1">

        <tr>

          <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">YENİ PROJE EKLE</td>

        </tr>

        <tr>

          <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

        </tr>

        <tr>

          <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

        </tr>

        <tr>

          <td width="131" height="13" align="left" class="basliksiyahkalin"> Başlık</td>

          <td width="8" align="left" class="basliksiyahkalin">:</td>

          <td width="522" height="10" align="left"><input name="baslik" type="text" size="46"/></td>

        </tr>

		  <tr>

            <td align="left" valign="top" class="basliksiyahkalin">A&ccedil;ıklama </td>

		    <td align="left" valign="top" class="basliksiyahkalin">:</td>

		    <td align="left"><?php

$oFCKeditor = new FCKeditor('aciklama') ;

$oFCKeditor->BasePath = 'fckeditor/' ;

$oFCKeditor->Value = '' ;

$oFCKeditor->Create() ;

?></td>

	      </tr>

        <tr>

          <td class="basliksiyahkalin">Resim</td>

          <td class="basliksiyahkalin">:</td>

          <td><input name="resim" type="file" id="resim" size="45" /></td>

        </tr>

        <tr>

          <td class="basliksiyahkalin">Pdf</td>

          <td class="basliksiyahkalin">:</td>

          <td><input name="pdf" type="file" id="pdf" size="46" /></td>

        </tr>

        <tr>

          <td colspan="3">&nbsp;</td>

        </tr>

        <tr>

          <td colspan="3" align="center"><input type="submit" name="button" id="button" value="Kaydet" />

            <input type="reset" name="button2" id="button2" value="Temizle" /></td>

        </tr>

        <tr>

          <td colspan="3" align="center">&nbsp;</td>

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

else

{

	header("Location:http://www.buikad.org/yonetim/");

	

}

?>