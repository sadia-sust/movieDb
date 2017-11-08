<?php
include_once 'dbconfig.php';
  include 'sessionValue.php';
  //var_dump($_SESSION);

  $numbers = array("1","2", "3" , "4" , "5" ,"6" , "7" ,"8");
  $title ;  // list of blog title to display
  $userName ;
  $description ;
  $uploadedTime ;
  $userliked = 1;
  $userdisliked = 1;
    $current ;
  if (isset($_GET["page"]))
  {
      
   $current = $_GET["page"];
   $_SESSION['blog_cur'] = $current;

  }
  $delete_authorization = "FALSE";  
  if( $_SESSION['deleteblog'] =="YES")
    $delete_authorization = "TRUE";
  $recent_blog_query = "SELECT ID,Title,username,Description,Uploaded_Time FROM blog where ID = $current";
  $recent_blog_query_run = mysql_query($recent_blog_query);
  $row = mysql_num_rows($recent_blog_query_run);

  //$id = mysql_result($recent_blog_query_run,$i, 'Title');
      
  for($i = 0; $i<1; $i = $i+1 )
   {
     	//if($current == $numbers[$i])
     	{
         	$title = mysql_result($recent_blog_query_run,$i, 'Title');
          $userName= mysql_result($recent_blog_query_run, $i , 'username');
          $_SESSION['blog_un'] = $_SESSION['username'];

          $description = mysql_result($recent_blog_query_run, $i , 'Description');  
          $uploadedTime = mysql_result($recent_blog_query_run, $i , 'Uploaded_Time');
          $id = mysql_result($recent_blog_query_run,$i, 'ID');
          $_SESSION['blog_id'] = $id;
          
          $query = "SELECT username FROM like_counter WHERE  Blog_id = '$id' and like_dislike ='1'";
          $query_like = mysql_query($query);
          $liked = mysql_num_rows($query_like);
          $like_un = $_SESSION['username'];
          $query = "SELECT username FROM like_counter WHERE  Blog_id = '$id' and like_dislike ='1' and username = '$like_un' ";
          $query_like = mysql_query($query);
          if(mysql_num_rows($query_like) ==1)
           {
              $userliked=0;
              $liked = $liked -1;


           }   
          
          
          $query = "SELECT username FROM like_counter WHERE  Blog_id = '$id' and like_dislike ='2'";
          $query_like = mysql_query($query);
          $disliked = mysql_num_rows($query_like);
          $query = "SELECT username FROM like_counter WHERE  Blog_id = '$id' and like_dislike ='2' and username = '$like_un' ";
          $query_like = mysql_query($query);
          if(mysql_num_rows($query_like) ==1)
           {
              $userdisliked=0;
              $disliked = $disliked -1;


           }

          if($_SESSION['username'] == $userName)
            $delete_authorization= "TRUE";
    
     	}
    //echo $Actor[$i]." AS ".$Role[$i]."\n";


  	}

    if(isset($_POST["deleteBlog"]))
     {
        
        $delete_query = "DELETE FROM blog WHERE id=$id";
        mysql_query($delete_query);
        header("Location: blog.php");
     }

    function showbutton()
     {

      echo "<div>".
      "<form method=\"POST\">".
        "<input type=\"submit\" name=\"deleteBlog\" value=\"Delete it\">".
      "</form>".
      "</div>";
     }


?>
<html>
<head>
 <title>Blog Details</title>
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
    <div style="width: 400px;">
      <h1>
      <?php echo $title?> 
    </h1>
    <p>   
    Username:<?php echo "   ".$userName?> 
    </p>
    <p>Uploaded in<?php echo "   ".$uploadedTime?> 
    </p>
    <p><?php 
        for($i = 0;$i <strlen($description) ; $i++)
        {
          if($description[$i]>='0' and $description[$i]<='9' and $description[$i+1]=='.')
            echo "<br>".$description[$i];
          else
            echo $description[$i];;


        }

     ?> </p>
    <div>
      <img src="like.jpg"  style="width:30px;height:30px;">
      <a href="like_page.php?ct=1" > like </a>
      <a href="like_page.php?ct=2" > Dislike </a>
      <img src="dislike.png"  style="width:30px;height:30px;">
    </div>
    <p><?php if($userliked==0)echo "You and "; echo $liked." person liked it"; ?></p>
    <p><?php if($userdisliked==0)echo "You and " ;echo $disliked." person disliked it"; ?></p>

    <?php

      if($delete_authorization=="TRUE")
      showbutton(); 
    ?>
    

    </div>	  
	</div>
</body>
</html>

