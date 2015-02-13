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

 

	

	if ($_GET["islem"]=="kaydet")

		{	

			$baslik=str_replace("'","`",$_POST["baslik"]);

			$tmpbaslik=ucwords(strtolower($baslik));



			$kisaaciklama=str_replace("'","`",$_POST["kisaaciklama"]);

			$tmpkisaaciklama=ucwords(strtolower($kisaaciklama));



			$aciklama=str_replace("'","`",$_POST["aciklama"]);

			$tmpaciklama=ucwords(strtolower($aciklama));



			$tarih=$_POST["tarih"];	



			$aranacak='<script'; 



		    if (strpos($tmpbaslik, $aranacak) !== false || strpos($tmpkisaaciklama, $aranacak) !== false || strpos($tmpaciklama, $aranacak) !== false)

				{ 



					echo "<script>self.location = \"index.php?page=duyuru_ekle&mesaj=Başlık veya Açıklama alanları içerisine script komutu girilemez! \"</script>";



				}

			else

				{

					if ($baslik=="")

					{

						echo "<script>self.location = \"index.php?page=duyuru_ekle&mesaj=Başlık Girmediniz. Kaydedilemez!\"</script>";

					}

					

					$tarih_bol = split("-",$tarih);

					$kayit_gun=$tarih_bol[0];

					$kayit_ay=$tarih_bol[1];

					$kayit_yil=$tarih_bol[2]; 

					$kayit_edilecek_tarih=$kayit_yil."-".$kayit_ay."-".$kayit_gun;

			

					$sql_cümlesi = "insert into duyurular (baslik, kisaaciklama, aciklama, tarih) values ('".$baslik."','".$kisaaciklama."','".$aciklama."','".$kayit_edilecek_tarih."')";

					$sonuc=mysql_query($sql_cümlesi,$veriyolu);

					$sonid=mysql_insert_id($veriyolu);

						if ($sonuc==true)

							{		

								if ($_FILES["resim"]["name"])

									{

									 	$icon_yol="../images/duyurular/";

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

												$vte = mysql_query("UPDATE duyurular SET resim='".$vtresimadi."' WHERE id='".$sonid."'",$veriyolu);																						

											}

										else

											{

												echo "<script>self.location = \"index.php?page=duyuru_ekle&mesaj=Bu boyutta resim yükleyemezsiniz\"</script>";	

											}

									}

								echo "<script>self.location = \"index.php?page=duyuru_listele&mesaj=Yeni Duyuru Eklendi !\"</script>";

							}

						else

							{

								echo "<script>self.location = \"index.php?page=duyuru_listele&mesaj=Kayıt sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !\"</script>";		

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

<form action="index.php?page=duyuru_ekle&islem=kaydet" method="post" enctype="multipart/form-data" name="frmduyuruekle">

  <table width="700" border="0" cellspacing="0" cellpadding="0">

    <tr>

      <td colspan="3" bgcolor="#F2F2F2" height="5"></td>

    </tr>

    <tr>

      <td width="5" bgcolor="#F2F2F2">&nbsp;</td>

      <td width="381" valign="top"><table width="671" border="0" align="center" cellpadding="1" cellspacing="1">

        <tr>

          <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">YENİ DUYURU EKLE</td>

        </tr>

        <tr>

          <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

        </tr>

        <tr>

          <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

        </tr>

        <tr>

          <td width="131" height="13" align="left" class="basliksiyahkalin">Duyuru Başlığı </td>

          <td width="8" align="left" class="basliksiyahkalin">:</td>

          <td width="522" height="10" align="left"><input name="baslik" type="text" size="46"/></td>

        </tr>

        <tr>

          <td align="left" valign="top" class="basliksiyahkalin">Kısa A&ccedil;ıklama </td>

          <td align="left" valign="top" class="basliksiyahkalin">:</td>

          <td align="left"><textarea name="kisaaciklama" id="kisaaciklama" cols="45" rows="3"></textarea></td>

        </tr>

		  <tr>

            <td align="left" valign="top" class="basliksiyahkalin">A&ccedil;ıklama </td>

		    <td align="left" valign="top" class="basliksiyahkalin">:</td>

		    <td align="left"><textarea name="aciklama" cols="45" rows="5" id="aciklama3"></textarea></td>

	      </tr>

        <tr>

          <td align="left" class="basliksiyahkalin">Tarih</td>

          <td align="left" class="basliksiyahkalin">:</td>

          <td align="left"><input id="f_rangeStart" name="tarih" size="15" readonly="readonly" value="<?=$gunun_tarihi; ?>" />

            <img src="images/data.png" name="f_rangeStart_trigger" id="f_rangeStart_trigger" /> &nbsp; </img>

            <button id="f_clearRangeStart" onclick="clearRangeStart()">Sil</button>

            <script type="text/javascript">

                  new Calendar({

                          inputField: "f_rangeStart",

                          dateFormat: "%d-%m-%Y",

                          trigger: "f_rangeStart_trigger",

                          bottomBar: false,

                          onSelect: function() {

                                  var date = Calendar.intToDate(this.selection.get());

                                  LEFT_CAL.args.min = date;

                                  LEFT_CAL.redraw();

                                  this.hide();

                          }

                  });

                  function clearRangeStart() {

                          document.getElementById("f_rangeStart").value = "";

                          LEFT_CAL.args.min = null;

                          LEFT_CAL.redraw();

                  };

                </script></td>

        </tr>

        <tr>

          <td class="basliksiyahkalin">Resim</td>

          <td class="basliksiyahkalin">:</td>

          <td><input name="resim" type="file" id="resim" size="45" /></td>

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