
<?php

$keywordss= $_GET["keywordss"];
$enterweb1= $_GET["enterweb1"];



#Aranan kelimenin Url içinde ne kadar geçtiğini bulalım. (Eş anlamlılarıyla)

	$urller = explode("*",$enterweb1);
	$urlsayi=count($urller);
	
	for($i=0;$i<$urlsayi;$i++){
		header("Content-type:text/plain");
	$icerik[$i] = file_get_contents($urller[$i]);
}
// URL'in icerisinde anahtar kelime kumesinin kac defa gectigini bulalım:

if(isset($_GET['keywordss'])){
	
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
	
	$parcalar1 = explode(" ",$keywordss);
	$parcasayi1=count($parcalar1);
	
	
	for($k=0;$k<$urlsayi;$k++){
	
	for($i=0;$i<$parcasayi1;$i++){
	$uzunluk=strlen($parcalar1[$i]);
	$sayi1[$i]=0;	
	// sayfanın icerisinde parca parca, $parcalar[i] nin uzunlugu kadar kelime arıyoruz.
	// parcalar dizisi anahtar kelime kumesinin parcalanmıs halini tutan dizidir.
	// parca dizisi URL icinde kac defa parcalar gectigini tutan dizidir.
	for($j=0;$j<strlen($icerik[$k])-1;$j++){
		
	$parca[$j]=substr($icerik[$k],$j,$uzunluk);
	
	/*if(strstr($parcalar1[$i],$bul[11])==0 || strstr($parca1[$j],$bul[11])==0){
	$parca[$j]= str_replace($bul[11], $degistir[11], $parca[$j]);
	$$parcalar1[$i] = str_replace($bul[11], $degistir[11], $parcalar1[$i]);
	//}
	//if(strstr($parcalar1[$i],$bul[0])==0 || strstr($parca1[$j],$bul[0])==0){
	$parca[$j]= str_replace($bul[0], $degistir[0], $parca[$j]);
	$$parcalar1[$i] = str_replace($bul[0], $degistir[0], $parcalar1[$i]);
	//}
	//if(strstr($parcalar1[$i],$bul[1])==0 || strstr($parca1[$j],$bul[1])==0){
	$parca[$j]= str_replace($bul[1], $degistir[1], $parca[$j]);
	$$parcalar1[$i] = str_replace($bul[1], $degistir[1], $parcalar1[$i]);
	//}
	//if(strstr($parcalar1[$i],$bul[2])==0 || strstr($parca1[$j],$bul[2])==0){
	$parca[$j]= str_replace($bul[2], $degistir[2], $parca[$j]);
	$$parcalar1[$i] = str_replace($bul[2], $degistir[2], $parcalar1[$i]);
	//}
	//if(strstr($parcalar1[$i],$bul[3])|| strstr($parca1[$j],$bul[3])){
	$parca[$j]= str_replace($bul[3], $degistir[3], $parca[$j]);
	$$parcalar1[$i] = str_replace($bul[3], $degistir[3],$parcalar1[$i]);
	//}
	//if(strstr($parcalar1[$i],$bul[4])==0 || strstr($parca1[$j],$bul[4])==0){
	$parca[$j]= str_replace($bul[4], $degistir[4], $parca[$j]);
	$$parcalar1[$i] = str_replace($bul[4], $degistir[4], $parcalar1[$i]);
	//}
	//if(strstr($parcalar1[$i],$bul[5])==0 || strstr($parca1[$j],$bul[5])==0){
	$parca[$j]= str_replace($bul[5], $degistir[5], $parca[$j]);
	$parcalar1[$i] = str_replace($bul[5], $degistir[5], $parcalar1[$i]);
	//}
	//if(strstr($parcalar1[$i],$bul[6])==0 || strstr($parca1[$j],$bul[6])==0){
	$parca[$j]= str_replace($bul[6], $degistir[6], $parca[$j]);
	$$parcalar1[$i] = str_replace($bul[6], $degistir[6],$parcalar1[$i]);
	//}
	//if(strstr($parcalar1[$i],$bul[7])==0 || strstr($parca1[$j],$bul[7])==0){
	$parca[$j]= str_replace($bul[7], $degistir[7], $parca[$j]);
	$$parcalar1[$i] = str_replace($bul[7], $degistir[7], $parcalar1[$i]);
	//}
	//if(strstr($parcalar1[$i],$bul[8])==0 || strstr($parca1[$j],$bul[8])==0){
	$parca[$j]= str_replace($bul[8], $degistir[8], $parca[$j]);
	$parcalar1[$i] = str_replace($bul[8], $degistir[8],$parcalar1[$i]);
	//}
	//if(strstr($parcalar1[$i],$bul[9])==0 || strstr($parca1[$j],$bul[9])==0){
	$parca[$j]= str_replace($bul[9], $degistir[9], $parca[$j]);
	$parcalar1[$i] = str_replace($bul[9], $degistir[9],$parcalar1[$i]);
	//}
	//if(strstr($parcalar1[$i],$bul[10])==0 || strstr($parca1[$j],$bul[10])==0){
	$parca[$j]= str_replace($bul[10], $degistir[10], $parca[$j]);
	$parcalar1[$i] = str_replace($bul[10], $degistir[10], $parcalar1[$i]);
	//}*/
	// Büyük-kücük harf duyarlılıgı:	
	$str1 =strtolower($parca[$j]);	
	$str2= strtolower($parcalar1[$i]);
	
	// parca[i] = parcalar[i] ise anahtar kelimenin parcasının urlde kac defa gectigini buldurmus oluruz.
	if(strcmp($str1,$str2)==0){
		$sayi1[$i]++;
	}
	}	
		$temp[$k][$i] = $sayi1[$i];
	}
	
}
}

	for($k=0;$k<$urlsayi;$k++){	
	echo $keywordss.': ';
	for($i=0;$i<$parcasayi1;$i++){
		echo $temp[$k][$i];
		echo " ";
	
	}
	echo"   ";
	echo  $urller[$k];
	echo "\n";
	}
	echo"\n";
		###################### URL SIRALAMA ALGORITMASI ##########################
		
		# kelimeler arasındaki farkların toplamı		
		for($k=0;$k<$urlsayi;$k++){	
		$min[$k]=0;
			for($i=0;$i<$parcasayi1-1;$i++){				
			$min[$k] -=abs( $temp[$k][$i] - $temp[$k][$i+1]);
		#abs-> mutlak deger fonksiyonu	
			}
			if($min[$k]<0){
				$min[$k]=0-$min[$k];
			}
	}
	
	#kelimelerin toplamını bulma
	for($k=0;$k<$urlsayi;$k++){	
			$toplam[$k]=0;
			for($i=0;$i<$parcasayi1;$i++){				
			$toplam[$k] += $temp[$k][$i];
		#abs-> mutlak deger fonksiyonu	
			}
	
	}
	
		#Skor formülü:
		
		$gecici = 0;
		for($k=0;$k<$urlsayi;$k++){	
		if($toplam[$k]!=0 && $min[$k]!=0){
		$puan[$k] =$toplam[$k] / $min[$k];
		}
		else{
			$puan[$k]=0;
		}
		}
		
		#Son hali yazdırıyoruz.
		for($k=0;$k<$urlsayi;$k++){	
			echo "->Skor: ".$puan[$k];
			echo "   ";			
		}
		echo"\n";
		
		$max=0;
		$tmp =0;
		
		##döngü başlangıcı
		while($tmp<$urlsayi){
		for($k=0;$k<$urlsayi;$k++){	
			if($puan[$k] > $max){
				$max= $puan[$k];
			}
		}
		for($k=0;$k<$urlsayi;$k++){	
		if($max == $puan[$k]){
			$puan[$k]=0; 
			$max=0;
			echo $urller[$k];
			echo "\n";
			
		// Aynı deger max olmasın diye
		}
		}
		$tmp++;
		}	
		
		echo"\n";


#############################################################################################################################################

// URL1'in icerisindeki linkleri bulalım:

function startsWith($haystack, $needle)
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);

    return $length === 0 || 
    (substr($haystack, -$length) === $needle);
}

$start1 = 'http';
$start2 = '//www';
$end1 = '.ico';
$end2 = '.png';
$end3 = '.css';
$end4= '.com';


for($i=0;$i<$urlsayi;$i++){
preg_match_all("/href=\"([^\"]+)/i",$icerik[$i],$links1);
}
	//echo print_r($links1[1]);
	//echo "\n";
	$host = $links1[1];
	$hosts = count($host);
	
	//$host = implode('/',$host);
	for($i=0;$i<$hosts;$i++){
preg_match_all('@^(?:http://|https://)?([^ ]+)@i', $host[$i], $matches);
 echo print_r ($matches[1]);
//echo $host;
	}
	
/*
	if (in_array("https://www.ef.com.tr/erasmus/erasmus-staji/", $links1[1])) {

    echo "Kiraz dizinde var";

 }
	for($i=0;$i<$linksayi1;$i++){
	if(	startsWith($linkparca[$i],$start1)|| startsWith($linkparca[$i],$start2)||!endsWith($linkparca[$i],$end1)||!endsWith($linkparca[$i],$end2)||!endsWith($linkparca[$i],$end3)||!endsWith($linkparca[$i],$end4)){ 
		echo $linkparca[$i];
		echo"\n";
	}
	}*/

?>