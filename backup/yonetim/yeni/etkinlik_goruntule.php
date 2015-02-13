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
$resim=$_GET["resim"];
	if($resim=="sil"){
		$silme_sonucu= mysql_query("delete from etkinlikresmi where id=".$_GET["id"],$veriyolu);
		
		echo "<script>self.location = \"index.php?page=etkinlik_goruntule&id=".$_GET["id"]."&mesaj=Resim Silindi.</script>";
	}	
	
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
			$strmsg3 = "Etkinlik Güncellendi.";
			$strmsg4 = "Güncelleme sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !";
			$strmsg5 = "Etkinlik Silindi";
			$strmsg6 = "Silme sırasında hata oluştu... Etkinlik Silinemedi !";
			
			if ($_GET["islem"]=="kaydet")
				{
					$baslik=$_POST["baslik"];
					$tmpbaslik=ucwords(strtolower($baslik));

					$kisaaciklama=$_POST["kisaaciklama"];
					$tmpkisaaciklama=ucwords(strtolower($kisaaciklama));

					$aciklama=$_POST["aciklama"];
					$tmpaciklama=ucwords(strtolower($aciklama));	
							
					$basliken=$_POST["basliken"];
					$tmpbasliken=ucwords(strtolower($basliken));

					$kisaaciklamaen=$_POST["kisaaciklamaen"];
					$tmpkisaaciklamaen=ucwords(strtolower($kisaaciklamaen));

					$aciklamaen=$_POST["aciklamaen"];
					$tmpaciklamaen=ucwords(strtolower($aciklamaen));	
							

					$tarih=$_POST["tarih"];	
		
					$aranacak='<script'; 

				    if (strpos($tmpbaslik, $aranacak) !== false || strpos($tmpkisaaciklama, $aranacak) !== false || strpos($tmpaciklama, $aranacak) !== false || strpos($tmpbasliken, $aranacak) !== false || strpos($tmpkisaaciklamaen, $aranacak) !== false || strpos($tmpaciklamaen, $aranacak) !== false)
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

							$sql_cumlesi = "update etkinlikler set baslik='".$baslik."', kisaaciklama='".$kisaaciklama."', aciklama='".$aciklama."', basliken='".$basliken."', kisaaciklamaen='".$kisaaciklamaen."', aciklamaen='".$aciklamaen."',tarih = '".$degistirilen_tarih."' where id=".$_POST["id"];
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
													if (resimuzantikontrolu($yuklenen_resim_uzantisi) == true)
														{
															$iconup=move_uploaded_file($_FILES["resim"]["tmp_name"],$vtresimadi);
															$resimadi = $vtresimadi;
														
															$bresyeni= $icon_yol."buyuk/".$kayid.$iconadi;
															$kresyeni= $icon_yol."kucuk/".$kayid.$iconadi;
												
															sin_boyutla_ozel($resimadi,$kresyeni,40,40);
															sin_boyutla_ozel($resimadi,$bresyeni,250,250); 
												
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
															echo "<script>self.location = \"index.php?page=etkinlik_goruntule&mesaj=Yüklemek istediğiniz resim ".$uzanti." olduğu için yükleme yapılamaz.\"</script>";	
														}
												}
									for($i=1;$i<=10;$i++){
									$resimname=$_FILES["resim".$i.""]["name"];
									$resimtmp=$_FILES["resim".$i.""]["tmp_name"];
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
												echo "<script>self.location = \"index.php?page=etkinlik_ekle&mesaj=Yüklemek istediğiniz resim ".$uzanti." olduğu için yükleme yapılamaz.\"</script>";	
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
        <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">ETKİNLİK D&Uuml;ZENLE</td>
        </tr>
      <tr>
        <td height="1" colspan="3" align="center" bgcolor="#808080"></td>
        </tr>
      <tr>
        <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#CCCCCC" <? }?>class="basliksiyahkalin"><?=$_GET["mesaj"];?></td>
        </tr>
      <tr>
        <td class="basliksiyahkalin">Etkinlik Başlığı (Tr)</td>
        <td class="basliksiyahkalin">:</td>
        <td height="25"><input name="baslik" type="text" id="baslik" size="46" value="<?=$kayit_satiri["baslik"] ?>" /></td>
      </tr>
      <tr>
        <td width="126" class="basliksiyahkalin">Etkinlik Başlığı (En)</td>
        <td width="4" class="basliksiyahkalin">:</td>
        <td width="505" height="25"><input name="basliken" type="text" id="basliken" size="46" value="<?=$kayit_satiri["basliken"] ?>"></td>
      </tr>
      <tr>
        <td height="20" valign="top" class="basliksiyahkalin">Kısa A&ccedil;ıklama (Tr)</td>
        <td valign="top" class="basliksiyahkalin">:</td>
        <td><textarea name="kisaaciklama" id="kisaaciklama" cols="45" rows="3"><?=$kayit_satiri["kisaaciklama"] ?>
      </textarea></td>
      </tr>	  
      <tr>
        <td height="20" valign="top" class="basliksiyahkalin">Kısa A&ccedil;ıklama (En)</td>
        <td valign="top" class="basliksiyahkalin">:</td>
        <td><textarea name="kisaaciklamaen" id="kisaaciklamaen" cols="45" rows="3"><?=$kayit_satiri["kisaaciklamaen"] ?></textarea></td>
      </tr>
      <tr>
        <td valign="top" class="basliksiyahkalin">A&ccedil;ıklama (Tr)</td>
        <td valign="top" class="basliksiyahkalin">:</td>
        <td><textarea name="aciklama" cols="45" rows="5" id="aciklama"><?=$kayit_satiri["aciklama"] ?>
      </textarea></td>
      </tr>
      <tr>
        <td valign="top" class="basliksiyahkalin">A&ccedil;ıklama (En)</td>
        <td valign="top" class="basliksiyahkalin">:</td>
        <td><textarea name="aciklamaen" cols="45" rows="5" id="aciklamaen"><?=$kayit_satiri["aciklamaen"] ?></textarea></td>
      </tr>
      <tr>
        <td class="basliksiyahkalin">Ana Resim</td>
        <td class="basliksiyahkalin">:</td>
        <td><input name="resim" type="file" id="resim" size="45" />
            <? if($kayit_satiri['resim']!==""){echo '&nbsp;&nbsp;<a target="_blank" href="../images/etkinlikler/buyuk/'.$kayit_satiri['resim'].'">'.$kayit_satiri['resim'].'</a>';}?>
          <input name="eski_resim" value="<?=$kayit_satiri["resim"];?>" type="hidden" /></td>
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
        <td colspan="3"><table width="119" border="0" cellspacing="2" cellpadding="1">
					  <?
						$urn=mysql_query("SELECT * FROM etkinlikresmi WHERE etkinlikid='".$gelenid."' ORDER BY id ASC",$veriyolu);
						while($urunler1=mysql_fetch_array($urn)){
							if(bcmod($td,7)==0)echo"<tr>";
	
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
									<img src="../images/etkinlikler/kucuk/<?=$urunler1["resim"]; ?>" width="50"   border="0" vspace="5" hspace="5" align="center" /><br /><a href="?page=etkinlik_goruntule&resim=sil&id=<?=$urunler1["id"];?>&urunid=<?=$_GET["id"]?>" class="hatamesaji">[ Sil ]</a> </td>
								</tr>
							  </table></td>
							  </tr><? }
							?>                    
							  </table>						 </td>
						  <?
						 $td++;
							 if(bcmod($td, 7)==0)echo"</tr>";
						 }
						 ?>
				  </table></td>
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
	header("Location:http://www.sanalnet.com/sip/");
	
}
?>