<?php 
$detayid = $_GET["id"]; 

$sql_cumlesi="select * from kisiler where id=$detayid";
$kisiler= mysql_query($sql_cumlesi, $veriyolu);
$kisilerYaz = mysql_fetch_array($kisiler);

$sql_cumlesi="select * from mesajlar where kisiid=$detayid";
$kayitlar= mysql_query($sql_cumlesi, $veriyolu);
$kayitlarYaz = mysql_fetch_array($kayitlar);

?>
<div id="left">
				<div id="main">
					<div class="heading">
						<div class="heading-icon"><img src="images/icon-members.png" width="20" height="20" alt="" /></div>
						<h1><a href="#">üyelerimizden</a></h1>
						<div class="left">
							<div class="big-news">
								<img src="images/kisiler/<?php echo $kisilerYaz["resim"] ?>" width="300" height="225" alt="" />
								<div>
									<h2><a href="uyelerimizden.php?id=<?php echo $kayitlarYaz["id"] ?>"></a></h2>
									<h2><?php echo $kisilerYaz["unvan"] ?></h2>	
								</div>
							</div>
						</div>
						<div class="right">
						<h2 style="margin:0; padding:0;"><?php echo $kayitlarYaz["baslik"] ?></h2>
						<p><?php echo $kayitlarYaz["mesaj"] ?></p><br/><br/><br/>
						<label><?php echo $kisilerYaz["adi"] ?></label>
						<p><?php echo $kisilerYaz["firma"] ?></p>						
						<p><a href="javascript: history.go(-1)"><< anasayfa'ya geri dön</a></p>
						</div>
					</div>
				</div>
				
			</div>