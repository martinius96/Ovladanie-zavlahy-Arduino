<?php 
$teplota = $_GET["teplota"];
$dazd = $_GET["dazd"];

     		$con = mysqli_connect("localhost","skanemonka","60AAB3DD53","skanemonka");
     mysqli_set_charset($con,"utf8");
     
if (mysqli_connect_errno())
  {
  echo "Problém s napojením na MySQL: " . mysqli_connect_error();
  }

if($teplota==-127 || $teplota==-127.00 || $teplota==85.00 || $teplota==85){
	$t = file_get_contents("../../logy/problemysenzorov.txt");
      $today = date("Y-m-d H:i:s");
	  $prevedeny = strtotime($today);
$teraz = date("d.m.Y H:i:s", $prevedeny );  
     
       $t .= $teraz." DS18B20 poslal neplatnú odpoveď!\r\n";
      file_put_contents("../../logy/problemysenzorov.txt",$t);
        
	
}else{
file_put_contents('../values/teplota.txt', $teplota);	




$cas = mysqli_query($con,"SELECT time FROM teploty ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($cas)){		
			$datum = strtotime($line['time']);
			$teraz = strtotime("now");
		}
		$vypocet = $teraz - $datum;
    if(($teraz==NULL)||($datum==NULL)){
  $ins = mysqli_query($con,"INSERT INTO `teploty` (`hodnota`) VALUES ('$teplota')") or die (mysqli_error($con));
		
    }
		if($vypocet >=300){
		$ins = mysqli_query($con,"INSERT INTO `teploty` (`hodnota`) VALUES ('$teplota')") or die (mysqli_error($con));
					
		}



}




if($dazd<0 || $dazd>1023){
	$t = file_get_contents("../../logy/problemysenzorov.txt");
      $today = date("Y-m-d H:i:s");
	  $prevedeny = strtotime($today);
$teraz = date("d.m.Y H:i:s", $prevedeny );  
     
       $t .= $teraz." Dažďový senzor poslal neplatnú odpoveď!\r\n";
      file_put_contents("../../logy/problemysenzorov.txt",$t);
        
	
}else{
$dazdik = file_get_contents("../values/dazd.txt");
if($dazd<300){
if($dazdik!="PRSI"){
	file_put_contents('../values/dazd.txt', "PRSI");
}
		
}else if($dazd>300){
if($dazdik!="PRSI"){
	file_put_contents('../values/dazd.txt', "NEPRSI");
}
}
}


?>