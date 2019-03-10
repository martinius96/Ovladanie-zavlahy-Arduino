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
<?php $stranka = "Kod";?>
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
									
									<h2>Kód pre mikrokontróler Arduino Mega 2560</h2>
									<pre>
#include &lt;avr\wdt.h&gt; //kniznica watchdogu
#include &lt;SPI.h&gt;                     //kniznica SPI
#include &lt;Ethernet.h&gt;                //kniznica k ethernet shieldu
#include &lt;OneWire.h&gt;                 //Onewire kniznica
#include &lt;DallasTemperature.h&gt;       //knižnica senzorov  DS18B20
#define ONE_WIRE_BUS 8               //definovany pin OneWire zbernice
OneWire oneWire(ONE_WIRE_BUS);       //inicializacia pinu
DallasTemperature sensors(&oneWire); //priradenie ds18b20 senzorov na onewire zbernicu
const int relechladenie = 6; //rele chladenia
const int relekurenie = 7; //rele kurenia
const int dazdovysenzor = A0; //analog pin pre dazdovy senzor
const int releokruh1 = 5; //rele okruhu1
const int releokruh2 = 9; //rele okruhu2
const int releokruh3 = 3; //rele okruhu3
const int releokruh4 = 2; //rele okruhu4
byte mac[] = { 0x20, 0x1A, 0x06, 0x75, 0x8C, 0xAA };  
char server[] = "www.anemonka.php5.sk";  
IPAddress dnServer(192, 168, 0, 1);
IPAddress gateway(192, 168, 0, 1);
IPAddress subnet(255, 255, 255, 0);
IPAddress ip(192, 168, 0, 45);                    
EthernetClient client;
String readString;
int x=0;
char lf=10;
int pocitadlo = 0;
void setup() {
  pinMode(dazdovysenzor, INPUT);
  pinMode(relechladenie, OUTPUT);
  pinMode(relekurenie, OUTPUT);
  pinMode(releokruh1, OUTPUT);
  pinMode(releokruh2, OUTPUT);
  pinMode(releokruh3, OUTPUT);
  pinMode(releokruh4, OUTPUT);
  digitalWrite(relechladenie, HIGH);
  digitalWrite(relekurenie, HIGH);
  digitalWrite(releokruh1, HIGH);
  digitalWrite(releokruh2, HIGH);
  digitalWrite(releokruh3, HIGH);
  digitalWrite(releokruh4, HIGH);
  Serial.begin(9600);
  if (Ethernet.begin(mac) == 0) {                  //V PRIPADE ZLYHANIA NASTAVENIA DHCP
    Serial.println("Chyba konfiguracie, manualne nastavenie");
    Ethernet.begin(mac, ip, dnServer, gateway, subnet);
  }
  wdt_enable(WDTO_8S);
}
void odosli_data(){
  sensors.requestTemperatures();
  delay(1000);
  int dazd = analogRead(dazdovysenzor);
  String teplota = String(sensors.getTempCByIndex(0));
  if (client.connect(server, 80)) {               // AK SA NAPOJI NA SERVER NA PORTE 80 (HTTP)
    client.print("GET /system/arduino/data.php?teplota=");        
    client.print(teplota);  
    client.print("&dazd=");
    client.print(dazd);
    client.println(" HTTP/1.1");                 // UKONCENIE REQUESTU ZALOMENIM RIADKA A DOPLNENIM HLAVICKY HTTP S VERZIOU
    client.println("Host: www.anemonka.php5.sk"); // ADRESA HOSTA, NA KTOREHO BOL MIERENY REQUEST (NIE PHP SUBOR)
    client.println("Connection: close");         //UKONCENIE PRIPOJENIA ZA HTTP HLAVICKOU
    client.println();                            //ZALOMENIE RIADKA KLIENTSKEHO ZAPISU
    client.stop();
    Serial.println("Teplota a dazdova hodnota odoslana na web:");
    Serial.println("Teplota:");
    Serial.println(teplota);
    Serial.println("Dazd:");
    Serial.println(dazd);   
    pocitadlo=0;                     
  }else{
    Serial.println("Neuspesne pripojenie pre odoslanie teploty a hodnoty dazdoveho senzoru");
    pocitadlo++;
    }
}
void aktualizuj_vystupy(){
  if (client.connect(server, 80)) {               // AK SA NAPOJI NA SERVER NA PORTE 80 (HTTP)
      client.print("GET /system/vykurovanie_chladenie.php");        
      client.println(" HTTP/1.1");                 // UKONCENIE REQUESTU ZALOMENIM RIADKA A DOPLNENIM HLAVICKY HTTP S VERZIOU
      client.println("Host: www.anemonka.php5.sk"); // ADRESA HOSTA, NA KTOREHO BOL MIERENY REQUEST (NIE PHP SUBOR)
      client.println("Connection: close");         //UKONCENIE PRIPOJENIA ZA HTTP HLAVICKOU
      client.println();                            //ZALOMENIE RIADKA KLIENTSKEHO ZAPISU
      client.stop();                                   // UKONCENIE PRIPOJENIA ETHERNET SHIELDU
      Serial.println("Vystupy aktualizovane");
    pocitadlo=0;      
  }else{
    Serial.println("Neuspesne pripojenie pre aktualizaciu vystupov");
    pocitadlo++;
    }
}
void aktualizuj_okruhy(){
  if (client.connect(server, 80)) {               // AK SA NAPOJI NA SERVER NA PORTE 80 (HTTP)
      client.print("GET /system/okruhy.php");        
      client.println(" HTTP/1.1");                 // UKONCENIE REQUESTU ZALOMENIM RIADKA A DOPLNENIM HLAVICKY HTTP S VERZIOU
      client.println("Host: www.anemonka.php5.sk"); // ADRESA HOSTA, NA KTOREHO BOL MIERENY REQUEST (NIE PHP SUBOR)
      client.println("Connection: close");         //UKONCENIE PRIPOJENIA ZA HTTP HLAVICKOU
      client.println();                            //ZALOMENIE RIADKA KLIENTSKEHO ZAPISU
      client.stop();                                   // UKONCENIE PRIPOJENIA ETHERNET SHIELDU
      Serial.println("Okruhy aktualizovane");
    pocitadlo=0;      
  }else{
    Serial.println("Neuspesne pripojenie pre aktualizaciu okruhov");
    pocitadlo++;
    }
} 
void vystup_okruh1(){
  if (client.connect(server, 80)){
    client.println("GET /system/values/stavokruh1.txt HTTP/1.1");
    client.println("Host: www.anemonka.php5.sk"); // ADRESA HOSTA, NA KTOREHO BOL MIERENY REQUEST (NIE PHP SUBOR)
    client.println("Connection: close");         //UKONCENIE PRIPOJENIA ZA HTTP HLAVICKOU
    client.println();  
    Serial.println("Pripojenie k vystupu okruhu 1 uspesne");
    pocitadlo=0;                
  }else{
    Serial.println("Neuspesne pripojenie pre ziskanie vystupu okruhu 1");
    pocitadlo++;
    }
      while(client.connected() && !client.available())
        while (client.connected() || client.available()) { //pramenna
          char c = client.read(); //dostan bity z buffera
          if (c==lf) x=(x+1); //pocitaj
            else if (x==12) readString += c; //nasa premenna
      }
if(readString=="ZAP"){
  digitalWrite(releokruh1, LOW);
  Serial.println("Zapinam okruh1");
  }else if(readString=="VYP"){
   digitalWrite(releokruh1, HIGH);
    Serial.println("Vypinam okruh1");  
    }    
  readString = ("");
  x=0;
  client.stop(); //ukonc spojenie
 
    }
   
void vystup_okruh2(){
  if (client.connect(server, 80)){
  client.println("GET /system/values/stavokruh2.txt HTTP/1.1");
  client.println("Host: www.anemonka.php5.sk"); // ADRESA HOSTA, NA KTOREHO BOL MIERENY REQUEST (NIE PHP SUBOR)
    client.println("Connection: close");         //UKONCENIE PRIPOJENIA ZA HTTP HLAVICKOU
    client.println();
    Serial.println("Pripojenie k vystupu okruhu 2 uspesne");
    pocitadlo=0;            
  }else{
    Serial.println("Neuspesne pripojenie pre ziskanie vystupu okruhu 2");
    pocitadlo++;
    }
  while(client.connected() && !client.available())
  while (client.connected() || client.available()) { //pramenna
    char c = client.read(); //dostan bity z buffera
    if (c==lf) x=(x+1); //pocitaj
    else if (x==12) readString += c; //nasa premenna
   }
if(readString=="ZAP"){
  digitalWrite(releokruh2, LOW);
  Serial.println("Zapinam okruh2");
  }else if(readString=="VYP"){
   digitalWrite(releokruh2, HIGH);
    Serial.println("Vypinam okruh2");  
    }    
  readString = ("");
  x=0;
  client.stop(); //ukonc spojenie
 
    }
 void vystup_okruh3(){
  if (client.connect(server, 80)){
  client.println("GET /system/values/stavokruh3.txt HTTP/1.1");
  client.println("Host: www.anemonka.php5.sk"); // ADRESA HOSTA, NA KTOREHO BOL MIERENY REQUEST (NIE PHP SUBOR)
    client.println("Connection: close");         //UKONCENIE PRIPOJENIA ZA HTTP HLAVICKOU
    client.println();     
    Serial.println("Pripojenie k vystupu okruhu 3 uspesne");
    pocitadlo=0;             
  }else{
    Serial.println("Neuspesne pripojenie pre ziskanie vystupu okruhu 3");
    pocitadlo++;
    }
  while(client.connected() && !client.available())
  while (client.connected() || client.available()) { //pramenna
    char c = client.read(); //dostan bity z buffera
    if (c==lf) x=(x+1); //pocitaj
    else if (x==12) readString += c; //nasa premenna
   }
if(readString=="ZAP"){
  digitalWrite(releokruh3, LOW);
  Serial.println("Zapinam okruh3");
  }else if(readString=="VYP"){
   digitalWrite(releokruh3, HIGH);
    Serial.println("Vypinam okruh3");  
    }    
  readString = ("");
  x=0;
  client.stop(); //ukonc spojenie
 
    }
 
 
 
     void vystup_okruh4(){
  if (client.connect(server, 80)){
  client.println("GET /system/values/stavokruh4.txt HTTP/1.1");
  client.println("Host: www.anemonka.php5.sk"); // ADRESA HOSTA, NA KTOREHO BOL MIERENY REQUEST (NIE PHP SUBOR)
    client.println("Connection: close");         //UKONCENIE PRIPOJENIA ZA HTTP HLAVICKOU
    client.println();   
    Serial.println("Pripojenie k vystupu okruhu 4 uspesne");
    pocitadlo=0;               
  }else{
    Serial.println("Neuspesne pripojenie pre ziskanie vystupu okruhu 4");
    pocitadlo++;
    }
  while(client.connected() && !client.available())
  while (client.connected() || client.available()) { //pramenna
    char c = client.read(); //dostan bity z buffera
    if (c==lf) x=(x+1); //pocitaj
    else if (x==12) readString += c; //nasa premenna
   }
if(readString=="ZAP"){
  digitalWrite(releokruh4, LOW);
  Serial.println("Zapinam okruh4");
  }else if(readString=="VYP"){
   digitalWrite(releokruh4, HIGH);
    Serial.println("Vypinam okruh4");  
    }    
  readString = ("");
  x=0;
  client.stop(); //ukonc spojenie
 
    }
void vystup_chladenia(){
   if (client.connect(server, 80)){
  client.println("GET /system/values/stavchladenie.txt HTTP/1.1");
  client.println("Host: www.anemonka.php5.sk"); // ADRESA HOSTA, NA KTOREHO BOL MIERENY REQUEST (NIE PHP SUBOR)
    client.println("Connection: close");         //UKONCENIE PRIPOJENIA ZA HTTP HLAVICKOU
    client.println();    
      Serial.println("Pripojenie k vystupu chladenia uspesne");
    pocitadlo=0;              
  }else{
    Serial.println("Neuspesne pripojenie pre ziskanie vystupu chladenia");
    pocitadlo++;
    }
  while(client.connected() && !client.available())
  while (client.connected() || client.available()) { //pramenna
    char c = client.read(); //dostan bity z buffera
    if (c==lf) x=(x+1); //pocitaj
    else if (x==12) readString += c; //nasa premenna
   }
if(readString=="ZAP"){
  digitalWrite(relechladenie, LOW);
  Serial.println("Zapinam chladenie");
  }else if(readString=="VYP"){
   digitalWrite(relechladenie, HIGH);
    Serial.println("Vypinam chladenie");  
    }    
  readString = ("");
  x=0;
  client.stop(); //ukonc spojenie
 
    }
 
void softReset(){
asm volatile ("  jmp 0");
}
 
     void kontrola_resetu(){
    if (client.connect(server, 80)){
  client.println("GET /system/values/reset.txt HTTP/1.1");
  client.println("Host: www.anemonka.php5.sk"); // ADRESA HOSTA, NA KTOREHO BOL MIERENY REQUEST (NIE PHP SUBOR)
    client.println("Connection: close");         //UKONCENIE PRIPOJENIA ZA HTTP HLAVICKOU
    client.println(); 
    Serial.println("Pripojenie ku kontrole resetu uspesne");
    pocitadlo=0;                 
  }else{
    Serial.println("Neuspesne pripojenie pre kontrolu resetu");
    pocitadlo++;
    }
  while(client.connected() && !client.available())
  while (client.connected() || client.available()) { //pramenna
    char c = client.read(); //dostan bity z buffera
    if (c==lf) x=(x+1); //pocitaj
    else if (x==12) readString += c; //nasa premenna
   }
if(readString=="RST"){
  Serial.println("RESET VYZIADANY");
   readString = ("");
  x=0;  
  client.stop();
    if (client.connect(server, 80)){
  client.println("GET /system/arduino/potvrdreset.php HTTP/1.1");
  client.println("Host: www.anemonka.php5.sk"); // ADRESA HOSTA, NA KTOREHO BOL MIERENY REQUEST
    client.println("Connection: close");         //UKONCENIE PRIPOJENIA ZA HTTP HLAVICKOU
    client.println();
    Serial.println("Vykonavam reset");
    softReset();            
  }
  }else{
  readString = ("");
  x=0;
  client.stop(); //ukonc spojenie
  }
    }
void vystup_kurenia(){
    if (client.connect(server, 80)){
  client.println("GET /system/values/stavkurenie.txt HTTP/1.1");
  client.println("Host: www.anemonka.php5.sk"); // ADRESA HOSTA, NA KTOREHO BOL MIERENY REQUEST (NIE PHP SUBOR)
    client.println("Connection: close");         //UKONCENIE PRIPOJENIA ZA HTTP HLAVICKOU
    client.println(); 
    Serial.println("Pripojenie k vystupu kurenia uspesne");
    pocitadlo=0;                 
  }else{
    Serial.println("Neuspesne pripojenie pre vystup kurenia");
    pocitadlo++;
    }
  while(client.connected() && !client.available())
  while (client.connected() || client.available()) { //pramenna
    char c = client.read(); //dostan bity z buffera
    if (c==lf) x=(x+1); //pocitaj
    else if (x==12) readString += c; //nasa premenna
   }
if(readString=="ZAP"){
  digitalWrite(relekurenie, LOW);
  Serial.println("Zapinam kurenie");
  }else if(readString=="VYP"){
   digitalWrite(relekurenie, HIGH);
    Serial.println("Vypinam kurenie");  
    }    
  readString = ("");
  x=0;
  client.stop(); //ukonc spojenie
 
    }
 
 
void loop() {
   if (Ethernet.begin(mac) == 0) {
    Serial.println("Chyba konfiguracie, manualne nastavenie");
    Ethernet.begin(mac, ip, dnServer, gateway, subnet);
    wdt_reset();
  }
  if(pocitadlo>=10){
    wdt_reset();
    digitalWrite(relechladenie, HIGH);
    digitalWrite(relekurenie, HIGH);
    digitalWrite(releokruh1, HIGH);
    digitalWrite(releokruh2, HIGH);
    digitalWrite(releokruh3, HIGH);
    digitalWrite(releokruh4, HIGH);
    for (int i=0; i <= 120; i++){
      wdt_reset();
      delay(1000);
	  Serial.println("Cakam v slucke v dosledku rady neuspesnych pripojeni");
   }
   pocitadlo = 0;
    }else{
 wdt_reset();
odosli_data();
delay(500);
aktualizuj_vystupy();
delay(500);
aktualizuj_okruhy();
delay(500);
wdt_reset();
vystup_chladenia();
delay(500);
vystup_kurenia();
delay(500);  
vystup_okruh1();
delay(500);
vystup_okruh2();
delay(500);
wdt_reset();
vystup_okruh3();
delay(500);
vystup_okruh4();  
delay(500);
wdt_reset();
kontrola_resetu();    
 }
}
                  </pre>
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
