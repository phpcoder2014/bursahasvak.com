<?

if($_SESSION['buikadkk']){

?>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="style/style.css" rel="stylesheet" type="text/css">



<script language="javascript1.2">

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='index.php?page=uye_listele&durum="+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>



<?

	$page=$_GET["pagesi"];  

	if ($page <> "" && !ctype_digit($page))

		{

			echo "<script>self.location = \"index.php?page=uyari&link=".$_SERVER['REQUEST_URI']."\"</script>";

		}

	

	$perpage=25;
	if($_GET["deger"]=="onay"){
		$iddd=mysql_fetch_array(mysql_query("select * from uyeler where id='".$_GET["id"]."'", $veriyolu));
		$sql_cumlesi = "insert into kisiler (adi, eposta) values ('".$iddd["baslik"]."','".$iddd["eposta"]."')";
		$sonuc=mysql_query($sql_cumlesi,$veriyolu);
		$sonid=mysql_insert_id($veriyolu);
		if($sonuc=true){
			$iddd=mysql_fetch_array(mysql_query("update uyeler set durum='2' where id='".$_GET["id"]."'", $veriyolu));
			$kime =$iddd["eposta"];
			$fromName=$iddd['baslik'];
			$Konu="Buikad Üyelik Başvurusu Eksik Döküman";
			$headers .= "From: ".$fromName." <".$kime.">\n"; 
			$headers .= "Content-type:text/html; charset=\"iso-8859-9\"\n";
			$headers .= "Content-Type:text/html; charset=\"windows-1254\"\n";
			$headers .= "Content-Transfer-Encoding: 8bit\n";
			$mesaj="<style type='text/css'>
img {border:none;}
</style>
<table width='800' border='0' align='center' cellpadding='0' cellspacing='0' style='font-family:Arial, Helvetica, sans-serif; color:#242324; font-size:11px'>

  <tr>
    <td><table width='800' border='0' cellspacing='0' cellpadding='0'>
      <tr>
        <td width='211'><a href='http://buikad.org/'><img src='http://www.buikad.org/images/email/bukiad_03.jpg' width='211' height='89' /></a></td>
        <td width='204'><a href='http://buikad.org/'><img src='http://www.buikad.org/images/email/bukiad_04.jpg' width='204' height='89' /></a></td>
        <td width='183'><a href='http://buikad.org/'><img src='http://www.buikad.org/images/email/bukiad_05.jpg' width='183' height='89' /></a></td>
        <td width='202'><a href='http://buikad.org/'><img src='http://www.buikad.org/images/email/bukiad_06.jpg' width='202' height='89' /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>Tebrikler.  Başvurunuz Yönetim Kurulu tarafından olumlu değerlendirilmiştir. Sizi aramızda görmekten onur duyarız. Nice etkinliklerde elbirliği ile yer almak dileği ile.</td>
  </tr>
  <tr>
    <td height='2'><img src='images/bukiad_09.jpg' width='800' height='2' /></td>
  </tr>
  <tr>
    <td height='10'></td>
  </tr>
  <tr>
    <td height='10'><table width='800' border='0' cellspacing='0' cellpadding='0'>
      <tr>
        <td width='300'>Adres: Organize Sanayi Bölgesi Kahverengi Cad. <br />
          JA-GE Tekstil 3.Kat<br />
          Nilüfer / Bursa</td>
        <td width='40'>&nbsp;</td>
        <td width='210' valign='top'><table width='210' border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td width='40' align='center'>C</td>
            <td width='10' align='center'>:</td>
            <td width='20'>&nbsp;</td>
            <td width='140' height='20'>0507 690 39 59</td>
          </tr>
        
          <tr>
            <td align='center'>F</td>
            <td align='center'>&nbsp;</td>
            <td>&nbsp;</td>
            <td height='20'>0224 249 17 91</td>
          </tr>
        </table></td>
        <td width='40'>&nbsp;</td>
        <td width='210' valign='top'><table width='210' border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td width='40' align='center'>E</td>
            <td width='10' align='center'>:</td>
            <td width='20'>&nbsp;</td>
            <td width='140' height='20'>iletisim@buikad.org</td>
          </tr>
     
          <tr>
            <td align='center'>T</td>
            <td align='center'>&nbsp;</td>
            <td>&nbsp;</td>
            <td height='20'>0224 249 17 90</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>";
			mail($kime, $Konu, $mesaj,$headers);
		
			echo "<script>self.location = \"index.php?page=kisi_goruntule&islem=goster&id=".$sonid."\"</script>";			
		}
	}elseif($_GET["deger"]=="eksik"){
			$iddd12=mysql_fetch_array(mysql_query("select * from uyeler where id='".$_GET["id"]."'", $veriyolu));
			$kime =$iddd12["eposta"];
			$fromName=$iddd12['baslik'];
			$Konu="Buikad Üyelik Başvurusu Eksik Döküman";
			$headers .= "From: ".$fromName." <".$kime.">\n"; 
			$headers .= "Content-type:text/html; charset=\"iso-8859-9\"\n";
			$headers .= "Content-Type:text/html; charset=\"windows-1254\"\n";
			$headers .= "Content-Transfer-Encoding: 8bit\n";
			$mesaj="<style type='text/css'>
img {border:none;}
</style>
<table width='800' border='0' align='center' cellpadding='0' cellspacing='0' style='font-family:Arial, Helvetica, sans-serif; color:#242324; font-size:11px'>

  <tr>
    <td><table width='800' border='0' cellspacing='0' cellpadding='0'>
      <tr>
        <td width='211'><a href='http://buikad.org/'><img src='http://www.buikad.org/images/email/bukiad_03.jpg' width='211' height='89' /></a></td>
        <td width='204'><a href='http://buikad.org/'><img src='http://www.buikad.org/images/email/bukiad_04.jpg' width='204' height='89' /></a></td>
        <td width='183'><a href='http://buikad.org/'><img src='http://www.buikad.org/images/email/bukiad_05.jpg' width='183' height='89' /></a></td>
        <td width='202'><a href='http://buikad.org/'><img src='http://www.buikad.org/images/email/bukiad_06.jpg' width='202' height='89' /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>Üyelik için gerekli belgeleriniz eksiktir. En kısa sürede eksik evraklarınızı <a href='mailto:uyelik@buikad.org'>uyelik@buikad.org</a> mail adresini de iletmeniz durumunda başvurunuz değerlendirmeye alınacaktır.</td>
  </tr>
  <tr>
    <td height='2'><img src='images/bukiad_09.jpg' width='800' height='2' /></td>
  </tr>
  <tr>
    <td height='10'></td>
  </tr>
  <tr>
    <td height='10'><table width='800' border='0' cellspacing='0' cellpadding='0'>
      <tr>
        <td width='300'>Adres: Organize Sanayi Bölgesi Kahverengi Cad. <br />
          JA-GE Tekstil 3.Kat<br />
          Nilüfer / Bursa</td>
        <td width='40'>&nbsp;</td>
        <td width='210' valign='top'><table width='210' border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td width='40' align='center'>C</td>
            <td width='10' align='center'>:</td>
            <td width='20'>&nbsp;</td>
            <td width='140' height='20'>0507 690 39 59</td>
          </tr>
        
          <tr>
            <td align='center'>F</td>
            <td align='center'>&nbsp;</td>
            <td>&nbsp;</td>
            <td height='20'>0224 249 17 91</td>
          </tr>
        </table></td>
        <td width='40'>&nbsp;</td>
        <td width='210' valign='top'><table width='210' border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td width='40' align='center'>E</td>
            <td width='10' align='center'>:</td>
            <td width='20'>&nbsp;</td>
            <td width='140' height='20'>iletisim@buikad.org</td>
          </tr>
     
          <tr>
            <td align='center'>T</td>
            <td align='center'>&nbsp;</td>
            <td>&nbsp;</td>
            <td height='20'>0224 249 17 90</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>";
			mail($kime, $Konu, $mesaj,$headers);

			$iddd=mysql_fetch_array(mysql_query("update uyeler set durum='1' where id='".$_GET["id"]."'", $veriyolu));

			echo "<script>self.location = \"index.php?page=uye_listele&durum=0"."\"</script>";
	
	}


	if (!$page) 

		$page=1; 

	if($_GET["durum"]){
		$durum=$_GET["durum"];		
	}else{
		$durum=0;
	}
	$count = mysql_num_rows(mysql_query("select * from uyeler where durum='".$durum."' order by tarih desc", $veriyolu));

	

	$totalPage = ceil(($count/$perpage));



	$renk=0;



	$sql_cumlesi="select * from uyeler where durum='".$durum."' order by tarih desc LIMIT ".((intval($page)*25)-25).", $perpage";

	$kayitlar= mysql_query($sql_cumlesi, $veriyolu);

			

	$sayac=mysql_num_rows($kayitlar);

			

?>

 <table width="700" border="0" cellspacing="0" cellpadding="0">

   <tr>

     <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

   </tr>

   <tr>

     <td width="5" bgcolor="#F2F2F2">&nbsp;</td>

     <td width="644" height="17">

       

       <table width="668" border="0" align="center" cellpadding="1" cellspacing="1">

         <tr>

           <td height="20" colspan="7" align="center" bgcolor="#999999" class="baslikbeyaz">&Uuml;YELERİN LİSTESİ</td>

         </tr>

         <tr>

           <td height="1" colspan="7" align="center" bgcolor="#808080"></td>

         </tr>

         <tr>

           <td height="9" colspan="7" align="center" <? if($_GET["mesaj"] <>"") {?>bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><? print"<b>".$_GET["mesaj"]."</b>";?></td>

         </tr>
         <tr>
           <td height="10" colspan="7" align="right" class="baslikgri12px" <? if($_GET["mesaj"] <>"") {?>bgcolor="#FF0000" <? }?>class="baslik_beyaz_14">Durum 
             <select name="durum" id="durum " onchange="MM_jumpMenu('parent',this,0)">
               <option value="0" <?php if($_GET["durum"]==0){?>selected="selected"<?php }?>>Değerlendirme</option>
               <option value="1" <?php if($_GET["durum"]=='1'){?>selected="selected"<?php }?>>Eksik Evrak</option>           </select></td>
         </tr>
         <?php
	if ($sayac < 1)

		{
?>
         <tr>

           <td height="25" colspan="7" align="center" bgcolor="#000099" class="baslikbeyaz" >	Veri Tabanımızda Kayıtlı Üye Bulunmamaktadır...</td>

         </tr>
		

<?	

		}

	else

		{

?> 
         <tr>

           <td width="35" height="25" align="center" bgcolor="#000099" class="baslikbeyaz" >#</td>

           <td width="80" bgcolor="#000099" class="baslikbeyaz" >&nbsp;&nbsp; Tarih</td>

           <td width="114" height="25" bgcolor="#000099" class="baslikbeyaz" >&nbsp;&nbsp; Adı Soyadı</td>
           <td width="203" bgcolor="#000099" class="baslikbeyaz" >&nbsp;&nbsp; E-Posta</td>
           <td width="134" bgcolor="#000099" class="baslikbeyaz" >&nbsp;&nbsp; D&ouml;k&uuml;man</td>

           <td height="25" colspan="2" bgcolor="#000099" class="baslikbeyaz" >&nbsp;&nbsp; İşlemler</td>

         </tr>

         <?

$renk=0;

$sayi=1;

				while($satir=mysql_fetch_array($kayitlar))

					{

?>

         <tr>

           <td align="center" class="baslikgri12px"><?=$sayi;?></td>

           <td class="baslikgri12px">&nbsp;&nbsp;

             <? if($satir["tarih"] != "0000-00-00") { ?>

             <?=date("d-m-Y",strtotime($satir["tarih"])); } else {?>

           <?='Girilmemiş.'; }?></td>

           <td class="baslikgri12px">&nbsp;&nbsp; <?=$satir["baslik"];?></td>
           <td class="baslikgri12px">&nbsp;&nbsp;
           <?=$satir["eposta"];?></td>
           <td class="baslikgri12px">&nbsp;&nbsp; <a href="../images/uyedokumanlari/<?=$satir["resim"];?>" class="baslikgri12px">Dosyayı İndir..</a></td>

           <td width="41" align="center" class="baslikgri12px"> <a href="?page=uye_listele&deger=onay&id=<?=$satir["id"];?>" title="<?=$satir["baslik"];?> Üyesini Onayla"><img src="images/yesilicon.png" width="16" height="16" border="0" title="<?=$satir["baslik"];?> Üyesini Onayla"></a></td>

           <td width="39" align="center" class="baslikgri12px"><a href="?page=uye_listele&deger=eksik&id=<?=$satir["id"];?>" title="<?=$satir["baslik"]?> Üyenin Dökümanı Eksik"><img src="images/delete2.png" width="16" height="16" border="0"  title="<?=$satir["baslik"]?> Üyenin Dökümanı Eksik" /></a></td>

         </tr>

         <?					

$renk++;	

$sayi++;

					}
		}

?>

         <tr >

           <td height="1" colspan="7" align="center" bgcolor="#808080"></td>

         </tr>

         <tr >

           <td height="30" colspan="7" align="center" class="baslikgri12px"><table width="300" border="0" cellpadding="0" cellspacing="0" class="baslikgri12px">

             <tr>

               <td align="center">

               <table border="0" cellpadding="2" cellspacing="2">

               <tr>

               

		

 

<?



if($count > $perpage) : $x = 2; // akrif sayfadan önceki/sonraki sayfa gösterim sayısı 

	$lastP = ceil($count/$perpage); 



	// sayfa 1'i yazdır 

	if($page==1) 

		echo "<td width=21 height=22 class=\"ThisPage\" background=\"images/kutu.png\">1</td>"; 

	else 

		echo "<td width=21 height=22><a href=\"?page=basin_listele&pagesi=1\">1</a></td>"; 

		

	// "..." veya direkt 2 

	if($page-$x > 2) 

		{ 

			echo "<td width=21 height=22 class=\"basliksiyahkalin\">...</td>"; 

			$i = $page-$x; 

		} 

	else 

		{ 

			$i = 2; 

		} 





	// +/- $x sayfaları yazdır 

	for($i; $i<=$page+$x; $i++) 

		{ 

			if($i==$page) 

				echo "<td width=21  height=22 class=\"ThisPage\"  background=\"images/kutu.png\">$i</td>"; 

			else 

				echo "<td width=21 height=22  ><a href=\"?page=basin_listele&pagesi=$i\">$i</a></td>"; 

			if($i==$lastP) 

				break; 

		} 

	// "..." veya son sayfa 

	if($page+$x < $lastP-1) 

		{ 

			echo "<td width=21 height=22 class=\"basliksiyahkalin\">...</td>"; 

			echo "<td width=21 height=22><a href=\"?page=basin_listele&pagesi=$lastP\">$lastP</a></td>"; 

		} 

	elseif($page+$x == $lastP-1) 

		{ 

			echo "<td width=21 height=22><a href=\"?page=basin_listele&pagesi=$lastP\">$lastP</a></td>"; 

		} 

endif; 

?>   

</tr>

</table>           

</td>

             </tr>

           </table>

         

           </td>

         </tr>

         

       </table></td>

     <td width="5" bgcolor="#F2F2F2">&nbsp;</td>

   </tr>

   <tr>

     <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

   </tr>

 </table>



 <?

}

else

{

	header("Location:http://www.buikad.org/yonetim/");

	

}

?>