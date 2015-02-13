<?
function kontrolet($main,$adi){
//  $a=strpos($main,'www');
  $a=substr_count($main,'www');
  $b=substr_count($main,'http');
  $c=substr_count($main,'ftp');
  $d=substr_count($main,'.');
  $tp=$a+$b+$c+$d;
  if($tp==0) $main=$main;
  else $main=$adi;
  
  return($main);
}
?>