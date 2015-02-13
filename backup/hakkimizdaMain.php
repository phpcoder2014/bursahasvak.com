<div id="Pagecenter">
<div class="topImg">
    <span>Hakkımızda</span>
    <img src="images/about.jpg" width="630" height="200" alt="page name" />
</div>
<div class="aboutText">
<?php
$tuzuk_tablosu = @mysql_query("select * from basindabiz where id='1'",$veriyolu);
$kayit_satiri = @mysql_fetch_array($tuzuk_tablosu);
?>
<span><?php echo $kayit_satiri["aciklama"]?></span>

    </div>
</div>
