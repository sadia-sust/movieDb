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
  $likedvote = array();
  $dislikedvote = array();
  $id = array();
  $recent_blog_query = "SELECT ID, Title,username,Description,Uploaded_Time FROM blog order by Uploaded_Time ASC ";
  $recent_blog_query_run = mysql_query($recent_blog_query);
  $row = mysql_num_rows($recent_blog_query_run);
    if(isset($_SESSION['blognext']))
  {
    $st = $_SESSION['blognext'];
  }
  else 
    $st = 0;
  if($st>$row)
    $st = $row - ($row%5);
  if($st<0)
    $st = 0;
 $_SESSION['blognext'] = $st;


  for($i = $st; $i<$row ; $i = $i+1 )
   {
    $id[$i] = mysql_result($recent_blog_query_run, $i, 'ID');

    $title[$i] = mysql_result($recent_blog_query_run,$i, 'Title');
    $userName[$i] = mysql_result($recent_blog_query_run, $i , 'username');
    $description[$i] = mysql_result($recent_blog_query_run, $i , 'Description');  
    $uploadedTime[$i] = mysql_result($recent_blog_query_run, $i , 'Uploaded_Time');    
    //echo $Actor[$i]." AS ".$Role[$i]."\n";
    $query = "SELECT username FROM like_counter WHERE  Blog_id = '$id[$i]' and like_dislike ='1'";
    $query_like = mysql_query($query);
    $likedvote[$i] = mysql_num_rows($query_like);
    
    $query = "SELECT username FROM like_counter WHERE  Blog_id = '$id[$i]' and like_dislike ='2'";
    $query_dislike = mysql_query($query);
    $dislikedvote[$i] = mysql_num_rows($query_dislike);
          

  }
  $current= "1";

   if (isset($_GET["sort"]))
  {
      
   $current = $_GET["sort"];
      if($current=="1")
      {
        for($i = $st; $i<$row ; $i = $i+1 )
   {
    $id[$i] = mysql_result($recent_blog_query_run, $i, 'ID');

    $title[$i] = mysql_result($recent_blog_query_run,$i, 'Title');
    $userName[$i] = mysql_result($recent_blog_query_run, $i , 'username');
    $description[$i] = mysql_result($recent_blog_query_run, $i , 'Description');  
    $uploadedTime[$i] = mysql_result($recent_blog_query_run, $i , 'Uploaded_Time');    
    //echo $Actor[$i]." AS ".$Role[$i]."\n";
    $query = "SELECT username FROM like_counter WHERE  Blog_id = '$id[$i]' and like_dislike ='1'";
    $query_like = mysql_query($query);
    $likedvote[$i] = mysql_num_rows($query_like);
    
    $query = "SELECT username FROM like_counter WHERE  Blog_id = '$id[$i]' and like_dislike ='2'";
    $query_dislike = mysql_query($query);
    $dislikedvote[$i] = mysql_num_rows($query_dislike);
          

  }


      }
      if($current=="2")
      {


        for($i = $st; $i<$row ; $i = $i+1 )
          for($j = $i +1;$j < $row; $j++)
             {
              if( $likedvote[$i]< $likedvote[$j])
              {

                $temp = $id[$i];
                $id[$i] = $id[$j];
                $id[$j] = $temp;
 
                $temp2 = $title[$i];
                $title[$i] = $title[$j];
                $title[$j] = $temp2;
 

                $temp2 = $userName[$i];
                $userName[$i] = $userName[$j];
                $userName[$j] = $temp2;

 
                $temp2 = $uploadedTime[$i];
                $uploadedTime[$i] = $uploadedTime[$j];
                $uploadedTime[$j] = $temp2;
 
                $temp2 = $likedvote[$i];
                $likedvote[$i] = $likedvote[$j];
                $likedvote[$j] = $temp2;
 
                $temp2 = $dislikedvote[$i];
                $dislikedvote[$i] = $dislikedvote[$j];
                $dislikedvote[$j] = $temp2;
 
              }
              
                              

            }

      }

      if($current=="3")
      {


        for($i = $st; $i<$row ; $i = $i+1 )
          for($j = $i +1;$j < $row; $j++)
             {
              if( $dislikedvote[$i]< $dislikedvote[$j])
              {

                $temp = $id[$i];
                $id[$i] = $id[$j];
                $id[$j] = $temp;
 
                $temp2 = $title[$i];
                $title[$i] = $title[$j];
                $title[$j] = $temp2;
 

                $temp2 = $userName[$i];
                $userName[$i] = $userName[$j];
                $userName[$j] = $temp2;

 
                $temp2 = $uploadedTime[$i];
                $uploadedTime[$i] = $uploadedTime[$j];
                $uploadedTime[$j] = $temp2;
 
                $temp2 = $likedvote[$i];
                $likedvote[$i] = $likedvote[$j];
                $likedvote[$j] = $temp2;
 
                $temp2 = $dislikedvote[$i];
                $dislikedvote[$i] = $dislikedvote[$j];
                $dislikedvote[$j] = $temp2;
 
              }
              
                              

            }

      }
      if($current=="4")
      {


        for($i = $st; $i<$row ; $i = $i+1 )
          for($j = $i +1;$j < $row; $j++)
             {
              if( $likedvote[$i] + $dislikedvote[$i] < $likedvote[$j] + $dislikedvote[$j])
              {

                $temp = $id[$i];
                $id[$i] = $id[$j];
                $id[$j] = $temp;
 
                $temp2 = $title[$i];
                $title[$i] = $title[$j];
                $title[$j] = $temp2;
 

                $temp2 = $userName[$i];
                $userName[$i] = $userName[$j];
                $userName[$j] = $temp2;

 
                $temp2 = $uploadedTime[$i];
                $uploadedTime[$i] = $uploadedTime[$j];
                $uploadedTime[$j] = $temp2;
 
                $temp2 = $likedvote[$i];
                $likedvote[$i] = $likedvote[$j];
                $likedvote[$j] = $temp2;
 
                $temp2 = $dislikedvote[$i];
                $dislikedvote[$i] = $dislikedvote[$j];
                $dislikedvote[$j] = $temp2;
 
              }
              
                              

            }

      }

  }
 

     include 'blogList.php';  

?>


<!doctype html>
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
        <div >
          <nav class="navbar navbar-default">
            <div class="container-fluid">

                  <ul class="nav navbar-nav">
                  <?php 
                  if($current=="1")
                    echo   "<li class=\"active\" ><a href=\"blog.php?sort=1\">Latest</a></li>".
                    "<li ><a href=\"blog.php?sort=2\">Most Liked</a></li>".
                    "<li ><a href=\"blog.php?sort=3\">Most Disliked</a></li>". 
                    "<li ><a href=\"blog.php?sort=4\">Trending</a></li>";
                  if($current=="2")
                    echo   "<li  ><a href=\"blog.php?sort=1\">Latest</a></li>".
                    "<li class=\"active\"><a href=\"blog.php?sort=2\">Most Liked</a></li>".
                    "<li ><a href=\"blog.php?sort=3\">Most Disliked</a></li>". 
                    "<li ><a href=\"blog.php?sort=4\">Trending</a></li>";
                  if($current=="3")
                    echo   "<li  ><a href=\"blog.php?sort=1\">Latest</a></li>".
                    "<li ><a href=\"blog.php?sort=2\">Most Liked</a></li>".
                    "<li class=\"active\" ><a href=\"blog.php?sort=3\">Most Disliked</a></li>". 
                    "<li ><a href=\"blog.php?sort=4\">Trending</a></li>";
                  if($current=="4")
                    echo   "<li  ><a href=\"blog.php?sort=1\">Latest</a></li>".
                    "<li ><a href=\"blog.php?sort=2\">Most Liked</a></li>".
                    "<li ><a href=\"blog.php?sort=3\">Most Disliked</a></li>". 
                    "<li class=\"active\" ><a href=\"blog.php?sort=4\">Trending</a></li>";
                  



                   ?>
                  </ul>
              </div>
        </nav>
      </div>

    <?php
    // include html div in list.php for east cast
    for($i = $st; $i<$row  ; $i = $i +1)
    {
      // if($i!= 0)
      // include 'line.php';


      $_SESSION['title']= $title[$i];
      $_SESSION['userName']= $userName[$i];
      $_SESSION['description']= $description[$i];
      $_SESSION['uploadedTime']= $uploadedTime[$i];
     


      func1($likedvote[$i] ,$dislikedvote[$i],$id[$i]);
      //if($i==0)
      //include 'blogList/b1.php';
      //  if($i==1)
      //  include 'blogList/b2.php';
      //  if($i==2)
      //  include 'blogList/b3.php';
      // if($i==3)
      // include 'blogList/b4.php';
      //  if($i==4)
      //  include 'blogList/b4.php';
      //  if($i==5)
      //  include 'blogList/b5.php';
      //  if($i==6)
      //  include 'blogList/b6.php';
      //  if($i==7)
      //  include 'blogList/b7.php';




      
    }
  ?>
    <div>
  Showing <?php  echo $st+1 ;echo  "-"; echo $st+min($st + 5 ,$row-$st)." out of ".$row." blogs.";?>
  <a href="">Previous Page</a> |
  <a href="">Next Page</a>
  </div>  
  <div>
    <a href="addblog.php">Add a blog</a>
  </div>
  </div>

     
</body>

</html>