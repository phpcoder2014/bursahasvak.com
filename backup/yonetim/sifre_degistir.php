<?

if($_SESSION['buikadkk']){

?>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="style/style.css" rel="stylesheet" type="text/css">



<?

	if ($islem=="kaydet")

		{

			$kullanici_adi = $_POST["kullanici"];

			$sifre_= sha1($_POST["sifre"]);

			$yeni_sifre = sha1($_POST["yenisifre"]);

			$yeni_sifre_tekrar = sha1($_POST["yenisifretekrar"]);



			$sql_cumlesi = "select * from nhup where nhu='".$kullanici_adi."' and nhp='".$sifre_."'";

			$kontrol_sonucu = mysql_fetch_array(mysql_query($sql_cumlesi, $veriyolu));



			$kullanici_id = $kontrol_sonucu["id"];



			if (!kullaniciadikontrol($kullanici_adi))

				{

					echo "<script>self.location = \"index.php?page=sifre_degistir&mesaj=Hatalı Kullanıcı Adı !\"</script>";

				}			

			elseif ( ($kullanici_adi=="") || ($sifre_=="") || ($yeni_sifre=="") || ($yeni_sifre_tekrar=="") )

				{

					echo "<script>self.location = \"index.php?page=sifre_degistir&mesaj=Doldurulması Gereken Zorunlu Alanlar Boş Geçilemez !\"</script>";

				}

			elseif ($yeni_sifre != $yeni_sifre_tekrar)	

				{

					echo "<script>self.location = \"index.php?page=sifre_degistir&mesaj=Yeni Şifre ve Tekrarı Aynı Değil !\"</script>";

				

				}

			elseif 	($kullanici_id=="")

				{

					echo "<script>self.location = \"index.php?page=sifre_degistir&mesaj=Kullanıcı Bilgileri Hatalı !\"</script>";

				}

			else

				{

					$degistirsql="update nhup set nhp='".$yeni_sifre."' where id='".$kullanici_id."'";

					$sonuc = mysql_query($degistirsql,$veriyolu);



					$degistirsq2="update nhup set nhp='".$yeni_sifre."' where nhu='".$kullanici_adi."'";

					

					$sonuc = mysql_query($degistirsq2,$veriyolugg);	

									

					echo "<script>self.location = \"index.php?page=cikis\"</script>";

				}

		}

?>



<form name="sifredegistir" method="post" action="index.php?page=sifre_degistir&islem=kaydet">

    <table width="700" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

      </tr>

      <tr>

        <td width="5" bgcolor="#F2F2F2">&nbsp;</td>

        <td><table width="396" border="0" align="center" cellpadding="1" cellspacing="1">

          <tr>

            <td height="17" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">KULLANICI ADI / ŞİFRE DEĞİŞİKLİĞİ</td>

          </tr>

          <tr>

            <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

          </tr>

          <tr>

            <td colspan="3" align="center" bgcolor="#FF0000"><span class="baslikgri"><strong><? print "<b>".$_REQUEST["mesaj"]."</b>";?></strong></span></td>

          </tr>

          <tr>

            <td width="126" class="basliksiyahkalin">Kullanıcı Adı</td>

            <td width="10" class="basliksiyahkalin">:</td>

            <td width="260" height="25"><input name="kullanici" type="text" id="kullanici" size="40" /></td>

          </tr>

          <tr>

            <td class="basliksiyahkalin">Eski Şifre</td>

            <td class="basliksiyahkalin">:</td>

            <td height="25"><input name="sifre" type="password" id="sifre" size="40" /></td>

          </tr>

          <tr>

            <td class="basliksiyahkalin">Yeni Şifre</td>

            <td class="basliksiyahkalin">:</td>

            <td height="25"><input name="yenisifre" type="password" id="yenisifre" size="40" /></td>

          </tr>

          <tr>

            <td class="basliksiyahkalin">Yeni Şifre (Tekrar)</td>

            <td class="basliksiyahkalin">:</td>

            <td height="25"><input name="yenisifretekrar" type="password" id="yenisifretekrar" size="40" /></td>

          </tr>

          <tr>

            <td colspan="3">&nbsp;</td>

          </tr>

          <tr>

            <td colspan="3" align="center"><input name="Submit" type="submit" class="icerik" value="Kaydet" /></td>

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

	header("Location:http://www.rotaofset.com.tr/sip/");

	

}

?>