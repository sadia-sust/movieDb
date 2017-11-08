<?php
require 'sessionValue.php';
include 'graph3.php';
include 'graph4.php';

include 'piechart.php';
include 'line_chart.php';
include 'graph5.php';
include 'barchart.php';



?>
<html>
<head>
    <title>Graph</title>
    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
    google.setOnLoadCallback(drawChart2);
    google.setOnLoadCallback(drawChart3);


    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           title: 'Rating',
          is3D: 'true',
          width: 450,
          height: 450
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    function drawChart2() {

      // Create our data table out of JSON data loaded from server.
      var data2 = new google.visualization.DataTable(<?=$jsonTable2?>);
      var options2 = {
           title: 'User Visit Counter',
          is3D: 'true',
          width: 450,
          height: 450
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
      chart2.draw(data2, options2);
    }
    function drawChart3() {

      // Create our data table out of JSON data loaded from server.
      var data3 = new google.visualization.DataTable(<?=$jsonTable3?>);
      var options3 = {
           title: 'Movie Visit Counter',
          is3D: 'true',
          width: 450,
          height: 450
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart3 = new google.visualization.LineChart(document.getElementById('chart_div3'));
      chart3.draw(data3, options3);
    }
    </script>
    <link href="http://www.tutorialspoint.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  </head>
<body style="background-color: #444444; background-image: url('untitled.jpg');">
  <div class="row">
    <div class="col-md-5">      
    </div>
    <div class="col-md-6">
      <div>
       <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['username'] ?></a>
                </div>
                  <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li class="active"><a href="profile.php">Profile</a></li>
                    <li ><a href="blog.php">Blog</a></li> 
                    <li><a href="logout.php">Logout</a></li> 
                  </ul>
              </div>
        </nav>
    </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-8">
      <h3> Rating and daily user visit chart of ACTOR <?php echo $_SESSION['StarName'];?> </h3>
    </div>

  </div>
	
  <div class="row">
  <div class="col-md-3"></div>
   <div id="chart_div" class="col-md-5"></div>
  
  </div>
  <div class="row">
    <div class="col-md-3"></div>
    <div  class="col-md-5"><strong>Rating Chart</strong> </div>
  </div>

  <div class="row">
      <div class="col-md-3"></div>
      <div id="chart_div2" class="col-md-5"></div>
  
  </div>
  <div class="row">
      <div class="col-md-3"></div>
      <div  class="col-md-5"><strong>User Chart</strong> </div>
  </div>
   <div class="row">
      <div class="col-md-3"></div>
      <div id="chart_div3" class="col-md-5"></div>
  
  </div>
  <div class="row">
      <div class="col-md-3"></div>
      <div  class="col-md-5"><strong>User Chart</strong> </div>
  </div>


</body>
</html>