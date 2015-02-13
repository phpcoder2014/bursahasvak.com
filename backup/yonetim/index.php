<?

session_start();

ob_start();

include("../includes/config.php");

include("../includes/fonk.php");

include("fckeditor/fckeditor.php");

$islem=$_GET["islem"];





if($islem=="gir")

	{	



		$kimlik = $_POST['user'];

		$sifre = sha1($_POST['sifre']);

		

		$oturum_sql = sprintf(

		"SELECT *

		 FROM nhup

		 WHERE nhu = '%s' AND nhp = '%s'",

		 mysql_real_escape_string($kimlik, $veriyolu),

		 mysql_real_escape_string($sifre, $veriyolu)

		);

		$oturum_sonuc = mysql_query($oturum_sql, $veriyolu);

		$oturum_toplam = mysql_num_rows($oturum_sonuc);

		$oturum_satir = mysql_fetch_assoc($oturum_sonuc);

		

		if($oturum_toplam == 1){

			if(!isset($_SESSION)){

				session_start();

				}

			$_SESSION['buikadkk'] = $oturum_satir['nhu'];

			header("Location: index.php");

		} else {

			header("Location: index.php?ky=1");

		}

	}

	



if($_SESSION['buikadkk'])

	{

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>

<link href="style/style.css" rel="stylesheet" type="text/css" />

<style type="text/css">

<!--

a:link {

	text-decoration: none;

}

a:visited {

	text-decoration: none;

}

a:hover {

	text-decoration: none;

	color:#000000;

}

a:active {

	text-decoration: none;

}

-->

</style>

<script type="text/javascript" src="js/stmenu.js"></script>

</head>

<body>



<table width="999" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td valign="top"><table border="0" cellpadding="1" cellspacing="1">

  <tr>

    <td width="106" valign="top">

   

<script type="text/javascript">

<!--

stm_bm(["menu57d8",900,"","blank.gif",0,"","",0,0,250,0,1000,0,0,0,"","",0,0,1,1,"default","hand","",1,25],this);

stm_bp("p0",[1,4,0,0,2,2,0,0,100,"",-2,"",-2,100,2,3,"#999999","#FFFFFF","",3,1,1,"#999999"]);

stm_ai("p0i0",[0,"HABERLER","","",-1,-1,0,"","_self","","","","",0,0,0,"","",0,0,0,0,1,"#CCCCCC",0,"#CCCCCC",0,"","",3,3,0,0,"#3399CC","#3399CC","#000000","#000000","bold 8pt 'Arial','Verdana'","bold 8pt 'Arial','Verdana'",0,0,"","","","",0,0,0],200,0);

stm_ai("p0i1",[6,1,"#999999","",0,0,0]);

stm_aix("p0i2","p0i0",[0,"   Haber  Ekle","","",-1,-1,0,"?page=haber_ekle","_self","","","","",0,0,0,"","",0,0,0,0,1,"#FFFFFF",0,"#DFDFDF",0,"","",3,3,1,1,"#FFFFFF","#666666","#333333","#333333","8pt 'Arial','Verdana'","8pt 'Arial','Verdana'"],200,0);

stm_aix("p0i3","p0i2",[0,"   Haberleri Listele","","",-1,-1,0,"?page=haber_listele"],200,0);

stm_aix("p0i4","p0i1",[]);

stm_aix("p0i19","p0i0",[0,"DUYURULAR"],200,0);

stm_aix("p0i20","p0i1",[]);

stm_aix("p0i21","p0i2",[0,"   Duyuru Ekle","","",-1,-1,0,"?page=duyuru_ekle"],200,0);

stm_aix("p0i22","p0i2",[0,"   Duyuru Listele","","",-1,-1,0,"?page=duyuru_listele"],200,0);

stm_aix("p0i19","p0i0",[0,"BASIN Bulteni"],200,0);

stm_aix("p0i20","p0i1",[]);

stm_aix("p0i21","p0i2",[0,"   Basin Ekle","","",-1,-1,0,"?page=basin_ekle"],200,0);

stm_aix("p0i22","p0i2",[0,"   Basin Listele","","",-1,-1,0,"?page=basin_listele"],200,0);

stm_aix("p0i23","p0i1",[]);

stm_aix("p0i19","p0i0",[0,"KISILER"],200,0);

stm_aix("p0i20","p0i1",[]);

stm_aix("p0i21","p0i2",[0,"   Kisi Ekle","","",-1,-1,0,"?page=kisi_ekle"],200,0);

stm_aix("p0i22","p0i2",[0,"   Kisi Listele","","",-1,-1,0,"?page=kisi_listele"],200,0);

stm_aix("p0i23","p0i2",[0,"   Uye Basvurulari","","",-1,-1,0,"?page=uye_listele"],200,0);

stm_aix("p0i24","p0i1",[]);

stm_aix("p0i19","p0i0",[0,"KISILERIN MESAJLARI"],200,0);

stm_aix("p0i20","p0i1",[]);

stm_aix("p0i21","p0i2",[0,"   Mesaj Ekle","","",-1,-1,0,"?page=mesaj_ekle"],200,0);

stm_aix("p0i22","p0i2",[0,"   Mesaj Listele","","",-1,-1,0,"?page=mesaj_listele"],200,0);

stm_aix("p0i23","p0i1",[]);

stm_aix("p0i19","p0i0",[0,"ETKINLIKLER"],200,0);

stm_aix("p0i20","p0i1",[]);

stm_aix("p0i21","p0i2",[0,"   Etkinlik Ekle","","",-1,-1,0,"?page=etkinlik_ekle"],200,0);

stm_aix("p0i22","p0i2",[0,"   Etkinlikleri Listele","","",-1,-1,0,"?page=etkinlik_listele"],200,0);

stm_aix("p0i23","p0i1",[]);

stm_aix("p0i19","p0i0",[0,"Etkinlik Takvimi"],200,0);

stm_aix("p0i20","p0i1",[]);

stm_aix("p0i21","p0i2",[0,"   Etkinlik Ekle","","",-1,-1,0,"?page=etkinlik_takvimi_ekle"],200,0);

stm_aix("p0i22","p0i2",[0,"   Etkinlikleri Listele","","",-1,-1,0,"?page=etkinlik_takvimi_listele"],200,0);

stm_aix("p0i23","p0i1",[]);

stm_aix("p0i19","p0i0",[0,"HASVAK Online Islemler"],200,0);

stm_aix("p0i20","p0i1",[]);

stm_aix("p0i22","p0i2",[0,"   Tuzuk Duzenle","","",-1,-1,0,"?page=tuzuk_goruntule&islem=goster"],200,0);

stm_aix("p0i23","p0i1",[]);

stm_aix("p0i22","p0i2",[0,"   Yonetim Kurulu Karar","","",-1,-1,0,"?page=ykarar_goruntule&islem=goster"],200,0);

stm_aix("p0i23","p0i1",[]);

stm_aix("p0i22","p0i2",[0,"   Komite Kararlari","","",-1,-1,0,"?page=komite_goruntule&islem=goster"],200,0);

stm_aix("p0i23","p0i1",[]);

//stm_aix("p0i22","p0i2",[0,"   Uye Listeleri Ve Ekleme","","",-1,-1,0,"?page=uye_goruntule&islem=goster"],200,0);

//stm_aix("p0i23","p0i1",[]);

stm_aix("p0i22","p0i2",[0,"   Hakkimizda","","",-1,-1,0,"?page=basindabiz_goruntule&islem=goster"],200,0);

stm_aix("p0i23","p0i1",[]);

stm_aix("p0i22","p0i2",[0,"   Reklam Yonetimi","","",-1,-1,0,"?page=reklam_goruntule&islem=goster"],200,0);

stm_aix("p0i23","p0i1",[]);



stm_aix("p0i19","p0i0",[0,"E-Bulten"],200,0);

stm_aix("p0i20","p0i1",[]);

stm_aix("p0i22","p0i2",[0,"   E-Bulten Gonder","","",-1,-1,0,"?page=e_bulten&islem=goster"],200,0);

stm_aix("p0i22","p0i2",[0,"   Gonderilmeyen E-Bultenleri Listele","","",-1,-1,0,"?page=ebulten_listele&islem=goster"],200,0);

stm_aix("p0i24","p0i0",[0,"DİĞER","","",-1,-1,0,"","_self","","","","",0,0,0,"","",0,0,0,0,1,"#FF0000",0,"#FF0000",0,"","",3,3,0,0,"#3399CC","#3399CC","#FFFFFF","#FFFFFF"],200,0);

stm_aix("p0i25","p0i1",[]);

stm_aix("p0i26","p0i2",[0,"    Sifre Degistir","","",-1,-1,0,"?page=sifre_degistir"],200,0);

stm_aix("p0i27","p0i2",[0,"    Guvenli Cikis","","",-1,-1,0,"?page=cikis"],200,0);

stm_ep();

stm_em();



//-->

</script>







    

    </td>

    <td width="10">&nbsp;</td>

    <td width="872" valign="top">

    

    <? 

		if($_GET["page"]==""){

	?>

                

		<table width="659" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="19">&nbsp;</td>

    <td width="640"><span class="hatamesaji">Hosgeldiniz!...</span></td>

  </tr>

  <tr>

    <td><span class="basliksiyahkalin">1-)</span></td>

    <td><span class="basliksiyahkalin">Resim ekleme b&ouml;l&uuml;mlerine .jpg, .jpeg ve .png uzantilari dosyalari atmaniz gerekmektedir.</span></td>

  </tr>

  <tr>

    <td><span class="basliksiyahkalin">2-)</span></td>

    <td class="basliksiyahkalin">Girilmesi zorunlu alanların girilmemesi durumunda veri kayit isleminiz gerceklestirmeyecektir.</td>

  </tr>

  <tr>

    <td><span class="basliksiyahkalin">3-)</span></td>

    <td><span class="basliksiyahkalin">islemlerinizi tamamladiktan sonra lutfen</span><span class="hatamesaji">DIGER ISLEMLER</span><span class="basliksiyahkalin"> b&ouml;l&uuml;m&uuml;nden </span><span class="hatamesaji">G&uuml;venli &Ccedil;ıkış</span><span class="basliksiyahkalin">'a tıklamalısınız. Aksi takdirde sitenize zarar verebilecek kişilerin saldırsına maruz kalabilirsiniz.</span></td>

  </tr>

  <tr>

    <td><span class="basliksiyahkalin">4-)</span></td>

    <td><span class="basliksiyahkalin">Sistem ile ilgili kayıt işlemlerindeki sorunlarda <a href="mailto:paneldestek@turkticaret.net" class="hatamesaji">paneldestek@turkticaret.net</a> adresine yazılı olarak bildiriminizi yapmanız &ouml;nemle rica olunur.</span></td>

  </tr>

        </table>



	<?

    		}

			/* Haber Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="haber_ekle"){ include("haber_ekle.php"); }

	if($_GET["page"]=="haber_listele"){ include("haber_listele.php"); }

	if($_GET["page"]=="haber_goruntule"){ include("haber_goruntule.php"); }


			/*Haber Dosyalarını Çağırma Bitişi   */

			

			/* Duyuru Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="duyuru_ekle"){ include("duyuru_ekle.php"); }

	if($_GET["page"]=="duyuru_listele"){ include("duyuru_listele.php"); }

	if($_GET["page"]=="duyuru_goruntule"){ include("duyuru_goruntule.php"); }

			/*Duyuru Dosyalarını Çağırma Bitişi   */

			

			/* Basın Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="basin_ekle"){ include("basin_ekle.php"); }

	if($_GET["page"]=="basin_listele"){ include("basin_listele.php"); }
	
	if($_GET["page"]=="basin_goruntule"){ include("basin_goruntule.php"); }


			/*Basın Dosyalarını Çağırma Bitişi   */	

			/* Üye Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="uye_listele"){ include("uye_listele.php"); }

			/*Üye Dosyalarını Çağırma Bitişi   */				

			

			/* Kişiler Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="kisi_ekle"){ include("kisi_ekle.php"); }

	if($_GET["page"]=="kisi_listele"){ include("kisi_listele.php"); }

	if($_GET["page"]=="kisi_goruntule"){ include("kisi_goruntule.php"); }

			/* Kişiler Dosyalarını Çağırma Bitişi   */	
			
			/* Kişi Mesajı Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="mesaj_ekle"){ include("mesaj_ekle.php"); }

	if($_GET["page"]=="mesaj_listele"){ include("mesaj_listele.php"); }

	if($_GET["page"]=="mesaj_goruntule"){ include("mesaj_goruntule.php"); }

			/* Kişi Mesajı Dosyalarını Çağırma Bitişi   */	
			
			
			

			/* PDF Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="pdf_ekle"){ include("pdf_ekle.php"); }

	if($_GET["page"]=="pdf_listele"){ include("pdf_listele.php"); }

	if($_GET["page"]=="pdf_goruntule"){ include("pdf_goruntule.php"); }

			/*PDF Dosyalarını Çağırma Bitişi   */	

			

			/* Etkinlik Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="etkinlik_ekle"){ include("etkinlik_ekle.php"); }

	if($_GET["page"]=="etkinlik_listele"){ include("etkinlik_listele.php"); }

	if($_GET["page"]=="etkinlik_goruntule"){ include("etkinlik_goruntule.php"); }
	
	
	if($_GET["page"]=="etkinlik_takvimi_ekle"){ include("etkinlik_takvimi_ekle.php"); }
	
	if($_GET["page"]=="etkinlik_takvimi_listele"){ include("etkinlik_takvimi_listele.php"); }

			/*Etkinlik Dosyalarını Çağırma Bitişi   */
			
			/* Üye Ziyaretleri Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="uye_ziyaretleri_ekle"){ include("uye_ziyaretleri_ekle.php"); }

	if($_GET["page"]=="uye_ziyaretleri_listele"){ include("uye_ziyaretleri_listele.php"); }

	if($_GET["page"]=="uye_ziyaretleri_goruntule"){ include("uye_ziyaretleri_goruntule.php"); }

			/*Üye Ziyaretleri Dosyalarını Çağırma Bitişi   */

			

			/* Proje Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="proje_ekle"){ include("proje_ekle.php"); }

	if($_GET["page"]=="proje_listele"){ include("proje_listele.php"); }

	if($_GET["page"]=="proje_goruntule"){ include("proje_goruntule.php"); }

			/*Proje Dosyalarını Çağırma Bitişi   */	

			

			/* Buikad Üyelik Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="buikad_uyelik_goruntule"){ include("buikad_uyelik_goruntule.php"); }

			/* Buikad Üyelik Dosyalarını Çağırma Bitişi   */	

			

			/* Günün Sözü Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="gunun_sozu_goruntule"){ include("gunun_sozu_goruntule.php"); }

			/* Günün Sözü Dosyalarını Çağırma Bitişi   */	

			

			/* Tüzük Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="tuzuk_goruntule"){ include("tuzuk_goruntule.php"); }
	
	
	if($_GET["page"]=="basindabiz_goruntule"){ include("basindabiz_goruntule.php"); }
	
	if($_GET["page"]=="reklam_goruntule"){ include("reklam_goruntule.php"); }

			/*Tüzük Dosyalarını Çağırma Bitişi   */	
			
			/* Yönetim Kurulu Karar Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="ykarar_goruntule"){ include("ykarar_goruntule.php"); }

			/*Yönetim Kurulu Karar Çağırma Bitişi   */	
			
			
			/* Komiteler Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="komite_goruntule"){ include("komite_goruntule.php"); }

			/* Komiteler Çağırma Bitişi   */	
			
			/* Uye Listeleme Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="uye_goruntule"){ include("uye_goruntule.php"); }

			/* Üye Listeleme Çağırma Bitişi   */	
			

			/* Çalışma Komitesi Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="calisma_goruntule"){ include("calisma_goruntule.php"); }

			/* Çalışma Komitesi Dosyalarını Çağırma Bitişi   */

			

			/* Komisyon Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="komisyon_goruntule"){ include("komisyon_goruntule.php"); }

	if($_GET["page"]=="komisyon_listele"){ include("komisyon_listele.php"); }

			/* Komisyon Dosyalarını Çağırma Bitişi   */	

			

			/* Reklam Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="sag_reklam_goruntule"){ include("sag_reklam_goruntule.php"); }

	if($_GET["page"]=="sag2_reklam_goruntule"){ include("sag2_reklam_goruntule.php"); }

	if($_GET["page"]=="sol1_reklam_goruntule"){ include("sol1_reklam_goruntule.php"); }

	if($_GET["page"]=="sol2_reklam_goruntule"){ include("sol2_reklam_goruntule.php"); }

	if($_GET["page"]=="sol3_reklam_listele"){ include("sol3_reklam_listele.php"); }

	if($_GET["page"]=="sol3_reklam_goruntule"){ include("sol3_reklam_goruntule.php"); }

	

			/* Reklam Dosyalarını Çağırma Bitişi   */	
			
			
			/* E-Bülten Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="e_bulten"){ include("e_bulten.php"); }

	if($_GET["page"]=="ebulten_listele"){ include("ebulten_listele.php"); }

	if($_GET["page"]=="ebulten_goruntule"){ include("ebulten_goruntule.php"); }

			/* E-Bülten Dosyalarını Çağırma Bitişi   */			

				

			/* Diğer Dosyalarını Çağırma Başlangıcı   */

	if($_GET["page"]=="uyari"){ include("uyari.php"); }

	if($_GET["page"]=="sifre_degistir"){ include("sifre_degistir.php"); }

	if($_GET["page"]=="cikis"){ include("cikis.php"); }

			/* Diğer Dosyalarını Çağırma Bitişi   */		

	?>

    

    </td>

  </tr>

</table></td>

  </tr>

  <tr>

  <td align="center" class="basliksiyahkalin" colspan="3"><table width="543" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td width="543" class="basliksiyahkalin">Yazilim ve Tasarim : <a href="http://www.turkticaret.net" class="hatamesaji">Web Tasarim</a> tarafindan hazirlanmistir.<span class="hatamesaji"> V 2.0</span></td>

  </tr>

</table>

</td>

  </tr>

</table>



<?



	}

else

	{

	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta charset="windows-1254">

<title>HASVAK Y�netim Paneli</title>

<link href="../style/style.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Niconne|Felipa|Oxygen&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

<style type="text/css">

body {

	background-image: url(images/index_01.jpg);

}

.beyazyazi {

	font-family: Verdana, Geneva, sans-serif;

	font-size: 12px;

	font-style: normal;

	font-weight: bold;

	color: #FFF;

}

.resim {

	text-decoration: none;

	border-top: 1px solid #CCCCCC;

	border-right: 2px inset #333333;

	border-bottom: 2px inset #666666;

	border-left: 1px solid #CCCCCC;

}

</style>

<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>

<link href="style/style.css" rel="stylesheet" type="text/css">

</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table width="998" height="434" border="0" align="center" cellpadding="0" cellspacing="0"  class="yazi">

  <tr>

    <td height="31" colspan="3" valign="top">&nbsp;</td>

  </tr>

  <tr>

    <td width="10" rowspan="2"><span class="beyazyazi"></span></td>

  <td width="972" align="right" valign="top"><span class="beyazyazi" style='font-family:Oxygen, sans-serif;'><b>Bug�n :</b> &nbsp;

        <?=date("d.m.Y");?>

    </span></td>

    <td width="18" rowspan="2" align="right" valign="top">&nbsp;</td>

  </tr>

  <tr>

    <td height="355" align="center" valign="top"><table width="492" height="292" border="0" cellpadding="0" cellspacing="0" class="yazi">

        <tr>

          <td height="20" align="right" class="icerik">&nbsp;</td>

        </tr>

        <tr>

          <td width="492" height="20" align="right" class="icerik"><b class="normal"></b></td>

        </tr>

        <tr>

          <td height="20" align="center">&nbsp;</td>

        </tr>

        <tr>

          <td height="20" class="basliksiyahkalin"><div align="center"><span class="basliksiyahkalin"><strong><h1 style='color:white; font-family:Oxygen, sans-serif;'>Bursa Hasvak</h1></strong></span></div></td>

        </tr>

        <tr>

          <td height="20" align="center" class="basliksiyahkalin"><span class="basliksiyahkalin"><strong class="basliksiyahkalin" style='font-family:Oxygen, sans-serif; color:white;'>Y�netim Paneli'ne Ho�geldiniz..</strong>
		  </span></td>

        </tr>

        <tr>

          <td height="18" align="center" class="basliksiyahkalin"><? echo $_REQUEST["hata"]?></td>

        </tr>

        <tr>

          <td height="134"  background="image/bg_uyelik.jpg" class="basliksiyahkalin">

            <form action="index.php?islem=gir" method="POST" name="frm">

              <table width="367" border="0" align="center" cellpadding="0" cellspacing="0" class="resim">
                <tr>
                  <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                  <td width="58" rowspan="2" class="beyazyazi"><img src="images/adminlogin.png" width="53" height="56"></td>
                  <td width="115" height="33" class="baslikgri"><span class="basliksiyahkalin"><strong style='font-family:Oxygen, sans-serif; color:#FFFFFF;'>Kullan�c� Ad�</strong></span></td>
                  <td width="186" class="baslikgri"><span class="beyazyazi">:</span>
				  <input name="user" type="text" class="basliksiyahkalin" size="25" id="user" style='font-family:Oxygen, sans-serif;' placeholder='Kullan�c� ad�n�z'></td>
                </tr>
                <tr>
                  <td class="baslikgri"><span class="basliksiyahkalin"><strong style='font-family:Oxygen, sans-serif; color:#FFFFFF;'>Parola</strong></span><span class="basliksiyahkalin">
				 </span><span class="basliksiyahkalin"></span></td>
                  <td class="baslikgri"><span class="beyazyazi">:&nbsp;</span><input name="sifre" style='font-family:Oxygen, sans-serif;' type="password" placeholder='Parolan�z' class="basliksiyahkalin" size="25" id="sifre"></td>
                </tr>
                <tr>
                  <td colspan="3" align="center" valign="top">&nbsp;</td>

                </tr>

                <tr>

                  <td colspan="3" align="center" valign="top"><input name="Submit" type="submit" style='font-family:Oxygen, sans-serif;' class="basliksiyahkalin" value="G�venli Giri�"></td>

                </tr>

              </table>

          </form>
		  </td>

        </tr>

        <tr>

          <td height="20" class="kirmizi">&nbsp;</td>

        </tr>

        <tr>

          <td height="20" class="kirmizi">&nbsp;</td>

        </tr>

    </table>

      <table width="90%" border="0" align="center" cellpadding="3" cellspacing="5">

  <tr>

    <td align="center" class="basliksiyahkalin" style='font-family:Oxygen, sans-serif;'>Yaz�l�m ve Tasar�m : <a href="http://www.turkticaret.net" class="hatamesaji"style='font-family:Oxygen, sans-serif;'>Web Tasar�m</a> taraf�ndan haz�rlanmaktad�r.<span class="hatamesaji"> V.1.9.10</span></td>

  </tr>

    </table></td>

  </tr>

  <tr>

    <td height="20" colspan="3" align="center" valign="top">&nbsp;</td>

  </tr>

</table>

</body>

</html>



<?

	}

ob_end_flush();

?>