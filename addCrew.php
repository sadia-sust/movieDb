<?php
  include_once 'dbconfig.php';
  require 'sessionValue.php';
  $dt = date("Y/m/d"); 

  if(isset($_POST['realName']) &&  isset($_POST['roleName']) && isset($_POST['cars']))
  {

  $real =    $_POST['realName'];
  $role =    $_POST['roleName'];
  $priority = $_POST['cars'];

  $MOVIE = $_SESSION['add'];

  if(!empty($real) && !empty($role) && !empty($priority))
  {




      // $sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];

       $sql_query= "INSERT INTO  cast (MovieName,ActorNAme,RolePlay,Priority)   values ('$MOVIE'  , '$real' , '$role',$priority) ";
         //echo $sql_query;
    //header("Location: home.php");

         mysql_query($sql_query); 




  }

   if (isset($_POST["nextButton"])) 
  {
      
       header("Location: addCrew.php");
  }
  else if (isset($_POST["finishButton"])) 
  {
     
       header("Location: profile.php");
  }
}

?>

<head>
  <title>Add Crew</title>
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
    <div>
    <form method="post">
        
        <!-- <input type="text" name="mail" id="name" placeholder="Email" required/> -->

        <input type="text" name="realName" placeholder="Actor Name" style="border-radius:6px;" required/>
        <strong>As</strong>
        <input type="text" name="roleName" placeholder = "Role Play" style="border-radius:6px;" required/>
        <!--<input type="text" name="priority" placeholder = "Priority" required/>-->

        <select name="cars">
                <option value="1">Main Actor</option>
                <option value="2">Main Actress</option>
                <option value="3">Supporting Actor/Actress</option>
         </select>
         <br><br>
        

        <input type="submit" name="nextButton" value="Next">
        <input type="submit" name="finishButton" value="Finish">


    </form>
    </div>
    </div>
  </body>
</html>