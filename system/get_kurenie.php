<?php 
$mod =  file_get_contents(__DIR__ . '/values/mod.txt');
if($mod=="Kurenie"){ ?>
	<img src="https://image.flaticon.com/icons/svg/291/291201.svg" width=32px height=32px title="Aktívne!" alt="Aktívne!">
<?php	
}else{
?>	
<img src="https://image.flaticon.com/icons/svg/678/678674.svg" width=32px height=32px title="Neaktívne!" alt="Neaktívne!">
<?php
}
?>
