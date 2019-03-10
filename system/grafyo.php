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
<?php $con = mysqli_connect("localhost","skanemonka","60AAB3DD53","skanemonka");
     mysqli_set_charset($con,"utf8");
                             
if (mysqli_connect_errno())
  {
  echo "Problem s napojenim na MySQL: " . mysqli_connect_error();
  }
		?>							
<?php 
//OKRUHY GRAF 24h
$zmazat = mysqli_query($con,"DELETE FROM okruhy WHERE date(time) < CURDATE() - INTERVAL 8 day") or die(mysqli_error($con));
$result10 = mysqli_query($con,"SELECT * FROM okruhy WHERE time >= DATE_SUB(NOW(),INTERVAL 24 HOUR)") or die(mysqli_error($con));
$rows10 = array();
$table10 = array();
$table10['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => 'Okruh1', 'type' => 'number'),
	array('label' => 'Okruh2', 'type' => 'number'),
	array('label' => 'Okruh3', 'type' => 'number'),
	array('label' => 'Okruh4', 'type' => 'number')
	);
    foreach($result10 as $r10) {
$cas10 = strtotime($r10['time']);
	$cas10 = date('d.m H:i',$cas10);
        $temp10 = array();
        // The following line will be used to slice the Pie chart
        $temp10[] = array('v' => (string) $cas10);
        $temp10[] = array('v' => (integer) $r10['okruh1']);
		$temp10[] = array('v' => (integer) $r10['okruh2']);
		$temp10[] = array('v' => (integer) $r10['okruh3']);
		$temp10[] = array('v' => (integer) $r10['okruh4']);
        $rows10[] = array('c' => $temp10);
        }
$table10['rows'] = $rows10;
$jsonTable10 = json_encode($table10);
?>

<?php 
//OKRUHY GRAF 7 dni
$result11 = mysqli_query($con,"SELECT * FROM okruhy WHERE time >= DATE_SUB(NOW(),INTERVAL 7 DAY)") or die(mysqli_error($con));
$rows11 = array();
$table11 = array();
$table11['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => 'Okruh1', 'type' => 'number'),
	array('label' => 'Okruh2', 'type' => 'number'),
	array('label' => 'Okruh3', 'type' => 'number'),
	array('label' => 'Okruh4', 'type' => 'number')
	);
    foreach($result11 as $r11) {
$cas11 = strtotime($r11['time']);
	$cas11 = date('d.m H:i',$cas11);
        $temp11 = array();
        // The following line will be used to slice the Pie chart
        $temp11[] = array('v' => (string) $cas11);
        $temp11[] = array('v' => (integer) $r11['okruh1']);
		$temp11[] = array('v' => (integer) $r11['okruh2']);
		$temp11[] = array('v' => (integer) $r11['okruh3']);
		$temp11[] = array('v' => (integer) $r11['okruh4']);
        $rows11[] = array('c' => $temp11);
        }
$table11['rows'] = $rows11;
$jsonTable11 = json_encode($table11);
?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

	<script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable10?>);
      var options = {
          title: 'Aktivita okruhov za 24h - 1 min reprezentácia',
		  	  colors: ['blue', 'red', 'green', 'magenta'],
			  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.AreaChart(document.getElementById('chart_div10'));
      chart.draw(data, options);

    }
    </script>
	<script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable11?>);
      var options = {
          title: 'Aktivita okruhov za 7 dni',
		  	  colors: ['blue', 'red', 'green', 'magenta'],
			  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.AreaChart(document.getElementById('chart_div11'));
      chart.draw(data, options);

    }
    </script>	
</head>
<?php $stranka = "Grafyo";?>
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
										


									<h2>Aktivita okruhov</h2>
								
			
				<div class="col-md-12">
				<div id="chart_div10" style="display: block; width: 100%; height: auto;"></div>
				
				 </div>
				<div class="col-md-12">
				<div id="chart_div11" style="display: block; width: 100%; height: auto;"></div>
				 </div>
			
			
				</div>
								


              </div>
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
