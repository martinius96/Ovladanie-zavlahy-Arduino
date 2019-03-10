<?php

	$mod =  file_get_contents(__DIR__ . '/values/mod.txt');
if($mod=="Kurenie"){
$rezimkurenie =  file_get_contents(__DIR__ . '/values/rezimkurenie.txt');
if($rezimkurenie=="Automat"){
$teplota =  file_get_contents(__DIR__ . '/values/teplota.txt');		
$hysterezakurenie =  file_get_contents(__DIR__ . '/values/hysterezakurenie.txt');
$minushysterezakurenie = 	($hysterezakurenie*(-1));
$teplotakurenie =  file_get_contents(__DIR__ . '/values/teplotakurenie.txt');	
$rozdiel = $teplotakurenie - $teplota;	
if($rozdiel>$hysterezakurenie){
				$stav =  file_get_contents(__DIR__ . '/values/stavkurenie.txt');
				if($stav!="ZAP"){
				file_put_contents(__DIR__ . '/values/stavkurenie.txt', "ZAP");	
				}	
		
			}
			else if($rozdiel<$minushysterezakurenie)
			{
				$stav =  file_get_contents(__DIR__ . '/values/stavkurenie.txt');
				if($stav!="VYP"){
				file_put_contents(__DIR__ . '/values/stavkurenie.txt', "VYP");	
				}	
				
			}



}	



}else if($mod=="Chladenie"){
$rezimchladenie =  file_get_contents(__DIR__ . '/values/rezimchladenie.txt');
if($rezimchladenie=="Automat"){
$teplota =  file_get_contents(__DIR__ . '/values/teplota.txt');		
$hysterezachladenie =  file_get_contents(__DIR__ . '/values/hysterezachladenie.txt');
$minushysterezachladenie = 	($hysterezachladenie*(-1));
$teplotachladenie =  file_get_contents(__DIR__ . '/values/teplotachladenie.txt');	
$rozdiel = $teplotachladenie - $teplota;
	if($rozdiel>$hysterezachladenie)
			{
				$stav =  file_get_contents(__DIR__ . '/values/stavchladenie.txt');
				if($stav!="VYP"){
				file_put_contents(__DIR__ . '/values/stavchladenie.txt', "VYP");	
				}	
				
		
			}
			else if($rozdiel<$minushysterezachladenie)
			{
			$stav =  file_get_contents(__DIR__ . '/values/stavchladenie.txt');
				if($stav!="ZAP"){
				file_put_contents(__DIR__ . '/values/stavchladenie.txt', "ZAP");	
				}	
			}



}
}

$con = mysqli_connect("localhost","skanemonka","60AAB3DD53","skanemonka");
     mysqli_set_charset($con,"utf8");
     
if (mysqli_connect_errno())
  {
  echo "Problém s napojením na MySQL: " . mysqli_connect_error();
  }
  $stavkurenia =  file_get_contents(__DIR__ . '/values/stavkurenie.txt');
  if($stavkurenia=="VYP"){
  	$stavkurenia=0;
  }else if($stavkurenia=="ZAP"){
  	$stavkurenia=1;
  }
  $stavchladenia =  file_get_contents(__DIR__ . '/values/stavchladenie.txt');
   if($stavchladenia=="VYP"){
  	$stavchladenia=0;
  }else if($stavchladenia=="ZAP"){
  	$stavchladenia=1;
  }
  $cas = mysqli_query($con,"SELECT time FROM chladenie_kurenie ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($cas)){		
			$datum = strtotime($line['time']);
			$teraz = strtotime("now");
		}
		$vypocet = $teraz - $datum;
    if(($teraz==NULL)||($datum==NULL)){
  $ins = mysqli_query($con,"INSERT INTO `chladenie_kurenie` (`vykurovanie`, `chladenie`) VALUES ('$stavkurenia', '$stavchladenia')") or die (mysqli_error($con));
		
    }
		if($vypocet >=60){
		$ins = mysqli_query($con,"INSERT INTO `chladenie_kurenie` (`vykurovanie`, `chladenie`) VALUES ('$stavkurenia', '$stavchladenia')") or die (mysqli_error($con));
					
		}

?>