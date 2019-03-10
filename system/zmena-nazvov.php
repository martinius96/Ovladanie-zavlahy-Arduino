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
<?php $stranka = "Zmena";?>
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
							<h2><font color="black">Zmena názvov vstupov</font></h2>
									 <table style="width: 100%;">
       <tr>
               <td>
               
            <?php     if(isset($_POST['zmenteplomer'])){
       $teplomer = $_POST['teplomer'];
                   
 file_put_contents(__DIR__ . '/nazvyperiferii/teplomer.txt', $teplomer);
  }
           ?>
               
               
               
             <center>  <form method="post" action="zmena-nazvov.php">
             <input name="teplomer" style="text-align: center" placeholder="<?php echo file_get_contents("nazvyperiferii/teplomer.txt");
?>" type="text" required><br>
               <input type="submit" name="zmenteplomer" class="btn btn-success" value="Zmeniť">    </form>    </center>
               
               </td>
              
               <td>
               
            <?php     if(isset($_POST['zmendazdovysenzor'])){
       $dazdovysenzor = $_POST['dazdovysenzor'];
                   
 file_put_contents(__DIR__ . '/nazvyperiferii/dazdovysenzor.txt', $dazdovysenzor);
  }
           ?>
               
               
               
             <center>   <form method="post" action="zmena-nazvov.php">
                <input name="dazdovysenzor" style="text-align: center" placeholder="<?php echo file_get_contents("nazvyperiferii/dazdovysenzor.txt");
?>" type="text" required><br>
               <input type="submit" name="zmendazdovysenzor" class="btn btn-success" value="Zmeniť">          </form>    </center>
               
               </td>   
               </tr>
			   </table>
			   <h2><font color="black">Zmena názvov výstupov</font></h2>
         <table style="width: 100%;">
		      
               
                <tr>
               <td>
 <?php     if(isset($_POST['zmenokruh1'])){
       $okruh1 = $_POST['okruh1'];
                   
 file_put_contents(__DIR__ . '/nazvyperiferii/okruh1.txt', $okruh1);
  }
           ?>
  <center>  <form method="post" action="zmena-nazvov.php">
             <input name="okruh1" style="text-align: center" placeholder="<?php echo file_get_contents("nazvyperiferii/okruh1.txt");
?>" type="text" required><br>
               <input type="submit" name="zmenokruh1" class="btn btn-danger" value="Zmeniť">    </form>    </center>  </td>
			                  <td>
 <?php     if(isset($_POST['zmenokruh2'])){
       $okruh2 = $_POST['okruh2'];
                   
 file_put_contents(__DIR__ . '/nazvyperiferii/okruh2.txt', $okruh2);
  }
           ?>
  <center>  <form method="post" action="zmena-nazvov.php">
             <input name="okruh2" style="text-align: center" placeholder="<?php echo file_get_contents("nazvyperiferii/okruh2.txt");
?>" type="text" required><br>
               <input type="submit" name="zmenokruh2" class="btn btn-danger" value="Zmeniť">    </form>    </center>  </td>
            </tr>
			<tr>
			               <td>
 <?php     if(isset($_POST['zmenokruh3'])){
       $okruh3 = $_POST['okruh3'];
                   
 file_put_contents(__DIR__ . '/nazvyperiferii/okruh3.txt', $okruh3);
  }
           ?>
  <center>  <form method="post" action="zmena-nazvov.php">
             <input name="okruh3" style="text-align: center" placeholder="<?php echo file_get_contents("nazvyperiferii/okruh3.txt");
?>" type="text" required><br>
               <input type="submit" name="zmenokruh3" class="btn btn-danger" value="Zmeniť">    </form>    </center>  </td>
			               <td>
 <?php     if(isset($_POST['zmenokruh4'])){
       $okruh4 = $_POST['okruh4'];
                   
 file_put_contents(__DIR__ . '/nazvyperiferii/okruh4.txt', $okruh4);
  }
           ?>
  <center>  <form method="post" action="zmena-nazvov.php">
             <input name="okruh4" style="text-align: center" placeholder="<?php echo file_get_contents("nazvyperiferii/okruh4.txt");
?>" type="text" required><br>
               <input type="submit" name="zmenokruh4" class="btn btn-danger" value="Zmeniť">    </form>    </center>  </td>
			</tr>  
            <tr>
			   <td>
 <?php     if(isset($_POST['zmenkotol'])){
       $kotol = $_POST['kotol'];
                   
 file_put_contents(__DIR__ . '/nazvyperiferii/kotol.txt', $kotol);
  }
           ?>
  <center>  <form method="post" action="zmena-nazvov.php">
             <input name="kotol" style="text-align: center" placeholder="<?php echo file_get_contents("nazvyperiferii/kotol.txt");
?>" type="text" required><br>
               <input type="submit" name="zmenkotol" class="btn btn-info" value="Zmeniť">    </form>    </center>  </td>
			     <td>
 <?php     if(isset($_POST['zmenchladenie'])){
       $chladenie = $_POST['chladenie'];
                   
 file_put_contents(__DIR__ . '/nazvyperiferii/chladenie.txt', $chladenie);
  }
           ?>
  <center>  <form method="post" action="zmena-nazvov.php">
             <input name="chladenie" style="text-align: center" placeholder="<?php echo file_get_contents("nazvyperiferii/chladenie.txt");
?>" type="text" required><br>
               <input type="submit" name="zmenchladenie" class="btn btn-info" value="Zmeniť">    </form>    </center>  </td>
			</tr>   
               
      </table>
									
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
