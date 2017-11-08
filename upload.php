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
        $MOV=$_SESSION['add'];
        $sql_query= "update  Movie_Details set Image_Link = '$MO' where Movie_Name = '$MOV' ";// WHERE 'username'='$un' AND 'password'='$ps'";  ;
        mysql_query($sql_query);
        header("Location: addCrew.php");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

?>

<!DOCTYPE html>
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
     <div>
         <h3> Upload Your Image</h3>
     </div>
    </div>
    <div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
    
    </div>

</body>
</html>