<!-- NAVBAR -->
		<?php 
		
		$mod = file_get_contents("values/mod.txt"); ?>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.php"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><img src="https://image.flaticon.com/icons/svg/148/148795.svg" width=32px height=32px></button>
				</div>
				
			
		
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.php" class="<?php if ($stranka == "Dashboard"){ echo "active";} ?>"><img src="https://image.flaticon.com/icons/svg/500/500509.svg" width=32px height=32px> <span>Prehľad</span></a></li>
						<li><a href="zmena-nazvov.php" class="<?php if ($stranka == "Zmena"){ echo "active";} ?>"><img src="https://image.flaticon.com/icons/svg/691/691242.svg" width=32px height=32px> <span>Zmena názvov</span></a></li>
						<li><a href="nastavenie.php" class="<?php if ($stranka == "Nastavenie"){ echo "active";} ?>">
						<?php if($mod=="Chladenie"){?>
							<img src="https://image.flaticon.com/icons/svg/234/234840.svg" width=32px height=32px>
						<?php	
						}else{
						?>
	<img src="https://www.flaticon.com/premium-icon/icons/svg/231/231947.svg" width=32px height=32px>
<?php
}
?> <span><?php if($mod=="Chladenie"){
							echo 'Nastavenie chladenia';
						
						}else{
							echo 'Nastavenie kúrenia';
							
						}?></span></a></li>
						<li><a href="nastavenie-okruhov.php" class="<?php if ($stranka == "Okruhy"){ echo "active";} ?>"><img src="https://image.flaticon.com/icons/svg/229/229770.svg" width=32px height=32px> <span>Nastavenie okruhov</span></a></li>
						<li><a href="grafy_teplota.php" class="<?php if ($stranka == "Grafyt"){ echo "active";} ?>"><img src="https://image.flaticon.com/icons/svg/138/138359.svg" width=32px height=32px> <span>Grafy teplôt</span></a></li>
						<li><a href="grafyv.php" class="<?php if ($stranka == "Grafyv"){ echo "active";} ?>"><img src="https://image.flaticon.com/icons/svg/138/138359.svg" width=32px height=32px> <span>Grafy kúrenia/chladenia</span></a></li>
						<li><a href="grafyo.php" class="<?php if ($stranka == "Grafyo"){ echo "active";} ?>"><img src="https://image.flaticon.com/icons/svg/138/138359.svg" width=32px height=32px> <span>Grafy okruhov</span></a></li>	
						<li><a href="maxamin.php" class="<?php if ($stranka == "MaxMin"){ echo "active";} ?>"><img src="https://image.flaticon.com/icons/svg/1030/1030899.svg" width=32px height=32px> <span>Štatistika</span></a></li>
						<li><a href="logy.php" class="<?php if ($stranka == "Log"){ echo "active";} ?>"><img src="https://image.flaticon.com/icons/svg/148/148921.svg" width=32px height=32px> <span>Oznámenia</span></a></li>
						<li><a href="udaje.php" class="<?php if ($stranka == "Udaje"){ echo "active";} ?>"><img src="https://image.flaticon.com/icons/svg/891/891400.svg" width=32px height=32px> <span>Zmena loginu</span></a></li>
						<li><a href="reset.php" class="<?php if ($stranka == "Reset"){ echo "active";} ?>"><img src="https://image.flaticon.com/icons/svg/189/189686.svg" width=32px height=32px> <span>Reštart</span></a></li>
						<li><a href="kod.php" class="<?php if ($stranka == "Kod"){ echo "active";} ?>"><img src="https://image.flaticon.com/icons/svg/25/25185.svg" width=32px height=32px> <span>Kód</span></a></li>
						<li><a href="logout.php" class=""><img src="https://www.flaticon.com/premium-icon/icons/svg/709/709026.svg" width=32px height=32px> <span>Odhlásiť sa</span></a></li>
					</ul>
				</nav>
			</div>
		</div>