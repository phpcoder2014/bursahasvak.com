<?php include("includes/config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=latin5_turkish_ci" />
		<title>T�rkiye Devlet Hastaneleri ve Hastalara Yard�m Vakf� Bursa �ubesi</title>
		<meta name="description" content="T�rkiye Devlet Hastaneleri ve Hastalara Yard�m Vakf� HASVAK Bursa �ubesi" />
		<meta name="keywords" content="HASVAK hasvak Bursa Şubesi hastalara yardım vakfı devlet hastaneleri" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:700,300,400&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href="css/default.css" rel="stylesheet" type="text/css" />
		<link href="css/iletisim.css" rel="stylesheet" type="text/css" />
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
					<li><a href="hasvak-uyelik.php">hasvak �yelik</a></li>
					<li><a href="iletisim.php" class="active">ileti�im</a></li>
				</ul>
			</div>
			<div id="content">
				<ul class="navMenu">
					<li><a href="#">Anasayfa ></a></li>
					<li class="navActive"><a href="#">ileti�im ></a></li>
				</ul>
					<div id="Pagecenter">
					<div class="topImg">
						<span>�leti�im</span>
						<img src="images/iletisim.png" width="850" height="200" alt="Etkinlikler" />
					</div>
					<div class="aboutText">
						<div class="conLeft">
							<iframe width="370" height="290" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=tr&amp;geocode=&amp;q=bursa&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=50.111473,107.138672&amp;ie=UTF8&amp;hq=&amp;hnear=Bursa,+T%C3%BCrkiye&amp;t=m&amp;ll=40.269441,29.061756&amp;spn=0.037984,0.063343&amp;z=13&amp;output=embed"></iframe>
							<div class="iltsmBilgi">
								<p>�leti�im Bilgileri</p>
								<span>�hsaniye Mah. ��lemeci Sok. As Mutiler Sitesi B Blok 19-A,  P.K : 16110 Nil�fer / Bursa</span>
								<div class="mail">
									<div class="mailIcon"></div>
									<span>iletisim@bursahasvak.com</span>
									<span>hasvakbursasubesi@hotmail.com</span>
									<span>facebook.com/hasvak.bursa</span>
									
								</div>
								<div class="telefon">
									<div class="telIcon"></div>
									<span></span>
									<span>0 224 249 35 23</span><br/>
									<span>twitter.com/HasvakBursa</span>
								</div>

							</div>
						</div>
						<div class="conRight">
							<span>�leti�im Formu</span>
							<table>
							<form method="post" name="bulten" action="iletisimGonder.php">
								<tr>
									<td width="150">Ad�n�z - Soyad�n�z</td>
									<td>:</td>
									<td><input type="text" name="adsoyad" placeholder="ad�n�z� ve soyad�n�z� yaz�n�z." /> </td>
								</tr>
								<tr>
									<td>E-posta Adresi</td>
									<td>:</td>
									<td><input type="text" name="eposta" placeholder="e-posta adresinizi yaz�n�z." /> </td>
								</tr>
								<tr>
									<td>Telefon No</td>
									<td>:</td>
									<td><input type="text" name="tel" placeholder="telefon numaran�z� yaz�n�z." /> </td>
								</tr>
								<tr>
									<td>Konu</td>
									<td>:</td>
									<td><input type="text" name="konu" placeholder="mesaj�n konusu" /> </td>
								</tr>
								<tr>
									<td>Mesaj</td>
									<td>:</td>
									<td><textarea name="mesaj"placeholder="mesaj�n�z� yaz�n�z." ></textarea></td>
								</tr>
								<tr>
									<td colspan="3" align="center">
									<input type="submit" class="submitBttn" name="submit" value="g�nder" />
									</td>
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
				<li><a href="hasvak-uyelik.php">hasvak �yelik</a></li>
				<li><a class="active" href="iletisim.php">ileti�im</a></li>
			</ul>
		</div>
		<div id="foot">
			<div class="content">
			<div class="left">
				<div class="logo"> <a href="index.php"><img src="images/logo-footer.png" width="60" height="61" alt="T�rkiye Devlet Hastaneleri ve Hastalara Yard�m Vakf� Bursa �ubesi" title="T�rkiye Devlet Hastaneleri ve Hastalara Yard�m Vakf� Bursa �ubesi" /></a> </div>
				<div class="baslik">T�rkiye Devlet Hastaneleri ve Hastalara Yard�m Vakf�</div>
				<div class="alt-baslik">HASVAK Bursa �ubesi</div>
				</div>
				<div class="right">
					<ul class="social">
						<li><a target="new" title="HAVSAK Facebook Sayfası" href="https://www.facebook.com/hasvak.bursa"><img src="images/social-facebook.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Twitter Hesabı" href="https://twitter.com/HasvakBursa"><img src="images/social-twitter.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Google+ Sayfası" href="https://plus.google.com/108688824040389680435/"><img src="images/social-google.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK LinkedIn Sayfası" href="#"><img src="images/social-linkedin.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Pinterest Sayfası" href="#"><img src="images/social-pinterest.png" width="40" height="40" alt="" title="" /></a></li>
					</ul>
					<div class="copyright">Hasvak Bursa �ubesi � 2013, T�m Haklar� sakl�d�r.</div>
				</div>
			</div>
		</div>
		</div>
	</body>
</html>