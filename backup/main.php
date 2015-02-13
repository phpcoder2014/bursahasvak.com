<div id="left">
				<div class="slider">
				  <?php
				  $slider_array = array();
				  
				  $query = mysql_query("SELECT title, kisadetay, uzundetay, image, link FROM slider");
				  while($slider_each = mysql_fetch_assoc($query)) {
								  $slider_array[] = $slider_each;
				  }
				  ?>
				  <div class="pagination">
								  <ul>
												  <?php $i = 1; foreach($slider_array as $slider) { ?>
												  <li><a class="slide-b" id="slide-b-<?php echo $i; ?>" href="#"><?php echo $i; ?></a></li>
												  <?php $i++; } ?>
								  </ul>
				  </div>
				  <a class="nav-left" href="#"></a>
				  <a class="nav-right" href="#"></a>
				  <div class="slide">
								  <?php $i = 1; foreach($slider_array as $slider) { ?>
								  <a id="slide-<?php echo $i; ?>" class="slide-a" href="<?php echo $slider["link"] ?>">
												  <div class="text">
																 <h2><?php echo $slider["title"]; ?></h2>
																 <h3><?php echo $slider["kisadetay"]; ?></h3>
												  </div>
												  <img src="<?php echo "yonetim/".$slider["image"]; ?>" alt="" height="400" width="850">
								  </a>
								  <?php $i++; } ?>
				  </div>
				  <script type="text/javascript">
								  $(".slide-a").css('display', 'none');
								  $(".slide-a").first().css('display', 'inline');
								  slidecounter = 1;
								  slidetotal = 6;
								  $(".nav-left").click(function() {
												  slidecounter = slidecounter - 1;
												  if(slidecounter == 0) slidecounter = slidetotal;
												  $(".slide-a").css('display', 'none');
												  $("#slide-" + slidecounter).animate({opacity: "toggle"}, "slow");
								  });
								  $(".nav-right").click(function() {
												  slidecounter = slidecounter + 1;
												  if(slidecounter == slidetotal + 1) slidecounter = 1;
												  $(".slide-a").css('display', 'none');
												  $("#slide-" + slidecounter).animate({opacity: "toggle"}, "slow");
								  });
								  $(".slide-b").click(function() {
												  slidecounter = parseInt($(this).attr('id').substring(8,9));
												  $(".slide-a").css('display', 'none');
												  $("#slide-" + slidecounter).animate({opacity: "toggle"}, "slow");
								  });
				  </script>
			</div>
				<div id="main">
					<div class="heading">
						<div class="heading-icon"><img src="images/icon-announcement.png" width="20" height="20" alt="" /></div>
						<h1><a href="duyurular.html">duyurular</a></h1>
						<div class="left">
						<?php
						$sql_cumlesi="select * from duyurular order by tarih desc limit 1";
						$kayitlar= mysql_query($sql_cumlesi, $veriyolu);
						while($kayitlarYaz = mysql_fetch_array($kayitlar)){
						?>
							<div class="big-news">
								<a href="duyuru-detay.php?id=<?php echo $kayitlarYaz["id"] ?>"><img src="images/duyurular/buyuk/<?php echo $kayitlarYaz["resim"] ?>" width="300" height="225" alt="" /></a>
								<div>
									<h2><a href="duyuru-detay.php?id=<?php echo $kayitlarYaz["id"] ?>"><?php echo $kayitlarYaz["baslik"] ?> (<?php echo $kayitlarYaz["tarih"] ?>)</a></h2>
									<p><?php echo $kayitlarYaz["kisaaciklama"] ?></p>
								</div>
							</div>
						<?php } ?>
						</div>
						<div class="right">
							<ul class="small-news">
								<?php
								$sql_cumlesi="select * from duyurular order by tarih desc limit 1,5";
								$kayitlar= mysql_query($sql_cumlesi, $veriyolu);
								while($kayitlarYaz = mysql_fetch_array($kayitlar)){							
								?>
								<li>
									<a class="snthumb" href="duyuru-detay.php?id=<?php echo $kayitlarYaz["id"] ?>"><img src="images/duyurular/kucuk/<?php echo $kayitlarYaz["resim"] ?>" width="70" height="70" alt="" /></a>
									<div class="snlink"><a class="snlink" href="duyuru-detay.php?id=<?php echo $kayitlarYaz["id"] ?>"><?php echo $kayitlarYaz["baslik"] ?> (<?php echo $kayitlarYaz["tarih"] ?>)</a></div>
									<p style="margin:0; padding:0;"><?php echo $kayitlarYaz["kisaaciklama"] ?></p>
									
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<div>
					<div class="heading">
						<div class="heading-icon"><img src="images/icon-members.png" width="20" height="20" alt="" /></div>
						<h1><a href="uyelerimizden.php">üyelerimizden</a></h1>
						<div class="left">
							<?php
									$sql_cumlesi="select * from mesajlar order by id asc limit 1";
									$kayitlar= mysql_query($sql_cumlesi, $veriyolu);
									while($kayitlarYaz = mysql_fetch_array($kayitlar)){
									$kisiid = $kayitlarYaz["kisiid"];
									$sql_cumlesi="select * from kisiler where id=$kisiid";
									$kisiler= mysql_query($sql_cumlesi, $veriyolu);
									$kisilerYaz = mysql_fetch_array($kisiler);
							?>
							<div class="big-news">
								<a href="uyelerimizden.php?id=<?php echo $kisilerYaz["id"] ?>"><img src="images/kisiler/<?php echo $kisilerYaz["resim"] ?>" width="300" height="225" alt="" /></a>
								<div>
									<h2><a href="uyelerimizden.php?id=<?php echo $kisilerYaz["id"] ?>"><?php echo $kayitlarYaz["baslik"] ?></a></h2>
									<p><?php echo $kayitlarYaz["kisamesaj"] ?></p>
									<?php echo $kisilerYaz["adi"];?>
								</div>
							</div>
							<?php } ?>
						</div>				
						<div class="right">
							<ul class="small-news">
							<?php
									$sql_cumlesi="select * from mesajlar order by id asc limit 1,5";
									$kayitlar= mysql_query($sql_cumlesi, $veriyolu);
									while($kayitlarYaz = mysql_fetch_array($kayitlar)){
									$kisiid = $kayitlarYaz["kisiid"];
									$sql_cumlesi="select * from kisiler where id=$kisiid";
									$kisiler= mysql_query($sql_cumlesi, $veriyolu);
									$kisilerYaz = mysql_fetch_array($kisiler);
							
							?>
								<li>
									<a class="snthumb" href="uyelerimizden.php?id=<?php echo $kisilerYaz["id"] ?>"><img src="images/kisiler/<?php echo $kisilerYaz["resim"] ?>" width="70" height="70" alt="" /></a>
									<div class="snlink"><a class="snlink" href="uyelerimizden.php?id=<?php echo $kisilerYaz["id"] ?>"><?php echo $kayitlarYaz["baslik"] ?> (<?php echo $kisilerYaz["adi"];?>)<br />
									
									</a>
									<p><?php echo $kayitlarYaz["kisamesaj"] ?></p>
									</div>
								</li>
							<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>