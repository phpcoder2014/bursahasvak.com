<div id="left">
				<div id="main">
					<div class="heading">
						<div class="heading-icon"><img src="images/icon-announcement.png" width="20" height="20" alt="" /></div>
						<h1><a href="duyurular.html">duyurular</a></h1>
						<div class="left">
						<?php
						$sql_cumlesi="select * from duyurular where id ='".$detayid."';";
						$kayitlar= mysql_query($sql_cumlesi, $veriyolu);
						if($kayitlarYaz = mysql_fetch_array($kayitlar)){
						?>	
							<div class="big-news">
								<img src="images/duyurular/buyuk/<?php echo $kayitlarYaz["resim"]; ?>" width="300" height="225" alt="" />
							</div>
						</div>
						<div class="right">				
						<h2 style="margin:0; padding:0;"><?php echo $kayitlarYaz["baslik"]; ?></h2>
						<p><?php echo $kayitlarYaz["aciklama"]; ?></p>
						Tarih : <label><?php echo $kayitlarYaz["tarih"]; ?></label>
						<p><a href="javascript: history.go(-1)"><< anasayfa'ya geri dön</a></p>
						 <?php } ?>
						</div>
					</div>
				</div>
				
			</div>