      function drawHighestOutsideTodayChart() {

  var HighestOutsideTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['°C', highesttemperatureOutsideTodayJs]
  ]);

  var HighestOutsideTodayOptions = {
     width: 200, height: 200,
    min: -30,
     greenFrom: -30, greenTo: 10,
        yellowFrom: 10.01, yellowTo: 25,
        redFrom: 25.01, redTo: 40,
      minorTicks: 10,
    majorTicks: ['-30','-20','-10','0','10','20','30','40'],max: 40
  };

  var HighestOutsideTodayChart = new 		google.visualization.Gauge(document.getElementById('HighestOutsideToday_chart_div'));

  HighestOutsideTodayChart.draw(HighestOutsideTodayData, HighestOutsideTodayOptions);
}

function drawHighestLivingRoomTodayChart() {

  var HighestLivingRoomTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['°C', highesttemperatureLivingRoomTodayJs]
  ]);

  var HighestLivingRoomTodayOptions = {
    width: 200, height: 200,
    min: -30,
     greenFrom: -30, greenTo: 10,
        yellowFrom: 10.01, yellowTo: 25,
        redFrom: 25.01, redTo: 40,
      minorTicks: 10,
    majorTicks: ['-30','-20','-10','0','10','20','30','40'],max: 40
  };

  var HighestLivingRoomTodayChart = new 		google.visualization.Gauge(document.getElementById('HighestLivingRoomToday_chart_div'));

  HighestLivingRoomTodayChart.draw(HighestLivingRoomTodayData, HighestLivingRoomTodayOptions);
}

function drawHighestBedRoomTodayChart() {

  var HighestBedRoomTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['°C', highesttemperatureBedRoomTodayJs]
  ]);

  var HighestBedRoomTodayOptions = {
    width: 200, height: 200,
      min: -30,
     greenFrom: -30, greenTo: 10,
        yellowFrom: 10.01, yellowTo: 25,
        redFrom: 25.01, redTo: 40,
      minorTicks: 10,
    majorTicks: ['-30','-20','-10','0','10','20','30','40'],max: 40
  };

  var HighestBedRoomTodayChart = new 		google.visualization.Gauge(document.getElementById('HighestBedRoomToday_chart_div'));

  HighestBedRoomTodayChart.draw(HighestBedRoomTodayData, HighestBedRoomTodayOptions);
}
function drawHighestBaroTodayChart() {

  var HighestBaroTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['°C', highestpressureOutsideTodayJs]
  ]);

  var HighestBaroTodayOptions = {
       min: -30,
     greenFrom: -30, greenTo: 10,
        yellowFrom: 10.01, yellowTo: 25,
        redFrom: 25.01, redTo: 40,
      minorTicks: 10,
    majorTicks: ['-30','-20','-10','0','10','20','30','40'],max: 40
  };

  var HighestBaroTodayChart = new 		google.visualization.Gauge(document.getElementById('HighestBaroToday_chart_div'));

  HighestBaroTodayChart.draw(HighestBaroTodayData, HighestBaroTodayOptions);
}

      function drawLowestOutsideTodayChart() {

  var LowestOutsideTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['°C', lowesttemperatureOutsideTodayJs]
  ]);

  var LowestOutsideTodayOptions = {
    width: 200, height: 200,
    min: -30,
     greenFrom: -30, greenTo: 10,
        yellowFrom: 10.01, yellowTo: 25,
        redFrom: 25.01, redTo: 40,
      minorTicks: 10,
    majorTicks: ['-30','-20','-10','0','10','20','30','40'],max: 40
  };

  var LowestOutsideTodayChart = new 		google.visualization.Gauge(document.getElementById('LowestOutsideToday_chart_div'));

  LowestOutsideTodayChart.draw(LowestOutsideTodayData, LowestOutsideTodayOptions);
}

function drawLowestLivingRoomTodayChart() {

  var LowestLivingRoomTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['°C', lowesttemperatureLivingRoomTodayJs]
  ]);

  var LowestLivingRoomTodayOptions = {
    width: 200, height: 200,
     min: -30,
     greenFrom: -30, greenTo: 10,
        yellowFrom: 10.01, yellowTo: 25,
        redFrom: 25.01, redTo: 40,
      minorTicks: 10,
    majorTicks: ['-30','-20','-10','0','10','20','30','40'],max: 40
  };

  var LowestLivingRoomTodayChart = new 		google.visualization.Gauge(document.getElementById('LowestLivingRoomToday_chart_div'));

  LowestLivingRoomTodayChart.draw(LowestLivingRoomTodayData, LowestLivingRoomTodayOptions);
}

function drawxxxChart() {

  var xxxData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['°C', xxxJs]
  ]);

  var xxxOptions = {
    width: 200, height: 200,
    min: -30,
     greenFrom: -30, greenTo: 10,
        yellowFrom: 10.01, yellowTo: 25,
        redFrom: 25.01, redTo: 40,
      minorTicks: 10,
    majorTicks: ['-30','-20','-10','0','10','20','30','40'],max: 40
  };

  var xxxChart = new 		google.visualization.Gauge(document.getElementById('xxx_chart_div'));

  xxxChart.draw(xxxData, xxxOptions);
}

google.setOnLoadCallback(drawHighestOutsideTodayChart);  
google.setOnLoadCallback(drawHighestLivingRoomTodayChart);
google.setOnLoadCallback(drawHighestBedRoomTodayChart);
google.setOnLoadCallback(drawHighestBaroTodayChart);
google.setOnLoadCallback(drawLowestOutsideTodayChart);  
google.setOnLoadCallback(drawLowestLivingRoomTodayChart);
google.setOnLoadCallback(drawxxxChart);

