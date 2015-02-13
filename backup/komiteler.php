<?php include("includes/config.php"); ?>
<?php $sayfa = "hakkimizda";?>
<?php include("header.php"); ?>
			<div id="content">
				<ul class="navMenu">
					<li><a href="#">Anasayfa ></a></li>
					<li><a href="#">hakkımızda</a></li>
					<li class="navActive"><a href="">Komiteler</a></li>
				</ul>
				<div id="Pageleft">
					<ul class="aboutMenu">
						<li><a href="yonetim-kurulu.php">Yönetim Kurulu</a></li>
						<li><a href="tuzu.php">Tüzük</a></li>
						<li class="active"><a href="komiteler.php">Komiteler</a></li>
						<li><a href="hasvak-uyeleri.php">Hasvak Üyeleri</a></li>
					</ul>
				</div>
				<?php 
					include("komitelerMain.php");
				?>
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
<?php include("footer.php"); ?>