<?

if($_SESSION['buikadkk']){

?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<style type="text/css">
.scrollbox {
	border: 1px solid #CCCCCC;
	width: 350px;
	background: #FFFFFF;
	overflow-y: scroll;
}
.scrollbox img {
	float: right;
	cursor: pointer;
}

.scrollbox div {
	padding: 3px;
}
.scrollbox div input {
	margin: 0px;
	padding: 0px;
	margin-right: 3px;
}
.scrollbox div.even {
	background: #FFFFFF;
}
.scrollbox div.odd {
	background: #E4EEF7;
}

</style>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="style/style.css" rel="stylesheet" type="text/css">

	<!-- Tarih alan? i?in gerekli css ve js dosyalar? ba?lang?c?--->

		<link type="text/css" rel="stylesheet" href="src/css/jscal2.css" />

		<script src="src/js/jscal2.js"></script>

		<script src="src/js/lang/tr.js"></script>

	<!-- Tarih alan? i?in gerekli css ve js dosyalar? biti?i--->

<?php if ($_GET["islem"]=="kaydet2"){ 


				$email		= @$_POST['grupid'];
				$gonderen	= $_POST['gonderen'];
				$mesaj		= str_replace("'",'"',$_POST['mesaj']);
				$baslik 	= $_POST['baslik'];
				$tarih		= date("Y")."-".date("m")."-".date("j")." ".date("H").":".date("i").":".date("s");
	foreach ($email as $m){
		$emaillist .= $m."<br>";
	}
	$ebulten_log	= "insert into ebulten_log (tarih, baslik, aciklama, gonderen, gonderilen) values ('".$tarih."','".$baslik."','".$mesaj."','".$gonderen."','".$emaillist."')";

	$sonuc			=	mysql_query($ebulten_log,$veriyolu);

					$sonid=mysql_insert_id($veriyolu);
	foreach ($email as $m){
			$kime2 =$m;												
			$kime  =$gonderen;
			$fromName2="Buikad";
			//$Konu2="Buikad | Bursa İş Kadınları ve Yöneticileri Derneği";
			$Konu2 =$baslik;
			$headers .= "From: ".$fromName2." <".$kime.">\n"; 
			$headers .= "Content-type:text/html; charset=\"iso-8859-9\"\n";
			$headers .= "Content-Type:text/html; charset=\"windows-1254\"\n";
			$headers .= "Content-Transfer-Encoding: 8bit\n";	
	
			$mesaj2	  = $mesaj.'
		<p>&nbsp;</p>
		<p style="float:right; font-size:9px;"><a style="text-decoration:none; color:#ccc;" href="http://www.bursahasvak.com/abonelik_iptali.php?id='.md5($m).'">Abonelikten çıkmak için tıklayınız</a></p>
		';	
			mail($kime2, $Konu2, $mesaj2,$headers);			
		
	}
				
if(!empty($email)){


		echo "<script>self.location = \"index.php?page=e_bulten&islem=goster&mesaj=E-Bülten Başarıyla Gönderildi!\"</script>";
			
				//g?nder
				
				//if gonder olmussa
}
else{
	echo "<script>self.location = \"index.php?page=e_bulten&islem=goster&mesaj=Gönderilecek Kişileri Seçmediniz!\"</script>";
}
} ?>
	

<?php if ($_GET["islem"]=="kaydet"){	
	
	
				$grupid = @$_POST['grupid'];
				$bulten = $_POST['bulten'];
				$a = '';
				foreach($grupid as $grup){
						$a .= $grup.',';
				}
									
					if ($grupid=="" and $bulten==""){
						echo "<script>self.location = \"index.php?page=e_bulten&islem=goster&mesaj=Grup veya Bülten Abonesi Seçmediniz!\"</script>";
					}
					
					else{
						echo "<script>self.location = \"index.php?page=e_bulten&islem=sec&bulten=".$bulten."&grupid=".$a."\"</script>";
					}
			
		}
		
		
if ($_GET["islem"]=="sec"){
$grupid =	$_GET['grupid'];
$bulten =	$_GET['bulten'];
		?> 

<form action="index.php?page=e_bulten&islem=kaydet2" method="post">

  <table width="700" border="0" cellspacing="0" cellpadding="0">

    <tr>

      <td colspan="3" bgcolor="#F2F2F2" height="5"></td>

    </tr>

    <tr>

      <td width="5" bgcolor="#F2F2F2">&nbsp;</td>

      <td width="381" valign="top"><table width="671" border="0" align="center" cellpadding="1" cellspacing="1">

        <tr>

          <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">BÜLTEN GÖNDER 2. Aşama</td>

        </tr>

        <tr>

          <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

        </tr>

        <tr>

          <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

        </tr>
<?php $grup2 = explode(',',$grupid);
foreach ($grup2 as $grup){
	$sorgula = mysql_query("SELECT * FROM hgruplar WHERE id='$grup'");
	if(mysql_num_rows($sorgula) > 0){
	$row = mysql_fetch_array($sorgula); ?>
        <tr>

          <td width="131" height="13" align="left" class="basliksiyahkalin">Gruplar - <?php echo $row['grupadi']; ?></td>

          <td width="8" align="left" class="basliksiyahkalin">:</td>

          <td width="522" height="10" align="left" class="baslikgri12px">
		  <div class="scrollbox">
		  <?php 		  
		 	$class = 'odd'; 
			if($_GET["bulten"]=="evet"){
				$bulten=1;
			}else{
				$bulten=0;
			}
			$sorgu = mysql_query("SELECT * FROM kisiler WHERE grupid='$row[id]' AND bulten='".$bulten."' ORDER BY eposta");
            while($row = mysql_fetch_array($sorgu)){
				
				
                $class = ($class == 'even' ? 'odd' : 'even');
                echo '<div class="'.$class.'">';                  
                echo '<input type="checkbox" name="grupid[]" value="'.$row['eposta'].'"  />'.$row['eposta'].'-'.$row['adi'];
                echo '</div>';
			}
		  
		  ?>
		</div>
        <a onclick="$(this).parent().find(':checkbox').attr('checked', true);">Tümünü Seç</a> / <a onclick="$(this).parent().find(':checkbox').attr('checked', false);">Tüm Seçimi Kaldır</a>
        </td>

        </tr>
<?php }} ?>
<?php if($bulten == 'evet'){ ?>
        <tr>

          <td height="13" align="left" class="basliksiyahkalin">Bülten Aboneleri</td>

          <td align="left" class="basliksiyahkalin">:</td>

          <td height="10" align="left" class="baslikgri12px">
		  <div class="scrollbox">
		  <?php 		  
		 	$class = 'odd'; 
			$sorgu = mysql_query("SELECT * FROM ebulten WHERE durum = '1' ORDER BY eposta");
            while($row = mysql_fetch_array($sorgu)){
				
				
                $class = ($class == 'even' ? 'odd' : 'even');
                echo '<div class="'.$class.'">';                  
                echo '<input type="checkbox" name="grupid[]" value="'.$row['eposta'].'"  />'.$row['eposta'].'-'.$row['ad'].' '.$row['soyad'];
                echo '</div>';
			}
		  
		  ?>
		</div>
        <a onclick="$(this).parent().find(':checkbox').attr('checked', true);">Tümünü Seç</a> / <a onclick="$(this).parent().find(':checkbox').attr('checked', false);">Tüm Seçimi Kaldır</a>
        </td>

        </tr>
<?php } ?>
        <tr>

          <td width="131" height="13" align="left" class="basliksiyahkalin">Mail Başlığı </td>

          <td width="8" align="left" class="basliksiyahkalin">:</td>

          <td width="522" height="10" align="left"><input name="baslik" type="text" size="46"/></td>

        </tr>
        
         <tr>

            <td align="left" valign="top" class="basliksiyahkalin">Açıklama </td>

		    <td align="left" valign="top" class="basliksiyahkalin">:</td>

		    <td align="left" valign="top"><?php

$oFCKeditor = new FCKeditor('mesaj') ;

$oFCKeditor->BasePath = 'fckeditor/' ;

$oFCKeditor->Value = '' ;

$oFCKeditor->Create() ;

?></td>

	      </tr>
        
        <tr>
          <td height="13" align="left" class="basliksiyahkalin">Gönderilme işleminde Gözükecek Eposta Adresi</td>
          <td align="left" class="basliksiyahkalin">:</td>
          <td height="10" align="left" class="baslikgri12px"><p>
            <input name="gonderen" type="radio" value="gsekreter@bursahasvak.com" />
            gsekreter@bursahasvak.com </p>
            <p><input name="gonderen" type="radio" value="iletisim@bursahasvak.com" checked="checked" />
            iletisim@bursahasvak.com</p></td>
        </tr>


        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          
          <td colspan="3">&nbsp;</td>
          
        </tr>

        <tr>

          <td colspan="3" align="center"><input type="submit" name="button" id="button" value="Kaydet" />

            <input type="reset" name="button2" id="button2" value="Temizle" /></td>

        </tr>

        <tr>

          <td colspan="3" align="center">&nbsp;</td>

        </tr>

      </table></td>

      <td width="5" bgcolor="#F2F2F2">&nbsp;</td>

    </tr>

    <tr>

      <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

    </tr>

  </table>

</form>
<?php } ?>

<?php 
if ($_GET["islem"]=="goster")

		{?>

<form action="index.php?page=e_bulten&islem=kaydet" method="post">

  <table width="700" border="0" cellspacing="0" cellpadding="0">

    <tr>

      <td colspan="3" bgcolor="#F2F2F2" height="5"></td>

    </tr>

    <tr>

      <td width="5" bgcolor="#F2F2F2">&nbsp;</td>

      <td width="381" valign="top"><table width="671" border="0" align="center" cellpadding="1" cellspacing="1">

        <tr>

          <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">BÜLTEN GÖNDER</td>

        </tr>

        <tr>

          <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

        </tr>

        <tr>

          <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="basliksiyahkalin"><?=$_GET["mesaj"];?></td>

        </tr>

        <tr>

          <td height="13" align="left" class="basliksiyahkalin">Gruplar</td>

          <td align="left" class="basliksiyahkalin">:</td>

          <td height="10" align="left" class="baslikgri12px">
		  <div class="scrollbox">
		  <?php 		  
		 	$class = 'odd'; 
			$sorgu = mysql_query("SELECT * FROM hgruplar");
            while($row = mysql_fetch_array($sorgu)){
				
				
                $class = ($class == 'even' ? 'odd' : 'even');
                echo '<div class="'.$class.'">';                  
                echo '<input type="checkbox" name="grupid[]" value="'.$row['id'].'"  />'.$row['grupadi'];
                echo '</div>';
			}
		  
		  ?>
		</div>
        <a onclick="$(this).parent().find(':checkbox').attr('checked', true);">Tümünü Seç</a> / <a onclick="$(this).parent().find(':checkbox').attr('checked', false);">Tüm Seçimi Kaldır</a>
        </td>

        </tr>

        <tr>

          <td width="131" height="13" align="left" class="basliksiyahkalin">Bülten Aboneleri</td>

          <td width="8" align="left" class="basliksiyahkalin">:</td>

          <td width="522" height="10" align="left"><input type="checkbox" name="bulten" value="evet"  /> Evet</td>

        </tr>

        <tr>
          
          <td colspan="3">&nbsp;</td>
          
        </tr>

        <tr>

          <td colspan="3" align="center"><input type="submit" name="button" id="button" value="Kaydet" />

            <input type="reset" name="button2" id="button2" value="Temizle" /></td>

        </tr>

        <tr>

          <td colspan="3" align="center">&nbsp;</td>

        </tr>

      </table></td>

      <td width="5" bgcolor="#F2F2F2">&nbsp;</td>

    </tr>

    <tr>

      <td height="5" colspan="3" bgcolor="#F2F2F2"></td>

    </tr>

  </table>

</form>


<center><?php echo @$_GET["mesaj"]; ?></center>


<?php } ?>
<?
mysql_free_result($sorgu);
}

else

{

	header("Location:http://www.buikad.org/yonetim/");

	

}

?>