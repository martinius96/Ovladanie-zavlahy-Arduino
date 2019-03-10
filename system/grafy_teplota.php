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
<?php $stranka = "Grafyt";?>
<?php $con = mysqli_connect("localhost","skanemonka","60AAB3DD53","skanemonka");
     mysqli_set_charset($con,"utf8");
                             
if (mysqli_connect_errno())
  {
  echo "Problem s napojenim na MySQL: " . mysqli_connect_error();
  }
$zmazat = mysqli_query($con,"DELETE FROM teploty WHERE date(time) < CURDATE() - INTERVAL 8 day") or die(mysqli_error($con));				
$result = mysqli_query($con,"SELECT * FROM teploty  WHERE time >= DATE_SUB(NOW(),INTERVAL 24 HOUR)") or die(mysqli_error($con));
$rows = array();
$table = array();
$table['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => 'Teplota', 'type' => 'number')
	);
    foreach($result as $r) {
$cas = strtotime($r['time']);
	$cas = date('d.m H:i',$cas);
        $temp = array();
        // The following line will be used to slice the Pie chart
        $temp[] = array('v' => (string) $cas);
        $temp[] = array('v' => (float) $r['hodnota']);
       // $temp[] = array('v' => (float) $r['teplota2']);
        $rows[] = array('c' => $temp);
        }
$table['rows'] = $rows;
$jsonTable = json_encode($table); ?>
<?php 
//DRUHY GRAF
$result4 = mysqli_query($con,"SELECT * FROM teploty  WHERE time >= DATE_SUB(NOW(),INTERVAL 7 DAY)") or die(mysqli_error($con));
$rows4 = array();
$table4 = array();
$table4['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => 'Teplota', 'type' => 'number')
	);
    foreach($result4 as $r4) {
$cas4 = strtotime($r4['time']);
	$cas4 = date('d.m H:i',$cas4);
        $temp4 = array();
        // The following line will be used to slice the Pie chart
        $temp4[] = array('v' => (string) $cas4);
        $temp4[] = array('v' => (float) $r4['hodnota']);
       // $temp[] = array('v' => (float) $r['teplota2']);
        $rows4[] = array('c' => $temp4);
        }
$table4['rows'] = $rows4;
$jsonTable4 = json_encode($table4);




?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
          title: 'Vývoj teploty za posledných 24 hodín v 5-minútových intervaloch',
		  	  colors: ['#00e64d'],
			  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);

    }
    </script>
	 <script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable4?>);
      var options = {
          title: 'Prehľad posledných 7 dní',
		  	  colors: ['#1148aa'],
			  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.LineChart(document.getElementById('chart_div4'));
      chart.draw(data, options);

    }
    </script>
	
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
									
									<h2>Teploty</h2>
						            	<div class="col-md-12">
				<div id="chart_div" style="display: block; width: 100%; height: auto;"></div>
				 </div>
				
				<div class="col-md-12">
				<div id="chart_div4" style="display: block; width: 100%; height: auto;"></div>
				
				 </div>
				
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
