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
<?php $stranka = "Udaje";?>
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
					 <center>  
			 <h2>Zmena prístupových údajov k web rozhraniu</h2>
			 <?php if(isset($_POST['zmenitprihlasovacieudaje'])){
  	$username = $_POST['username'];
	$username = trim( $username );
    $username = htmlspecialchars( $username, ENT_QUOTES );
	$password = $_POST['password'];
	$password = trim( $password );
    $password = htmlspecialchars( $password, ENT_QUOTES );  
	
	file_put_contents(__DIR__ . '/values/username.txt', sha1($username));
	file_put_contents(__DIR__ . '/values/password.txt', sha1($password));
	echo'<b>Vaše prihlasovacie údaje boli úspešne zmenené!</b> <br>';
	echo"Nové používateľské meno: <font color='green'>".$username."</font><br>";
	echo"Nové používateľské heslo: <font color='green'>".$password."</font><br>";
	echo"Uložený hash mena: <font color='red'>".sha1($username)."</font><br>";
	echo"Uložený hash hesla: <font color='red'>".sha1($password)."</font>";
  }?>
			 <form method="post" action="zmena-loginu.php">
             <input name="username" style="text-align: center; width: 50%;" placeholder="Meno" type="text">
			 <input name="password" style="text-align: center; width: 50%;" placeholder="Heslo" type="text"><br>
               <input type="submit" name="zmenitprihlasovacieudaje" class="btn btn-danger" value="Zmeniť">    </form>    </center>
									
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
