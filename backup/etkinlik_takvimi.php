<?php

	
	$sql_cumlesi="select * from etkinlik_takvimi order by tarih desc limit 15";

	$kayitlar= mysql_query($sql_cumlesi, $veriyolu);
	
?>

<div class="etkinlik">
    <div class="heading">
        <div class="heading-icon"><img src="images/icon-calendar.png" width="20" height="20" alt="" /></div>
        <h1><a href="etkinlikler.php">Etkinlik Takvimi</a></h1>
    </div>
    <div class="date"><?php echo date("d.m.Y");?></div>
    <ul>
    <?php
	while($satir=mysql_fetch_array($kayitlar)){
	?>
        <li><a href="etkinlik-takvim-detay.php?id=<?php echo $satir['id']?>"><?php echo $satir['baslik']?></a></li>
        
	<?php
	}
	?>

    </ul>
</div>