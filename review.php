<?php
  include_once 'dbconfig.php';
  require 'sessionValue.php';
    //var_dump($_SESSION);
    
   // $dt = "1990/03/11";//date("Y/m/d"); //get current date for checking upcoming movies
  
  if(!(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) )) // redirect to login.php if tried to access without login
  {

    header("Location: login.php");
    die();
  }


  $title = array();  // list of blog title to display
  $userName = array();
  $description = array();
  $uploadedTime = array();
  $MOVIE = $_SESSION['test'];
  $recent_blog_query = "SELECT username,Description,Uploaded_Time FROM review where Movie_Name = '$MOVIE' order by Uploaded_Time ASC ";
  $recent_blog_query_run = mysql_query($recent_blog_query);
  $row = mysql_num_rows($recent_blog_query_run);
     if(isset($_SESSION['rnext']))
  {
    $st = $_SESSION['rnext'];
  }
  else 
    $st = 0;
  if($st>$row)
    $st = $row - ($row%5);
  if($st<0)
    $st = 0;
 $_SESSION['rnext'] = $st;
  for($i = $st; $i<$row; $i = $i+1 )
   {
    $userName[$i] = mysql_result($recent_blog_query_run, $i , 'username');
    $description[$i] = mysql_result($recent_blog_query_run, $i , 'Description');  
    $uploadedTime[$i] = mysql_result($recent_blog_query_run, $i , 'Uploaded_Time');    
    //echo $Actor[$i]." AS ".$Role[$i]."\n";

  }
     include 'b4.php';  

?>

<head>
  <title>Blog</title>
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
    
</head>

<body style="background-color: #444444; background-image: url('untitled.jpg');">
    
  <div class="container">
    <div >
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

  <?php
    // include html div in list.php for east cast
    for($i = $st; $i <$row; $i = $i +1)
    {
      // if($i!= 0)
      // include 'line.php';
      $_SESSION['i']=($i+1);

      $_SESSION['userName']= $userName[$i];
      $_SESSION['description']= $description[$i];
      $_SESSION['uploadedTime']= $uploadedTime[$i];
      func2();
      



      
    }
  ?>
      <div>
  Showing <?php  echo $st ;echo  "-"; echo $st+min($st + 5 ,$row-$st)." out of ".$row." reviews.";?>
  <a href="nextblog2.php?nxt=2">Previous Page</a> |
  <a href="nextblog2.php?nxt=1">Next Page</a>  
  <div>
    <a href="addreview.php">Add a review</a>
  </div>
  </div>

     
</body>

</html>