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

	$gelenid = $_GET["id"];

$resim=$_GET["resim"];

	if($resim=="sil"){

		$silme_sonucu= mysql_query("delete from etkinlikresmi where id=".$_GET["id"],$veriyolu);

		

		echo "<script>self.location = \"index.php?page=etkinlik_goruntule&islem=goster&mesaj=Resim Silindi.&id=".$_GET["urunid"]."\"</script>";

	}	

	

	if ($_GET["id"] != "" and !ctype_digit($_GET["id"]))

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

			$strmsg3 = "Etkinlik G�ncellendi.";

			$strmsg4 = "G�ncelleme s�ras�nda hata olu�tu... Girilen bilgiler kaydedilemedi. !";

			$strmsg5 = "Etkinlik Silindi";

			$strmsg6 = "Silme s�ras�nda hata olu�tu... Etkinlik Silinemedi !";

			

			if ($_GET["islem"]=="kaydet")

				{

					$baslik=str_replace("'","`",$_POST["baslik"]);

					$tmpbaslik=ucwords(strtolower($baslik));



					$aciklama=str_replace("'","`",$_POST["aciklama"]);

					$tmpaciklama=ucwords(strtolower($aciklama));								



					$tarih=$_POST["tarih"];	

		

					$aranacak='<script'; 



				    if (strpos($tmpbaslik, $aranacak) !== false || strpos($tmpaciklama, $aranacak) !== false)

						{ 

							echo "<script>self.location = \"index.php?page=etkinlik_goruntule&islem=goster&mesaj=".$strmsg1."&id=".$_POST["id"]."\"</script>";

						}					

					else

						{

							if($baslik=="")

								{

									echo "<script>self.location = \"index.php?page=etkinlik_goruntule&islem=goster&mesaj=".$strmsg2."&id=".$_POST["id"]."\"</script>";

								}

							$tarih_bol = split("-",$tarih);

							$kayit_gun=$tarih_bol[0];

							$kayit_ay=$tarih_bol[1];

							$kayit_yil=$tarih_bol[2]; 

							$degistirilen_tarih=$kayit_yil."-".$kayit_ay."-".$kayit_gun;



							$sql_cumlesi = "update etkinlikler set baslik='".$baslik."', aciklama='".$aciklama."', tarih = '".$degistirilen_tarih."' where id=".$_POST["id"];

									$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);

									if ($query_sonucu==true)

										{

											if ($_FILES["resim"]["name"])

												{

											 		$icon_yol="../images/etkinlikler/";

													$iconadi= isimkontrol($_FILES["resim"]["name"]);

													$kayid=time();

													$vtresimadi = $icon_yol.$kayid."_".$iconadi;											

													$yuklenen_resim_uzantisi=substr($iconadi,-3);
												
												if($_FILES["resim"]["size"] > 1333630){
										
											echo "<script>self.location = \"index.php?page=etkinlik_goruntule&islem=goster&id=".$_POST["id"]."&mesaj=Y�klemek istedi�iniz dosyan�n boyutu �ok fazla. Kay�t yap�ld� resmi yeniden y�kleyin\"</script>";	
											
										}else{
												
													if (resimuzantikontrolu($yuklenen_resim_uzantisi) == true)

														{

															$iconup=move_uploaded_file($_FILES["resim"]["tmp_name"],$vtresimadi);

															$resimadi = $vtresimadi;

														

															$bresyeni= $icon_yol."buyuk/".$kayid.$iconadi;

															$kresyeni= $icon_yol."kucuk/".$kayid.$iconadi;

												

															sin_boyutla_ozel($resimadi,$kresyeni,150,150);

															sin_boyutla_ozel($resimadi,$bresyeni,350,350);  

												

															unlink($resimadi);

															

															if ($eski_resim <> "")

																{

																	unlink("../images/etkinlikler/buyuk/".$_POST["eski_resim"]);

																	unlink("../images/etkinlikler/kucuk/".$_POST["eski_resim"]);

																}

															$vtresimadi = $kayid.$iconadi;

															$vte=mysql_query("UPDATE etkinlikler SET resim='".$vtresimadi."' WHERE id='".$_POST["id"]."'",$veriyolu);																				

														}

													else

														{

															echo "<script>self.location = \"index.php?page=etkinlik_goruntule&mesaj=Y�klemek istedi�iniz resim ".$yuklenen_resim_uzantisi." oldu�u i�in y�kleme yap�lamaz.\"</script>";	

														}
														
													}

												}

									for($i=1;$i<=10;$i++){

									$resimname=$_FILES["resim".$i.""]["name"];

									$resimtmp=$_FILES["resim".$i.""]["tmp_name"];
									
								if($_FILES["resim".$i]["size"] > 1333630){
										
										echo "<script>self.location = \"index.php?page=etkinlik_goruntule&islem=goster&id=".$_POST['id']."&mesaj=".$resimname." dosyan�n boyutu �ok fazla. Kay�t yap�ld� resmi yeniden y�kleyin\"</script>";	
											
									}else{
									
									if ($resimname)

									{

									 	$icon_yol="../images/etkinlikler/";

										$iconadi= isimkontrol($resimname);

										$kayid=time();

										$vtresimadi = $icon_yol.$kayid."_".$iconadi;											

										$yuklenen_resim_uzantisi=substr($iconadi,-3);

										if (resimuzantikontrolu($yuklenen_resim_uzantisi) == true)

											{

												$iconup=move_uploaded_file($resimtmp,$vtresimadi);

												$resimadi = $vtresimadi;

													

												$bresyeni= $icon_yol."buyuk/".$kayid.$iconadi;

												$kresyeni= $icon_yol."kucuk/".$kayid.$iconadi;

												

												sin_boyutla_ozel($resimadi,$kresyeni,150,150);

												sin_boyutla_ozel($resimadi,$bresyeni,700,700); 

												

												unlink($resimadi);

												$vtresimadi = $kayid.$iconadi;		

												$resimekle="insert into etkinlikresmi (resim,etkinlikid)values ('".$vtresimadi."','".$_POST["id"]."')";

											

												$vte = mysql_query($resimekle,$veriyolu);																																

											}

										else

											{

												echo "<script>self.location = \"index.php?page=etkinlik_ekle&mesaj=Y�klemek istedi�iniz resim ".$yuklenen_resim_uzantisi." oldu�u i�in y�kleme yap�lamaz.\"</script>";	

											}

									}
									
									}

									}												

											echo "<script>self.location = \"index.php?page=etkinlik_listele&mesaj=".$strmsg3."\"</script>";

										}

									else

										{

											echo "<script>self.location = \"index.php?page=etkinlik_listele&mesaj=".$strmsg4."\"</script>";	

										}

						}

				}

			elseif($_GET["islem"]=="sil")

					{

						$sql= @mysql_query("select * from etkinlikler where id=".$gelenid,$veriyolu);

						$sonuc=@mysql_fetch_array($sql);

						if ($sonuc)	

							{

								$eski_resim = $sonuc["resim"];

							}						



						$silme_sonucu= mysql_query("delete from etkinlikler where id=".$gelenid,$veriyolu);

						if ($silme_sonucu==true)

							{

								if ($eski_resim != "")

									{

										unlink("../images/etkinlikler/buyuk/".$eski_resim);

										unlink("../images/etkinlikler/kucuk/".$eski_resim);

									}								

								echo "<script>self.location = \"index.php?page=etkinlik_listele&mesaj=".$strmsg5."\"</script>";

							}

						else

							{

								echo "<script>self.location = \"index.php?page=etkinlik_listele&mesaj=".$strmsg6."\"</script>";

							}	

					}

			elseif($_GET["islem"]=="goster")

					{

						$etkinlik_tablosu = @mysql_query("select * from etkinlikler where id=".$gelenid,$veriyolu);

						$kayit_satiri = @mysql_fetch_array($etkinlik_tablosu);



						$tarih_bol = split("-",$kayit_satiri["tarih"]);

						$kayit_yil=$tarih_bol[0];

						$kayit_ay=$tarih_bol[1];

						$kayit_gun=$tarih_bol[2]; 

						$gunun_tarihi=$kayit_gun."-".$kayit_ay."-".$kayit_yil;

?>



<form action="index.php?page=etkinlik_goruntule&islem=kaydet" method="post" enctype="multipart/form-data" name="frmduyurugoruntule">

<input name="id" type="hidden" value="<?=$gelenid ?>">

<?

	$etkinlik_tablosu = @mysql_query("select * from etkinlikler where id=".$_GET["id"],$veriyolu);

						$kayit_satiri = @mysql_fetch_array($etkinlik_tablosu);

?>

<table width="700" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

  </tr>

  <tr>

    <td width="4" bgcolor="#F2F2F2">&nbsp;</td>

    <td width="643" height="340"><table width="645" border="0" align="center" cellpadding="1" cellspacing="1">

      <tr>

        <td height="20" colspan="4" align="center" bgcolor="#999999" class="baslikbeyaz">ETK�NL�K D&Uuml;ZENLE</td>

        </tr>

      <tr>

        <td height="1" colspan="4" align="center" bgcolor="#808080"></td>

        </tr>

      <tr>

        <td height="20" colspan="4" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

        </tr>

      <tr>

        <td class="basliksiyahkalin">Etkinlik Ba�l���</td>

        <td class="basliksiyahkalin">:</td>

        <td height="25" colspan="2"><input name="baslik" type="text" id="baslik" size="46" value="<?=$kayit_satiri["baslik"] ?>" /></td>

      </tr>

      <tr>

        <td valign="top" class="basliksiyahkalin">A&ccedil;�klama </td>

        <td valign="top" class="basliksiyahkalin">:</td>

        <td colspan="2"><?php

$aciklama=$kayit_satiri["aciklama"];

$oFCKeditor = new FCKeditor('aciklama') ;

$oFCKeditor->BasePath = 'fckeditor/' ;

$oFCKeditor->Value = $aciklama ;

$oFCKeditor->Create() ;

?></td>

      </tr>

      <tr>

        <td class="basliksiyahkalin">Ana Resim</td>

        <td class="basliksiyahkalin">:</td>

        <td><input name="resim" type="file" id="resim" size="45" />

            

          <input name="eski_resim" value="<?=$kayit_satiri["resim"];?>" type="hidden" /></td>

        <td rowspan="11" valign="top"><? if($kayit_satiri['resim']!==""){echo '&nbsp;&nbsp;<a target="_blank" href="../images/etkinlikler/buyuk/'.$kayit_satiri['resim'].'"><img src="../images/etkinlikler/buyuk/'.$kayit_satiri['resim'].'" width="100" border="0"></a>';}?></td>

      </tr>

     <? for($i=1;$i<=10;$i++){?>  

      <tr>

        <td class="basliksiyahkalin">Resim (<?=$i;?>) </td>

        <td class="basliksiyahkalin">:</td>

        <td><input name="resim<?=$i;?>" type="file" id="resim<?=$i;?>" size="45" /></td>

        </tr>

      <? }?>

      <tr>

        <td class="basliksiyahkalin">Tarih</td>

        <td class="basliksiyahkalin">:</td>

        <td colspan="2"><input id="f_rangeStart" name="tarih" size="15" readonly="readonly" value="<?=$gunun_tarihi; ?>" />

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

        <td colspan="4"><table width="119" border="0" cellspacing="2" cellpadding="1">

					  <?

						$urn=mysql_query("SELECT * FROM etkinlikresmi WHERE etkinlikid='".$gelenid."' ORDER BY id ASC",$veriyolu);

						while($urunler1=mysql_fetch_array($urn)){

	

						 ?>

							 <td width="119" align="center"  valign="top">

							 <table width="50" height="50" border="0" align="center" cellpadding="0" cellspacing="0">

											<? if ($urunler1["resim"]){

						

									$resim="../images/etkinlikler/buyuk/".$urunler1["resim"];

						

									$resimsz=@getimagesize($resim);

						

									$genislik=$resimsz[0];

						

									$yukseklik=$resimsz[1];

						

							?><tr>

							  <td>

							  <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">

								<tr>

								  <td width="50" colspan="3" align="center" valign="top" onMouseOver="class=urun_adi_yesil" onMouseOut="urun_adi_gri">

									<img src="../images/etkinlikler/kucuk/<?=$urunler1["resim"]; ?>" width="50"   border="2" vspace="5" hspace="5" align="center" style="border-color:#cccccc;" /><br />

								  <a href="?page=etkinlik_goruntule&resim=sil&id=<?=$urunler1["id"];?>&urunid=<?=$_GET["id"]?>" class="hatamesaji">[ Sil ]</a> </td>

								</tr>

							  </table></td>

							  </tr><? }

							?>                    

							  </table>						 </td>

						  <?

						 }

						 ?>

				  </table></td>

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