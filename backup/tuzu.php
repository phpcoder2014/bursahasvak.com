<?php include("includes/config.php"); ?>
<?php $sayfa = "hakkimizda";?>
<?php include("header.php"); ?>
			<div id="content">
				<ul class="navMenu">
					<li><a href="#">Anasayfa ></a></li>
					<li><a href="#">Hakkımızda</a></li>
					<li class="navActive"><a href="">Tüzük</a></li>
				</ul>
				<div id="Pageleft">
					<ul class="aboutMenu">
						<li><a href="yonetim-kurulu.php">Yönetim Kurulu</a></li>
						<li class="active"><a href="tuzu.php">Tüzük</a></li>
						<li><a href="komiteler.php">Komiteler</a></li>
						<li><a href="hasvak-uyeleri.php">Hasvak Üyeleri</a></li>
					</ul>
				</div>
				<div id="Pagecenter">
					<div class="topImg">
						<span>Tüzük</span>
						<img src="images/about.jpg" width="630" height="200" alt="page name" />
					</div>
					<div class="aboutText">
						<?php
						$tuzuk_tablosu = @mysql_query("select * from tuzuk where id='1'",$veriyolu);
						$kayit_satiri = @mysql_fetch_array($tuzuk_tablosu);
						?>
						<span><?php echo $kayit_satiri["aciklama"]?></span>
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
							<h2>E-Bülten listemize üye olmak için aşağıdaki formu doldurunuz.</h2>
							<form method="post" name="bulten" action="ebultenGonder.php">
							<input type="text" name="ad" placeholder="Adınız" />
							<input type="text" name="soyad" placeholder="Soyadınız" />
							<input type="text" name="eposta" placeholder="E-Posta Adresiniz" />
							<input type="text" name="fadi" placeholder="Firma Adresi" />
							<div class="notice">*Kişisel bilgileriniz gizli tutulacak, biçbir Şekilde üçüncü şahıslarla paylaşılmayacaktır.</div>
							<input type="submit" class="submitBttn" name="submit" value="Gönder" />
							</form>
						</div>
					</div>
					<div class="reklam">
				<?php
				mysql_query("SET CHARACTER SET utf8");	
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
				<li><a href="hakkimizda.php">Hakkýmýzda</a></li>
				<li><a href="etkinlikler.php">etkinlikler</a></li>
				<li><a href="duyurular.php">duyurular</a></li>
				<li><a href="basinda-biz.php">basýnda biz</a></li>
				<li><a href="hasvak-uyelik.php">hasvak üyelik</a></li>
				<li><a href="iletisim.php">iletiþim</a></li>
			</ul>
		</div>
<?php include("footer.php"); ?>