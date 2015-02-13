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

			$strmsg1 = "Başlık veya Açıklamalar içerisine script komutu girilemez.!";

			$strmsg2 = "Başlık Girmediniz. Kaydedilemez.!";

			$strmsg3 = "Duyuru Güncellendi.";

			$strmsg4 = "Güncelleme sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !";

			$strmsg5 = "Duyuru Silindi";

			$strmsg6 = "Silme sırasında hata oluştu... Duyuru Silinemedi !";

			

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

							echo "<script>self.location = \"index.php?page=duyuru_goruntule&islem=goster&mesaj=".$strmsg1."&id=".$_POST["id"]."\"</script>";

						}					

					else

						{

							if($baslik=="")

								{

									echo "<script>self.location = \"index.php?page=duyuru_goruntule&islem=goster&mesaj=".$strmsg2."&id=".$_POST["id"]."\"</script>";

								}

							$tarih_bol = split("-",$tarih);

							$kayit_gun=$tarih_bol[0];

							$kayit_ay=$tarih_bol[1];

							$kayit_yil=$tarih_bol[2]; 

							$degistirilen_tarih=$kayit_yil."-".$kayit_ay."-".$kayit_gun;



							$sql_cumlesi = "update duyurular set baslik='".$baslik."', kisaaciklama='".$kisaaciklama."', aciklama='".$aciklama."', tarih = '".$degistirilen_tarih."' where id=".$_POST["id"];

									$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);

									if ($query_sonucu==true)

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

															

															if ($eski_resim <> "")

																{

																	unlink("../images/duyurular/buyuk/".$_POST["eski_resim"]);

																	unlink("../images/duyurular/kucuk/".$_POST["eski_resim"]);

																}

															$vtresimadi = $kayid.$iconadi;

															$vte=mysql_query("UPDATE duyurular SET resim='".$vtresimadi."' WHERE id='".$_POST["id"]."'",$veriyolu);																				

														}

													else

														{

															echo "<script>self.location = \"index.php?page=duyuru_goruntule&mesaj=Yüklemek istediğiniz resim ".$uzanti." olduğu için yükleme yapılamaz.\"</script>";	

														}

												}

											echo "<script>self.location = \"index.php?page=duyuru_listele&mesaj=".$strmsg3."\"</script>";

										}

									else

										{

											echo "<script>self.location = \"index.php?page=duyuru_listele&mesaj=".$strmsg4."\"</script>";	

										}

						}

				}

			elseif($_GET["islem"]=="sil")

					{

						$sql= @mysql_query("select * from duyurular where id=".$gelenid,$veriyolu);

						$sonuc=@mysql_fetch_array($sql);

						if ($sonuc)	

							{

								$eski_resim = $sonuc["resim"];

							}						



						$silme_sonucu= mysql_query("delete from duyurular where id=".$gelenid,$veriyolu);

						if ($silme_sonucu==true)

							{

								if ($eski_resim != "")

									{

										unlink("../images/duyurular/buyuk/".$eski_resim);

										unlink("../images/duyurular/kucuk/".$eski_resim);

									}								

								echo "<script>self.location = \"index.php?page=duyuru_listele&mesaj=".$strmsg5."\"</script>";

							}

						else

							{

								echo "<script>self.location = \"index.php?page=duyuru_listele&mesaj=".$strmsg6."\"</script>";

							}	

					}

			elseif($_GET["islem"]=="goster")

					{

						$duyuru_tablosu = @mysql_query("select * from duyurular where id=".$gelenid,$veriyolu);

						$kayit_satiri = @mysql_fetch_array($duyuru_tablosu);



						$tarih_bol = split("-",$kayit_satiri["tarih"]);

						$kayit_yil=$tarih_bol[0];

						$kayit_ay=$tarih_bol[1];

						$kayit_gun=$tarih_bol[2]; 

						$gunun_tarihi=$kayit_gun."-".$kayit_ay."-".$kayit_yil;

?>



<form action="index.php?page=duyuru_goruntule&islem=kaydet" method="post" enctype="multipart/form-data" name="frmduyurugoruntule">

<input name="id" type="hidden" value="<?=$gelenid ?>">

<?

	$duyuru_tablosu = @mysql_query("select * from duyurular where id=".$_GET["id"],$veriyolu);

						$kayit_satiri = @mysql_fetch_array($duyuru_tablosu);

?>

<table width="700" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

  </tr>

  <tr>

    <td width="4" bgcolor="#F2F2F2">&nbsp;</td>

    <td width="643" height="340"><table width="645" border="0" align="center" cellpadding="1" cellspacing="1">

      <tr>

        <td height="20" colspan="4" align="center" bgcolor="#999999" class="baslikbeyaz">Duyuru D&Uuml;ZENLE</td>

        </tr>

      <tr>

        <td height="1" colspan="4" align="center" bgcolor="#808080"></td>

        </tr>

      <tr>

        <td height="20" colspan="4" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

        </tr>

      <tr>

        <td width="116" class="basliksiyahkalin">Duyuru Başlığı</td>

        <td width="4" class="basliksiyahkalin">:</td>

        <td width="257" height="25"><input name="baslik" type="text" id="baslik" size="46" value="<?=$kayit_satiri["baslik"] ?>" /></td>

        <td width="257" rowspan="5" valign="top"><? if($kayit_satiri['resim']!==""){echo '&nbsp;&nbsp;<a target="_blank" href="../images/duyurular/buyuk/'.$kayit_satiri['resim'].'"><img src="../images/duyurular/kucuk/'.$kayit_satiri['resim'].'" width="80" border="0"></a>';}?></td>

      </tr>

      <tr>

        <td height="20" valign="top" class="basliksiyahkalin">Kısa A&ccedil;ıklama </td>

        <td valign="top" class="basliksiyahkalin">:</td>

        <td><textarea name="kisaaciklama" id="kisaaciklama" cols="45" rows="3"><?=$kayit_satiri["kisaaciklama"] ?>

      </textarea></td>

        </tr>

      <tr>

        <td valign="top" class="basliksiyahkalin">A&ccedil;ıklama</td>

        <td valign="top" class="basliksiyahkalin">:</td>

        <td><textarea name="aciklama" cols="45" rows="5" id="aciklama"><?=$kayit_satiri["aciklama"] ?>

      </textarea></td>

        </tr>

      <tr>

        <td class="basliksiyahkalin">Resim</td>

        <td class="basliksiyahkalin">:</td>

        <td><input name="resim" type="file" id="resim" size="45" /><input name="eski_resim" value="<?=$kayit_satiri["resim"];?>" type="hidden" /></td>

        </tr>

      <tr>

        <td class="basliksiyahkalin">Tarih</td>

        <td class="basliksiyahkalin">:</td>

        <td><input id="f_rangeStart" name="tarih" size="15" readonly="readonly" value="<?=$gunun_tarihi; ?>" />

          <img src="images/data.png" id="f_rangeStart_trigger"> &nbsp; </img>

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

        <td colspan="4">&nbsp;</td>

        </tr>

      <tr>

        <td colspan="4" align="center"><input type="submit" name="button" id="button" value="Kaydet">

          <input type="reset" name="button2" id="button2" value="Temizle"></td>

        </tr>

      <tr>

        <td height="18" colspan="4" align="center">&nbsp;</td>

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