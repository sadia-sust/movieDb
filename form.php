
<?php
	include_once 'dbconfig.php';
	require 'sessionValue.php';
	var_dump($_SESSION);
if (isset($_POST["myButton"]))
{
    $_SESSION['test']= "fas";
     header("Location: test.php");
}
?>

<form action="" method="post">
<input type="submit" name="myButton" value="The Dark Knight"/>
</form>