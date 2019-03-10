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
<?php $stranka = "Log";?>
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
							<h2><font color="black">Logy</font></h2>
									<h3>Neúspešné prihlásenia do systému <center><a href="zmazatlog.php" class="btn btn-danger">Zmazať log pokusných prihlásení</a>	</center></h3>
									 <?php 
             echo nl2br(file_get_contents('../logy/neuspesneprihlasenia.txt'));     
             ?>
			 <h3>Problémy senzorov <center><a href="zmazatsenzory.php" class="btn btn-danger">Zmazať chybový log senzorov</a>	</center>	</h3>
			 	 <?php 
             echo nl2br(file_get_contents('../logy/problemysenzorov.txt'));     
             ?>
		
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
},1000);   
</script>
<?php 
include ("js_realtime.php");
?>

</html>
<?php }else{
	header("Location: ../index.php");
	
} ?>
