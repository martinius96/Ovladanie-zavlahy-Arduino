<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" charset=UTF-8">
    <title>Ovládanie zavlažovania cez internet</title>
<meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta charset="UTF-8">
   <link rel="icon" type="image/png" href="icon.png" />
    <link rel="stylesheet" href="css/misc.css">
	<link id="pre-load-login-css" rel="stylesheet" href="css/loader.css">
	<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>




<div class="login-container">
    <div class="login-container__login-bg">
    </div>
    <div class="login-container__logo-container">
       
    
     
    </div>
    <div class="login-container__login-window">
        <div class="login-window__icon-container">
            <img class="icon-container__img" src="https://i.nahraj.to/f/272w.png">
        </div>
        
        
   
           <?php    
      error_reporting(0);
session_start();
	$usernamevsysteme = file_get_contents('system/values/username.txt');
	$passwordvsysteme = file_get_contents('system/values/password.txt');
	if ($_SESSION['logapp']===true){?>
<form class="login-window__login-form" >


        <center>
		<h2>Používateľ stále prihlásený!</h2>
		<a href="system" class="btn btn-success">Späť na stránku</a>
		<br><br>
		<a href="system/logout.php" class="btn btn-danger">Odhlásiť sa!</a>
       
        </form>
		 
	
	  </center>
		<?php
		
		
	}else{
	error_reporting(0);
	session_start();
      if(isset($_POST['odoslat'])){
       $username = $_POST['username'];
    $username = trim( $username );
    $username = htmlspecialchars( $username, ENT_QUOTES );
	$usernamesha1 = sha1($username);
    $password = $_POST['password']; 
    $password = trim( $password );
    $password = htmlspecialchars( $password, ENT_QUOTES );  
	$passwordsha1 = sha1($password);
        if($usernamesha1 == $usernamevsysteme && $passwordsha1 == $passwordvsysteme){
          $_SESSION['logapp'] = true; 
		  header('LOCATION: system'); die();
        } else{
           echo "<center>Údaje nie sú správne! Váš pokus bol uložený do logu!</center>";
   $ip = "";

if (!empty($_SERVER["HTTP_CLIENT_IP"]))
{
 //check for ip from share internet
 $ip = $_SERVER["HTTP_CLIENT_IP"];
}
elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
{
 // Check for the Proxy User                    
 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else
{
 $ip = $_SERVER["REMOTE_ADDR"];
}
$t = file_get_contents("logy/neuspesneprihlasenia.txt");
      $today = date("Y-m-d H:i:s");
     	  $prevedeny = strtotime($today);
$teraz = date("d.m.Y H:i:s", $prevedeny );  
       $t .= $teraz." Pouzivatel z ip ".$ip." sa neprihlasil, zadal zle prihlasovacie informacie, meno: ".$username." a heslo: ".$password."\r\n";
      file_put_contents("logy/neuspesneprihlasenia.txt",$t);
    }
        }

	
	?>
	<form class="login-window__login-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="login-form__title">Webové rozhranie Záhradníctva Anemonka</div>
		
		
        <br>
        <input id="username" name="username" placeholder="Užívateľské meno" type="text" class="login-form__username" autocorrect="off" autocapitalize="off" spellcheck="false" required>
        <input id="password" name="password" placeholder="Heslo" type="password" class="login-form__password" required>
        
        
        <br>
        <button type="submit" name="odoslat" class="login-form__connect-button">PRIHLÁSIŤ</button>
       
        </form>
	<?php  }  ?>
        
        
           
  
     
  
     
     

        <div class="login-window__loader-container hidden">
            <div class="loader-container__spinner"></div>
            <div class="loader-container__text-container">
                <div class="text-container__title"></div>
                <div class="text-container__subtitle"></div>
            </div>
        </div>
    </div>






</body></html>