<?php
//require_once 'dbconfig.php';
require 'sessionValue.php';
session_destroy();
 header("Location: login.php");
  die();
?>