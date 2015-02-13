<?
	session_start();
	session_register("nhup_session");
?>
<? 
	$_SESSION['nhup_session']=session_destroy();
?>
<? 

	header("Location: "."../index.php");
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<meta name="GENERATOR" content="Microsoft FrontPage Express 2.0">
<title></title>
</head>
<body>
</body>
</html>