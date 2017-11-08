<?php
  include_once 'dbconfig.php';
  require 'sessionValue.php';
  $_SESSION['deleteblog'] ="NO";
    //var_dump($_SESSION);
    
    $dt = date("Y-m-d"); //get current date for checking upcoming movies
    $_SESSION['details'] = "NO";
  if(!(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) )) // redirect to login.php if tried to access without login
  {

    header("Location: login.php");
    die();
  }
  $Movie_list = array();  // list of movies to display
  $image = array();
  if($_SESSION['upcoming'] != "YES")  //query for generating upcoming movie list
  {
      $recent_movie_query = "SELECT Movie_Name , Image_link FROM movie_details order by Update_Time DESC ";
      $query_run = mysql_query($recent_movie_query);
      $rows = mysql_num_rows($query_run);
      for($i = 0; $i< $rows ; $i = $i+1)
      {
        $Movie_list[$i] = mysql_result($query_run, $i ,  'Movie_Name');
        $image[$i] = mysql_result($query_run, $i ,  'Image_link');
      }      
  }
  else //query for generating recently updated movies
  {
    $upcoming_movie_query = "SELECT Movie_Name, Image_Link FROM movie_details where Release_Date > '$dt' order by Release_Date DESC";
      $query_run = mysql_query($upcoming_movie_query);
      $rows = mysql_num_rows($query_run);
      for($i = 0; $i< $rows ; $i = $i+1)
      {
     $image[$i] = mysql_result($query_run, $i ,  'Image_link');
        
        $Movie_list[$i] = mysql_result($query_run, $i ,  'Movie_Name');
      }

  }
  $title = array();  // list of blog title to display
  $userName = array();
  $uploadedTime = array(); 
  $B_ID = array();
  $recent_blog_query = "SELECT ID,Title,username,Uploaded_Time FROM blog order by Uploaded_Time ASC ";
  $recent_blog_query_run = mysql_query($recent_blog_query);
  $row2 = mysql_num_rows($recent_blog_query_run);

  for($i = 0; $i<$row2 && $i<7; $i = $i+1 )
   {
    $title[$i] = mysql_result($recent_blog_query_run,$i, 'Title');
    $userName[$i] = mysql_result($recent_blog_query_run, $i , 'username');
    $uploadedTime[$i] = mysql_result($recent_blog_query_run, $i , 'Uploaded_Time');    
    $B_ID[$i]=mysql_result($recent_blog_query_run,$i, 'ID');
    ;
  }
  $Latest_news_query = "SELECT Title,description,author, Image_Link FROM Latest_News ORDER BY ID DESC";
  $Latest_news_query_run = mysql_query($Latest_news_query);
  $news_Title = mysql_result($Latest_news_query_run, 0 , 'Title');    
  $news_Description = mysql_result($Latest_news_query_run, 0 , 'description');    
  $news_author = mysql_result($Latest_news_query_run, 0 , 'author');  
  $news_link = mysql_result($Latest_news_query_run, 0 , 'Image_Link');  
  $news_Description = substr($news_Description, 0 , 50);


    
     


  if (isset($_POST["myButton"])) //go to moviePage.php and sets session value 1st movie appeared on the page
  {
      $_SESSION['test']= "$Movie_list[0]";
       header("Location: moviePage.php?seemore=NO");
  }
  if (isset($_POST["myButton2"])) //go to moviePage.php and sets session value 2nd movie appeared on the page
  {
      $_SESSION['test']= "$Movie_list[1]";
       header("Location: moviePage.php?seemore=NO");
  }
  if (isset($_POST["recentupdate"])) //go to moviePage.php and sets session value 3rd movie appeared on the page
  {
      $_SESSION['upcoming']= "NO";
       header("Location: home.php");
  }
  if (isset($_POST["upcoming"]))
  {
      
      $_SESSION['upcoming']= "YES";
      header("Location: home.php");
  
  }
/*  if (isset($_POST["searc"]))
  {
      
      $_SESSION['search']=  $_POST['field'];
      header("Location: searchresult.php");
  
  }*/
  if(isset($_POST['search']))
      {
        $vr = $_POST['search'];
             $_SESSION['search']=  $_POST['search'];
          if(strlen($vr)>0)
      header("Location: searchresult.php");

      }


?>

<!doctype html>
  <head>
  <script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            //your function call here
            document.test.submit();
        }
    }
</script>
      <title>Home Page</title>
	  <!--<link rel="stylesheet" type="text/css" href="styleHome.css" /> -->
	  <link rel="stylesheet" type="text/css" href="css/styleHome.css" />
	  <!--<script src="JavaScriptHome.js"></script>--> 
    <link href="http://www.tutorialspoint.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
 <body class="theme-transit"  style="background-color: #444444; background-image: url('untitled.jpg');">
    <div class="row">
      <div class="col-md-2" >
        
      </div>
      <div class="col-md-8">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['username'] ?></a>
                </div>
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="home.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="blog.php">Blog</a></li> 
                    <li><a href="logout.php">Logout</a></li> 
                  </ul>
              </div>
        </nav>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-3">
          <form class="search" name="test" action="#" method="POST">
        <input type="text" name="search" placeholder = "Search your Movie..." />     
      </div>      
    </div>
    
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-3">
               
      </div>      
    </div>

    <div class="row" style = "margin-top: 40px;margin-bottom: 10px;">
      <div class="col-md-3"></div>
      <div class="col-md-4">
          <form action="" method="post">
            <input type="submit" class="btn btn-default" name="recentupdate" value="recently updates movies"/>
            <input type="submit" class="btn btn-default" name="upcoming" value="upcoming movies"/>
         </form>     
      </div>      
    </div>

     <div class = "row">
       <div class="col-md-3">
          </div>
            <div class ="col-md-3"  style = "border:2px groove #3b5998 ; border-radius: 5px; background-color: white; box-shadow: 5px 17px 21px 5px #3b5998;margin-bottom: 30px; ">
            <img src="<?php echo $image[0] ;?>" id = "img" style ="width: 100px; height: 100px;    border: 3px solid #ADD8E6; border-radius: 5px;">
            <a href="MovieFromSearch.php?data=<?php echo $Movie_list[0]?>"  > <?php echo $Movie_list[0]?>  </a> 
        </div>
        <div class="col-md-2"></div>
        
        <div class ="col-md-3" >
            <h4>
              <STRONG>Recent blogs:</STRONG> 
            </h4>
        </div>
     </div>

     <div class = "row">
       <div class="col-md-3">
          </div>
            <div class ="col-md-3"  style = "border:2px groove #3b5998 ; border-radius: 5px; background-color: white; box-shadow: 5px 17px 21px 5px #3b5998;margin-bottom: 30px; ">
            <img src="<?php echo $image[1] ;?>" id = "img" style ="width: 100px; height: 100px;    border: 3px solid #ADD8E6; border-radius: 5px;">


            <a href="MovieFromSearch.php?data=<?php echo $Movie_list[1];?>"  > <?php echo $Movie_list[1]?>  </a> 
        </div>
        <div class="col-md-2"></div>
        
           <div class ="col-md-3"  style = "border:2px groove #3b5998 ; border-radius: 5px; background-color: white; box-shadow: 5px 17px 21px 5px #3b5998;margin-bottom: 30px; ">
            <p><?php echo $title[0];?></p>
            <p><?php echo  "BY -".$userName[0];?> </p>
            <p>Uploaded on: <?php echo $uploadedTime[0] ;?></p>
            <a href="blogdetails.php?page=<?php echo $B_ID[0] ;?>"  > See Details  </a> 
         
        </div>
     </div>
    
     <div class = "row">
       <div class="col-md-3"></div>
        <div class ="col-md-3"  style = "border:2px groove #3b5998 ; border-radius: 5px; background-color: white; box-shadow: 5px 17px 21px 5px #3b5998;margin-bottom: 30px; ">
            <img src="<?php echo $image[2] ;?>" id = "img" style ="width: 100px; height: 100px;    border: 3px solid #ADD8E6; border-radius: 5px;">
            <a href="MovieFromSearch.php?data=<?php echo $Movie_list[2]?>"  > <?php echo $Movie_list[2]?>  </a> 
        </div>
        <div class="col-md-2"></div>
        <div class ="col-md-3"  style = "border:2px groove #3b5998 ; border-radius: 5px; background-color: white; box-shadow: 5px 17px 21px 5px #3b5998;margin-bottom: 30px; ">
            <p><?php echo $title[1];?></p>
            <p><?php echo  "BY -".$userName[1];?> </p>
            <p>Uploaded on: <?php echo $uploadedTime[1] ;?></p>
            <a href="blogdetails.php?page=<?php echo $B_ID[1] ;?>"  > See Details  </a> 
         
        </div>
        

     </div>

    <div class = "row" style = "margin-top: 10px;">
       <div class="col-md-3"></div>
             <div class="col-md-3" style="color: red">
        <h1><STRONG>LATEST NEWS :</STRONG></h3>


      </div>
        <div class="col-md-2"></div>
       
        <div class ="col-md-3"  style = "border:2px groove #3b5998 ; border-radius: 5px; background-color: white; box-shadow: 5px 17px 21px 5px #3b5998;margin-bottom: 30px; ">
            <p><?php echo $title[2];?></p>
            <p><?php echo  "BY -".$userName[2];?> </p>
            <p>Uploaded on: <?php echo $uploadedTime[2] ;?></p>
            <a href="blogdetails.php?page=<?php echo $B_ID[2] ;?>"  > See Details  </a> 
        </div>
        

     </div>

     <div class = "row" style = "margin-top: 10px;">
       <div class="col-md-3"></div>
       <div class ="col-md-3" style = "border:2px groove #3b5998 ; border-radius: 5px; background-color: white; box-shadow: 5px 17px 21px 5px #3b5998;margin-bottom: 30px; ">
            <div>
              <img src="<?php echo $news_link?>" id = "img" style ="width: 100px; height: 100px;    border: 3px solid #ADD8E6; border-radius: 5px;">
            </div>
            
            <p><?php echo $news_Title;?></p>
            <p><?php echo  "BY -".$news_author;?> </p>
            <p><?php echo  $news_Description."...";?> </p>
            <a href="Latest_news.php"  > See Details  </a> 
      </div>
       <div class="col-md-2"></div>
      
      <div class ="col-md-3" style = "border:2px groove #3b5998 ; border-radius: 5px; background-color: white; box-shadow: 5px 17px 21px 5px #3b5998;margin-bottom: 30px; ">
            <p><?php echo $title[3];?></p>
            <p><?php echo  "BY -".$userName[3];?> </p>
            <p>Uploaded on: <?php echo $uploadedTime[3] ;?></p>            
            <a href="blogdetails.php?page=<?php echo $B_ID[3] ;?>"  > See Details  </a> 
      </div>
        
     </div>	 
   
  

  
	    
</body>

</div>