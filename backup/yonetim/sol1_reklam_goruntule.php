<?

if($_SESSION['buikadkk']){

?>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<link href="style/style.css" rel="stylesheet" type="text/css">

    

<? 

	$_GET["id"]="1";

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

			$strmsg3 = "Sol1 Reklam Güncellendi.";

			$strmsg4 = "Güncelleme sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !";

			$strmsg5 = "Sol1 Reklam Silindi";

			$strmsg6 = "Silme sırasında hata oluştu... Sol1 Reklam Silinemedi !";

			

			if ($_GET["islem"]=="kaydet")

				{

					$tnm_baslik = $_POST["baslik"];

					$tmp_baslik = ucwords(strtolower($tnm_baslik));

					

									$sql_cumlesi = "update sol1_reklam set grup='".$_POST["grup"]."', baslik='".$_POST["baslik"]."'  where id='1'";

									$query_sonucu = mysql_query($sql_cumlesi, $veriyolu);

									if ($query_sonucu==true)

										{

											/*swf upload*/

											if ($_FILES["swf"]["name"])

												{

										 			$dosya_yol="../swf/";

													$dosyaadi= isimkontrol($_FILES["swf"]["name"]);

													$kayid=time();

													$vtdosyaadi = $dosya_yol.$kayid."_".$dosyaadi;

													$yuklenen_dosya_uzantisi=substr($dosyaadi,-3);

													$tmp_dosyaadi = $_FILES["swf"]["tmp_name"];

													if ( strtolower($yuklenen_dosya_uzantisi) == strtolower("jpg") || strtolower($yuklenen_dosya_uzantisi) == strtolower("gif")  || strtolower($yuklenen_dosya_uzantisi) == strtolower("png") )

														{

															$dosyaup=move_uploaded_file($tmp_dosyaadi, $vtdosyaadi);

															unlink($dosya_yol.$_POST["eski_swf"]);

															$vtdosyaadi = $kayid."_".$dosyaadi;

															$vte = mysql_query("UPDATE sol1_reklam SET swf='".$vtdosyaadi."' WHERE id='1'",$veriyolu);

														}

													else

														{

															echo "<script>self.location = \"index.php?page=sol1_reklam_goruntule&mesaj=Yüklemek istediğiniz dosya ".$uzanti." uzantılı olduğu için yükleme yapılamaz.\"</script>";	

														}

												}											

											/*swf upload sonu*/

																					

																																

											echo "<script>self.location = \"index.php?page=sol1_reklam_goruntule&islem=goster&mesaj=".$strmsg3."\"</script>";

										}

									else

										{

											echo "<script>self.location = \"index.php?page=sol1_reklam_goruntule&islem=goster&mesaj=".$strmsg4."\"</script>";	

										}					

				}

			elseif($_GET["islem"]=="sil")

					{

						$sql= @mysql_query("select * from sol1_reklam where id=".$gelenid,$veriyolu);

						$sonuc=@mysql_fetch_array($sql);	

						$eski_swf = $sonuc["swf"];



						$silme_sonucu= mysql_query("delete from sol1_reklam where id=".$gelenid,$veriyolu);

						if ($silme_sonucu==true)

							{

								if ($eski_swf <> "") {unlink("../swf/".$eski_swf);}

								echo "<script>self.location = \"index.php?page=sol1_reklam_goruntule&islem=goster&mesaj=".$strmsg5."\"</script>";

							}

						else

							{

								echo "<script>self.location = \"index.php?page=sol1_reklam_goruntule&islem=goster&mesaj=".$strmsg6."\"</script>";

							}	

					}

			elseif($_GET["islem"]=="goster")

					{

						$swf_tablosu = @mysql_query("select * from sol1_reklam where id='1'",$veriyolu);

						$kayit_satiri = @mysql_fetch_array($swf_tablosu);

						

?>





<script type="text/javascript">

<!--

function MM_jumpMenu(targ,selObj,restore){ //v3.0

  eval(targ+".location='?page=sol1_reklam_goruntule&islem=goster&grup="+selObj.options[selObj.selectedIndex].value+"'");

  if (restore) selObj.selectedIndex=0;

}

function MM_jumpMenu1(targ,selObj,restore){ //v3.0

  eval(targ+".location='?page=sol1_reklam_goruntule&islem=goster&grup=<?=$_GET["grup"];?>&baslik="+selObj.options[selObj.selectedIndex].value+"'");

  if (restore) selObj.selectedIndex=0;

}

//-->

</script>

<form action="index.php?page=sol1_reklam_goruntule&islem=kaydet" method="post" enctype="multipart/form-data" name="frmsol1_reklamgoruntule">

<input name="id" type="hidden" value="<?=$gelenid ?>">



<table width="800" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

    </tr>

  <tr>

    <td width="3" bgcolor="#F2F2F2"></td>

    <td width="857"><table width="771" border="0" align="center" cellpadding="1" cellspacing="1">

      <tr>

        <td height="20" colspan="4" align="center" bgcolor="#999999" class="baslikbeyaz">SOL  ALAN 1 REKLAMI D&Uuml;ZENLE</td>

      </tr>

      <tr>

        <td height="1" colspan="4" align="center" bgcolor="#808080"></td>

      </tr>

      <tr>

        <td height="20" colspan="4" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

      </tr>

      <tr>

        <td valign="top" class="basliksiyahkalin">Alan</td>

        <td valign="top" class="basliksiyahkalin">:</td>

        <td height="25" valign="top">

            <select name="grup" id="grup" onchange="MM_jumpMenu('parent',this,0)">

             <?

			if($_GET["grup"]){

				?>

              <option value="0" <? if($_GET["grup"]=="0"){ echo 'selected="selected"';}?> >Seçiniz</option>

              <option value="1" <? if($_GET["grup"]=="1"){ echo 'selected="selected"';}?>>Etkinlik</option>

              <option value="2" <? if($_GET["grup"]=="2"){ echo 'selected="selected"';}?>>Duyuru</option>

              <option value="3" <? if($_GET["grup"]=="3"){ echo 'selected="selected"';}?>>Projeler</option>

              <option value="4" <? if($_GET["grup"]=="4"){ echo 'selected="selected"';}?>>Haberler</option>

              <option value="5" <? if($_GET["grup"]=="5"){ echo 'selected="selected"';}?>>Faaliyet Raporları</option>

              <? }else{?>

              <option value="0" <? if($kayit_satiri["grup"]=="0"){ echo 'selected="selected"';}?> >Seçiniz</option>

              <option value="1" <? if($kayit_satiri["grup"]=="1"){ echo 'selected="selected"';}?>>Etkinlik</option>

              <option value="2" <? if($kayit_satiri["grup"]=="2"){ echo 'selected="selected"';}?>>Duyuru</option>  

              <option value="3" <? if($kayit_satiri["grup"]=="3"){ echo 'selected="selected"';}?>>Projeler</option>  

              <option value="4" <? if($kayit_satiri["grup"]=="4"){ echo 'selected="selected"';}?>>Haberler</option>  

              <option value="5" <? if($kayit_satiri["grup"]=="5"){ echo 'selected="selected"';}?>>Faaliyet Raporları</option>              

              <? }?>

            </select>        </td>

        <td width="306" rowspan="3" valign="top"><? if($kayit_satiri["swf"]!==""){echo '&nbsp;&nbsp;<a target="_blank" href="../swf/'.$kayit_satiri["swf"].'"><img src="../swf/'.$kayit_satiri["swf"].'" border="0" width="100"></a>';}?></td>

      </tr>

      <tr>

        <td width="144" valign="top" class="basliksiyahkalin">Başlıklar</td>

        <td width="4" valign="top" class="basliksiyahkalin">:</td>

        <td width="306" height="25" valign="top">

            <select name="baslik" id="baslik" onchange="MM_jumpMenu1('parent',this,0)">

              <option value="0" <? if($_GET["baslik"]=="0"){ echo 'selected="selected"';}?>>Seçiniz</option>

            <?

			if($_GET["grup"]){

				if($_GET["grup"]=="2"){

					$dyr=mysql_query("SELECT * FROM duyurular ORDER BY baslik ASC",$veriyolu);

					while($duyuru=mysql_fetch_array($dyr)){

				?>

				  <option value="<?=$duyuru["id"];?>" <? if($_GET["baslik"]==$duyuru["id"]){ echo 'selected="selected"';}?>><?=$duyuru["baslik"];?></option>

				 <?

					}

				 }elseif($_GET["grup"]=="1"){

					$et=mysql_query("SELECT * FROM etkinlikler ORDER BY baslik ASC",$veriyolu);

					while($etkinlik=mysql_fetch_array($et)){

				?>

				  <option value="<?=$etkinlik["id"];?>" <? if($_GET["baslik"]==$etkinlik["id"]){ echo 'selected="selected"';}?>><?=$etkinlik["baslik"];?></option>

                 <?

						}				 

				 }elseif($_GET["grup"]=="3"){

					$pr=mysql_query("SELECT * FROM projeler ORDER BY baslik ASC",$veriyolu);

					while($projeler=mysql_fetch_array($pr)){

				?>

				  <option value="<?=$projeler["id"];?>" <? if($_GET["baslik"]==$projeler["id"]){ echo 'selected="selected"';}?>><?=$projeler["baslik"];?></option>

				<?

						}				

				 }elseif($_GET["grup"]=="4"){

					$hbr=mysql_query("SELECT * FROM haberler ORDER BY baslik ASC",$veriyolu);

					while($haberler=mysql_fetch_array($hbr)){

				?>

				  <option value="<?=$haberler["id"];?>" <? if($_GET["baslik"]==$haberler["id"]){ echo 'selected="selected"';}?>><?=$haberler["baslik"];?></option>

				<?

						}

				 }elseif($_GET["grup"]=="5"){

					$pd=mysql_query("SELECT * FROM pdf ORDER BY baslik ASC",$veriyolu);

					while($pdf=mysql_fetch_array($pd)){

				?>

				  <option value="<?=$pdf["id"];?>" <? if($_GET["baslik"]==$pdf["id"]){ echo 'selected="selected"';}?>><?=$pdf["baslik"];?></option>

				

				 <?

					}

				}

			}else{

				if($kayit_satiri["grup"]=="2"){

					$dyr=mysql_query("SELECT * FROM duyurular ORDER BY baslik ASC",$veriyolu);

					while($duyuru=mysql_fetch_array($dyr)){

				?>

				  <option value="<?=$duyuru["id"];?>" <? if($kayit_satiri["baslik"]==$duyuru["id"]){ echo 'selected="selected"';}?>><?=$duyuru["baslik"];?></option>

				 <?

					}

				 }elseif($kayit_satiri["grup"]=="1"){

					$et=mysql_query("SELECT * FROM etkinlikler ORDER BY baslik ASC",$veriyolu);

					while($etkinlik=mysql_fetch_array($et)){

				?>

				  <option value="<?=$etkinlik["id"];?>" <? if($kayit_satiri["baslik"]==$etkinlik["id"]){ echo 'selected="selected"';}?>><?=$etkinlik["baslik"];?></option>

				 <?	}

				 }elseif($kayit_satiri["grup"]=="3"){

					$pr=mysql_query("SELECT * FROM projeler ORDER BY baslik ASC",$veriyolu);

					while($projeler=mysql_fetch_array($pr)){

				?>

				  <option value="<?=$projeler["id"];?>" <? if($kayit_satiri["baslik"]==$projeler["id"]){ echo 'selected="selected"';}?>><?=$projeler["baslik"];?></option>

				 <?	}

				 }elseif($kayit_satiri["grup"]=="4"){

					$hb=mysql_query("SELECT * FROM haberler ORDER BY baslik ASC",$veriyolu);

					while($haber=mysql_fetch_array($hb)){

				?>

				  <option value="<?=$haber["id"];?>" <? if($kayit_satiri["baslik"]==$haber["id"]){ echo 'selected="selected"';}?>><?=$haber["baslik"];?></option>

				 <?	}

				 }elseif($kayit_satiri["grup"]=="5"){

					$pd=mysql_query("SELECT * FROM pdf ORDER BY baslik ASC",$veriyolu);

					while($pdf=mysql_fetch_array($pd)){

				?>

				  <option value="<?=$pdf["id"];?>" <? if($kayit_satiri["baslik"]==$pdf["id"]){ echo 'selected="selected"';}?>><?=$pdf["baslik"];?></option>

				 <?

					}

				}			

			}

			?>

            </select>        </td>

        </tr>       

      <tr>

        <td valign="top" class="basliksiyahkalin">Resim</td>

        <td valign="top" class="basliksiyahkalin">:</td>

        <td class="baslikgri12px"><input name="swf" type="file" id="swf" size="46" /><input name="eski_swf" value="<?=$kayit_satiri["swf"];?>" type="hidden" />

          <br />

Not: Resim Boyutu : w=127 px  h= 179 px</td>

        </tr>  

      <tr>

        <td colspan="4" class="hatamesaji">*Not : Alan (Etkinlik veya Duyuru) seçilmeli, Seçilen alana ait Başlıklar bölümünden seçilerek Reklam Resmi eklenip Kaydet e tıklanılmalıdır.</td>

      </tr>

      <tr>

        <td colspan="4" align="center">&nbsp;</td>

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