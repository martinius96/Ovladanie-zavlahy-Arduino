<?php 
file_put_contents(__DIR__ . '/values/rezimchladenie.txt', "Manual");
file_put_contents(__DIR__ . '/values/stavchladenie.txt', "VYP");
header("Location: nastavenie.php") ;
?>