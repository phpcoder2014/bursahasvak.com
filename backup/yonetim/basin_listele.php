<?

if($_SESSION['buikadkk']){

?>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="style/style.css" rel="stylesheet" type="text/css">



<script language="javascript1.2">

function sil(baslik,id)  

	{  

		answer = confirm("Dikkat! \" "+baslik+" \" silmek üzeresiniz!")  

		if (answer ==1)  

			{  

				location = "?page=basin_goruntule&islem=sil&id="+id

			}  

	} 

</script>
<script type="text/javascript">
$(document).ready(function(){ 	
	
	$(function() {
	$("table tbody").sortable({ opacity: 0.8, cursor: 'move', update: function() {
			
			var order = $(this).sortable("serialize") + '&mode=haber_listele'; 
			$.post("updateList.php", order, function(theResponse){}); 															 
		}								  
		});
	});

});	
</script>


<?

	$page=$_GET["pagesi"];  

	if ($page <> "" && !ctype_digit($page))

		{

			echo "<script>self.location = \"index.php?page=uyari&link=".$_SERVER['REQUEST_URI']."\"</script>";

		}

	

	$perpage=25;



	if (!$page) 

		$page=1; 

		

	$count = mysql_num_rows(mysql_query("select * from basinlar order by tarih desc", $veriyolu));

	

	$totalPage = ceil(($count/$perpage));



	$renk=0;



	$sql_cumlesi="select * from basinlar order by tarih desc LIMIT ".((intval($page)*25)-25).", $perpage";

	$kayitlar= mysql_query($sql_cumlesi, $veriyolu);

			

	$sayac=mysql_num_rows($kayitlar);

			

	if ($sayac < 1)

		{

			echo "Veri Tabanımızda Kayıtlı Basın Bulunmamaktadır..."

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

     <td width="5" bgcolor="#F2F2F2">&nbsp;</td>

     <td width="644" height="17">

       

       <table width="668" border="0" align="center" cellpadding="1" cellspacing="1">

         <tr>

           <td height="20" colspan="5" align="center" bgcolor="#999999" class="baslikbeyaz">BASINLARIN LİSTESİ</td>

         </tr>

         <tr>

           <td height="1" colspan="5" align="center" bgcolor="#808080"></td>

         </tr>

         <tr>

           <td height="20" colspan="5" align="center" <? if($_GET["mesaj"] <>"") {?>bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><? print"<b>".$_GET["mesaj"]."</b>";?></td>

         </tr>

         <tr>

           <td width="37" height="25" align="center" bgcolor="#000099" class="baslikbeyaz" >#</td>

           <td width="83" bgcolor="#000099" class="baslikbeyaz" >&nbsp;&nbsp; Tarih</td>

           <td width="473" height="25" bgcolor="#000099" class="baslikbeyaz" >&nbsp;&nbsp; Başlık</td>

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

           <td width="31" align="center" class="baslikgri12px"> <a href="?page=basin_goruntule&islem=goster&id=<?=$satir["id"];?>">
		   <img src="images/edit.png" width="16" height="16" border="0" title="<?=$satir["baslik"];?> Başlıklı kaydı değiştir."></a></td>

           <td width="28" align="center" class="baslikgri12px"><a href="?page=basin_goruntule&islem=sil&id=<?=$satir["id"];?>">
		   <img src="images/delete2.png" width="16" height="16" border="0"  title="<?=$satir["baslik"]?> Başlıklı kaydı sil" /></a></td>

         </tr>

         <?					

$renk++;	

$sayi++;

					}

?>

         <tr >

           <td height="1" colspan="5" align="center" bgcolor="#808080"></td>

         </tr>

         <tr >

           <td height="30" colspan="5" align="center" class="baslikgri12px"><table width="300" border="0" cellpadding="0" cellspacing="0" class="baslikgri12px">

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

		



				

		

?>

 <?

}

else

{

	header("Location:http://www.buikad.org/yonetim/");

	

}

?>