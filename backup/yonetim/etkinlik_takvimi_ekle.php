<?

if($_SESSION['buikadkk']){
	
	
	if($_POST AND !$_GET['id']):
			
		$x = mysql_query("INSERT INTO 
								etkinlik_takvimi 
								(baslik,icerik,tarih) 
							  VALUES 
								('".escape($_POST['baslik'])."','".escape($_POST['icerik'])."','".escape($_POST['tarih'])."')",$veriyolu) or die(mysql_error());
							
		if($x):
			
			echo '<script>alert("Etkinlik Takvimi Eklendi.")</script>';
			
		endif;

	endif;
	

	if($_POST AND $_GET['id']):
			
		$x = mysql_query("UPDATE etkinlik_takvimi SET
								baslik = '".escape($_POST['baslik'])."',
								icerik = '".escape($_POST['icerik'])."',
								tarih = '".escape($_POST['tarih'])."'
 						  WHERE id = ".escape($_GET['id'])."
							",$veriyolu) or die(mysql_error());
							
		if($x):
			
			echo '<script>alert("Etkinlik Takvimi Güncellendi.")</script>';
			
		endif;

	endif;
	
	
	if($_GET['id']):
	
		$etkinlik = @mysql_query("select * from etkinlik_takvimi where id=".$_GET["id"],$veriyolu);
	
		$kayit_satiri = @mysql_fetch_array($etkinlik);
		
	endif;

?>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<link href="style/style.css" rel="stylesheet" type="text/css">

	<!-- Tarih alaný için gerekli css ve js dosyalarý baþlangýcý--->

		<link type="text/css" rel="stylesheet" href="src/css/jscal2.css" />

		<script src="src/js/jscal2.js"></script>

		<script src="src/js/lang/tr.js"></script>

	<!-- Tarih alaný için gerekli css ve js dosyalarý bitiþi--->

<form action="index.php?page=etkinlik_takvimi_ekle<?php if($_GET['id']) echo '&id='.$_GET['id'];?>" method="post" enctype="multipart/form-data" name="form1">

  <table width="700" border="0" cellspacing="0" cellpadding="0">

    <tr>

      <td colspan="3" bgcolor="#F2F2F2" height="5"></td>

    </tr>

    <tr>

      <td width="5" bgcolor="#F2F2F2">&nbsp;</td>

      <td width="381" valign="top"><table width="671" border="0" align="center" cellpadding="1" cellspacing="1">

        <tr>

          <td height="20" colspan="3" align="center" bgcolor="#999999" class="baslikbeyaz">Etkinlik Takvimi Ekle</td>

        </tr>

        <tr>

          <td height="1" colspan="3" align="center" bgcolor="#808080"></td>

        </tr>

        <tr>

          <td height="20" colspan="3" align="center" <? if($_GET["mesaj"]<>""){?> bgcolor="#FF0000" <? }?>class="baslik_beyaz_14"><?=$_GET["mesaj"];?></td>

        </tr>

        <tr>

          <td width="131" height="13" align="left" class="basliksiyahkalin">Baþlýk</td>

          <td width="8" align="left" class="basliksiyahkalin">:</td>

          <td width="522" height="10" align="left"><input name="baslik" type="text" size="46" id="baslik" value="<?php echo $kayit_satiri['baslik'];?>"/></td>

        </tr>

		  <tr>

            <td align="left" valign="top" class="basliksiyahkalin">A&ccedil;ýklama </td>

		    <td align="left" valign="top" class="basliksiyahkalin">:</td>

		    <td align="left">
			<?php
                        
            $oFCKeditor = new FCKeditor('icerik') ;
            
            $oFCKeditor->BasePath = 'fckeditor/' ;
            
            $oFCKeditor->Value = $kayit_satiri['icerik'];
            
            $oFCKeditor->Create() ;
            
            ?>
            </td>

	      </tr>

        <tr>

          <td align="left" class="basliksiyahkalin">Tarih</td>

          <td align="left" class="basliksiyahkalin">:</td>

          <td align="left"><input id="f_rangeStart" name="tarih" size="15" readonly="readonly" value="<?php echo $kayit_satiri['tarih'];?>"/>

            <img src="images/data.png" name="f_rangeStart_trigger" id="f_rangeStart_trigger" /> &nbsp; </img>

            <button id="f_clearRangeStart" onclick="clearRangeStart()">Sil</button>

            <script type="text/javascript">

                  new Calendar({

                          inputField: "f_rangeStart",

                          dateFormat: "%Y-%m-%d",

                          trigger: "f_rangeStart_trigger",

                          bottomBar: false,

                          onSelect: function() {

                                  var date = Calendar.intToDate(this.selection.get());

                                  LEFT_CAL.args.min = date;

                                  LEFT_CAL.redraw();

                                  this.hide();

                          }

                  });

                  function clearRangeStart() {

                          document.getElementById("f_rangeStart").value = "";

                          LEFT_CAL.args.min = null;

                          LEFT_CAL.redraw();

                  };

                </script></td>

        </tr>

        <tr>
          
          <td colspan="3">&nbsp;</td>
          
        </tr>

        <tr>

          <td colspan="3" align="center"><input type="button" name="button" id="button" value="Kaydet" onclick="formgonder()" />

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

<script type="text/javascript">

function formgonder(){
	
	if(jQuery('#baslik').val() == ''){
		
		alert("Baþlýk alanýný boþbýraktýnýz")
			
	}
	
	else if((FCKeditorAPI.GetInstance("icerik") == '')){
		
		alert("Ýçerik alanýný boþ býraktýnýz")
		
	}
	
	else if((jQuery('#f_rangeStart').val() == '')){
		
		alert("Tarih alanýný boþ býraktýnýz")		
		
	}
	
	else{
		
		document.forms.form1.submit()
		
	}
	
	
}

</script>

<?

}

else

{

	header("Location:http://www.buikad.org/yonetim/");

	

}

?>