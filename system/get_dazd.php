<?php 
$dazd =  file_get_contents(__DIR__ . '/values/dazd.txt');
if($dazd=="PRSI"){ ?>
	<img src="https://image.flaticon.com/icons/svg/861/861056.svg" width=32px height=32px>	
<?php	
}else{
?>	
<img src="https://image.flaticon.com/icons/svg/861/861060.svg" width=32px height=32px>	
<?php
}
?>