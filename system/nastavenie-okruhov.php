<?php
error_reporting(0);
session_start();
  if ($_SESSION['logapp']===true){
?>
<!doctype html>
<html lang="sk">

<head>
<?php 
include ("meta.php");
?>
	
</head>
<?php $stranka = "Okruhy";?>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
	
	<?php 
include ("menu.php");
?>	
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
							<div class="panel-body">
							<h2><font color="black">Nastavenie časovačom pre okruhov</font></h2>
									 <table style="width: 100%;">
       <tr>
               <td>
               <h2><center><?php echo file_get_contents("nazvyperiferii/okruh1.txt");?></center></h2>
   <center> 
   <?php 
   	$okruh1 = file_get_contents(__DIR__ . '/values/rezimokruh1.txt');
	if($okruh1=="Automat"){
	echo file_get_contents("values/stavokruh1.txt");
  echo'<br>';
    if(isset($_POST['zapisatokruh1'])){
       $cas1okruh1 = $_POST['cas1okruh1'];
	   $cas2okruh1 = $_POST['cas2okruh1'];   
	   $dlzkaokruh1 = $_POST['dlzkaokruh1']; 
file_put_contents(__DIR__ . '/values/cas1okruh1.txt', $cas1okruh1);
file_put_contents(__DIR__ . '/values/cas2okruh1.txt', $cas2okruh1);
file_put_contents(__DIR__ . '/values/dlzkaokruh1.txt', $dlzkaokruh1);	   
$dlzkaokruh1d = strtotime($dlzkaokruh1);
$cas1okruh1 = strtotime($cas1okruh1);
$cas2okruh1 = strtotime($cas2okruh1);
$final = $cas1okruh1 + $dlzkaokruh1d+10800;
$final2 = $cas2okruh1 + $dlzkaokruh1d+10800;
$finaltime = date("H:i", $final);
$finaltime2 = date("H:i", $final2);
file_put_contents(__DIR__ . '/values/finalokruh1cas1.txt', $finaltime);
file_put_contents(__DIR__ . '/values/finalokruh1cas2.txt', $finaltime2);	
}
  ?>
	<a href="prepninamanualokruh1.php" class="btn btn-info" style="width=300px;">Prepnúť na manual</a>
	<form method="post" action="nastavenie-okruhov.php">
             <b>HH:mm - prvý časovač</b><br><input name="cas1okruh1" style="text-align: center" type="time" value="<?php echo file_get_contents("values/cas1okruh1.txt");?>" required><br>
			 <b>HH:mm - druhý časovač</b><br><input name="cas2okruh1" style="text-align: center" type="time" value="<?php echo file_get_contents("values/cas2okruh1.txt");?>" required><br>
			 <b>HH:mm - dĺžka zalievania</b><br><input name="dlzkaokruh1" style="text-align: center" type="time" value="<?php echo file_get_contents("values/dlzkaokruh1.txt");?>" required><br>
               <input type="submit" name="zapisatokruh1" class="btn btn-success" value="Zmeniť">    </form>    </center>
  <?php }else if($okruh1=="Manual"){



  
  if(isset($_POST['startokruh1'])){
       $manualdlzka1 = $_POST['manualdlzka1'];        
 file_put_contents(__DIR__ . '/values/manualokruh1.txt', $manualdlzka1);
$dazd =  file_get_contents("values/dazd.txt");
 if($dazd=="PRSI"){
 	file_put_contents(__DIR__ . '/values/stavokruh1.txt', "VYP");
	echo '<b>Prší! Okruh nebude zapnutý!</b><br>';
 }else{
 	file_put_contents(__DIR__ . '/values/stavokruh1.txt', "ZAP");	
	$datum = strtotime($manualdlzka1);
	$hm = date("H:i"); 
	$teraz = strtotime($hm);
	$final = $datum + $teraz+10800;
	$finaltime = date("H:i", $final);
	file_put_contents(__DIR__ . '/values/finalokruh1.txt', $finaltime);
		echo '<b>Okruh úspešne zapnutý!</b><br>';
	
}
 
  }
          $stavokruh1 = file_get_contents("values/stavokruh1.txt");
   if($stavokruh1=="ZAP"){
   	echo $stavokruh1;
 echo' do: ';
  echo file_get_contents("values/finalokruh1.txt");
  echo'<br>';
   }else{
   echo file_get_contents("values/stavokruh1.txt");
 	echo'<br>';	
   }?>
  
	<a href="prepninaautomatokruh1.php" class="btn btn-info" style="width=300px;">Prepnúť na automat</a>
	<form method="post" action="nastavenie-okruhov.php">
	<b>HH:mm - dĺžka zalievania</b><br><input name="manualdlzka1" style="text-align: center" type="time" value="<?php echo file_get_contents("values/manualokruh1.txt");?>" required><br>
    <input type="submit" name="startokruh1" class="btn btn-success" value="Spusť">    </form>   
	<?php } ?>
	 </center>
        
               </td>
			   <td>
			   <center><h2><?php echo file_get_contents("nazvyperiferii/okruh2.txt");?></h2></center>
   <center> 
   <?php 
   	$okruh2 = file_get_contents(__DIR__ . '/values/rezimokruh2.txt');
	if($okruh2=="Automat"){
	echo file_get_contents("values/stavokruh2.txt");
  echo'<br>';
    if(isset($_POST['zapisatokruh2'])){
       $cas1okruh2 = $_POST['cas1okruh2'];
	   $cas2okruh2 = $_POST['cas2okruh2'];   
	   $dlzkaokruh2 = $_POST['dlzkaokruh2']; 
file_put_contents(__DIR__ . '/values/cas1okruh2.txt', $cas1okruh2);
file_put_contents(__DIR__ . '/values/cas2okruh2.txt', $cas2okruh2);
file_put_contents(__DIR__ . '/values/dlzkaokruh2.txt', $dlzkaokruh2);	   
$dlzkaokruh2d = strtotime($dlzkaokruh2);
$cas1okruh2 = strtotime($cas1okruh2);
$cas2okruh2 = strtotime($cas2okruh2);
$final = $cas1okruh2 + $dlzkaokruh2d+10800;
$final2 = $cas2okruh2 + $dlzkaokruh2d+10800;
$finaltime = date("H:i", $final);
$finaltime2 = date("H:i", $final2);
file_put_contents(__DIR__ . '/values/finalokruh2cas1.txt', $finaltime);
file_put_contents(__DIR__ . '/values/finalokruh2cas2.txt', $finaltime2);	
}
  ?>
	<a href="prepninamanualokruh2.php" class="btn btn-info" style="width=300px;">Prepnúť na manual</a>
	<form method="post" action="nastavenie-okruhov.php">
             <b>HH:mm - prvý časovač</b><br><input name="cas1okruh2" style="text-align: center" type="time" value="<?php echo file_get_contents("values/cas1okruh2.txt");?>" required><br>
			 <b>HH:mm - druhý časovač</b><br><input name="cas2okruh2" style="text-align: center" type="time" value="<?php echo file_get_contents("values/cas2okruh2.txt");?>" required><br>
			 <b>HH:mm - dĺžka zalievania</b><br><input name="dlzkaokruh2" style="text-align: center" type="time" value="<?php echo file_get_contents("values/dlzkaokruh2.txt");?>" required><br>
               <input type="submit" name="zapisatokruh2" class="btn btn-success" value="Zmeniť">    </form>    </center>
  <?php }else if($okruh2=="Manual"){



  
  if(isset($_POST['startokruh2'])){
       $manualdlzka2 = $_POST['manualdlzka2'];        
 file_put_contents(__DIR__ . '/values/manualokruh2.txt', $manualdlzka2);
$dazd =  file_get_contents("values/dazd.txt");
 if($dazd=="PRSI"){
 	file_put_contents(__DIR__ . '/values/stavokruh2.txt', "VYP");
	echo '<b>Prší! Okruh nebude zapnutý!</b><br>';
 }else{
 	file_put_contents(__DIR__ . '/values/stavokruh2.txt', "ZAP");	
	$datum = strtotime($manualdlzka2);
	$hm = date("H:i"); 
	$teraz = strtotime($hm);
	$final = $datum + $teraz+10800;
	$finaltime = date("H:i", $final);
	file_put_contents(__DIR__ . '/values/finalokruh2.txt', $finaltime);
		echo '<b>Okruh úspešne zapnutý!</b><br>';
	
}
 
  }
          $stavokruh2 = file_get_contents("values/stavokruh2.txt");
   if($stavokruh2=="ZAP"){
   	echo $stavokruh2;
 echo' do: ';
  echo file_get_contents("values/finalokruh2.txt");
  echo'<br>';
   }else{
   echo file_get_contents("values/stavokruh2.txt");
 	echo'<br>';	
   }?>
  
	<a href="prepninaautomatokruh2.php" class="btn btn-info" style="width=300px;">Prepnúť na automat</a>
	<form method="post" action="nastavenie-okruhov.php">
	<b>HH:mm - dĺžka zalievania</b><br><input name="manualdlzka2" style="text-align: center" type="time" value="<?php echo file_get_contents("values/manualokruh2.txt");?>" required><br>
    <input type="submit" name="startokruh2" class="btn btn-success" value="Spusť">    </form>   
	<?php } ?>
	 </center>
			   </td>   
               </tr>
			   </table>
			   <table style="width: 100%;">
			   <tr>
			   <td>
			   <h2><center><?php echo file_get_contents("nazvyperiferii/okruh3.txt");?></center></h2>
   <center> 
   <?php 
   	$okruh3 = file_get_contents(__DIR__ . '/values/rezimokruh3.txt');
	if($okruh3=="Automat"){
	echo file_get_contents("values/stavokruh3.txt");
  echo'<br>';
    if(isset($_POST['zapisatokruh3'])){
       $cas1okruh3 = $_POST['cas1okruh3'];
	   $cas2okruh3 = $_POST['cas2okruh3'];   
	   $dlzkaokruh3 = $_POST['dlzkaokruh3']; 
file_put_contents(__DIR__ . '/values/cas1okruh3.txt', $cas1okruh3);
file_put_contents(__DIR__ . '/values/cas2okruh3.txt', $cas2okruh3);
file_put_contents(__DIR__ . '/values/dlzkaokruh3.txt', $dlzkaokruh3);	   
$dlzkaokruh3d = strtotime($dlzkaokruh3);
$cas1okruh3 = strtotime($cas1okruh3);
$cas2okruh3 = strtotime($cas2okruh3);
$final = $cas1okruh3 + $dlzkaokruh3d+10800;
$final2 = $cas2okruh3 + $dlzkaokruh3d+10800;
$finaltime = date("H:i", $final);
$finaltime2 = date("H:i", $final2);
file_put_contents(__DIR__ . '/values/finalokruh3cas1.txt', $finaltime);
file_put_contents(__DIR__ . '/values/finalokruh3cas2.txt', $finaltime2);	
}
  ?>
	<a href="prepninamanualokruh3.php" class="btn btn-info" style="width=300px;">Prepnúť na manual</a>
	<form method="post" action="nastavenie-okruhov.php">
             <b>HH:mm - prvý časovač</b><br><input name="cas1okruh3" style="text-align: center" type="time" value="<?php echo file_get_contents("values/cas1okruh3.txt");?>" required><br>
			 <b>HH:mm - druhý časovač</b><br><input name="cas2okruh3" style="text-align: center" type="time" value="<?php echo file_get_contents("values/cas2okruh3.txt");?>" required><br>
			 <b>HH:mm - dĺžka zalievania</b><br><input name="dlzkaokruh3" style="text-align: center" type="time" value="<?php echo file_get_contents("values/dlzkaokruh3.txt");?>" required><br>
               <input type="submit" name="zapisatokruh3" class="btn btn-success" value="Zmeniť">    </form>    </center>
  <?php }else if($okruh3=="Manual"){



  
  if(isset($_POST['startokruh3'])){
       $manualdlzka3 = $_POST['manualdlzka3'];        
 file_put_contents(__DIR__ . '/values/manualokruh3.txt', $manualdlzka3);
$dazd =  file_get_contents("values/dazd.txt");
 if($dazd=="PRSI"){
 	file_put_contents(__DIR__ . '/values/stavokruh3.txt', "VYP");
	echo '<b>Prší! Okruh nebude zapnutý!</b><br>';
 }else{
 	file_put_contents(__DIR__ . '/values/stavokruh3.txt', "ZAP");	
	$datum = strtotime($manualdlzka3);
	$hm = date("H:i"); 
	$teraz = strtotime($hm);
	$final = $datum + $teraz+10800;
	$finaltime = date("H:i", $final);
	file_put_contents(__DIR__ . '/values/finalokruh3.txt', $finaltime);
		echo '<b>Okruh úspešne zapnutý!</b><br>';
	
}
 
  }
          $stavokruh3 = file_get_contents("values/stavokruh3.txt");
   if($stavokruh3=="ZAP"){
   	echo $stavokruh3;
 echo' do: ';
  echo file_get_contents("values/finalokruh3.txt");
  echo'<br>';
   }else{
   echo file_get_contents("values/stavokruh3.txt");
 	echo'<br>';	
   }?>
  
	<a href="prepninaautomatokruh3.php" class="btn btn-info" style="width=300px;">Prepnúť na automat</a>
	<form method="post" action="nastavenie-okruhov.php">
	<b>HH:mm - dĺžka zalievania</b><br><input name="manualdlzka3" style="text-align: center" type="time" value="<?php echo file_get_contents("values/manualokruh3.txt");?>" required><br>
    <input type="submit" name="startokruh3" class="btn btn-success" value="Spusť">    </form>   
	<?php } ?>
	 </center>
			   </td>
			   <td> <center><h2><?php echo file_get_contents("nazvyperiferii/okruh4.txt");?></h2></center>
   <center> 
   <?php 
   	$okruh4 = file_get_contents(__DIR__ . '/values/rezimokruh4.txt');
	if($okruh4=="Automat"){
	echo file_get_contents("values/stavokruh4.txt");
  echo'<br>';
    if(isset($_POST['zapisatokruh4'])){
       $cas1okruh4 = $_POST['cas1okruh4'];
	   $cas2okruh4 = $_POST['cas2okruh4'];   
	   $dlzkaokruh4 = $_POST['dlzkaokruh4']; 
file_put_contents(__DIR__ . '/values/cas1okruh4.txt', $cas1okruh4);
file_put_contents(__DIR__ . '/values/cas2okruh4.txt', $cas2okruh4);
file_put_contents(__DIR__ . '/values/dlzkaokruh4.txt', $dlzkaokruh4);	   
$dlzkaokruh4d = strtotime($dlzkaokruh4);
$cas1okruh4 = strtotime($cas1okruh4);
$cas2okruh4 = strtotime($cas2okruh4);
$final = $cas1okruh4 + $dlzkaokruh4d+10800;
$final2 = $cas2okruh4 + $dlzkaokruh4d+10800;
$finaltime = date("H:i", $final);
$finaltime2 = date("H:i", $final2);
file_put_contents(__DIR__ . '/values/finalokruh4cas1.txt', $finaltime);
file_put_contents(__DIR__ . '/values/finalokruh4cas2.txt', $finaltime2);	
}
  ?>
	<a href="prepninamanualokruh4.php" class="btn btn-info" style="width=300px;">Prepnúť na manual</a>
	<form method="post" action="nastavenie-okruhov.php">
             <b>HH:mm - prvý časovač</b><br><input name="cas1okruh4" style="text-align: center" type="time" value="<?php echo file_get_contents("values/cas1okruh4.txt");?>" required><br>
			 <b>HH:mm - druhý časovač</b><br><input name="cas2okruh4" style="text-align: center" type="time" value="<?php echo file_get_contents("values/cas2okruh4.txt");?>" required><br>
			 <b>HH:mm - dĺžka zalievania</b><br><input name="dlzkaokruh4" style="text-align: center" type="time" value="<?php echo file_get_contents("values/dlzkaokruh4.txt");?>" required><br>
               <input type="submit" name="zapisatokruh4" class="btn btn-success" value="Zmeniť">    </form>    </center>
  <?php }else if($okruh4=="Manual"){



  
  if(isset($_POST['startokruh4'])){
       $manualdlzka4 = $_POST['manualdlzka4'];        
 file_put_contents(__DIR__ . '/values/manualokruh4.txt', $manualdlzka4);
$dazd =  file_get_contents("values/dazd.txt");
 if($dazd=="PRSI"){
 	file_put_contents(__DIR__ . '/values/stavokruh4.txt', "VYP");
	echo '<b>Prší! Okruh nebude zapnutý!</b><br>';
 }else{
 	file_put_contents(__DIR__ . '/values/stavokruh4.txt', "ZAP");	
	$datum = strtotime($manualdlzka4);
	$hm = date("H:i"); 
	$teraz = strtotime($hm);
	$final = $datum + $teraz+10800;
	$finaltime = date("H:i", $final);
	file_put_contents(__DIR__ . '/values/finalokruh4.txt', $finaltime);
		echo '<b>Okruh úspešne zapnutý!</b><br>';
	
}
 
  }
          $stavokruh4 = file_get_contents("values/stavokruh4.txt");
   if($stavokruh4=="ZAP"){
   	echo $stavokruh4;
 echo' do: ';
  echo file_get_contents("values/finalokruh4.txt");
  echo'<br>';
   }else{
   echo file_get_contents("values/stavokruh4.txt");
 	echo'<br>';	
   }?>
  
	<a href="prepninaautomatokruh4.php" class="btn btn-info" style="width=300px;">Prepnúť na automat</a>
	<form method="post" action="nastavenie-okruhov.php">
	<b>HH:mm - dĺžka zalievania</b><br><input name="manualdlzka4" style="text-align: center" type="time" value="<?php echo file_get_contents("values/manualokruh4.txt");?>" required><br>
    <input type="submit" name="startokruh4" class="btn btn-success" value="Spusť">    </form>   
	<?php } ?>
	 </center></td>
			   
			   
			   
			   </tr></table>
			  
									
								</div>
							</div>
					
						</div>
						
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2018 <a href="https://www.themeineed.com" target="_blank">Smart Home</a></p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
<?php
include ("js_files.php");
?>	
	
</body>
<script>
       setInterval(function(){
    $.get('get_cas.php', function(data){
        $('#poslednateplotacas').text(data)
    });
	$.get('get_stavkurenie.php', function(data){
        $('#stavkurenie').text(data)
    });
	$.get('get_rezimkurenie.php', function(data){
        $('#rezimkurenie').text(data)
    });
	$.get('get_stavchladenie.php', function(data){
        $('#stavchladenie').text(data)
    });
	$.get('get_rezimchladenie.php', function(data){
        $('#rezimchladenie').text(data)
    });
	 $.get('vykurovanie_chladenie.php', function(data){
        $('#xxx').text(data)
    });
	$.get('okruhy.php', function(data){
        $('#xyz').text(data)
    });
},500);   
</script>
<?php 
include ("js_realtime.php");
?>

</html>
<?php }else{
	header("Location: ../index.php");
	
} ?>
