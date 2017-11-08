<?php
include 'sessionValue.php';
if(isset($_GET["data"]))
{

	$_SESSION['test'] = $_GET["data"];
	header("Location: moviePage.php");
}

?>
