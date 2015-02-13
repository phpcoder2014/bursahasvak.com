<?php include("includes/config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Türkiye Devlet Hastaneleri ve Hastalara Yardım Vakfı Bursa Şubesi</title>
		<meta name="description" content="Türkiye Devlet Hastaneleri ve Hastalara Yardım Vakfı HASVAK Bursa Şubesi" />
		<meta name="keywords" content="HASVAK hasvak Bursa Şubesi hastalara Yardım Vakfı devlet hastaneleri" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:700,300,400&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href="css/default.css" rel="stylesheet" type="text/css" />
		<link href="css/etkinlikler.css" rel="stylesheet" type="text/css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/hover.zoom.js"></script>
		<script src="js/lightbox-2.6.min.js"></script>
		<link href="css/lightbox.css" rel="stylesheet" />
		<script>
	        $(function() {
	            $('.pink').hoverZoom({
	                overlayColor: '#0082d6',
	                zoom: 0
	            });
	        }); 
	        $(function () {
	        	$('#popup-wrapper').modalPopLite({ openButton: '#clicker', closeButton: '#close-btn' }); 
	        });
	    </script>

	</head>

	<body>
		<div id="container">
			<div id="head">
			<div class="content">
				<div class="logo"><a href="index.php"><img src="images/hasvak-logo.jpg" width="1170" height="111" alt="TÃ¼rkiye Devlet Hastaneleri ve Hastalara YardÄ±m VakfÄ± Bursa Åubesi" title="TÃ¼rkiye Devlet Hastaneleri ve Hastalara YardÄ±m VakfÄ± Bursa Åubesi" /></a></div>
			</div>
			</div>
			<div id="menu">
				<ul class="menu">
					<li><a href="index.php">anasayfa</a></li>
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
					<li><a href="basinda-biz.php" class="active">basında biz</a></li>
					<li><a href="hasvak-uyelik.php">hasvak üyelik</a></li>
					<li><a href="iletisim.php">iletişim</a></li>
				</ul>
			</div>
			<div id="content">
				<ul class="navMenu">
					<li><a href="#">Anasayfa ></a></li>
					<li class="navActive"><a href="">Etkinlikler</a></li>
				</ul>
			<div id="Pagecenter">
					<div class="topImg">
						<span>Basında biz</span>
						<img src="images/duyurular.png" width="850" height="200" alt="Basında Biz" />
					</div>
					<div class="aboutText">
						<?php
								$sql_cumlesi="select * from basinlar order by tarih desc limit 0,15";
								$kayitlar= mysql_query($sql_cumlesi, $veriyolu);
								while($kayitlarYaz = mysql_fetch_array($kayitlar)){				
							?>
						<div style="max-height:auto; max-width:180px; position:relative; float:left; margin-left:20px;">
						<div class="uyeImg block">		
							<div class="zoom pink">
			                <a href="images/basinlar/buyuk/<?php echo $kayitlarYaz["resim"] ?>" data-lightbox="image-1" title="<?php $etkinlikYaz["baslik"] ?>">
							<img src="images/basinlar/buyuk/<?php echo $kayitlarYaz["resim"] ?>" alt="Basında biz" width="180" height="255" /></a>
			                </div>
			                <span><h2><?php echo $kayitlarYaz["baslik"]; ?></h2> </span>							
						</div>
						</div>
						<?php }?>				
					</div>
			</div>
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
						<div class="notice">*Kişisel bilgileriniz gizli tutulacak, hiçbir þekilde üçüncü şahıslara paylaşılmayacaktır.</div>
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
			</div><?php include("footer.php"); ?>