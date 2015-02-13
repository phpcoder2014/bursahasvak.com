<?

if($_SESSION['buikadkk']){

?>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<link href="style/style.css" rel="stylesheet" type="text/css">


 <table width="700" border="0" cellspacing="0" cellpadding="0">

   <tr>

     <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

   </tr>

   <tr>

     <td width="5" bgcolor="#F2F2F2">&nbsp;</td>

     <td width="644" height="17">

       

       <table width="668" border="0" align="center" cellpadding="1" cellspacing="1">

         <tr>

           <td height="20" colspan="5" align="center" bgcolor="#999999" class="baslikbeyaz">E-BÜLTEN DETAYI</td>

         </tr>

         <tr>

           <td height="1" colspan="5" align="center" bgcolor="#808080"></td>

         </tr>

         <tr>

           <td height="20" colspan="5" align="center" bgcolor="#CCCCCC" <? if($_GET["mesaj"] <>"") {?>bgcolor="##CCCCCC" <? }?>class="basliksiyahkalin"><? print"<b>".$_GET["mesaj"]."</b>";?></td>

         </tr>

        
  

         <tr>

           <td height="1" colspan="5" align="center" bgcolor="#808080"></td>

         </tr>

         <tr>

           <td colspan="5" align="center" class="baslikgri12px">
           
<?php  $sorgula = mysql_query("SELECT * FROM ebulten_log WHERE id='$_GET[id]'");
$row = mysql_fetch_array($sorgula);
?>

<style type="text/css">
.ic{
	border: 1px inset;
    margin: 0;
    overflow: auto;
    padding: 6px;
    text-align: left;
    width: 640px;
}
</style>
           
<div class="ic">
<span class="basliksiyahkalin">Tarih</span> : <?php echo $row['tarih']; ?> <br />
<span class="basliksiyahkalin">Başlık</span> : <?php echo $row['baslik']; ?> <br />
<span class="basliksiyahkalin">Mail İçeriği</span> : <div class="ic" style="width:600px;"><?php echo $row['aciklama']; ?></div> <br />
<span class="basliksiyahkalin">Gönderen</span> : <?php echo $row['gonderen']; ?> <br /><br />
<span class="basliksiyahkalin">Gönderilenler</span> : <br />
<ul>
 <li><?php echo $row['gonderilen']; ?></li> 

</ul>
</div>
           
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