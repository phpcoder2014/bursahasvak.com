<?

$aylar=array('Ocak','&#350;ubat','Mart','Nisan','May&#305;s','Haziran','Temmuz','A&#287;ustos','Eylül','Ekim','Kas&#305;m','Aral&#305;k');

$gunler=array('Pazar','Pazartesi','Sali','Çarsamba','Persembe','Cuma','Cumartesi');


function escape($str)
{
	return mysql_escape_string(stripslashes($str));
}
 

function tarihYaz($tarih){

global $aylar;

 

	$ay=$aylar[$sayi];

	

	$tar=split("-",$tarih);

	

	$ay=$tar[1];

	settype($ay, "integer");

	$ay=$aylar[$ay-1];

	

	return "$tar[2] $ay $tar[0]";

} 

  

function renk($renk){

	if (bcmod($renk, 2)==0){ 

		return "bgcolor=#FFFFFF";

	}else{

		return "bgcolor=#cccccc";

	}

}

function renk2($renk){

	if (bcmod($renk, 2)==0){ 

		return "bgcolor=#ffffff";

	}else{

		return "bgcolor=#cccccc";

	}

}

 

function yuzde($oy,$top){

	return round((100*$oy)/$top);

}

 

function kodyaz($metin){

	$srch[]="\""; 

	$rpl[] = "\""; 

	$srch[]="'"; 

	$rpl[] = "&acute;"; 

	$srch[]="\n"; 

	$rpl[] = "<br>"; 

	$srch[]="\r"; 

	$rpl[] = ""; 

	$srch[]=".JPG"; 

	$rpl[] = ".jpg"; 

	

	$srch2[]="\""; 

	$rpl2[] = "&quot;"; 

	$srch2[]="'"; 

	$rpl2[] = ""; 

	$srch2[]="&#305;"; 

	$rpl2[] = "i"; 

	$srch2[]="ü"; 

	$rpl2[] = "&uuml;"; 

	$srch2[]=" "; 

	$rpl2[] = "_"; 

	

	$srch3[]="\""; 

	$rpl3[] = "&quot;"; 

	

	$srch4[]="ü"; 

	$rpl4[] = "&uuml;"; 



 	$metin=str_replace($srch,$rpl,$metin);

 	return $metin ;

	}





function kodyaz2($metin){

 $srch[]="\""; 

	$rpl[] = "\""; 

	$srch[]="'"; 

	//$rpl[] = "&acute;"; 

	$rpl[] = "[tirnak]"; 

	$srch[]="\n"; 

	$rpl[] = "<br>"; 

	$srch[]="<br/>"; 

	$rpl[] = "\n"; 

	$srch[]="\r"; 

	$rpl[] = ""; 

	$srch[]=".JPG"; 

	$rpl[] = ".jpg"; 

	

	$srch2[]="\""; 

	$rpl2[] = "&quot;"; 

	$srch2[]="'"; 

	$rpl2[] = ""; 

	$srch2[]="&#305;"; 

	$rpl2[] = "i"; 

	$srch2[]="ü"; 

	$rpl2[] = "&uuml;"; 

	$srch2[]=" "; 

	$rpl2[] = "_"; 

	

	$srch3[]="\""; 

	$rpl3[] = "&quot;"; 

	

	$srch4[]="ü"; 

	$rpl4[] = "&uuml;"; 

	

	$metin=str_replace($rpl,$srch,$metin);

	

 return $metin;

}



function isimkontrol($isim){

	$isim=str_replace("&#305;","i",$isim);

	$isim=str_replace("&#304;","i",$isim);

	

	$isim=strtolower($isim);

	$iuz=strlen($isim);

	$harf='';

	

	$kelime='';

	for($i=0;$i<=$iuz;$i++){

		$harf=substr($isim,$i,1);

		switch($harf){

		//11_1_ü&#287;&#305;&#351;çö Ü&#286;&#304;&#350;ÇÖ.jpg

			case chr(253):	$harf='i';	break;

			case chr(221): 	$harf='i';	break;

			case chr(254): 	$harf='s';	break;

			case chr(222):	$harf='s';	break;

			case chr(240): 	$harf='g';	break;

			case chr(208):	$harf='g';	break;

			case chr(214):	$harf='o';	break;

			case chr(246):	$harf='o';	break;

			case chr(231):	$harf='c';	break;

			case chr(199):	$harf='c';	break;

			case chr(252):	$harf='u';	break;

			case chr(220):	$harf='u';	break;

			case ' ':		$harf='_';	break;

		}

		$kelime.=$harf;

	}

	return $kelime;

}



function resimkontrol($dosya,$maxw,$maxh,$maxs){

		if(preg_match("/.jpg$|.jpeg$|.gif$|.png$|/i", $dosya)){

		  list($width, $height, $type, $attr) = getimagesize($dosya);

			$dsize=filesize($dosya)/1024;

			if($width<=$maxw && $height<=$maxh){

				if($dsize>$maxs){

					$mesaj="Yüklenen dosyanin boyutu en fazla $maxs KB olabilir.";		

					unlink($dosya);			

				}else{

					$mesaj="tamam";

				}

			}else{

				$mesaj="Yüklenen dosyanin boyutlari en fazla $maxw x $maxh olmali.";

				unlink($dosya);	

			}		

		}else{

			$mesaj="Bu tür bir dosyayi gönderemezsiniz.";

			unlink($dosya);

		} //if preg_match  

	return $mesaj;

}//resimkontrol



function dosyakontrol($dosya){

		if(preg_match("/.pdf$|.zip$|.xls$|.doc$/i", $dosya)){

			$dsize=filesize($dosya)/1024;

			return "tamam";

		}else{

			return "Bu tür bir dosyayi gönderemezsiniz.";

		} //if preg_match  

	return $mesaj;

}//resimkontrol



function sin_oku ($metin) { return stripslashes(trim($metin));}

function sin_ekle ($metin) { return addslashes(trim($metin));}



function tekil($rakam) { return $rakam & 1; /* 0 = çift, 1 = tek */ }



function sin_boyutla_ozel($kaynakdosya, $hedefdosya,$maxyukseklik,$maxgenislik)

{



$imgsize=getimagesize($kaynakdosya);



                if ($imgsize[2] == 1) { $ftype = "gif";}

                if ($imgsize[2] == 2) { $ftype = "jpg";}

                if ($imgsize[2] == 3) { $ftype = "png";}



$sikistirmaorani           = 100;

$kaynakfile                = $kaynakdosya;

$hedeffile                 = $hedefdosya;

$genislik                  = $maxgenislik;

$yukseklik                 = $maxyukseklik;



           if (file_exists($kaynakfile))

                {        $olculer=getimagesize($kaynakfile);

                        if(($olculer[0]-$genislik)>=($olculer[1]-$yukseklik)) {

                            $g_iw=$genislik;

                            $g_ih=($genislik/$olculer[0])*$olculer[1];

                } else {

                $g_ih=$yukseklik;

                $g_iw=($g_ih/$olculer[1])*$olculer[0];

                       }

if ($ftype == "jpg"){

$yenikaynak=imagecreatefromjpeg($kaynakfile);

}



elseif ($ftype == "png"){

$yenikaynak=imagecreatefrompng($kaynakfile);

}



elseif ($ftype == "gif"){

$yenikaynak=imagecreatefromgif($kaynakfile);

}else{ /*die("Resim dosyasý kabul edilmedi..");*/}



$yenihedef=imagecreatetruecolor($g_iw, $g_ih);



$imgcpres=imagecopyresized($yenihedef, $yenikaynak, 0, 0, 0, 0, $g_iw, $g_ih, $olculer[0], $olculer[1]);

$imgjpeg=imagejpeg($yenihedef, $hedeffile, $sikistirmaorani);

imagedestroy($yenihedef);

}

}

function dosya_yukleme_hatasi($dosya){

 switch($dosya){

   case 0: //no error; possible file attack!

     return "Dosya gönderilirken bir hata olustu.";

     break;

   case 1: //uploaded file exceeds tde upload_max_filesize directive in php.ini

     return "Yüklemeye çalistiginiz dosya çok büyük.";

     break;

   case 2: //uploaded file exceeds tde MAX_FILE_SIZE directive tdat was specified in tde html form

     return "Yüklemeye çalistiginiz dosya çok büyük.";

     break;

   case 3: //uploaded file was only partially uploaded

     return "Yüklemeye çalistiginiz dosya daha önce kismen yüklenmis.";

     break;

   case 4: //no file was uploaded

     return "Dosya seçmediniz.";

     break;

   default: //a default error, just in case!  :)

     return "Dosya göndeilirken bir hata olustu.";

     break;

 }

}

 



 	$srch[]="\""; 

	$rpl[] = "[tirnak]"; 

	$srch[]="'"; 

	$rpl[] = "&acute;"; 

	$srch[]="\n"; 

	$rpl[] = "<br>"; 

	$srch[]=".JPG"; 

	$rpl[] = ".jpg"; 

	

	$srch2[]="[tirnak]"; 

	$rpl2[] = "\""; 

	$srch2[]="<br>"; 

	$rpl2[] = "\n"; 

	$srch2[]="\""; 

	$rpl2[] = "&quot;"; 

	$srch2[]="\&acute;"; 

	$rpl2[] = "&acute;"; 

	$srch2[]="&#305;"; 

	$rpl2[] = "i"; 

	

	$srch3[]="[tirnak]"; 

	$rpl3[] = "\""; 

	$srch3[]="\""; 

	$rpl3[] = "&quot;"; 

	$srch3[]="'"; 

	$rpl3[] = ""; 

	$srch3[]="&#305;"; 

	$rpl3[] = "i"; 

	

	$srch4[]="ü"; 

	$rpl4[] = "u"; 

	

function resimboyutu($resim,$W,$H){

	     $rsm="$resim";  

	    $resimsz=@getimagesize($rsm);

        $genislik=$resimsz[0];

        $yukseklik=$resimsz[1];

            if($genislik>=$W or $yukseklik>=$H) { 

              do {

                 $genislik=$genislik*0.95; 

			     $yukseklik=$yukseklik*0.95; 

			     }

		      while ($genislik>=$W or $yukseklik>=$H);

			 }

   else{$genislik1=$genislik ; $yukseklik1=$yukseklik ;}

      		$genislik1=$genislik ; $yukseklik1=$yukseklik ;



	 $img="	<img border='0' class='resim' src='$resim' width='".round($genislik1)."' height='".round($yukseklik1)."'>";



	return($img);

}

function resimboyutu2($resim,$W,$H,$hiza){

	     $rsm="$resim";  

	    $resimsz=@getimagesize($rsm);

        $genislik=$resimsz[0];

        $yukseklik=$resimsz[1];

            if($genislik>=$W or $yukseklik>=$H) { 

              do {

                 $genislik=$genislik*0.95; 

			     $yukseklik=$yukseklik*0.95; 

			     }

		      while ($genislik>=$W or $yukseklik>=$H);

			 }

   else{$genislik1=$genislik ; $yukseklik1=$yukseklik ;}

      		$genislik1=$genislik ; $yukseklik1=$yukseklik ;



	 $img="	 <table border='0' cellpadding='3' cellspacing='0' align='$hiza'>

  <tr>

    <td>

	 <img src='$resim' width='".round($genislik1)."' height='".round($yukseklik1)."'>

	 </td>

  </tr>

</table>";



	return($img);

}



function resimboyut($resim,$x,$y,$a){

$resimsz=@getimagesize($resim);

 $genislik=$resimsz[0];

 $yukseklik=$resimsz[1];

  if($genislik>=$x or $yukseklik>=$y) { 

       do {

           $genislik=$genislik*0.95; 

		   $yukseklik=$yukseklik*0.95; 

		}while($genislik>=$x or $yukseklik>=$y);

	}else{

   		$genislik1=$genislik ; 

		$yukseklik1=$yukseklik ;

	}

	

	if($a==1){

   		$sayi=round($genislik); 

	}else{

		$sayi=round($yukseklik);

	}	

	return $sayi;

}

function wordlimit($string, $lengtd = 50, $ellipsis = "..")

{

   $paragraph = explode(" ", $string);



   if($lengtd < count($paragraph))

   {

       for($i = 0; $i < $lengtd; $i++)

       {

           if($i < $lengtd - 1)

               $output .= $paragraph[$i] . " ";

           else

               $output .= $paragraph[$i] . $ellipsis;

       }	   	   

       return $output;

   }

   return $string;

}

// tarih hesaplama

function count_days($start, $end)

{

   if( $start != '0000-00-00' and $end != '0000-00-00' )

   {

       $timestamp_start = strtotime($start);

       $timestamp_end = strtotime($end);

       #if( $timestamp_start >= $timestamp_end ) return 0;

       $start_year = date("Y",$timestamp_start);

       $end_year = date("Y", $timestamp_end);

       $num_days_start = date("z",strtotime($start));

       $num_days_end = date("z", strtotime($end));

       $num_days = 0;

       $i = 0;

       if( $end_year > $start_year )

       {

          while( $i < ( $end_year - $start_year ) )

          {

             $num_days = $num_days + date("z", strtotime(($start_year + $i)."-12-31"));

             $i++;

          }

        }

       if( $end_year < $start_year )

       {

          while( $i < ( $start_year - $end_year ) )

          {

             $num_days = $num_days + date("z", strtotime(($start_year + $i)."-12-31"));

             $i++;

			 $num_days = - $num_days;

          }

        }

		return ( $num_days_end + $num_days ) - $num_days_start;

   }

   else

   {

        return 0;

    }

}



function resimuzantikontrolu($gelen_uzanti)

{

	if($gelen_uzanti=="jpg" || $gelen_uzanti=="jpeg" || $gelen_uzanti=="png" || $gelen_uzanti=="gif")

		{	

			return true;

		}

	else

		{

			return false;

		}

}




function kullaniciadikontrol($kullaniciadi)

{

	if(filter_var($kullaniciadi, FILTER_VALIDATE_EMAIL)) 

		{

			return true;

		}

	else

		{ 

			return false;

		}

}





?>





