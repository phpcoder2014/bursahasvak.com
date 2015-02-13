<?
if($_SESSION['buikadkk']){
?>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<link href="style/style.css" rel="stylesheet" type="text/css">

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore)
{ //v3.0
  eval(targ+".location='?page=kisi_listele&grupid="+selObj.options[selObj.selectedIndex].value+"'");
  if (restore)
     selObj.selectedIndex=0;
}

function sil(baslik,id,resim1)  
	{  
		answer = confirm("Dikkat! \" "+baslik+" \" silmek üzeresiniz!")  
		if (answer ==1)  
			{  
				location = "?page=kisi_goruntule&islem=sil&id="+id
			}  
	} 
	//-->
</script>

<?
	if ($_GET["grupid"] != "" and !ctype_digit($_GET["grupid"]))
		{
			/*
			Gelen id tamsayı değil ise hata verdir
			*/			
			echo "<script>self.location = \"index.php?page=uyari&link=".$_SERVER['REQUEST_URI']."\"</script>";
		}
		
	if ($_GET["grupid"]!="")
		{
			if ($_GET["grupid"] != 0)
				{
					$sorgu=" where grupid='".$_GET["grupid"]."'";
				}
		}
	else
		{
			$sorgu="";
		}

				
	$page=$_GET["pagesi"];  
	if ($page <> "" && !ctype_digit($page))
		{
			echo "<script>self.location = \"index.php?page=uyari&link=".$_SERVER['REQUEST_URI']."\"</script>";
		}
	
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
  <tr>
    <td height="20" colspan="5" align="center" bgcolor="#999999" class="baslikbeyaz">KİŞİLER LİSTESİ</td>
  </tr>
    <tr>
    <td height="1" colspan="5" align="center" bgcolor="#808080"></td>
  </tr>
  <tr>
    <td height="20" colspan="5" align="center" bgcolor="#CCCCCC" <? if($_GET["mesaj"] <>"") {?>bgcolor="#CCCCCC" <? }?>class="basliksiyahkalin"><? print"<b>".$_GET["mesaj"]."</b>";?></td>
  </tr>
  <tr>
    <td height="25" colspan="5" align="right" class="basliksiyahkalin" >Gruplar : 
      <select name="grupid" id="sinifi " onChange="MM_jumpMenu('parent',this,0)">
        <option value="0" selected="selected">T&uuml;m&uuml;</option>

<?
		$gruplar = mysql_query("select * from hgruplar", $veriyolu);
		while($satir=mysql_fetch_array($gruplar))
			{
?>
        <option value="<?=$satir["id"];?>" <? if($_GET["grupid"]==$satir["id"]){ echo "selected"; }?> ><?=$satir["grupadi"];?></option>
<?
			}
?>
      </select></td>
    </tr>
  <tr>
    <td width="61" height="25" align="center" bgcolor="#000099" class="baslikbeyaz" >Sıra No</td>
    <td width="223" height="25" bgcolor="#000099" class="baslikbeyaz" >  Adı</td>
    <td width="285" bgcolor="#000099" class="baslikbeyaz" >G&ouml;revi</td>
    <td height="25" colspan="2" bgcolor="#000099" class="baslikbeyaz" >&nbsp;&nbsp; İşlemler</td>
  </tr>
<?
$renk=0;
$sayi=1;
				while($satir=mysql_fetch_array($kayitlar))
					{
?>
  <tr <?=renk($renk);?>>
    <td align="center" class="baslikgri12px"><?=$satir["sirano"];?></td>
    <td class="baslikgri12px"><?=$satir["adi"];?></td>
    <td class="baslikgri12px"><?=$satir["gorevi"];?></td>
    <td width="31" align="center" class="baslikgri12px"> <a href="?page=kisi_goruntule&islem=goster&id=<?=$satir["id"];?>  "><img src="images/edit.png" width="16" height="16" border="0" title="<?=$satir["adi"];?> Başlıklı kaydı değiştir."></a></td>
    <td width="34" align="center" class="baslikgri12px"><a href="javascript:sil('<?=$satir["adi"]; ?>','<?=$satir["id"]; ?>')"><img src="images/delete2.png" width="16" height="16" border="0"  title="<?=$satir["adi"]?> Başlıklı kaydı sil" /></a></td>
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
    <td height="30" colspan="5" align="center" class="baslikgri12px">
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
	header("Location:http://www.sanalnet.com/sip/");
	
}
?>
 