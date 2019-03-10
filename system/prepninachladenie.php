<?php 

file_put_contents(__DIR__ . '/values/mod.txt', "Chladenie");
file_put_contents(__DIR__ . '/values/stavkurenie.txt', "VYP");
file_put_contents(__DIR__ . '/values/rezimkurenie.txt', "Manual");
header("Location: nastavenie.php") ;
?>