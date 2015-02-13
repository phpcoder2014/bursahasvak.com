<div id="Pagecenter">
					<div class="topImg">
						<span>Komiteler</span>
						<img src="images/about.jpg" width="630" height="200" alt="page name" />
					</div>
					<div class="aboutText">
						<?php
						$komite_tablosu = @mysql_query("select * from komite where id='1'",$veriyolu);
						$kayit_satiri = @mysql_fetch_array($komite_tablosu);
						?>
						<span><?php echo $kayit_satiri["aciklama"]?></span>
					</div>
				</div>