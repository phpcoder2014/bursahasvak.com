<div id="Pagecenter">
					<div class="topImg">
						<span>Etkinlikler</span>
						<img src="images/etkinlikler.png" width="850" height="200" alt="Etkinlikler" />
					</div>
					<div class="aboutText">
						<?php
								$sql_cumlesi="select * from etkinlikler order by tarih desc limit 1,5";
								$kayitlar= mysql_query($sql_cumlesi, $veriyolu);
								while($kayitlarYaz = mysql_fetch_array($kayitlar)){							
							?>
						<div class="uyeImg block">		
							<div class="zoom pink">
			                	<img src="<?php echo $kayitlarYaz["resim"] ?>" alt="etkinlik adı" width="180" height="255" />
			                </div>
			                <span><?php echo $kayitlarYaz["baslik"] ?> </span>
						</div>
						<?php ?>
					</div>
</div>