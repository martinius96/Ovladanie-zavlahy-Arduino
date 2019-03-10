<?php 

file_put_contents(__DIR__ . '/values/mod.txt', "Kurenie");
file_put_contents(__DIR__ . '/values/stavchladenie.txt', "VYP");
file_put_contents(__DIR__ . '/values/rezimchladenie.txt', "Manual");
header("Location: nastavenie.php") ;
?>