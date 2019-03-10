<?php
$today = date("Y-m-d H:i:s");
$was = date("Y-m-d H:i:s.",filemtime(__DIR__ . "/values/teplota.txt"));
$vypocet =(strtotime($today)-strtotime($was));
if($vypocet>=60){
	  echo "<img src='https://image.flaticon.com/icons/svg/678/678674.svg' width=32px height=32px title='Neaktívne!' alt='Neaktívne!'>";
	  	
}else{
 echo "<img src='https://image.flaticon.com/icons/svg/291/291201.svg' width=32px height=32px title='Aktívne!' alt='Aktívne!'>";
	
} 
?>