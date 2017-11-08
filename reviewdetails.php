<?php
include_once 'dbconfig.php';
  include 'sessionValue.php';
  //var_dump($_SESSION);
  
  $numbers = array("1","2", "3");
  $title ;  // list of blog title to display
  $userName ;
  $description ;
  $uploadedTime ;
  $MOVIE= $_SESSION['test'];
  $recent_blog_query = "SELECT username,Description,Uploaded_Time FROM review where Movie_Name = '$MOVIE' order by Uploaded_Time ASC ";
  $recent_blog_query_run = mysql_query($recent_blog_query);
  $row = mysql_num_rows($recent_blog_query_run);
  $current ;
  if (isset($_GET["page"]))
  {
    
    $current = $_GET["page"];

  }
  for($i = 0; $i<$row && $i<7; $i = $i+1 )
   {
    if($current == $numbers[$i])
    {
    $userName= mysql_result($recent_blog_query_run, $i , 'username');
    $description = mysql_result($recent_blog_query_run, $i , 'Description');  
    $uploadedTime = mysql_result($recent_blog_query_run, $i , 'Uploaded_Time');    
    
    }
    //echo $Actor[$i]." AS ".$Role[$i]."\n";

    }


?>
<html>
<head>
  <style type="text/css">
  .container { 
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-direction: column;
    width: 800px;


    margin: 0 auto;
  }
  </style>
 <link href="http://www.tutorialspoint.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
</head>
<body style="background-image: url('untitled.jpg');">
  <div style="width:800px; margin:0 auto;">
    
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['username'] ?></a>
                </div>
                  <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li class="active"><a href="blog.php">Blog</a></li> 
                    <li><a href="logout.php">Logout</a></li> 
                  </ul>
              </div>
        </nav>
      </div>
  <div class="container">
  <div style="width:200px">
    <h3>
      Review of: 
      <strong><?php echo "".$MOVIE?></strong>

    </h3>
    <p>   
    Username:<?php echo "   ".$userName?> 
    </p>
    <p>Uploaded in<?php echo "   ".$uploadedTime?> 
    </p>
    <p><?php echo $description ?> </p>
    
  </div>
  </div>
</body>
</html>