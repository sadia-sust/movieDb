<?php
   require 'sessionValue.php';

    if (isset($_POST["field"]))
  {
      
      $_SESSION['search']=  $_POST['field'];
      header("Location: searchresult2.php");
  
  }
?>

<html>
<head>
  <title>Add Crew</title>
  <style type="text/css">
  .container { 
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-direction: column;
    width: 800px;
    height: 500px;

    margin: 0 auto;
  }
  </style>
  <link href="http://www.tutorialspoint.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
        <link rel="stylesheet" type="text/css" href="css/styleHome.css" />

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
                    <li class="active"><a href="profile.php">Profile</a></li>
                    <li ><a href="blog.php">Blog</a></li> 
                    <li><a href="logout.php">Logout</a></li> 
                  </ul>
              </div>
        </nav>
    </div>
    <div class="container">
     <div>
     <form class="search" method="post" action="" >
             <input type="text" name="field" placeholder="Search a movie to delete" />
            
           </form>     
      </div> 
      </div>     
</body>
</html>>