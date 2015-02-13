<div id="Pagecenter">
					<div class="topImg">
						<span>Duyurular</span>
						<img src="images/duyurular.png" width="850" height="200" alt="Etkinlikler" />
					</div>
					<div class="aboutText">
							<?php
							$sql_cumlesi="select * from duyurular order by tarih desc limit 1,10";
							$kayitlar= mysql_query($sql_cumlesi, $veriyolu);
							while($kayitlarYaz = mysql_fetch_array($kayitlar)){							
							?>
						<a href="duyuru-detay.php?id=<?php echo $kayitlarYaz["id"] ?>" class="duyuru">
							<img src="images/duyurular/kucuk/<?php echo $kayitlarYaz["resim"] ?>" width="70" height="70" alt="" />
							<div class="duyuruText">
								<span><?php echo $kayitlarYaz["baslik"] ?></span> <span class="date"><?php echo $kayitlarYaz["tarih"] ?></span><br><br/>	
								<span><?php echo $kayitlarYaz["kisaaciklama"] ?></span>
							</div>
						</a>
						<?php } ?>
					</div>
				</div>