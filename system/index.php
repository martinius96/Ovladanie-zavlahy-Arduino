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
<?php $stranka = "Dashboard";?>
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
									
									<h2>Dáta</h2><table class="table table-striped" style="color: black;">
									
										<thead>
										<tr>
    <th><strong>Senzor</strong></th>
    <th><strong>Hodnota</strong></th>
  </tr>
   <tr>
    <td width=50%><h3 ><font color="black"><img src="https://image.flaticon.com/icons/svg/603/603463.svg" width=32px height=32px> <b><?php echo file_get_contents("nazvyperiferii/teplomer.txt");
?></b></font></h3></td>
    <td width=50% id="teplota"></td>
  </tr>
    <tr>
    <td width=50%><h3 ><font color="black"><img src="https://www.flaticon.com/premium-icon/icons/svg/891/891640.svg" width=32px height=32px> <b><?php echo file_get_contents("nazvyperiferii/dazdovysenzor.txt");
?></b></font></h3></td>
    <td width=50%  id="dazd"></td>
  </tr>
  </table>
  <h2>Kúrenie/Chladenie</h2><table class="table table-striped" style="color: black;">
									
										<thead>
										<tr>
    <th><strong>Výstup</strong></th>
	<th><strong>Režim</strong></th>
	<th><strong>Stav</strong></th>
	<th><strong>Hodnota</strong></th>
	<th><strong>Referencia</strong></th>
	<th><strong>Hysteréza</strong></th>
	<th><strong>Navolený</strong></th>
  </tr>
   <tr>
    <td><h3 ><font color="black"><img src="https://image.flaticon.com/icons/svg/150/150393.svg" width=32px height=32px> <b><?php echo file_get_contents("nazvyperiferii/kotol.txt");
?></b></font></h3></td>
	<td id="rezimkurenie"></td>
	<td id="stavkurenie"></td>
	<td id="teplota1"></td>
	<td id="referenciakurenie"></td>
	<td id="hysterezakurenie"></td>
	<td id="navolenykurenie"></td>
  </tr>
   <tr>
    <td><h3 ><font color="black"><img src="https://image.flaticon.com/icons/svg/234/234840.svg" width=32px height=32px> <b><?php echo file_get_contents("nazvyperiferii/chladenie.txt");
?></b></font></h3></td>
	<td id="rezimchladenie"></td>
	<td id="stavchladenie"></td>
	<td id="teplota2"></td>
	<td id="referenciachladenie"></td>
	<td id="hysterezachladenie"></td>
	<td id="navolenychladenie"></td>
  </tr>
  </tr>
  </table>
   <h2>Závlaha</h2>
   	<table class="table table-striped" style="color: black;">
	<thead>
	<tr>
    <th><strong>Názov</strong></th>
	 <th><strong>Režim</strong></th>
    <th><strong>Stav</strong></th>
	 <th><strong>Časovač 1</strong></th>
	 <th><strong>Časovač 2</strong></th>
	 <th><strong>Interval</strong></th>
  </tr>
   <tr>
    <td><h3><font color="black"><img src="https://image.flaticon.com/icons/svg/952/952635.svg" width=32px height=32px> <b><?php echo file_get_contents("nazvyperiferii/okruh1.txt");
?></b></font></h3></td>
 <td id="rezim1"></td>
  <td id="stav1"></td>
   <td id="cas1okruh1"></td>
  <td id="cas2okruh1"></td>
  <td id="interval1"></td>
  </tr>
  
  <tr>
   <td><h3><font color="black"><img src="https://image.flaticon.com/icons/svg/952/952635.svg" width=32px height=32px> <b><?php echo file_get_contents("nazvyperiferii/okruh2.txt");
?></b></font></h3></td>
  <td id="rezim2"></td>
  <td id="stav2"></td>
 <td id="cas1okruh2"></td>
   <td id="cas2okruh2"></td>
  <td id="interval2"></td>
  </tr>
    <tr>
   <td><h3><font color="black"><img src="https://image.flaticon.com/icons/svg/952/952635.svg" width=32px height=32px> <b><?php echo file_get_contents("nazvyperiferii/okruh3.txt");
?></b></font></h3></td>
 <td id="rezim3"></td>
  <td id="stav3"></td>
   <td id="cas1okruh3"></td>
   <td id="cas2okruh3"></td>
  <td id="interval3"></td>
  </tr>
      <tr>
   <td><h3><font color="black"><img src="https://image.flaticon.com/icons/svg/952/952635.svg" width=32px height=32px> <b><?php echo file_get_contents("nazvyperiferii/okruh4.txt");
?></b></font></h3></td>
  <td id="rezim4"></td>
  <td id="stav4"></td>
  <td id="cas1okruh4"></td>
   <td id="cas2okruh4"></td>
  <td id="interval4"></td>
   </tr>
   </table>
   
 <h2>Konektivita</h2>
  	<table class="table table-striped" style="color: black;">
									
										<thead>
														<tr>
    <th><strong>Mikrokontróler</strong></th>
	<th><strong>Režim</strong></th>
	<th><strong>Stav</strong></th>
  </tr>
										<tr>
    <td><font color="black"><h5><img src="https://www.makerspaces.com/wp-content/uploads/2017/08/381932-arduino-atmega-circuit-component-current-electric-.png" width=64px height=64px> <b>Arduino + W5100</b></font></h5></td>
    <td>Client</td>
	<td id="arduino"></td>
  </tr></table>
 <center><h3><font color="black">Posledný online záznam: </h3><h3 id="cas"></font></h3></center>
										</tbody>
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
  $.get('get_teplota.php', function(data){
        $('#teplota').text(data + " °C")
    });
	  $.get('get_teplota.php', function(data){
        $('#teplota1').text(data + " °C")
    });
	  $.get('get_teplota.php', function(data){
        $('#teplota2').text(data + " °C")
    });
	  $.get('get_dazd.php', function(data){
        $('#dazd').html(data)
    });
	  $.get('get_rezimchladenie.php', function(data){
        $('#rezimchladenie').text(data)
    });
	  $.get('get_rezimkurenie.php', function(data){
        $('#rezimkurenie').text(data)
    });
	  $.get('get_stavkurenie.php', function(data){
        $('#stavkurenie').text(data)
    });
	  $.get('get_stavchladenie.php', function(data){
        $('#stavchladenie').text(data)
    });
	  $.get('get_referenciachladenie.php', function(data){
        $('#referenciachladenie').text(data + " °C")
    });
	  $.get('get_referenciakurenie.php', function(data){
        $('#referenciakurenie').text(data + " °C")
    });
	  $.get('get_hysterezakurenie.php', function(data){
        $('#hysterezakurenie').text("±" + data + " °C")
    });
	  $.get('get_hysterezachladenie.php', function(data){
        $('#hysterezachladenie').text("±" + data + " °C")
    });
	  $.get('get_kurenie.php', function(data){
        $('#navolenykurenie').html(data)
    });
	  $.get('get_chladenie.php', function(data){
        $('#navolenychladenie').html(data)
    });
		  $.get('get_arduino.php', function(data){
        $('#arduino').html(data)
    });
		  $.get('get_cas.php', function(data){
        $('#cas').text(data)
    });
	 $.get('vykurovanie_chladenie.php', function(data){
        $('#xxx').text(data)
    });
	$.get('get_cas1okruh1.php', function(data){
        $('#cas1okruh1').text(data)
    });
	$.get('get_cas2okruh1.php', function(data){
        $('#cas2okruh1').text(data)
    });
	$.get('get_cas1okruh2.php', function(data){
        $('#cas1okruh2').text(data)
    });
	$.get('get_cas2okruh2.php', function(data){
        $('#cas2okruh2').text(data)
    });
	$.get('get_cas1okruh3.php', function(data){
        $('#cas1okruh3').text(data)
    });
	$.get('get_cas2okruh3.php', function(data){
        $('#cas2okruh3').text(data)
    });
	$.get('get_cas1okruh4.php', function(data){
        $('#cas1okruh4').text(data)
    });
	$.get('get_cas2okruh4.php', function(data){
        $('#cas2okruh4').text(data)
    });
		$.get('get_intervalokruh1.php', function(data){
        $('#interval1').text(data)
    });
		$.get('get_intervalokruh2.php', function(data){
        $('#interval2').text(data)
    });
		$.get('get_intervalokruh3.php', function(data){
        $('#interval3').text(data)
    });
		$.get('get_intervalokruh4.php', function(data){
        $('#interval4').text(data)
    });
		$.get('get_stavokruh1.php', function(data){
        $('#stav1').text(data)
    });
		$.get('get_stavokruh2.php', function(data){
        $('#stav2').text(data)
    });
		$.get('get_stavokruh3.php', function(data){
        $('#stav3').text(data)
    });
		$.get('get_stavokruh4.php', function(data){
        $('#stav4').text(data)
    });
	$.get('get_rezimokruh1.php', function(data){
        $('#rezim1').text(data)
    });
	$.get('get_rezimokruh2.php', function(data){
        $('#rezim2').text(data)
    });
	$.get('get_rezimokruh3.php', function(data){
        $('#rezim3').text(data)
    });
	$.get('get_rezimokruh4.php', function(data){
        $('#rezim4').text(data)
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
