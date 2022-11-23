<?php

function OpenCon()
{
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "jash1401";
  $db = "login_page";

  $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

  return $conn;
}

function closeCon($conn)
{
  $conn->close();
}

?>