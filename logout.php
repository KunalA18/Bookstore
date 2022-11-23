<?php
ob_start();
session_start();
if (isset($_COOKIE['user_id'])) {
  session_unset();
  unset($_COOKIE['user_id']);
  unset($_COOKIE['user_name']);
  unset($_COOKIE['user_email']);
  unset($_COOKIE['user_mobile']);
  session_destroy();
  header("Location: login.php");
} else {
  header("Location: login.php");
}
