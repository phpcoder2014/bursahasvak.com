<?php include("includes/config.php"); ?>
<?php $sayfa = "hakkimizda";?>
<?php include("header.php"); ?>
			<div id="content">
				<ul class="navMenu">
					<li><a href="#">Anasayfa ></a></li>
					<li class="navActive"><a href="">Hakk&#305;m&#305;zda</a></li>
				</ul>
				<div id="Pageleft">
					<ul class="aboutMenu">
						<li class="active"><a href="yonetim-kurulu.php">Y&ouml;netim Kurulu</a></li>
						<li><a href="tuzu.php">T&uuml;z&uuml;k</a></li>
						<li><a href="komiteler.php">Komiteler</a></li>
						<li><a href="hasvak-uyeleri.php">Hasvak &Uuml;yeleri</a></li>
					</ul>
				</div>
				<?php 
					include("hakkimizdaMain.php");
				?>
				<div id="right">
					<div class="search">
						<input type="text" placeholder="aramak istediginiz kelime?" />
					</div>
					<div class="video">			
						<iframe id="webTvIframe" width="300" height="250" src="http://bursahasvak.web.tv/embed/xkyyph0h4m_/0" frameborder="0"></iframe>
					</div>
				<?php include("etkinlik_takvimi.php");?>
					<div class="ebulten">
						<div class="heading">
							<div class="heading-icon"><img src="images/icon-mailing-list.png" width="20" height="20" alt="" /></div>
							<h1>E-B&uuml;lten</h1>
						</div>
						<div class="content">
							<h2>E-B&uuml;lten listemize &uuml;ye olmak i&ccedil;in a&#351;a&#287;&#305;daki formu doldurunuz.</h2>
							<form method="post" name="bulten" action="ebultenGonder.php">
							<input type="text" name="ad" placeholder="Adiniz" />
							<input type="text" name="soyad" placeholder="Soyadiniz" />
							<input type="text" name="eposta" placeholder="E-Posta Adresiniz" />
							<input type="text" name="fadi" placeholder="Firma Adresi" />
							<div class="notice">*Ki&#351;isel bilgileriniz gizli tutulacak, hi&ccedil;bir &#351;ekilde &uuml;&ccedil;&uuml;nc&uuml; &#351;ah&#305;slarla payla&#351;&#305;lmayacakt&#305;r.</div>
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