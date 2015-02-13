<?

if($_SESSION['buikadkk']){

?>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<link href="style/style.css" rel="stylesheet" type="text/css">

    

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

			$strmsg1 = "Başlık içerisine script komutu girilemez.!";

			$strmsg2 = "Başlık Girmediniz. Kaydedilemez.!";

			$strmsg3 = "Pdf Güncellendi.";

			$strmsg4 = "Güncelleme sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !";

			$strmsg5 = "Pdf Silindi";

			$strmsg6 = "Silme sırasında hata oluştu... Pdf Silinemedi !";

			

			if ($_GET["islem"]=="kaydet")

				{

					$tnm_baslik = $_POST["baslik"];

					$tmp_baslik = ucwords(strtolower($tnm_baslik));

					$aranacak='<script'; 

				    if (strpos($tmp_baslik, $aranacak) )

						{ 

							echo "<script>self.location = \"index.php?page=pdf_goruntule&islem=goster&mesaj=".$strmsg1."&id=".$_POST["id"]."\"</script>";

						}					

					else

						{

							if($tnm_baslik=="")

								{

									echo "<script>self.location = \"index.php?page=pdf_goruntule&islem=goster&mesaj=".$strmsg2."&id=".$_POST["id"]."\"</script>";

								}

							else

								{

									$sql_cumlesi = "update pdf set baslik='".$tnm_baslik."' where id=".$_POST["id"];

									$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);

									if ($query_sonucu==true)

										{

											/*pdf upload*/

											if ($_FILES["pdf"]["name"])

												{

										 			$dosya_yol="../pdf/";

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

															$vte = mysql_query("UPDATE pdf SET pdf='".$vtdosyaadi."' WHERE id='".$_POST["id"]."'",$veriyolu);

														}

													else

														{

															echo "<script>self.location = \"index.php?page=pdf_goruntule&mesaj=Yüklemek istediğiniz dosya ".$uzanti." uzantılı olduğu için yükleme yapılamaz.\"</script>";	

														}

												}											

											/*pdf upload sonu*/

											/*resim upload*/

											if ($_FILES["resim"]["name"])

												{

										 			$dosya_yol="../pdf/";

													$dosyaadi= isimkontrol($_FILES["resim"]["name"]);

													$kayid=time();

													$vtdosyaadi = $dosya_yol.$kayid."_".$dosyaadi;

													$yuklenen_dosya_uzantisi=substr($dosyaadi,-3);

													$tmp_dosyaadi = $_FILES["resim"]["tmp_name"];

													if ( strtolower($yuklenen_dosya_uzantisi) == strtolower("jpg") || strtolower($yuklenen_dosya_uzantisi) == strtolower("png") || strtolower($yuklenen_dosya_uzantisi) == strtolower("gif") )

														{

															$dosyaup=move_uploaded_file($tmp_dosyaadi, $vtdosyaadi);

															unlink($dosya_yol.$_POST["eski_resim"]);

															$vtdosyaadi = $kayid."_".$dosyaadi;

															$vte = mysql_query("UPDATE pdf SET resim='".$vtdosyaadi."' WHERE id='".$_POST["id"]."'",$veriyolu);

														}

													else

														{

															echo "<script>self.location = \"index.php?page=pdf_goruntule&mesaj=Yüklemek istediğiniz dosya ".$uzanti." uzantılı olduğu için yükleme yapılamaz.\"</script>";	

														}

												}											

											/*pdf upload sonu*/											

																																

											echo "<script>self.location = \"index.php?page=pdf_listele&mesaj=".$strmsg3."\"</script>";

										}

									else

										{

											echo "<script>self.location = \"index.php?page=pdf_listele&mesaj=".$strmsg4."\"</script>";	

										}

								}

						}

				}

			elseif($_GET["islem"]=="sil")

					{

						$sql= @mysql_query("select * from pdf where id=".$gelenid,$veriyolu);

						$sonuc=@mysql_fetch_array($sql);	

						$eski_pdf = $sonuc["pdf"];

						$eski_resim = $sonuc["resim"];



						$silme_sonucu= mysql_query("delete from pdf where id=".$gelenid,$veriyolu);

						if ($silme_sonucu==true)

							{

								if ($eski_pdf <> "") {unlink("../pdf/".$eski_pdf);}

								if ($eski_resim <> "") {unlink("../pdf/".$eski_resim);}

								echo "<script>self.location = \"index.php?page=pdf_listele&mesaj=".$strmsg5."\"</script>";

							}

						else

							{

								echo "<script>self.location = \"index.php?page=pdf_listele&mesaj=".$strmsg6."\"</script>";

							}	

					}

			elseif($_GET["islem"]=="goster")

					{

						$pdf_tablosu = @mysql_query("select * from pdf where id=".$gelenid,$veriyolu);

						$kayit_satiri = @mysql_fetch_array($pdf_tablosu);

						

?>





<form action="index.php?page=pdf_goruntule&islem=kaydet" method="post" enctype="multipart/form-data" name="frmpdfgoruntule">

<input name="id" type="hidden" value="<?=$gelenid ?>">



<table width="800" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

    </tr>

  <tr>

    <td width="3" bgcolor="#F2F2F2"></td>

    <td width="857"><table width="771" border="0" align="center" cellpadding="1" cellspacing="1">

      <tr>

        <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">REKLAMLARI  D&Uuml;ZENLE</td>

      </tr>

      <tr>

        <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

      </tr>

      <tr>

        <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

      </tr>

      <tr>

        <td width="144" class="basliksiyahkalin">Başlık</td>

        <td width="4" class="basliksiyahkalin">:</td>

        <td width="613" height="25"><input name="baslik" type="text" id="baslik" size="46" value="<?=$kayit_satiri["baslik"];?>" /></td>

      </tr>

      <tr>

        <td valign="top" class="basliksiyahkalin">Resim</td>

        <td valign="top" class="basliksiyahkalin">:</td>

        <td><input name="resim" type="file" id="resim" size="46" /><? if($kayit_satiri["resim"]!==""){echo '&nbsp;&nbsp;<a target="_blank" href="../pdf/'.$kayit_satiri["resim"].'">'.$kayit_satiri["resim"].'</a>';}?><input name="eski_resim" value="<?=$kayit_satiri["resim"];?>" type="hidden" />

          

          </td>

      </tr>       

      <tr>

        <td valign="top" class="basliksiyahkalin">PDF</td>

        <td valign="top" class="basliksiyahkalin">:</td>

        <td><input name="pdf" type="file" id="pdf" size="46" /><? if($kayit_satiri["pdf"]!==""){echo '&nbsp;&nbsp;<a target="_blank" href="../pdf/'.$kayit_satiri["pdf"].'">'.$kayit_satiri["pdf"].'</a>';}?><input name="eski_pdf" value="<?=$kayit_satiri["pdf"];?>" type="hidden" />

          

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

        <td colspan="3" align="center">&nbsp;</td>

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