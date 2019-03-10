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
<?php $stranka = "Nastavenie";?>
<body>
	<?php 
		
		$mod = file_get_contents("values/mod.txt"); ?>

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
							
							<?php if($mod=="Chladenie"){ //CHLADENIE CAST
							$rezimchladenie = file_get_contents("values/rezimchladenie.txt");
							$stavchladenie = file_get_contents("values/stavchladenie.txt");
							?>
							<h2><font color="black">Nastavenie logiky chladenia</font></h2>
							<center><a href="prepninakurenie.php" class="btn btn-danger" style="width=300px;">Prepnúť na kúrenie</a>	</center>
						<?php	if($rezimchladenie=="Automat"){?>
						<center>
						<h2>Nastavenie teploty pre chladenie</h2>
						<a href="prepninamanualchladenie.php" class="btn btn-info" style="width=300px;">Prepnúť na manual</a>
						<form method="post" action="nastavenie.php">
      <b>Regulačná teplota</b>    <br>   <input name="teplotachladenie" type=number min=-30 max=50 step=0.5 style="text-align: center; width: 250px;" value="<?php echo file_get_contents("values/teplotachladenie.txt");
?>" type="text" required><br>
<b>Hysteréza</b> <br><input name="hysterezachladenie" type=number min=0 max=5 step=0.5  style="text-align: center; width: 250px;" value="<?php echo file_get_contents("values/hysterezachladenie.txt");
?>" type="text" required> <br><br>
               <input type="submit" name="zmenchladenie" class="btn btn-success" value="Zmeniť">    </form>
							</center>	
							
							
						<?php  } else if($rezimchladenie=="Manual"){ ?>
							<center><a href="prepninaautomatchladenie.php" class="btn btn-info" style="width=300px;">Prepnúť na automat</a>	</center>	
							<?php
							if($stavchladenie=="VYP"){ ?>
							<center><a href="zapnichladenie.php" class="btn btn-success" style="width=300px;">Zapni chladenie manuálne</a>	</center>	
						<?php	}else if($stavchladenie=="ZAP"){ ?>
								<center><a href="vypnichladenie.php" class="btn btn-danger" style="width=300px;">Vypni chladenie manuálne</a>	</center>	
						<?php	}
							
						 } ?>									 <center> 
						   <b>Režim: </b><b id="rezimchladenie"></b> <b>Stav: </b><b id="stavchladenie"></b>
									
									   <?php     if(isset($_POST['zmenchladenie'])){
         $teplotachladenie = $_POST['teplotachladenie'];
	   $hysterezachladenie = $_POST['hysterezachladenie'];
                   
 file_put_contents(__DIR__ . '/values/teplotachladenie.txt', $teplotachladenie);
 file_put_contents(__DIR__ . '/values/hysterezachladenie.txt', $hysterezachladenie);
  }
           ?>
               
									      </center>
									
									
							
							<?php }else if($mod=="Kurenie"){ //KURENIE CAST
							$rezimkurenie = file_get_contents("values/rezimkurenie.txt");
							 $stavkurenie = file_get_contents("values/stavkurenie.txt");
							?>
							<h2><font color="black">Nastavenie logiky vykurovania</font></h2>
							<center><a href="prepninachladenie.php" class="btn btn-danger" style="width=300px;">Prepnúť na chladenie</a>	</center>
						<?php	if($rezimkurenie=="Automat"){?>
						<center>
						<h2>Nastavenie teploty pre kúrenie</h2>
						<a href="prepninamanualkurenie.php" class="btn btn-info" style="width=300px;">Prepnúť na manual</a>	
						<form method="post" action="nastavenie.php">
      <b>Regulačná teplota</b>    <br>   <input name="teplotakurenie" type=number min=-30 max=50 step=0.5 style="text-align: center; width: 250px;" value="<?php echo file_get_contents("values/teplotakurenie.txt");
?>" type="text" required><br>
<b>Hysteréza</b> <br><input name="hysterezakurenie" type=number min=0 max=5 step=0.5  style="text-align: center; width: 250px;" value="<?php echo file_get_contents("values/hysterezakurenie.txt");
?>" type="text" required> <br><br>
               <input type="submit" name="zmenkurenie" class="btn btn-success" value="Zmeniť">    </form>
						</center>	
							
							
						<?php  } else if($rezimkurenie=="Manual"){ ?>
							<center><a href="prepninaautomatkurenie.php" class="btn btn-info" style="width=300px;">Prepnúť na automat</a>	</center>	
							<?php
							if($stavkurenie=="VYP"){ ?>
							<center><a href="zapnikurenie.php" class="btn btn-success" style="width=300px;">Zapni kúrenie manuálne</a>	</center>	
						<?php	}else if($stavkurenie=="ZAP"){ ?>
								<center><a href="vypnikurenie.php" class="btn btn-danger" style="width=300px;">Vypni kúrenie manuálne</a>	</center>	
						<?php	}
							
						 } ?>									 <center> 
									   <b>Režim: </b><b id="rezimkurenie"></b> <b>Stav: </b><b id="stavkurenie"></b>
									   <?php     if(isset($_POST['zmenkurenie'])){
         $teplotakurenie = $_POST['teplotakurenie'];
	   $hysterezakurenie = $_POST['hysterezakurenie'];
                   
 file_put_contents(__DIR__ . '/values/teplotakurenie.txt', $teplotakurenie);
 file_put_contents(__DIR__ . '/values/hysterezakurenie.txt', $hysterezakurenie);
  }
           ?>
               
									      </center>
									
									
							
							<?php } 
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
