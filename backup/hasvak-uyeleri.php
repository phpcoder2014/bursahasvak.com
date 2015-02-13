<?php include("includes/config.php"); ?>
<?php $sayfa = "hakkimizda";?>
<?php include("header.php"); ?>
			<div id="content">
				<ul class="navMenu">
					<li><a href="#">Anasayfa ></a></li>
					<li><a href="#">hakkımızda</a></li>
					<li class="navActive"><a href="">Üyeler</a></li>
				</ul>
				<div id="Pageleft">
					<ul class="aboutMenu">
						<li><a href="yonetim-kurulu.php">Yönetim Kurulu</a></li>
						<li><a href="tuzu.php">Tüzük</a></li>
						<li><a href="komiteler.php">Komiteler</a></li>
						<li class="active"><a href="hasvak-uyeleri.php">Hasvak Üyeleri</a></li>
					</ul>
				</div>
				<div id="Pagecenter">
					<div class="topImg">
						<span>Hasvak Üyeleri</span>
						<img src="images/about.jpg" width="630" height="200" alt="page name" />
					</div>
                    
		<div>


<?php

	$page=$_GET["sayfa"];

	$perpage=25;



	if (!$page) 

		$page=1; 

		

		

	$count = mysql_num_rows(mysql_query("select * from kisiler", $veriyolu));

	$totalPage = ceil(($count/$perpage));



	$renk=0;



	$sql_cumlesi="select * from kisiler order by sirano LIMIT ".((intval($page)*25)-25).", $perpage";

	$kayitlar= mysql_query($sql_cumlesi, $veriyolu);

	$sayac=mysql_num_rows($kayitlar);
	
	$sayi=1;	

	
	while($satir=mysql_fetch_array($kayitlar)){

	
	?>
    <div style="clear:both;"></div>
    <div style="height:10px;"></div>
	<div>
    	
        <h3><?php echo $satir['adi'];?></h3>
        
        <img src="http://bursahasvak.com/images/kisiler/<?php echo $satir['resim'];?>" style="max-width:200px; float:left; margin-right:10px; margin-bottom:10px;"/>
        
        <?php echo $satir['ozgecmis'];?>
        
        
    
    </div>

	<div style="clear:both;"></div>
    
    
    <?php	
	
	$sayi++;
	
	}
	
	?>
    <style>
    .pagipag{
		padding-top:0px;
		padding-left:5px;
		padding-right:5px;
		font-size:16px;

			
	}
	.pagipag a{
		color:#000;	
	}
	.pagipag a:hover{
		color:#006;	
	}
    </style>
	
    <div style="height:10px;"></div>
        
<?



if($count > $perpage) : 

	$x = 2; // akrif sayfadan &ouml;nceki/sonraki sayfa g&ouml;sterim sayısı 

	$lastP = ceil($count/$perpage); 



	// sayfa 1'i yazdır 

	if($page==1) 

		echo '<span class="pagipag">1</span>'; 

	else 

		echo '<span class="pagipag"><a href="hasvak-uyeleri.php?sayfa=1">1</a></span>';

		

	// "..." veya direkt 2 

	if($page-$x > 2) 

		{ 

			echo '<span class="pagipag">...</span>'; 

			$i = $page-$x; 

		} 

	else 

		{ 

			$i = 2; 

		} 





	// +/- $x sayfaları yazdır 

	for($i; $i<=$page+$x; $i++) 

		{ 

			if($i==$page) 

				echo '<span class="pagipag">'.$i.'</span>'; 

			else 

				echo '<span class="pagipag"><a href="hasvak-uyeleri.php?sayfa='.$i.'">'.$i.'</a></span>'; 

			if($i==$lastP) 

				break; 

		} 

	

	

	// "..." veya son sayfa 

	if($page+$x < $lastP-1) 

		{ 

			echo '<span class="pagipag">...</span>'; 

			echo '<span class="pagipag"><a href="hasvak-uyeleri.php?sayfa='.$lastP.'">'.$lastP.'</a></td>';

		} 

	elseif($page+$x == $lastP-1) 
		{ 
			echo '<span class="pagipag"><a href="hasvak-uyeleri.php?sayfa='.$lastP.'">'.$lastP.'</a></span>';
		} 
endif; 
?>
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