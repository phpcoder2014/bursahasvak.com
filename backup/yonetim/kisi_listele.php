<?

if($_SESSION['buikadkk']){

?>





<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="style/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
$(document).ready(function(){ 	
	
	$(function() {
	$("table tbody").sortable({ opacity: 0.8, cursor: 'move', update: function() {
			
			var order = $(this).sortable("serialize") + '&mode=kisi_listele'; 
			$.post("updateList.php", order, function(theResponse){}); 															 
		}								  
		});
	});

});	
</script>

<script language="JavaScript" type="text/JavaScript">

<!--

function sil(baslik,id,resim1)  

	{  

		answer = confirm("Dikkat! \" "+baslik+" \" silmek üzeresiniz!")  

		if (answer ==1)  

			{  

				location = "?page=kisi_goruntule&islem=sil&id="+id

			}  

	}

function MM_jumpMenu(targ,selObj,restore){ //v3.0

  eval(targ+".location='?page=kisi_listele&grupid="+selObj.options[selObj.selectedIndex].value+"'");

  if (restore) selObj.selectedIndex=0;

}

//-->

</script>



<?

		

	if ($_GET["grupid"]!="")

		{

			if ($_GET["grupid"] != 0 && $_GET["grupid"] != 't')

				{

					$sorgu=" where grupid='".$_GET["grupid"]."'";

				}elseif($_GET["grupid"] == 't'){
					$sorgu="";
				}

		}

	elseif ($_POST["ara"]!="")

		{

			$ara="'%".$_POST['ara']."%'";

			$sorgu="where adi like ".$ara;

		}

	else

		{

			$sorgu="";

		}

	



				

	$page=$_GET["pagesi"];  


	

	$perpage=25;



	if (!$page) 

		$page=1; 

		

		

	$count = mysql_num_rows(mysql_query("select * from kisiler $sorgu", $veriyolu));

	$totalPage = ceil(($count/$perpage));



	$renk=0;



	$sql_cumlesi="select * from kisiler $sorgu order by sirano LIMIT ".((intval($page)*25)-25).", $perpage";

	$kayitlar= mysql_query($sql_cumlesi, $veriyolu);

	$sayac=mysql_num_rows($kayitlar);



	if ($sayac < 1)

		{

			echo "Veri Tabanımızda Kayıtlı Kişi Bulunmamaktadır..."

?>

			<p><a href="javascript:history.back()"> « Geri  </a></p>

<?	

   		}

	else

		{

?> 

 <table width="700" border="0" cellspacing="0" cellpadding="0">

   <tr>

     <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

   </tr>

   

   <tr>

     <td width="5" bgcolor="#F2F2F2"></td>

     <td width="644">

     

<table width="650" border="0" align="center" cellpadding="1" cellspacing="1">
<thead>
  <tr>

    <td height="20" colspan="7" align="center" bgcolor="#999999" class="baslikbeyaz">KİŞİLER LİSTESİ</td>

  </tr>

    <tr>

    <td height="1" colspan="7" align="center" bgcolor="#808080"></td>

  </tr>

  <tr>

    <td height="20" colspan="7" align="center" <? if($_GET["mesaj"] <>"") {?>bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><? print"<b>".$_GET["mesaj"]."</b>";?></td>

  </tr>

  <tr>

    <td height="25" colspan="7" align="right" class="basliksiyahkalin" ><table width="678" border="0" cellspacing="1" cellpadding="1">

      <tr>

        <td width="337"><form action="?page=kisi_listele&islem=ara" method="post" name="arama">Üye Adı : 

         <input name="ara" type="text" id="ara" value="Arama yapılacak üye adını giriniz." onfocus="if(this.value=='Arama yapılacak üye adını giriniz.') this.value='';" onblur="if(this.value=='') this.value='Arama yapılacak üye adını giriniz.';"/>&nbsp;&nbsp;&nbsp;<input name="button" type="submit" id="button" value="Ara"/>

         </form> </td>

        <td width="334">Gruplar :

          <select name="grupid" id="sinifi " onchange="MM_jumpMenu('parent',this,0)">
			<option value="0" <?php if($_GET["grupid"]==0){?>selected="selected"<?php }?>>Seçiniz</option>
            <option value="t" <?php if($_GET["grupid"]=='t'){?>selected="selected"<?php }?>>T&uuml;m&uuml;</option>

            <?

		$gruplar = mysql_query("select * from hgruplar", $veriyolu);

		while($satir=mysql_fetch_array($gruplar))

			{

?>

            <option value="<?=$satir["id"];?>" <? if($_GET["grupid"]==$satir["id"]){ echo "selected"; }?> >

              <?=$satir["grupadi"];?>

              </option>

            <?

			}

?>

          </select></td>

      </tr>

    </table></td>

    </tr>

  <tr>

    <td width="61" height="25" align="center" bgcolor="#000099" class="baslikbeyaz" >Sıra No</td>

    <td width="111" height="25" bgcolor="#000099" class="baslikbeyaz" >  Adı</td>

    <td width="111" bgcolor="#000099" class="baslikbeyaz" >Adı</td>

    <td width="285" bgcolor="#000099" class="baslikbeyaz" >Ünvanı</td>

    <td height="25" colspan="3" bgcolor="#000099" class="baslikbeyaz" >&nbsp;&nbsp; İşlemler</td>

  </tr>
</thead>
<tbody>
<?

$renk=0;

$sayi=1;

	

	

		

				while($satir=mysql_fetch_array($kayitlar))

					{

					

?>

  <tr id="arrayorder_<?php echo $satir['id']; ?>">

    <td align="center" class="baslikgri12px"><?php echo $satir['sirano']; ?></td>

    <td class="baslikgri12px"><img src="../images/kisiler/<?=$satir["resim"];?>" width="100" /></td>

    <td class="baslikgri12px"><?=$satir["adi"];?></td>

    <td class="baslikgri12px"><?=$satir["unvan"];?></td>

	<td width="31" align="center" class="baslikgri12px"> <a href="#"><img src="images/move.png" width="16" height="16" border="0" title="<?=$satir["baslik"];?> Başlıklı kaydın sırasını değiştirir."></a></td>
	
    <td width="31" align="center" class="baslikgri12px"> <a href="?page=kisi_goruntule&islem=goster&id=<?=$satir["id"];?>  "><img src="images/edit.png" width="16" height="16" border="0" title="<?=$satir["adi"];?> Başlıklı kaydı değiştir."></a></td>

    <td width="34" align="center" class="baslikgri12px"><a href="javascript:sil('<?=$satir["adi"]; ?>','<?=$satir["id"]; ?>')"><img src="images/delete2.png" width="16" height="16" border="0"  title="<?=$satir["adi"]?> Başlıklı kaydı sil" /></a></td>

  </tr>

<?					

$renk++;	

$sayi++;

					}

?>

  <tr >

    <td height="1" colspan="7" align="center" bgcolor="#808080"></td>

  </tr>

  <tr >

    <td height="30" colspan="7" align="center" class="baslikgri12px">

    <table width="300" border="0" cellpadding="0" cellspacing="0" class="baslikgri12px">

      <tr>

        <td align="center"><table border="0" cellpadding="2" cellspacing="2">

          <tr>

            <?



if($count > $perpage) : $x = 2; // akrif sayfadan &ouml;nceki/sonraki sayfa g&ouml;sterim sayısı 

	$lastP = ceil($count/$perpage); 



	// sayfa 1'i yazdır 

	if($page==1) 

		echo "<td width=21 height=22 class=\"ThisPage\" background=\"images/kutu.png\">1</td>"; 

	else 

		echo "<td width=21 height=22><a href=\"?page=kisi_listele&pagesi=1\">1</a></td>"; 

		

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

				echo "<td width=21 height=22  ><a href=\"?page=kisi_listele&pagesi=$i\">$i</a></td>"; 

			if($i==$lastP) 

				break; 

		} 

	

	

	// "..." veya son sayfa 

	if($page+$x < $lastP-1) 

		{ 

			echo "<td width=21 height=22 class=\"basliksiyahkalin\">...</td>"; 

			echo "<td width=21 height=22><a href=\"?page=kisi_listele&pagesi=$lastP\">$lastP</a></td>"; 

		} 

	elseif($page+$x == $lastP-1) 

		{ 

			echo "<td width=21 height=22><a href=\"?page=kisi_listele&pagesi=$lastP\">$lastP</a></td>"; 

		} 

endif; 

?>

          </tr>

        </table></td>

      </tr>

    </table></td>

    </tr>

</table>     

     

     

     

     </td>

     <td width="5" bgcolor="#F2F2F2"></td>

   </tr>

   

   <tr>

     <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

   </tr>

 </table>

<?

				}

}

else

{

	header("Location:http://www.buikad.org/yonetim/");

	

}

?>

 