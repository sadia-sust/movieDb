<?php
include_once 'dbconfig.php';
  include 'sessionValue.php';
  $Latest_news_query = "SELECT Title,description,author , Image_Link FROM Latest_News ORDER BY ID DESC";
  $Latest_news_query_run = mysql_query($Latest_news_query);
  $news_Title = mysql_result($Latest_news_query_run, 0 , 'Title');    
  $news_Description = mysql_result($Latest_news_query_run, 0 , 'description');    
  $news_author = mysql_result($Latest_news_query_run, 0 , 'author');
  $im = mysql_result($Latest_news_query_run, 0 , 'Image_Link');



?>
<html>
<head>
<link href="http://www.tutorialspoint.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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

</head>
<body style="background-image: url('untitled.jpg');">
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
    <div>
        <img src="<?php echo $im?>" id = "img" style ="width: 300px; height: 200px;    border: 3px solid #ADD8E6; border-radius: 5px;">
            
    </div>
    <div style="width: 300px;">
      <h3>
      <?php echo $news_Title?> 
    </h3>
    <p>   
    Author:<?php echo "   ".$news_author?> 
    </p>
    <p><?php echo $news_Description ?> </p>

    
    

    </div>	  
	</div>
</body>
</html>