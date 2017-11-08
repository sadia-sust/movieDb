<?php
include_once 'dbconfig.php';
  include 'sessionValue.php';


  if (isset($_GET["ID"]))
  {
    $_SESSION['A_ID'] =  $_GET["ID"];
    $A_ID = $_GET["ID"];

  }
  $actor_query = "SELECT * FROM stars where ID ='$A_ID' ";
  $query_run = mysql_query($actor_query);
  $row = mysql_num_rows($query_run);

   	$DOB = mysql_result($query_run,0, 'DOB');
    $Actor_Name= mysql_result($query_run, 0 , 'Name');
    $_SESSION['StarName'] = $Actor_Name;


    $im_link = mysql_result($query_run, 0 , 'image');  
    $query  = "SELECT MovieName from cast where ActorName = '$Actor_Name' ;";
  //echo $query;
  $query_run = mysql_query($query);
  $rowLIST = mysql_num_rows($query_run);
  $movie = array();
  for( $i=0;$i < $rowLIST ; $i++)
    $movie[$i] = mysql_result($query_run, $i, 'MovieName');
      include 'date2.php';
  include 'rating2.php';
  

?>
<html>
<head>
  <style type="text/css">
  .container { 
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 800px;

    margin: 0 auto;
  }
  </style>
  <link href="http://www.tutorialspoint.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
  .container { 
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 800px;

    margin: 0 auto;
  }
  .st1 {
    background-color: red;
    background: url(star.jpg);
    width: 30px; /* width of image */
    height: 30px; /* height of image */
    border: 0;
}
.st2 {
    background: url(star.jpg);
    width: 30px; /* width of image */
    height: 30px; /* height of image */
    border: 0;
}
.st3 {
    background: url(star.jpg);
    width: 30px; /* width of image */
    height: 30px; /* height of image */
    border: 0;
}
.st4 {
    background: url(star.jpg);
    width: 30px; /* width of image */
    height: 30px; /* height of image */
    border: 0;
}
.st5 {
    background: url(star.jpg);
    width: 30px; /* width of image */
    height: 30px; /* height of image */
    border: 0;
}
  </style>

</head>
<body style="background-color: #444444; background-image: url('untitled.jpg');">
    <div class="container">
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
      <div >
     <img src="<?php echo $im_link?>" id = "img">

   </div>
  <div>
    <h1>
      <?php echo $Actor_Name?> 
    </h1>
     <p><?php echo "Date of Birth: ".$DOB ?> </p>
    
  </div>
  <div>
    <form action="" method="post">
    <input type="submit" class="st1" name="myButton" value="1"/>
    <input type="submit" class="st2" name="myButton2" value="2"/>
    <input type="submit" class="st3" name="myButton3" value="3"/>
    <input type="submit" class="st4" name="myButton4" value="4"/>
    <input type="submit" class="st5" name="myButton5" value="5"/>

  </form>

  </div>
  <div>
  <p>
    Current Rating <?php echo $rate ?>
  </p>
  <p>
    Average Rating <?php echo $rating_avg  ?>
  </p>
  </div>
  <div>
  Movie List:
  </div>
  <?php
  for($i =0;$i < $rowLIST; $i++)
  {
    echo "<div>";
    echo  "<a href=\"MovieFromSearch.php?data=".$movie[$i]."\">".$movie[$i]."</a>";
    echo "</div>";
  }
  ?>

    </div>
</body>
</html>