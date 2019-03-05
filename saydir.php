
<?php

$keyword = $_GET["keyword"];
$enterurl= $_GET["enterurl"];

header("Content-type:text/plain");
$icerik = file_get_contents($enterurl);


if(isset($_GET['keyword'])){
	
	$bul[0]= "Ç";
	$bul[1]= "ç";
	$bul[2]= "Ğ";
	$bul[3]= "ğ";
	$bul[4]= "ı";
	$bul[5]= "İ";
	$bul[6]= "Ö";
	$bul[7]= "ö";
	$bul[8]= "Ş";
	$bul[9]= "ş";
	$bul[10]= "Ü";
	$bul[11]= "ü";
	$degistir[0] ="C";
	$degistir[1] ="c";
	$degistir[2] ="G";
	$degistir[3] ="g";
	$degistir[4] ="i";
	$degistir[5] ="I";
	$degistir[6] ="O";
	$degistir[7] ="o";
	$degistir[8] ="S";
	$degistir[9] ="s";
	$degistir[10] ="U";
	$degistir[11] ="u";
	
	$sayi=0;
	$uzunluk=strlen($keyword);

	for($i=0;$i<strlen($icerik)-1;$i++){
		
	$parca[$i]=substr($icerik,$i,$uzunluk);
	
	#Turkce harf duyarlılıgı:
	
	$parca[$i]= str_replace($bul[11], $degistir[11], $parca[$i]);
	$keyword = str_replace($bul[11], $degistir[11], $keyword);
	
	$parca[$i]= str_replace($bul[0], $degistir[0], $parca[$i]);
	$keyword = str_replace($bul[0], $degistir[0], $keyword);
	
	$parca[$i]= str_replace($bul[1], $degistir[1], $parca[$i]);
	$keyword = str_replace($bul[1], $degistir[1], $keyword);
	
	$parca[$i]= str_replace($bul[2], $degistir[2], $parca[$i]);
	$keyword = str_replace($bul[2], $degistir[2], $keyword);
	
	$parca[$i]= str_replace($bul[3], $degistir[3], $parca[$i]);
	$keyword = str_replace($bul[3], $degistir[3], $keyword);
	
	$parca[$i]= str_replace($bul[4], $degistir[4], $parca[$i]);
	$keyword = str_replace($bul[4], $degistir[4], $keyword);
	
	$parca[$i]= str_replace($bul[5], $degistir[5], $parca[$i]);
	$keyword = str_replace($bul[5], $degistir[5], $keyword);
	
	$parca[$i]= str_replace($bul[6], $degistir[6], $parca[$i]);
	$keyword = str_replace($bul[6], $degistir[6], $keyword);
	
	$parca[$i]= str_replace($bul[7], $degistir[7], $parca[$i]);
	$keyword = str_replace($bul[7], $degistir[7], $keyword);
	
	$parca[$i]= str_replace($bul[8], $degistir[8], $parca[$i]);
	$keyword = str_replace($bul[8], $degistir[8], $keyword);
	
	$parca[$i]= str_replace($bul[9], $degistir[9], $parca[$i]);
	$keyword = str_replace($bul[9], $degistir[9], $keyword);
	
	$parca[$i]= str_replace($bul[10], $degistir[10], $parca[$i]);
	$keyword = str_replace($bul[10], $degistir[10], $keyword);
	
	// Büyük-kücük harf duyarlılıgı:	
	$str1 =strtolower($parca[$i]);	
	$str2= strtolower($keyword);
	
	
	//echo "\n"."str1: ".$str1."    str2: ".$str2;
	if(strcmp($str1,$str2)==0){
		$sayi++;
	}
	}	

	echo '-> '.$keyword.': '.$sayi;
		//echo "\n"."str1: ".$str1."    str2: ".$str2;
		
		

}
?>
