<?php
include 'sessionValue.php';
if($_SESSION['username']=="admin")
{
	include 'adminPage.php';


}
else if($_SESSION['username']=="Guest")
{
	include 'profileGuest.php';
}
else
{
	if($_SESSION['usertype'] != "3")
	header("Location: userprofile.php");
	else
	header("Location: starprofile.php");
	


//	include 'userProfile.php';
}

?>