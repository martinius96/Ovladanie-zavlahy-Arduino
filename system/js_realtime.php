<script>
  setInterval(function(){
    $.get('get_teplota1.php', function(data){
        $('#stavteplota1').text(data + " °C")
       });
  
    $.get('get_teplota2.php', function(data){
        $('#stavteplota2').text(data + " °C")
       });
    
    $.get('get_teplota3.php', function(data){
        $('#stavteplota3').text(data + " °C")
      });
   
    $.get('get_teplota4.php', function(data){
        $('#stavteplota4').text(data + " °C")
       });

    $.get('get_teplota5.php', function(data){
        $('#stavteplota5').text(data + " °C")
     });

    $.get('get_nazovteplomer1.php', function(data){
        $('#nazovteplomer1').text(data)
      });
      
    $.get('get_nazovteplomer2.php', function(data){
        $('#nazovteplomer2').text(data)
      });
      
    $.get('get_nazovteplomer3.php', function(data){
        $('#nazovteplomer3').text(data)
      });
      
    $.get('get_nazovteplomer4.php', function(data){
        $('#nazovteplomer4').text(data)
      });
      
    $.get('get_nazovteplomer5.php', function(data){
        $('#nazovteplomer5').text(data)
      });
      
     
      $.get('get_teplota1.php', function(data){
        $('#teplotaaktual').text(data + " °C")
           });  
		   $.get('get_teplota2.php', function(data){
        $('#teplotaaktual2').text(data + " °C")
           });  
           $.get('get_nazovtermostat.php', function(data){
        $('#nazovtermostat').text(data)
           });
		    $.get('get_nazovtermostat2.php', function(data){
        $('#nazovtermostat2').text(data)
           });
     
             $.get('get_termostatrezim.php', function(data){
        $('#termostatrezim').text(data)
    });
	     $.get('get_termostatrezim2.php', function(data){
        $('#termostatrezim2').text(data)
    });
      $.get('get_termostat.php', function(data){
        $('#stavtermostat').text(data)
    });
	   $.get('get_termostat2.php', function(data){
        $('#stavtermostat2').text(data)
    });
         $.get('zistinastavenuhodnotutermostat.php', function(data){
       $('#referenciatermostatu').text(data + " °C")
    });
	       $.get('zistinastavenuhodnotutermostat2.php', function(data){
       $('#referenciatermostatu2').text(data + " °C")
    });
    $.get('get_rele1.php', function(data){
        $('#nazovrele1').text(data)
      });
      
    $.get('get_rele2.php', function(data){
        $('#nazovrele2').text(data)
      });
      
    $.get('get_rele3.php', function(data){
        $('#nazovrele3').text(data)
      });
      
    $.get('get_rele4.php', function(data){
        $('#nazovrele4').text(data)
      });
      
    $.get('get_rele5.php', function(data){
        $('#nazovrele5').text(data)
      });
	

	  $.get('get_stavrele1.php', function(data){
        $('#stavrele1').text(data)
       });
    
    $.get('get_stavrele2.php', function(data){
        $('#stavrele2').text(data)
      });
   
    $.get('get_stavrele3.php', function(data){
        $('#stavrele3').text(data)
       });

    $.get('get_stavrele4.php', function(data){
        $('#stavrele4').text(data)
     });
   
    $.get('get_stavrele5.php', function(data){
        $('#stavrele5').text(data)
      });
	 
	   $.get('get_rezim_rele1.php', function(data){
        $('#rezimrele1').text(data)
      });
	  
	  
	  	   $.get('get_rezim_rele2.php', function(data){
        $('#rezimrele2').text(data)
      });
	  	   $.get('get_rezim_rele3.php', function(data){
        $('#rezimrele3').text(data)
      });
	  	   $.get('get_rezim_rele4.php', function(data){
        $('#rezimrele4').text(data)
      });
	  
	   $.get('zmenirezimrele.php', function(data){
        $('#rezimyrele').text(data)
      });
	  
   },1000);  
   
</script>
 <script>
       setInterval(function(){
    $.get('stavnodemcu.php', function(data){
        $('#stavnodemcu').html(data)
    });
},1000);   
</script>
<script>
       setInterval(function(){
    $.get('automanualtermostat.php', function(data){
        $('#manualautomattermostat').text(data)
    });
},1000);   
</script>
<script>
       setInterval(function(){
    $.get('zmenirezimtermostat.php', function(data){
       $('#zmenitrezimtermostat').html(data)
    });
},1000);   
</script>  
<script>
       setInterval(function(){
  $.get('zistinastavenuhodnotutermostat.php', function(data){
        $('#stavteplotatermostatu').text(data + " °C")
    });
},1000);   
</script>
<script>
       setInterval(function(){
    $.get('automanualtermostat2.php', function(data){
        $('#manualautomattermostat2').text(data)
    });
},1000);   
</script>
<script>
       setInterval(function(){
    $.get('zmenirezimtermostat2.php', function(data){
       $('#zmenitrezimtermostat2').html(data)
    });
},1000);   
</script>  
<script>
       setInterval(function(){
  $.get('zistinastavenuhodnotutermostat2.php', function(data){
        $('#stavteplotatermostatu2').text(data + " °C")
    });
},1000);   
</script>


  <script>

$.ajax({

	  url: "zistinastavenuhodnotutermostat.php", 
 
    success: function(data) {
        $('#termostatzistenie').val(data);
    }
});

</script>

<script>
       setInterval(function(){
    $.get('get_reset.php', function(data){
        $('#getreset').text(data)
    });
},1000);   
</script>



