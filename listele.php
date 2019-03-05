
<?php
$keywords = $_GET["keywords"];
$enterurl1= $_GET["enterurl1"];

// Anahtar kelime parcalarının her birinin sayısını buluyoruz.

	$urller = explode("*",$enterurl1);
	$urlsayi=count($urller);
	
	for($i=0;$i<$urlsayi;$i++){
	//	header("Content-type:text/plain");
		 header('Content-Type: text/plain; charset=UTF-8');
	$icerik[$i] = file_get_contents($urller[$i]);
}
// URL'in icerisinde anahtar kelime kumesinin kac defa gectigini bulalım:

if(isset($_GET['keywords'])){
	
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
	
	$parcalar1 = explode(" ",$keywords);
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


	for($k=0;$k<$urlsayi;$k++){	
	echo $keywords.': ';
	for($i=0;$i<$parcasayi1;$i++){
		echo $temp[$k][$i];
		echo " ";
	
	}
	echo"   ";
	echo  $urller[$k];
	echo "\n";
	}
	
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
		
	echo"\n";
	echo "--------------- SEMANTIK ANALIZ ----------------------";
	echo"\n";
		
		// Girilen anahtar kelimeyi parcalıyoruz;
	//	$parcalar2 = explode(" ",$keywords);
	//	$parcasayi2= count($parcalar2);
		
		
		$dosyaismi="es_anlam.txt";
		$okunan=file($dosyaismi);
		$okunansayi = count($okunan);
		
		//	echo print_r ($okunan);
				echo "\n";
			//	echo $okunan[5];
			//	echo "\n";
				//echo $okunansayi;
				
						
			for($i=0;$i<$parcasayi1;$i++){
							
			for($z=0;$z<$okunansayi;$z++){
				
			$okunan2 =explode('*',$okunan[$z]);
			
			if(strcmp($okunan2[0],$parcalar1[$i])==0){
				echo print_r ($okunan2[1]);
				echo "\n";	
				
				$uzunluk2=strlen($okunan2[1]);	
			//Okunan1'i arayıp yazdıracağız:
			
			for($k=0;$k<$urlsayi;$k++){
				
				$sayi2[$k]=0;
			for($j=0;$j<strlen($icerik[$k])-1;$j++){
		
			$parca[$j]=substr($icerik[$k],$j,$uzunluk2);
	
			// Büyük-kücük harf duyarlılıgı:	
			$str1 =strtolower($parca[$j]);	
			$str2= strtolower($okunan2[1]);
	
	// parca[i] = parcalar[i] ise anahtar kelimenin parcasının urlde kac defa gectigini buldurmus oluruz.
		if(strcmp($str1,$str2)==0){
		$sayi2[$k]++;
			}
	}	
		$es_anlam[$k] = $sayi2[$i];
		
	}

	echo $okunan2[1].': ';
	
	for($k=0;$k<$urlsayi;$k++){		
	
		echo $es_anlam[$k];
		echo " ";
	
	}			
	echo"\n";
			

	
		} // if parantezi
	}
			}
		// Es anlamlı ve kendisinin toplam sonucuna göre url bassın:
		
		for($k=0;$k<$urlsayi;$k++){		
	
		$sum[$k]= $es_anlam[$k] + $temp[$k][0];
		echo $sum[$k];
		echo "\n";
			
		}	
		echo"\n";
		
		$max=0;
		$tmp =0;
		
		##döngü başlangıcı
		while($tmp<$urlsayi){
		for($k=0;$k<$urlsayi;$k++){	
			if($sum[$k] > $max){
				$max= $sum[$k];
			}
		}
		for($k=0;$k<$urlsayi;$k++){	
		if($max == $sum[$k]){
			$sum[$k]=0; 
			$max=0;
			echo $urller[$k];
			echo "\n";
			
		// Aynı deger max olmasın diye
		}
		}
		$tmp++;
		}	
		
		echo"\n";		
						
}
				
?>
		
		
