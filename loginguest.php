<?php
require 'sessionValue.php';
  $_SESSION['user_id'] = 5000;
  $_SESSION['username'] = "Guest";
  $_SESSION['upcoming'] = "No";
  $_SESSION['usertype'] = "1";

  header("Location: home.php");

?>