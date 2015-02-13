<?

if($_SESSION['buikadkk']){

include("fckeditor/fckeditor.php"); 

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="style/style.css" rel="stylesheet" type="text/css">

<? 

 

	

	if ($_GET["islem"]=="kaydet")

		{	

			if ( $_POST["grupid"] == 0 )

				{

					echo "<script>self.location = \"index.php?page=kisi_ekle&mesaj=Grup Seçilmemiş, Kaydedilemez.! \"</script>";

				}

			else

				{	

		

					$kisi_adi=str_replace("'","`",$_POST["kisiadi"]);

					$firma = str_replace("'","`",$_POST["firma"]);

					$sira_no = $_POST["sirano"];

					$grup_id = $_POST["grupid"];

					$e_posta = $_POST["eposta"];

					$unvan = $_POST["unvan"];					

					

					$tmp_sirano=ucwords(strtolower($_POST["sirano"]));

					$tmp_kisiadi=ucwords(strtolower($kisi_adi));

					$tmp_firma=ucwords(strtolower($firma));

					$tmp_eposta=ucwords(strtolower($e_posta));

					$tmp_unvan=ucwords(strtolower($unvan));					

					

					$aranacak='<script'; 



					if (strpos($tmp_grupadi, $aranacak) !== false || strpos($tmp_firma, $aranacak) !== false || strpos($tmp_sirano, $aranacak) !== false || strpos($tmp_eposta, $aranacak) !== false || strpos($tmp_unvan, $aranacak) !== false)

						{ 

							echo "<script>self.location = \"index.php?page=kisi_ekle&mesaj=Sira No / Kisi Adı / Görevi / E-Posta Alanları içerisine script komutu girilemez! \"</script>";

						}

					else

						{

							if($_POST["kisiadi"]<>"" )

								{
									if($_POST["bulten"]=="evet"){
										$_POST["bulten"]=1;
									}else{
										$_POST["bulten"]=0;
									}

									$sql_cumlesi = "insert into kisiler (sirano, grupid, adi, firma, eposta,ozgecmis,mesaj,unvan,web,gizli,bulten) values ('".$sira_no."','".$grup_id."','".$kisi_adi."','".$firma."','".$e_posta."','".str_replace("'","`",$_POST["ozgecmis"])."','".str_replace("'","`",$_POST["mesaj"])."','".str_replace("'","`",$_POST["unvan"])."','".$_POST["web"]."','".$_POST["gizli"]."','".$_POST["bulten"]."')";

											

									$sonuc=mysql_query($sql_cumlesi,$veriyolu);

									$sonid=mysql_insert_id($veriyolu);

									if ($sonuc==true)

										{				

											if ($_FILES["resim"]["name"])

												{

													$icon_yol="../images/kisiler/";

													$iconadi= isimkontrol($_FILES["resim"]["name"]);

													$kayid=time();

													$vtresimadi = $icon_yol.$kayid."_".$iconadi;											

													$yuklenen_resim_uzantisi=substr($iconadi,-3);

		

													$iconup=move_uploaded_file($_FILES["resim"]["tmp_name"],$vtresimadi);

													$resimadi = $vtresimadi;

													$kresyeni= $icon_yol.$kayid.$iconadi;

													sin_boyutla_ozel($resimadi,$kresyeni,400,400);

													unlink($resimadi);

													$vtresimadi = $kayid.$iconadi;

													$vte = mysql_query("UPDATE kisiler SET resim='".$vtresimadi."' WHERE id='".$sonid."'",$veriyolu);																						

												}				

											if ($_FILES["resim2"]["name"])

												{

													$icon_yol="../images/kisiler/";

													$iconadi= isimkontrol($_FILES["resim2"]["name"]);

													$kayid=time();

													$vtresimadi = $icon_yol.$kayid."_".$iconadi;											

													$yuklenen_resim_uzantisi=substr($iconadi,-3);

		

													$iconup=move_uploaded_file($_FILES["resim2"]["tmp_name"],$vtresimadi);

													$resimadi = $vtresimadi;

													$kresyeni= $icon_yol.$kayid.$iconadi;

													sin_boyutla_ozel($resimadi,$kresyeni,100,100);

													unlink($resimadi);

													$vtresimadi = $kayid.$iconadi;

													$vte = mysql_query("UPDATE kisiler SET resim2='".$vtresimadi."' WHERE id='".$sonid."'",$veriyolu);																						

												}								

											

											echo "<script>self.location = \"index.php?page=kisi_listele&mesaj=Yeni Kisi Eklendi !\"</script>";

										}

									else

										{

											echo "<script>self.location = \"index.php?page=kisi_listele&mesaj=Kayıt sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !\"</script>";		

										}	

								}

							else

								{

									echo "<script>self.location = \"index.php?page=grup_ekle&mesaj=Kisi Adı Girmediniz. Kaydedilemez!\"</script>";

								}

						}

				}

		}

?> 

      

    

<form action="index.php?page=kisi_ekle&islem=kaydet" method="post" enctype="multipart/form-data" name="frmkisiekle">

  <table width="700" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

    </tr>

  <tr>

    <td width="5" bgcolor="#F2F2F2"></td>

    <td width="644"><table width="655" border="0" align="center" cellpadding="1" cellspacing="1">

    <tr>

      <td height="20" colspan="3" align="center" bgcolor="#999999" class="hatamesaji"><span class="baslikbeyaz">YENİ KİŞİ EKLE</span></td>

    </tr>

    <tr>

      <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

    </tr>

    <tr>

      <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

    </tr>

    <tr>

      <td width="103" height="31" class="basliksiyahkalin">Üyelik Tipi</td>

      <td width="4" class="basliksiyahkalin">:</td>

      <td width="548" height="25"><select name="grupid" id="grupid">

        <option value="0" selected="selected">Grup Se&ccedil;iniz...</option>



        

        <?

			$siniflar = mysql_query("select * from hgruplar", $veriyolu);

			while($satir=mysql_fetch_array($siniflar))

					{

		?>

        <option value="<?=$satir["id"];?>"><?=$satir["grupadi"];?></option>        

        <?

					}

		?>

        </select></td>

    </tr>

    <tr>

      <td class="basliksiyahkalin">Sıra No</td>

      <td class="basliksiyahkalin">:        </td>

      <td height="25"><span class="basliksiyahkalin">

        <input name="sirano" type="text" id="sirano" size="10" />

      </span></td>

    </tr>

    <tr>

      <td class="basliksiyahkalin">Kişi Adı Soyadı</td>

      <td class="basliksiyahkalin">:</td>

      <td height="25"><input name="kisiadi" type="text" id="kisiadi" size="46" /></td>

    </tr>

    <tr>

      <td class="basliksiyahkalin">Firma Adı</td>

      <td class="basliksiyahkalin">:</td>

      <td><input name="firma" type="text" id="firma" size="46" /></td>

    </tr>

    <tr>

      <td class="basliksiyahkalin">Ünvanı</td>

      <td class="basliksiyahkalin">:</td>

      <td><input name="unvan" type="text" id="unvan" size="46" /></td>

    </tr>

    <tr>

      <td class="basliksiyahkalin">E-Posta</td>

      <td class="basliksiyahkalin">:</td>

      <td class="baslikgri12px"><input name="eposta" type="text" id="eposta" size="46" />&nbsp;&nbsp;<input name="gizli" type="radio" value="1" />Gizle<input name="gizli" type="radio" value="0" />Gizleme</td>

    </tr>
    <tr>
      <td class="basliksiyahkalin">E-B&uuml;lten Abonesi</td>
      <td class="basliksiyahkalin">:</td>
      <td class="baslikgri12px"><input type="checkbox" name="bulten" value="evet"  />
Evet</td>
    </tr>

    <tr>

      <td class="basliksiyahkalin">İnternet Sayfası</td>

      <td class="basliksiyahkalin">:</td>

      <td class="baslikgri12px">http://

        <input name="web" type="text" id="web" size="46" /> 

        (Örneğin: www.buikad.org)</td>

    </tr>

    <tr>

      <td class="basliksiyahkalin">Özgeçmişi</td>

      <td class="basliksiyahkalin">:</td>

			<td height="10" align="left" class="baslikgri12px"'>
           <textarea name="ozgecmis" cols="45" rows="5" id="ozgecmis"></textarea></td>

    </tr>

    <tr>
      
      <td class="basliksiyahkalin">Resim</td>
      
      <td class="basliksiyahkalin">:</td>
      
      <td><input name="resim" type="file" id="resim" size="46" /></td>
      
    </tr>

    <tr>

      <td class="basliksiyahkalin">Firma Logosu</td>

      <td class="basliksiyahkalin">:</td>

      <td><input name="resim2" type="file" id="resim2" size="46" /></td>

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