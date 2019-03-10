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
	 <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['gauge']}]}"></script>	
</head>
<?php $stranka = "MaxMin";?>
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
									
									<h2>Štatistika</h2>
								<?php $con = mysqli_connect("localhost","skanemonka","60AAB3DD53","skanemonka");
     mysqli_set_charset($con,"utf8");
                             
if (mysqli_connect_errno())
  {
  echo "Problem s napojenim na MySQL: " . mysqli_connect_error();
  }
 $highesttempoutsidetoday = mysqli_query($con,"SELECT hodnota, time FROM teploty
    WHERE date(time) >= DATE(NOW())
    ORDER BY hodnota ASC
    LIMIT 1") or die(mysqli_error($con));         
    $highesttempoutsidetodayJs=0;
	$cas1 = 0;     
           while($row = mysqli_fetch_assoc($highesttempoutsidetoday)){
	 $highesttempoutsidetodayJs = round($row['hodnota'],2); 
	 $cas1 = $row['time'];
	$cas1 = strtotime($cas1);
	 $cas1 = date('H:i',$cas1);
	 }

$highesttemplivingroomtoday = mysqli_query($con,"SELECT hodnota, time FROM teploty
    WHERE date(time) >= DATE(NOW())
    ORDER BY hodnota DESC
    LIMIT 1") or die(mysqli_error($con));         
   $highesttemplivingroomtodayJs=0;
   $cas2 = 0;
           while($row = mysqli_fetch_assoc($highesttemplivingroomtoday)){
	$highesttemplivingroomtodayJs = round($row['hodnota'],2);
		 $cas2 = $row['time'];
	$cas2 = strtotime($cas2);
	 $cas2 = date('H:i',$cas2);
	 } 
	
	
	
	$highesttempbedroomtoday = mysqli_query($con,"SELECT hodnota, time FROM teploty
    WHERE date(time) >= DATE(NOW()) - INTERVAL 7 DAY
    ORDER BY hodnota ASC
    LIMIT 1") or die(mysqli_error($con));         
  $highesttempbedroomtodayJs=0;
  $cas3 = 0;
           while($row = mysqli_fetch_assoc($highesttempbedroomtoday)){
	$highesttempbedroomtodayJs = round($row['hodnota'],2); 
		 $cas3 = $row['time'];
	$cas3 = strtotime($cas3);
	 $cas3 = date('d.m H:i',$cas3);
	} 
  $highestpresoutsidetoday = mysqli_query($con,"SELECT hodnota, time FROM teploty
    WHERE date(time) >= DATE(NOW()) - INTERVAL 7 DAY
    ORDER BY hodnota DESC
    LIMIT 1") or die(mysqli_error($con));         
   $highestpresoutsidetodayJs=0;
   $cas4 = 0;
           while($row = mysqli_fetch_assoc($highestpresoutsidetoday)){
	$highestpresoutsidetodayJs=round($row['hodnota'],2);
		 $cas4 = $row['time'];
	$cas4 = strtotime($cas4);
	 $cas4 = date('d.m H:i',$cas4);
	 }  


 $lowesttempoutsidetoday = mysqli_query($con,"SELECT hodnota, time FROM teploty
    WHERE date(time) >= DATE(NOW()) - INTERVAL 30 DAY
    ORDER BY hodnota ASC
    LIMIT 1") or die(mysqli_error($con));         
    $lowesttempoutsidetodayJs=0;
	$cas5 = 0;     
           while($row = mysqli_fetch_assoc($lowesttempoutsidetoday)){
	 $lowesttempoutsidetodayJs = round($row['hodnota'],2);
	 	 $cas5 = $row['time'];
	$cas5 = strtotime($cas5);
	 $cas5 = date('d.m H:i',$cas5);
	  }

  $lowesttemplivingroomtoday = mysqli_query($con,"SELECT hodnota, time FROM teploty
    WHERE date(time) >= DATE(NOW()) - INTERVAL 30 DAY
    ORDER BY hodnota DESC
    LIMIT 1") or die(mysqli_error($con));         
 
   $lowesttemplivingroomtodayJS=0; 
   $cas6 = 0;
           while($row = mysqli_fetch_assoc($lowesttemplivingroomtoday)){
	$lowesttemplivingroomtodayJs = round($row['hodnota'],2);
	 	 $cas6 = $row['time'];
	$cas6 = strtotime($cas6);
	 $cas6 = date('d.m H:i',$cas6);
	 } 
	 ///////////////////
	  $xxx = mysqli_query($con,"SELECT hodnota, time FROM teploty
    ORDER BY time DESC
    LIMIT 1") or die(mysqli_error($con));         
 
   $xxxJs=0; 
           while($row = mysqli_fetch_assoc($xxx)){
	$xxxJs = round($row['hodnota'],2);
		 $cas7 = $row['time'];
		 $cas7 = strtotime($cas7);
	$cas7 = date('d.m H:i',$cas7);
	 } 

?>

	<script>
var highesttemperatureOutsideTodayJs = <?=$highesttempoutsidetodayJs?>;
var highesttemperatureLivingRoomTodayJs = <?=$highesttemplivingroomtodayJs?>;
var highesttemperatureBedRoomTodayJs = <?=$highesttempbedroomtodayJs?>;
var highestpressureOutsideTodayJs = <?=$highestpresoutsidetodayJs?>;
var lowesttemperatureOutsideTodayJs = <?=$lowesttempoutsidetodayJs?>;
var lowesttemperatureLivingRoomTodayJs = <?=$lowesttemplivingroomtodayJs?>;
var xxxJs = <?=$xxxJs?>;
</script>
<script src="grafy.js"></script>

  <hr><center><h2>Posledné meranie</h2></center><hr>
  <div class="row">
  <div class="col-sm-12"><center><?php echo $cas7;?><br><div id="xxx_chart_div" style="width: 200px; height: 200px; display: inline-block;" title=""></div></center></div>
 
</div>
  <hr><center><h2>Najvyššia teplota dnes/7 dní/30 dní</h2></center><hr>
  <div class="row">
  <div class="col-sm-4"><center><?php echo $cas2;?><br><div id="HighestLivingRoomToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div></center></div>
  <div class="col-sm-4"><center><?php echo $cas4;?><br><div id="HighestBaroToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div></center></div>
  <div class="col-sm-4"><center><?php echo $cas6;?><br><div id="LowestLivingRoomToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div></center></div>
</div>

  <hr><center><h2>Najnižšia teplota dnes/7 dní/30 dní</h2></center><hr>
<div class="row">
  <div class="col-sm-4"><center><?php echo $cas1;?><br><div id="HighestOutsideToday_chart_div" style="width: 200px; height: 200px; display: inline-block;" title=""></div></center></div>
  <div class="col-sm-4"><center><?php echo $cas3;?><br><div id="HighestBedRoomToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div></center></div>
  <div class="col-sm-4"><center><?php echo $cas5;?><br><div id="LowestOutsideToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div></center></div>
</div>
<center>Záznamy posledných 7 dní</center>
<table style="width: 100%;">
									 <tr>
									 <th style="width: 50%;">Čas</th>
									 <th style="width: 50%;">Teplota</th>
									
									 
									 </tr>
<?php
 	$teploty = mysqli_query($con,"SELECT * FROM teploty WHERE date(time) >= DATE(NOW()) - INTERVAL 7 DAY
    ORDER BY id DESC") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($teploty)){
			echo "<tr>";
				$casik = date('d. M H:i',strtotime($line['time']));			
       echo "<td><i>". $casik . "</i></td>";
			echo "<td><i>" . $line['hodnota'] . " °C" . "</i></td>";
			echo "</tr>";
		}  ?> </tbody></table>
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
 
	 $.get('vykurovanie_chladenie.php', function(data){
        $('#xxx').text(data)
    });
	
	$.get('okruhy.php', function(data){
        $('#xyz').text(data)
    });
},500);   
</script>
</html>
<?php }else{
	header("Location: ../index.php");
	
} ?>
