<?php include("includes/config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Türkiye Devlet Hastaneleri ve Hastalara Yardım Vakfı Bursa Şubesi</title>
<meta name="description" content="Türkiye Devlet Hastaneleri ve Hastalara Yardım Vakfı HASVAK Bursa Şubesi" />
<meta name="keywords" content="HASVAK Bursa Şubesi hastalara yardım vakfı devlet hastaneleri" />
<link href='http://fonts.googleapis.com/css?family=Oxygen:700,300,400&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
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
				<li><a class="active" href="index.php">anasayfa</a></li>
				<li class="sub">
					<a href="hakkimizda.php">hakkımızda</a>
					<ul class="submenu">
						<li><a href="yonetim-kurulu.php">Yönetim Kurulu</a></li>
						<li><a href="tuzu.php">Tüzük</a></li>
						<li><a href="komiteler.php">Komiteler</a></li>
						<li><a href="hasvak-uyeleri.php">Hasvak Üyeleri</a></li>
					</ul>
				</li>
				<li><a href="etkinlikler.php">etkinlikler</a></li>
				<li><a href="duyurular.php">duyurular</a></li>
				<li><a href="basinda-biz.php">basında biz</a></li>
				<li><a href="hasvak-uyelik.php">hasvak üyelik</a></li>
				<li><a href="iletisim.php">iletişim</a></li>
			</ul>
		</div>
		<div id="content">
			<?php 
				include("main.php");
			?>
			<div id="right">
				<div class="search">
					<input type="text" placeholder="aramak istediğiniz kelime?" />
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
						<h2>E-Bülten listemize üye olmak için aşağıdaki formu doldurunuz.</h2>
						<form method="post" name="bulten" action="ebultenGonder.php">
						<input type="text" name="ad" placeholder="Adınız" />
						<input type="text" name="soyad" placeholder="Soyadınız" />
						<input type="text" name="eposta" placeholder="E-Posta Adresiniz" />
						<input type="text" name="fadi" placeholder="Firma Adresi" />
						<div class="notice">*Kişisel bilgileriniz gizli tutulacak, hiçbir şekilde üçüncü şahıslarla paylaşılmayacaktır.</div>
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
				<li><a class="active" href="index.php">anasayfa</a></li>
				<li><a href="hakkimizda.php">hakkımızda</a></li>
				<li><a href="etkinlikler.php">etkinlikler</a></li>
				<li><a href="duyurular.php">duyurular</a></li>
				<li><a href="yillik-takvim.php">basında biz</a></li>
				<li><a href="hasvak-uyelik.php">hasvak üyelik</a></li>
				<li><a href="iletisim.php">iletişim</a></li>
			</ul>
		</div>
		<div id="foot">
			<div class="content">
			<div class="left">
				<div class="logo"> <a href="index.php"><img src="images/logo-footer.png" width="60" height="61" alt="Türkiye Devlet Hastaneleri ve Hastalara Yardım Vakfı Bursa Şubesi" title="Türkiye Devlet Hastaneleri ve Hastalara Yardım Vakfı Bursa Şubesi" /></a> </div>
				<div class="baslik">Türkiye Devlet Hastaneleri ve Hastalara Yardım Vakfı</div>
				<div class="alt-baslik">HASVAK Bursa Şubesi</div>
				</div>
				<div class="right">
					<ul class="social">
						<li><a target="new" title="HAVSAK Facebook Sayfas�" href="https://www.facebook.com/hasvak.bursa"><img src="images/social-facebook.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Twitter Hesab�" href="https://twitter.com/HasvakBursa"><img src="images/social-twitter.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Google+ Sayfas�" href="https://plus.google.com/108688824040389680435/"><img src="images/social-google.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK LinkedIn Sayfas�" href="#"><img src="images/social-linkedin.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Pinterest Sayfas�" href="#"><img src="images/social-pinterest.png" width="40" height="40" alt="" title="" /></a></li>
					</ul>
					<div class="copyright">Hasvak Bursa Şubesi  2013, Tüm Hakları Saklıdır.</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
