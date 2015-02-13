<?php include("includes/config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin5_turkish_ci" />
<title>Türkiye Devlet Hastaneleri ve Hastalara Yardým Vakfý Bursa Þubesi</title>
<meta name="description" content="Türkiye Devlet Hastaneleri ve Hastalara Yardým VakfÄ± HASVAK Bursa Åžubesi" />
<meta name="keywords" content="HASVAK Bursa Þubesi hastalara yardým vakfý devlet hastaneleri" />
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
				<li><a class="active" href="hasvak-uyelik.php">hasvak üyelik</a></li>
				<li><a href="iletisim.php">iletiþim</a></li>
			</ul>
		</div>
		<div id="content">
			<div id="Pagecenter">
					<div class="topImg">
						<span>Hasvak Üyelik</span>
						<img src="images/uyelik.jpg" width="850" height="200" alt="Hasvak Üyelik" />
					</div>
					<div class="aboutText">
						<div class="conLeft">
							<!--div class="iltsmBilgi">
								<p>Baþvuru Ýçin Gerekli Evraklar</p>
								<span>
									1 - Üyelik Baþvuru Formunun Doldurulmasý<br/>
									2 - Üye Olacak Kiþinin Nüfus Cüzdanýnýn Arkalý Önlü Fotokopisi <br/>
									3 - 2 Adet Vesikalýk Fotograf <br/>
									4 - Eðitim Durumunu Gösterir Belge <br/>
									5 - Giriþ Aidatý 700,00 TL. <br/>
									6 - Yýllýk Üye Aidatý 300,00 TL.<br/><br/>

									Üye Baþvuru Formunu indirmek için <a href="sozlesme.pdf"><b>týklayýnýz</b></a><br/><br/>

									Yukarýda belirtilen evraklar tamamlanarak Genel sekreter adresine ileitilir.<br/><br/>
									Genel Sekreterlik E-posta Adresi : <b>hasvakbursasubesi@hotmail.com</b><br/><br/>

									Yönetim Kurulu toplanarak baþvuruyu deðerlendirir, alýnan karar ile dernek üyeliði baþlar.<br/><br/>

									<b>Not :</b> Ödemeler üyelik kabul kararý alýndýktan sonra aþaðýdaki hesaplardan birine yapýlýr. Üyelik giriþinin yapýldýðý yýl için aidat ödenmesi gerekmektedir.<br/><br/>

									<b>HESAP ADI :</b> Türkiye Devlet Hastaneleri ve Hastalara Yardým Vakfý  <br/>
									<b>BANKA :</b> Garanti Bankasý <br/>
									<b>ÞUBE KODU :</b> 687 (Görükle Þb.) <br/>
									<b>HESAP NO :</b> 6299706 <br/>
									<b>IBAN :</b> TR14 0006 2000 6870 0006 2997 06  <br/>
								</span>
							</div -->
						</div>
						<div class="conRight">
						
							<span>Üyelik Formu Bildirimi</span>
							<table>
							<form method="post" name="iletisim" action="uyelikGonder.php" enctype="multipart/form-data">
								<tr>
									<td colspan="3">
										<img src="images/xls.png" />
										<div class="fileButton">
											<span>Üyelik Formunuzu yükleyin.</span>
											<div class="field">
												<label class="file-upload">
													<span><strong>Yükle</strong></span>
													<input type="file" name="uploadfile2" onchange="uploadfile(this);" >
													
												</label>	
												<span style="position:relative; font-size:15px; top:-32px; left:85px;" id="filename">dosya seçilmedi...</span>
											</div>						
										</div>
									</td>
									
								</tr>
								<tr>
									<td width="150">Adýnýz - Soyadýnýz</td>
									<td>:</td>
									<td><input type="text" name="adsoyad"  placeholder="adýnýz - soyadýnýz" /> </td>
								</tr>
								<tr>
									<td>E-posta Adresi</td>
									<td>:</td>
									<td><input type="text" name="eposta" placeholder="e-posta adresiniz" /> </td>
								</tr>
								<tr>
									<td>Telefon No</td>
									<td>:</td>
									<td><input type="text" name="tel"  placeholder="telefon numaranýz" /> </td>
								</tr>
								<tr>
									<td colspan="3" align="center"><input type="submit" class="submitBttn" name="submit" value="GÖNDER"/> </td>
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
						<h2>E-Bülten listemize üye olmak için aþaðýdaki formu doldurunuz.</h2>
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
				<li><a class="active" href="hasvak-uyelik.php">hasvak üyelik</a></li>
				<li><a href="iletisim.php">iletiþim</a></li>
			</ul>
		</div>
		<div id="foot">
			<div class="content">
			<div class="left">
				<div class="logo"> <a href="index.php"><img src="images/logo-footer.png" width="60" height="61" alt="TÃ¼rkiye Devlet Hastaneleri ve Hastalara YardÄ±m VakfÄ± Bursa Åžubesi" title="TÃ¼rkiye Devlet Hastaneleri ve Hastalara YardÄ±m VakfÄ± Bursa Åžubesi" /></a> </div>
				<div class="baslik">Türkiye Devlet Hastaneleri ve Hastalara Yardým Vakfý</div>
				<div class="alt-baslik">HASVAK Bursa Þubesi</div>
				</div>
				<div class="right">
					<ul class="social">
						<li><a target="new" title="HAVSAK Facebook Sayfasý" href="https://www.facebook.com/hasvak.bursa"><img src="images/social-facebook.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Twitter Hesabý" href="https://twitter.com/HasvakBursa"><img src="images/social-twitter.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Google+ Sayfasý" href="https://plus.google.com/108688824040389680435/"><img src="images/social-google.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK LinkedIn Sayfasý" href="#"><img src="images/social-linkedin.png" width="40" height="40" alt="" title="" /></a></li>
						<li><a target="new" title="HAVSAK Pinterest Sayfasý" href="#"><img src="images/social-pinterest.png" width="40" height="40" alt="" title="" /></a></li>
					</ul>
					<div class="copyright">Hasvak Bursa Þubesi © 2013, Tüm Haklarý Saklýdýr.</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
