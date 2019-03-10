<?php
$cas = date("Y-m-d H:i:s",filemtime(__DIR__ . "/values/teplota.txt"));
$prevedeny = strtotime($cas);
$teraz = date("d.m.Y H:i:s", $prevedeny );  
echo $teraz;
?>