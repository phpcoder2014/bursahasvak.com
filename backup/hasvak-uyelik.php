<?php include("includes/config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin5_turkish_ci" />
<title>T�rkiye Devlet Hastaneleri ve Hastalara Yard�m Vakf� Bursa �ubesi</title>
<meta name="description" content="T�rkiye Devlet Hastaneleri ve Hastalara Yard�m Vakfı HASVAK Bursa Şubesi" />
<meta name="keywords" content="HASVAK Bursa �ubesi hastalara yard�m vakf� devlet hastaneleri" />
<link href='http://fonts.googleapis.com/css?family=Oxygen:700,300,400&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<link href="css/hasvak-uyelik.css" rel="stylesheet" type="text/css" />
<link href="css/iletisim.css" rel="stylesheet" type="text/css" />
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
function uploadfile(obj){
$("#filename").html(obj.value);

}
</script>
</head>
<body>
	<div id="container">
		<div id="head">
			<div class="content">
				<div class="logo"><a href="index.php"><img src="images/hasvak-logo.jpg" width="1170" height="111" alt="Türkiye Devlet Hastaneleri ve Hastalara Yardım Vakfı Bursa Şubesi" title="Türkiye Devlet Hastaneleri ve Hastalara Yardım Vakfı Bursa Şubesi" /></a></div>
			</div>
		</div>
		<div id="menu">
			<ul class="menu">
				<li><a href="index.php">anasayfa</a></li>
				<li class="sub">
					<a href="hakkimizda.php">hakk�m�zda</a>
					<ul class="submenu">
						<li><a href="yonetim-kurulu.php">Y�netim Kurulu</a></li>
						<li><a href="tuzu.php">T�z�k</a></li>
						<li><a href="komiteler.php">Komiteler</a></li>
						<li><a href="hasvak-uyeleri.php">Hasvak �yeleri</a></li>
					</ul>
				</li>
				<li><a href="etkinlikler.php">etkinlikler</a></li>
				<li><a href="duyurular.php">duyurular</a></li>
				<li><a href="basinda-biz.php">bas�nda biz</a></li>
				<li><a class="active" href="hasvak-uyelik.php">hasvak �yelik</a></li>
				<li><a href="iletisim.php">ileti�im</a></li>
			</ul>
		</div>
		<div id="content">
			<div id="Pagecenter">
					<div class="topImg">
						<span>Hasvak �yelik</span>
						<img src="images/uyelik.jpg" width="850" height="200" alt="Hasvak �yelik" />
					</div>
					<div class="aboutText">
						<div class="conLeft">
							<!--div class="iltsmBilgi">
								<p>Ba�vuru ��in Gerekli Evraklar</p>
								<span>
									1 - �yelik Ba�vuru Formunun Doldurulmas�<br/>
									2 - �ye Olacak Ki�inin N�fus C�zdan�n�n Arkal� �nl� Fotokopisi <br/>
									3 - 2 Adet Vesikal�k Fotograf <br/>
									4 - E�itim Durumunu G�sterir Belge <br/>
									5 - Giri� Aidat� 700,00 TL. <br/>
									6 - Y�ll�k �ye Aidat� 300,00 TL.<br/><br/>

									�ye Ba�vuru Formunu indirmek i�in <a href="sozlesme.pdf"><b>t�klay�n�z</b></a><br/><br/>

									Yukar�da belirtilen evraklar tamamlanarak Genel sekreter adresine ileitilir.<br/><br/>
									Genel Sekreterlik E-posta Adresi : <b>hasvakbursasubesi@hotmail.com</b><br/><br/>

									Y�netim Kurulu toplanarak ba�vuruyu de�erlendirir, al�nan karar ile dernek �yeli�i ba�lar.<br/><br/>

									<b>Not :</b> �demeler �yelik kabul karar� al�nd�ktan sonra a�a��daki hesaplardan birine yap�l�r. �yelik giri�inin yap�ld��� y�l i�in aidat �denmesi gerekmektedir.<br/><br/>

									<b>HESAP ADI :</b> T�rkiye Devlet Hastaneleri ve Hastalara Yard�m Vakf�  <br/>
									<b>BANKA :</b> Garanti Bankas� <br/>
									<b>�UBE KODU :</b> 687 (G�r�kle �b.) <br/>
									<b>HESAP NO :</b> 6299706 <br/>
									<b>IBAN :</b> TR14 0006 2000 6870 0006 2997 06  <br/>
								</span>
							</div -->
						</div>
						<div class="conRight">
						
							<span>�yelik Formu Bildirimi</span>
							<table>
							<form method="post" name="iletisim" action="uyelikGonder.php" enctype="multipart/form-data">
								<tr>
									<td colspan="3">
										<img src="images/xls.png" />
										<div class="fileButton">
											<span>�yelik Formunuzu y�kleyin.</span>
											<div class="field">
												<label class="file-upload">
													<span><strong>Y�kle</strong></span>
													<input type="file" name="uploadfile2" onchange="uploadfile(this);" >
													
												</label>	
												<span style="position:relative; font-size:15px; top:-32px; left:85px;" id="filename">dosya se�ilmedi...</span>
											</div>						
										</div>
									</td>
									
								</tr>
								<tr>
									<td width="150">Ad�n�z - Soyad�n�z</td>
									<td>:</td>
									<td><input type="text" name="adsoyad"  placeholder="ad�n�z - soyad�n�z" /> </td>
								</tr>
								<tr>
									<td>E-posta Adresi</td>
									<td>:</td>
									<td><input type="text" name="eposta" placeholder="e-posta adresiniz" /> </td>
								</tr>
								<tr>
									<td>Telefon No</td>
									<td>:</td>
									<td><input type="text" name="tel"  placeholder="telefon numaran�z" /> </td>
								</tr>
								<tr>
									<td colspan="3" align="center"><input type="submit" class="submitBttn" name="submit" value="G�NDER"/> </td>
								</tr>
								</form>
							</table>
						</div>
					</div>
				</div>
			<div id="right">
				<div class="search">
					<input type="text" placeholder="aramak istedi�iniz kelime?" />
				</div>
				<div class="video">			
					<iframe id="webTvIframe" width="300" height="250" src="http://bursahasvak.web.tv/embed/xkyyph0h4m_/0" frameborder="0"></iframe>
				</div>
				<?php include("etkinlik_takvimi.php");?>
				<div class="ebulten">
					<div class="heading">
						<div class="heading-icon"><img src="images/icon-mailing-list.png" width="20" height="20" alt="" /></div>
						<h1>E-B�lten</h1>
					</div>
					<div class="content">
						<h2>E-B�lten listemize �ye olmak i�in a�a��daki formu doldurunuz.</h2>
						<form method="post" name="bulten" action="ebultenGonder.php">
						<input type="text" name="ad" placeholder="Ad�n�z" />
						<input type="text" name="soyad" placeholder="Soyad�n�z" />
						<input type="text" name="eposta" placeholder="E-Posta Adresiniz" />
						<input type="text" name="fadi" placeholder="Firma Adresi" />
						<div class="notice">*Ki�isel bilgileriniz gizli tutulacak, hi�bir �ekilde ���nc� �ah�slarla payla��lmayacakt�r.</div>
						<input type="submit" class="submitBttn" name="submit" value="G�nder" />
						</form>
					</div>
				</div>
				<div class="reklam">
				<?php
                $tuzuk_tablosu = @mysql_query("select * from reklam where id='1'",$veriyolu);
                $kayit_satiri = @mysql_fetch_array($tuzuk_tablosu);
				echo $kayit_satiri["aciklama"];
				?>
				</div>
			</div>
		</div>
		<div id="fmenu">
			<ul class="menu">
				<li><a href="index.php">anasayfa</a></li>
				<li><a href="hakkimizda.php">hakk�m�zda</a></li>
				<li><a href="etkinlikler.php">etkinlikler</a></li>
				<li><a href="duyurular.php">duyurular</a></li>
				<li><a href="basinda-biz.php">bas�nda biz</a></li>
				<li><a class="active" href="hasvak-uyelik.php">hasvak �yelik</a></li>
				<li><a href="iletisim.php">ileti�im</a></li>
			</ul>
		</div>
		<div id="foot">
			<div class="content">
			<div class="left">
				<div class="logo"> <a href="index.php"><img src="images/logo-footer.png" width="60" height="61" alt="Türkiye Devlet Hastaneleri ve Hastalara Yardım Vakfı Bursa Şubesi" title="Türkiye Devlet Hastaneleri ve Hastalara Yardım Vakfı Bursa Şubesi" /></a> </div>
				<div class="baslik">T�rkiye Devlet Hastaneleri ve Hastalara Yard�m Vakf�</div>
				<div class="alt-baslik">HASVAK Bursa �ubesi</div>
				</div>
				<div class="right">
					<ul class="social">
						<li><a target="new" title="HAVSAK Facebook Sayfas�" href="https://www.facebook.com/hasvak.bursa"><img src="images/social-facebook.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Twitter Hesab�" href="https://twitter.com/HasvakBursa"><img src="images/social-twitter.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Google+ Sayfas�" href="https://plus.google.com/108688824040389680435/"><img src="images/social-google.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK LinkedIn Sayfas�" href="#"><img src="images/social-linkedin.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Pinterest Sayfas�" href="#"><img src="images/social-pinterest.png" width="40" height="40" alt="" title="" /></a></li>
					</ul>
					<div class="copyright">Hasvak Bursa �ubesi � 2013, T�m Haklar� Sakl�d�r.</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
