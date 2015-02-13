<?php include("includes/config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=latin5_turkish_ci" />
		<title>Türkiye Devlet Hastaneleri ve Hastalara Yardým Vakfý Bursa Þubesi</title>
		<meta name="description" content="Türkiye Devlet Hastaneleri ve Hastalara Yardým Vakfý HASVAK Bursa Þubesi" />
		<meta name="keywords" content="HASVAK hasvak Bursa Åžubesi hastalara yardÄ±m vakfÄ± devlet hastaneleri" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:700,300,400&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href="css/default.css" rel="stylesheet" type="text/css" />
		<link href="css/iletisim.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="container">
			<div id="head">
			<div class="content">
				<div class="logo"><a href="index.php"><img src="images/hasvak-logo.jpg" width="1170" height="111" alt="TÃ¼rkiye Devlet Hastaneleri ve Hastalara YardÄ±m VakfÄ± Bursa Åžubesi" title="TÃ¼rkiye Devlet Hastaneleri ve Hastalara YardÄ±m VakfÄ± Bursa Åžubesi" /></a></div>
			</div>
			</div>
			<div id="menu">
				<ul class="menu">
					<li><a href="index.php">anasayfa</a></li>
					<li class="sub">
						<a href="hakkimizda.php">hakkýmýzda</a>
						<ul class="submenu">
							<li><a href="yonetim-kurulu.php">Yönetim Kurulu</a></li>
							<li><a href="tuzu.php">Tüzük</a></li>
							<li><a href="komiteler.php">Komiteler</a></li>
							<li><a href="hasvak-uyeleri.php">Hasvak Üyeleri</a></li>
						</ul>
					</li>
					<li><a href="etkinlikler.php">etkinlikler</a></li>
					<li><a href="duyurular.php">duyurular</a></li>
					<li><a href="basinda-biz.php">basýnda biz</a></li>
					<li><a href="hasvak-uyelik.php">hasvak üyelik</a></li>
					<li><a href="iletisim.php" class="active">iletiþim</a></li>
				</ul>
			</div>
			<div id="content">
				<ul class="navMenu">
					<li><a href="#">Anasayfa ></a></li>
					<li class="navActive"><a href="#">iletiþim ></a></li>
				</ul>
					<div id="Pagecenter">
					<div class="topImg">
						<span>Ýletiþim</span>
						<img src="images/iletisim.png" width="850" height="200" alt="Etkinlikler" />
					</div>
					<div class="aboutText">
						<div class="conLeft">
							<iframe width="370" height="290" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=tr&amp;geocode=&amp;q=bursa&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=50.111473,107.138672&amp;ie=UTF8&amp;hq=&amp;hnear=Bursa,+T%C3%BCrkiye&amp;t=m&amp;ll=40.269441,29.061756&amp;spn=0.037984,0.063343&amp;z=13&amp;output=embed"></iframe>
							<div class="iltsmBilgi">
								<p>Ýletiþim Bilgileri</p>
								<span>Ýhsaniye Mah. Ýþlemeci Sok. As Mutiler Sitesi B Blok 19-A,  P.K : 16110 Nilüfer / Bursa</span>
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
							<span>Ýletiþim Formu</span>
							<table>
							<form method="post" name="bulten" action="iletisimGonder.php">
								<tr>
									<td width="150">Adýnýz - Soyadýnýz</td>
									<td>:</td>
									<td><input type="text" name="adsoyad" placeholder="adýnýzý ve soyadýnýzý yazýnýz." /> </td>
								</tr>
								<tr>
									<td>E-posta Adresi</td>
									<td>:</td>
									<td><input type="text" name="eposta" placeholder="e-posta adresinizi yazýnýz." /> </td>
								</tr>
								<tr>
									<td>Telefon No</td>
									<td>:</td>
									<td><input type="text" name="tel" placeholder="telefon numaranýzý yazýnýz." /> </td>
								</tr>
								<tr>
									<td>Konu</td>
									<td>:</td>
									<td><input type="text" name="konu" placeholder="mesajýn konusu" /> </td>
								</tr>
								<tr>
									<td>Mesaj</td>
									<td>:</td>
									<td><textarea name="mesaj"placeholder="mesajýnýzý yazýnýz." ></textarea></td>
								</tr>
								<tr>
									<td colspan="3" align="center">
									<input type="submit" class="submitBttn" name="submit" value="gönder" />
									</td>
								</tr>
								</form>
							</table>
						</div>
					</div>
				</div>
				<div id="right">
					<div class="search">
						<input type="text" placeholder="aramak istediðiniz kelime?" />
					</div>
					<div class="video">			
						<iframe id="webTvIframe" width="300" height="250" src="http://bursahasvak.web.tv/embed/xkyyph0h4m_/0" frameborder="0"></iframe>
					</div>
				<?php include("etkinlik_takvimi.php");?>
					<div class="ebulten">
						<div class="heading">
							<div class="heading-icon"><img src="images/icon-mailing-list.png" width="20" height="20" alt="" /></div>
							<h1>E-Bülten</h1>
						</div>
						<div class="content">
							<h2>E-Bülten listemize Üye olmak için aþaðýdaki formu doldurunuz.</h2>
							<form method="post" name="bulten" action="ebultenGonder.php">
							<input type="text" name="ad" placeholder="Adýnýz" />
							<input type="text" name="soyad" placeholder="Soyadýnýz" />
							<input type="text" name="eposta" placeholder="E-Posta Adresiniz" />
							<input type="text" name="fadi" placeholder="Firma Adresi" />
							<div class="notice">*Kiþisel bilgileriniz gizli tutulacak, hiçbir þekilde üçüncü þahýslarla paylaþýlmayacaktýr.</div>
							<input type="submit" class="submitBttn" name="submit" value="Gönder" />
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
				<li><a href="hakkimizda.php">hakkýmýzda</a></li>
				<li><a href="etkinlikler.php">etkinlikler</a></li>
				<li><a href="duyurular.php">duyurular</a></li>
				<li><a href="basinda-biz.php">basýnda biz</a></li>
				<li><a href="hasvak-uyelik.php">hasvak üyelik</a></li>
				<li><a class="active" href="iletisim.php">iletiþim</a></li>
			</ul>
		</div>
		<div id="foot">
			<div class="content">
			<div class="left">
				<div class="logo"> <a href="index.php"><img src="images/logo-footer.png" width="60" height="61" alt="Türkiye Devlet Hastaneleri ve Hastalara Yardým Vakfý Bursa Þubesi" title="Türkiye Devlet Hastaneleri ve Hastalara Yardým Vakfý Bursa Þubesi" /></a> </div>
				<div class="baslik">Türkiye Devlet Hastaneleri ve Hastalara Yardým Vakfý</div>
				<div class="alt-baslik">HASVAK Bursa Þubesi</div>
				</div>
				<div class="right">
					<ul class="social">
						<li><a target="new" title="HAVSAK Facebook SayfasÄ±" href="https://www.facebook.com/hasvak.bursa"><img src="images/social-facebook.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Twitter HesabÄ±" href="https://twitter.com/HasvakBursa"><img src="images/social-twitter.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Google+ SayfasÄ±" href="https://plus.google.com/108688824040389680435/"><img src="images/social-google.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK LinkedIn SayfasÄ±" href="#"><img src="images/social-linkedin.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Pinterest SayfasÄ±" href="#"><img src="images/social-pinterest.png" width="40" height="40" alt="" title="" /></a></li>
					</ul>
					<div class="copyright">Hasvak Bursa Þubesi © 2013, Tüm Haklarý saklýdýr.</div>
				</div>
			</div>
		</div>
		</div>
	</body>
</html>