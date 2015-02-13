<?
	if(eregi("union",$_SERVER['QUERY_STRING']) or ereg("UNION",$_SERVER['QUERY_STRING']))
		{
			echo "<br><br><br><center><font face=verdana size=2><strong>SUNUCU VERDÝÐÝNÝZ KOMUTU ALGILAYAMADI !!!  <br></strong></font></center>"; 
			exit; 
		}

	$user="bursahasvak95";
	$pass="se2BPz8";
	$db="bursahasvak95";

	$veriyolu = @mysql_connect ("mysql.bursahasvak.com" , "$user" , "$pass" );

	mysql_select_db( "$db" , $veriyolu );
	mysql_query("SET NAMES 'utf8'"); 
	mysql_query("SET CHARACTER SET utf8"); 
	mysql_query("SET COLLATION_CONNECTION = 'utf8_turkish_ci'");  



?>
