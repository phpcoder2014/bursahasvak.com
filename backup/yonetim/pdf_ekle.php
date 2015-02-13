<?

if($_SESSION['buikadkk']){

?>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<link href="style/style.css" rel="stylesheet" type="text/css">

<? 

	if ($_GET["islem"]=="kaydet")

		{

			$tnm_baslik = $_POST["baslik"];

			$tmp_baslik=ucwords(strtolower($tnm_baslik));

			$aranacak='<script'; 

		    if (strpos($tmp_baslik, $aranacak) !== false)

				{ 

					echo "<script>self.location = \"index.php?page=pdf_ekle&mesaj=Başlık İçerisine Script komutu girilemez! \"</script>";

				}

			else

				{

					if($tnm_baslik == "")

						{

							echo "<script>self.location = \"index.php?page=pdf_ekle&mesaj=Başlık Girmediniz. Kaydedilemez!\"</script>";

						}

					else

						{	

							$sql_cumlesi = "insert into pdf (baslik) values ('".$tnm_baslik."')";	

							$sonuc=mysql_query($sql_cumlesi,$veriyolu);

							$sonid = mysql_insert_id($veriyolu);

											

							if ($sonuc==true)

								{

									/*pdf upload*/

									if ($_FILES["pdf"]["name"])

										{

								 			$dosya_yol="../pdf/";

											$dosyaadi= isimkontrol($_FILES["pdf"]["name"]);

											$kayid=time();

											$vtdosyaadi = $dosya_yol."tr_".$kayid."_".$dosyaadi;

											$yuklenen_dosya_uzantisi=substr($dosyaadi,-3);

											$tmp_dosyaadi = $_FILES["pdf"]["tmp_name"];



											if(strtolower($yuklenen_dosya_uzantisi) == strtolower("pdf") || strtolower($yuklenen_dosya_uzantisi) == strtolower("doc") )

												{

													$dosyaup=move_uploaded_file($tmp_dosyaadi, $vtdosyaadi);

													$vtdosyaadi = "tr_".$kayid."_".$dosyaadi;

													$vte = mysql_query("UPDATE pdf SET pdf='".$vtdosyaadi."' WHERE id='".$sonid."'",$veriyolu);

												}

											else

												{

													echo "<script>self.location = \"index.php?page=pdf_ekle&mesaj=Yüklemek istediğiniz dosya ".$uzanti." uzantılı olduğu için yükleme yapılamaz.\"</script>";	

												}

										}											

									/*pdf upload sonu*/

									/*Resim upload*/

									if ($_FILES["resim"]["name"])

										{

								 			$dosya_yol="../pdf/";

											$dosyaadi= isimkontrol($_FILES["resim"]["name"]);

											$kayid=time();

											$vtdosyaadi = $dosya_yol."tr_".$kayid."_".$dosyaadi;

											$yuklenen_dosya_uzantisi=substr($dosyaadi,-3);

											$tmp_dosyaadi = $_FILES["resim"]["tmp_name"];



											if(strtolower($yuklenen_dosya_uzantisi) == strtolower("jpg") || strtolower($yuklenen_dosya_uzantisi) == strtolower("png") || strtolower($yuklenen_dosya_uzantisi) == strtolower("gif") )

												{

													$dosyaup=move_uploaded_file($tmp_dosyaadi, $vtdosyaadi);

													$vtdosyaadi = "tr_".$kayid."_".$dosyaadi;

													$vte = mysql_query("UPDATE pdf SET resim='".$vtdosyaadi."' WHERE id='".$sonid."'",$veriyolu);

												}

											else

												{

													echo "<script>self.location = \"index.php?page=pdf_ekle&mesaj=Yüklemek istediğiniz dosya ".$uzanti." uzantılı olduğu için yükleme yapılamaz.\"</script>";	

												}

										}											

									/*Resim upload sonu*/

											

									echo "<script>self.location = \"index.php?page=pdf_listele&mesaj=Yeni Pdf Eklendi !\"</script>";

								}

							else

								{

									echo "<script>self.location = \"index.php?page=pdf_listele&mesaj=Kayıt sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !\"</script>";		

								}	

						}

				}

		}

?> 

      

    

<form action="index.php?page=pdf_ekle&islem=kaydet" method="post" enctype="multipart/form-data" name="frmpdfekle">

  <table width="700" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

    </tr>

  <tr>

    <td width="5" bgcolor="#F2F2F2"></td>

    <td width="644"><table width="683" border="0" align="center" cellpadding="1" cellspacing="1">

    <tr>

      <td height="20" colspan="3" align="center" bgcolor="#999999" class="hatamesaji"><span class="baslikbeyaz">DENETİM FAALİYET RAPORU EKLE</span></td>

    </tr>

    <tr>

      <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

    </tr>

    <tr>

      <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

    </tr>

    <tr>

      <td width="148" class="basliksiyahkalin">Başlık</td>

      <td width="4" class="basliksiyahkalin">:</td>

      <td width="521" height="25"><input name="baslik" type="text" id="baslik" size="46" /></td>

    </tr>

    <tr>

      <td class="basliksiyahkalin"> Resim</td>

      <td class="basliksiyahkalin">:</td>

      <td><input name="resim" type="file" id="resim" size="46" /></td>

    </tr>

    <tr>

      <td class="basliksiyahkalin"> PDF </td>

      <td class="basliksiyahkalin">:</td>

      <td><input name="pdf" type="file" id="pdf" size="46" /></td>

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

else

{

	header("Location:http://www.buikad.org/yonetim/");

	

}

?>