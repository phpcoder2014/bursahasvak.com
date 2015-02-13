<?

if($_SESSION['buikadkk']){

include("fckeditor/fckeditor.php"); 

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="style/style.css" rel="stylesheet" type="text/css">

<? 

 

	

	if ($_GET["islem"]=="kaydet")

		{	

			if ( $_POST["kisiid"] == 0 )

				{

					echo "<script>self.location = \"index.php?page=mesaj_ekle&mesaj=Kişi Seçilmemiş, Kaydedilemez.! \"</script>";

				}

			else

				{	

		


					$baslik = str_replace("'","`",$_POST["baslik"]);


					


					$tmp_baslik=ucwords(strtolower($baslik));


					$aranacak='<script'; 



					if (strpos($tmp_baslik, $aranacak) !== false)

						{ 

							echo "<script>self.location = \"index.php?page=mesaj_ekle&mesaj=Başlık Alanının içerisine script komutu girilemez! \"</script>";

						}

					else

						{

							if($_POST["baslik"]<>"" )

								{

									$sql_cumlesi = "insert into mesajlar (kisiid, baslik, kisamesaj,mesaj) values ('".$_POST["kisiid"]."','".$baslik."','".str_replace("'","`",$_POST["kisamesaj"])."','".str_replace("'","`",$_POST["mesaj"])."')";

											

									$sonuc=mysql_query($sql_cumlesi,$veriyolu);

									$sonid=mysql_insert_id($veriyolu);

									if ($sonuc==true)

										{				

											echo "<script>self.location = \"index.php?page=mesaj_listele&mesaj=Yeni Mesaj Eklendi !\"</script>";

										}

									else

										{

											echo "<script>self.location = \"index.php?page=mesaj_listele&mesaj=Kayıt sırasında hata oluştu... Girilen bilgiler kaydedilemedi. !\"</script>";		

										}	

								}

							else

								{

									echo "<script>self.location = \"index.php?page=mesaj_ekle&mesaj=Başlık Girmediniz. Kaydedilemez!\"</script>";

								}

						}

				}

		}

?> 

      

    

<form action="index.php?page=mesaj_ekle&islem=kaydet" method="post" enctype="multipart/form-data" name="frmkisiekle">

  <table width="700" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

    </tr>

  <tr>

    <td width="5" bgcolor="#F2F2F2"></td>

    <td width="644"><table width="655" border="0" align="center" cellpadding="1" cellspacing="1">

    <tr>

      <td height="20" colspan="3" align="center" bgcolor="#999999" class="hatamesaji"><span class="baslikbeyaz">YENİ MESAJ EKLE</span></td>

    </tr>

    <tr>

      <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

    </tr>

    <tr>

      <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

    </tr>

    <tr>

      <td width="103" height="31" class="basliksiyahkalin">Kişi Adı Soyadı</td>

      <td width="4" class="basliksiyahkalin">:</td>

      <td width="548" height="25"><select name="kisiid" id="kisiid">

        <option value="0" selected="selected">Kişi Se&ccedil;iniz...</option>



        

        <?

			$siniflar = mysql_query("select * from kisiler", $veriyolu);

			while($satir=mysql_fetch_array($siniflar))

					{

		?>

        <option value="<?=$satir["id"];?>"><?=$satir["adi"];?></option>        

        <?

					}

		?>

        </select></td>

    </tr>

    <tr>
      
      <td class="basliksiyahkalin">Başlık</td>
      
      <td class="basliksiyahkalin">:</td>
      
      <td height="25"><input name="baslik" type="text"  size="46" /></td>
      
    </tr>

    <tr>
      <td class="basliksiyahkalin">Kısa Mesaj</td>
      <td class="basliksiyahkalin">:</td>
      <td><?php

$oFCKeditor = new FCKeditor('kisamesaj') ;

$oFCKeditor->BasePath = 'fckeditor/' ;

$oFCKeditor->Value = '' ;

$oFCKeditor->Create() ;

?></td>
    </tr>

    <tr>
      
      <td class="basliksiyahkalin">Mesajı</td>
      
      <td class="basliksiyahkalin">:</td>
      
      <td><?php

$oFCKeditor = new FCKeditor('mesaj') ;

$oFCKeditor->BasePath = 'fckeditor/' ;

$oFCKeditor->Value = '' ;

$oFCKeditor->Create() ;

?>	</td>
      
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