<?php 	
$okruh1 = file_get_contents(__DIR__ . '/values/rezimokruh1.txt');
$okruh2 = file_get_contents(__DIR__ . '/values/rezimokruh2.txt');
$okruh3 = file_get_contents(__DIR__ . '/values/rezimokruh3.txt');
$okruh4 = file_get_contents(__DIR__ . '/values/rezimokruh4.txt');
$stavokruh1 = file_get_contents(__DIR__ . '/values/stavokruh1.txt');
$stavokruh2 = file_get_contents(__DIR__ . '/values/stavokruh2.txt');
$stavokruh3 = file_get_contents(__DIR__ . '/values/stavokruh3.txt');
$stavokruh4 = file_get_contents(__DIR__ . '/values/stavokruh4.txt');
$dazd = file_get_contents(__DIR__ . '/values/dazd.txt');
$aktualcas = date("H:i");
if($dazd=="PRSI"){
if($stavokruh1!="VYP"){
	file_put_contents(__DIR__ . '/values/stavokruh1.txt', "VYP");	
}	
if($stavokruh2!="VYP"){
	file_put_contents(__DIR__ . '/values/stavokruh2.txt', "VYP");	
}
if($stavokruh3!="VYP"){
	file_put_contents(__DIR__ . '/values/stavokruh3.txt', "VYP");	
}
if($stavokruh4!="VYP"){
	file_put_contents(__DIR__ . '/values/stavokruh4.txt', "VYP");	
}
	
}else{
	if($okruh1=="Automat"){
$cas1zaciatok = file_get_contents(__DIR__ . '/values/cas1okruh1.txt');
$cas2zaciatok = file_get_contents(__DIR__ . '/values/cas2okruh1.txt');
$cas1koniec = file_get_contents(__DIR__ . '/values/finalokruh1cas1.txt');
$cas2koniec = file_get_contents(__DIR__ . '/values/finalokruh1cas2.txt');

if((($cas1zaciatok<=$aktualcas)&&($aktualcas<=$cas1koniec))OR(($cas2zaciatok<=$aktualcas)&&($aktualcas<=$cas2koniec))){
	if($stavokruh1!="ZAP"){
	file_put_contents(__DIR__ . '/values/stavokruh1.txt', "ZAP");	
	}
	
}else if(($aktualcas>$cas1koniec)OR($aktualcas>$cas2koniec)){
	if($stavokruh1!="VYP"){
	file_put_contents(__DIR__ . '/values/stavokruh1.txt', "VYP");	
	}
	
}
	}else if($okruh1=="Manual"){
	$finalokruh1 = file_get_contents(__DIR__ . '/values/finalokruh1.txt');
 if($finalokruh1<$aktualcas){
		if($stavokruh1!="VYP"){
	file_put_contents(__DIR__ . '/values/stavokruh1.txt', "VYP");	
	}
	if($finalokruh1!="00:00"){
	file_put_contents(__DIR__ . '/values/finalokruh1.txt', "00:00");	
	}
	}	
	}
	/////////////////////////OKRUH2
	if($okruh2=="Automat"){
$cas1zaciatok = file_get_contents(__DIR__ . '/values/cas1okruh2.txt');
$cas2zaciatok = file_get_contents(__DIR__ . '/values/cas2okruh2.txt');
$cas1koniec = file_get_contents(__DIR__ . '/values/finalokruh2cas1.txt');
$cas2koniec = file_get_contents(__DIR__ . '/values/finalokruh2cas2.txt');

if((($cas1zaciatok<=$aktualcas)&&($aktualcas<=$cas1koniec))OR(($cas2zaciatok<=$aktualcas)&&($aktualcas<=$cas2koniec))){
	if($stavokruh2!="ZAP"){
	file_put_contents(__DIR__ . '/values/stavokruh2.txt', "ZAP");	
	}
	
}else if(($aktualcas>$cas1koniec)OR($aktualcas>$cas2koniec)){
	if($stavokruh2!="VYP"){
	file_put_contents(__DIR__ . '/values/stavokruh2.txt', "VYP");	
	}
	
	
}
	}else if($okruh2=="Manual"){
	$finalokruh2 = file_get_contents(__DIR__ . '/values/finalokruh2.txt');
if($finalokruh2<$aktualcas){
		if($stavokruh2!="VYP"){
	file_put_contents(__DIR__ . '/values/stavokruh2.txt', "VYP");	
	}
	if($finalokruh2!="00:00"){
	file_put_contents(__DIR__ . '/values/finalokruh2.txt', "00:00");	
	}
	
	}	
	}
	//////////////////////////OKRUH3
	if($okruh3=="Automat"){
$cas1zaciatok = file_get_contents(__DIR__ . '/values/cas1okruh3.txt');
$cas2zaciatok = file_get_contents(__DIR__ . '/values/cas2okruh3.txt');
$cas1koniec = file_get_contents(__DIR__ . '/values/finalokruh3cas1.txt');
$cas2koniec = file_get_contents(__DIR__ . '/values/finalokruh3cas2.txt');

if((($cas1zaciatok<=$aktualcas)&&($aktualcas<=$cas1koniec))OR(($cas2zaciatok<=$aktualcas)&&($aktualcas<=$cas2koniec))){
	if($stavokruh3!="ZAP"){
	file_put_contents(__DIR__ . '/values/stavokruh3.txt', "ZAP");	
	}
	
}else if(($aktualcas>$cas1koniec)OR($aktualcas>$cas2koniec)){
	if($stavokruh3!="VYP"){
	file_put_contents(__DIR__ . '/values/stavokruh3.txt', "VYP");	
	}
	
}
	}else if($okruh3=="Manual"){
	$finalokruh3 = file_get_contents(__DIR__ . '/values/finalokruh3.txt');
 if($finalokruh3<$aktualcas){
		if($stavokruh3!="VYP"){
	file_put_contents(__DIR__ . '/values/stavokruh3.txt', "VYP");	
	}
	if($finalokruh3!="00:00"){
	file_put_contents(__DIR__ . '/values/finalokruh3.txt', "00:00");	
	}
	}	
	}
	////////////////////////////OKRUH4
	if($okruh4=="Automat"){
$cas1zaciatok = file_get_contents(__DIR__ . '/values/cas1okruh4.txt');
$cas2zaciatok = file_get_contents(__DIR__ . '/values/cas2okruh4.txt');
$cas1koniec = file_get_contents(__DIR__ . '/values/finalokruh4cas1.txt');
$cas2koniec = file_get_contents(__DIR__ . '/values/finalokruh4cas2.txt');

if((($cas1zaciatok<=$aktualcas)&&($aktualcas<=$cas1koniec))OR(($cas2zaciatok<=$aktualcas)&&($aktualcas<=$cas2koniec))){
	if($stavokruh4!="ZAP"){
	file_put_contents(__DIR__ . '/values/stavokruh4.txt', "ZAP");	
	}
	
}else if(($aktualcas>$cas1koniec)OR($aktualcas>$cas2koniec)){
	if($stavokruh4!="VYP"){
	file_put_contents(__DIR__ . '/values/stavokruh4.txt', "VYP");	
	}
	
}
	}else if($okruh4=="Manual"){
	$finalokruh4 = file_get_contents(__DIR__ . '/values/finalokruh4.txt');
	 if($finalokruh4<$aktualcas){
		if($stavokruh4!="VYP"){
	file_put_contents(__DIR__ . '/values/stavokruh4.txt', "VYP");	
	}
	if($finalokruh4!="00:00"){
	file_put_contents(__DIR__ . '/values/finalokruh4.txt', "00:00");	
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
  $stavokruh1 =  file_get_contents(__DIR__ . '/values/stavokruh1.txt');
  if($stavokruh1=="VYP"){
  	$stavokruh1=0;
  }else if($stavokruh1=="ZAP"){
  	$stavokruh1=1;
  }
  
   $stavokruh2 =  file_get_contents(__DIR__ . '/values/stavokruh2.txt');
  if($stavokruh2=="VYP"){
  	$stavokruh2=0;
  }else if($stavokruh2=="ZAP"){
  	$stavokruh2=1;
  }
  
   $stavokruh3 =  file_get_contents(__DIR__ . '/values/stavokruh3.txt');
  if($stavokruh3=="VYP"){
  	$stavokruh3=0;
  }else if($stavokruh3=="ZAP"){
  	$stavokruh3=1;
  }
  
   $stavokruh4 =  file_get_contents(__DIR__ . '/values/stavokruh4.txt');
  if($stavokruh4 =="VYP"){
  	$stavokruh4=0;
  }else if($stavokruh4 =="ZAP"){
  	$stavokruh4=1;
  }
 
  $cas = mysqli_query($con,"SELECT time FROM okruhy ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($cas)){		
			$datum = strtotime($line['time']);
			$teraz = strtotime("now");
		}
		$vypocet = $teraz - $datum;
    if(($teraz==NULL)||($datum==NULL)){
  $ins = mysqli_query($con,"INSERT INTO `okruhy` (`okruh1`, `okruh2`, `okruh3`, `okruh4`) VALUES ('$stavokruh1', '$stavokruh2', '$stavokruh3', '$stavokruh4')") or die (mysqli_error($con));
		
    }
		if($vypocet >=60){
		$ins = mysqli_query($con,"INSERT INTO `okruhy` (`okruh1`, `okruh2`, `okruh3`, `okruh4`) VALUES ('$stavokruh1', '$stavokruh2', '$stavokruh3', '$stavokruh4')") or die (mysqli_error($con));
					
		}

?>
