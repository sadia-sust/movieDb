<?php
    include_once 'dbconfig.php';
    require 'sessionValue.php';
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

$target_dir = "";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $MO = basename( $_FILES["fileToUpload"]["name"]);

//if(isset($_POST['title']) &&  isset($_POST['description'])&&  isset($_POST['auth']) )
        {

          $name =    $_POST['title'];
          $des =    $_POST['description'];
          $un =    $_POST['auth'];


          if(!empty($name) && !empty($des))// && !empty($description) && !empty($releaseDate) && !empty($url))
          {
               
                $sql_query= "INSERT INTO latest_news ( Title, Description, Author, Image_Link) VALUES ( '$name', '$des', '$un' , '$MO') ; ";
                mysql_query($sql_query);

                   header("Location: home.php");
          }

  
    }
        //$MOV=$_SESSION['add'];
        //$sql_query= "update  Movie_Details set Image_Link = '$MO' where Movie_Name = '$MOV' ";// WHERE 'username'='$un' AND 'password'='$ps'";  ;
        //mysql_query($sql_query);
        //header("Location: addCrew.php");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

?>




<html>
  <head>
    <title>Add Recent News</title>
    <style type="text/css">
    .container { 
      display: flex;
      justify-content: center;
      align-items: flex-start;
      flex-direction: column;
      width: 800px;

      margin: 0 auto;
    }
    <style type="text/css">
    .container { 
      display: flex;
      align-items: center;
      flex-direction: column;
      justify-content: space-between;
      width: 800px;
      height: 400px;

      margin: 0 auto;
    }
    #sub {
        background-color: #3b5998;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius:6px;
        color: #fff;
        font-size: 20px;
        width: 220px;
        text-decoration: none;
        cursor: pointer;
        border:none;
    }
      #sub {
        background-color: #3b5998;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius:6px;
        color: #fff;
        font-size: 20px;
        width: 220px;
        text-decoration: none;
        cursor: pointer;
        border:none;
    }
    #sub:hover {
        border: none;
        box-shadow: 0px 10px 10px #228B22;
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
      <div style= "width: 100px;">
            <form method="post">        
          <!-- <input type="text" name="mail" id="name" placeholder="Email" required/> -->
          </form>
      </div>
    <div style="width:400px">
          <form action="" method="post" enctype="multipart/form-data">
                <input type="text" style="border-radius:6px;margin-bottom: 10px;"name="title" placeholder="News Title" required/>
              <input type="text" style="width:400px;height:400px;border-radius:6px;margin-bottom: 10px;" name="description"  placeholder="description" required/>
              <input type="text" style="border-radius:6px;margin-bottom: 10px;"name="auth" placeholder="Author" required/>
              <p>Select image to upload:</p>
              <input type="file" name="fileToUpload" id="fileToUpload" style="margin-bottom: 10px">
                <input type="submit" value="Upload Image" name="submit">
          </form>
    </div>

      </div>
    
    </body>




</html>


    
    