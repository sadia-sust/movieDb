<?php
include 'sessionValue.php';
        $ut = $_SESSION['usertype'];
        echo $ut;
        if($ut=="2")
        {
        	 echo 
        	"<div style=\" color:red;\">".
	 		"<h3>VIP ACCESS! </h3>".
	 	"</div>";

        }	

        ?>