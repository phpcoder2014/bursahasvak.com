<div id="left">			
				<div id="main">
					<div class="heading">
						<div class="heading-icon"><img src="images/icon-announcement.png" width="20" height="20" alt="" /></div>
						<h1><a href="#">bizden gelen haberler</a></h1>
						<div class="left">
						<?php
						$sql_cumlesi="select * from slider where id ='".$detayid."';";
						$kayitlar= mysql_query($sql_cumlesi, $veriyolu);
						if($kayitlarYaz = mysql_fetch_array($kayitlar)){
						?>	
							<div class="big-news">
								<img src="yonetim/<?php echo $kayitlarYaz["image"]; ?>" width="300" height="225" alt="" />
								<div>
								</div>
							</div>	
						</div>
						<div class="right">
						<?php $detayid = $_GET["id"]; ?> 
					
						<h2 style="margin:0; padding:0;"><?php echo $kayitlarYaz["title"];?></h2>
						<p><?php echo $kayitlarYaz["uzundetay"];?></p>
						
						<p><a href="javascript: history.go(-1)"><< anasayfa'ya geri dön</a></p>
						 <?php } ?>
						</div>
					</div>
				</div>				
			</div>