<?php
session_start();
if (isset($_COOKIE['user_id']) == "") {
  header("Location: login.php");
}

if(isset($_POST['logout'])){
  if (isset($_COOKIE['user_id'])) {
    // Deleting cookies if set
    $past = time() - 360000;
    setcookie("user_id","",$past,"/");
    setcookie('user_name',"",$past,"/");
    setcookie('user_email',"",$past,"/");
    setcookie('user_mobile',"",$past,"/");
  }
  session_destroy();
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>User Info Dashboard</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="dashboard.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <div class="sidenav">
              <a href="#">Account</a>
              <a href="#">Tasks</a>
              <a href="#">Calendar</a>
              <a href="#">About</a>
            </div>
            <h5 class="card-title">Name :- <?php echo $_COOKIE['user_name'] ?></h5>
            <p class="card-text">Email :- <?php echo $_COOKIE['user_email'] ?></p>
            <p class="card-text">Mobile :- <?php echo $_COOKIE['user_mobile'] ?></p>
            <input type="submit" class="btn btn-primary" name="logout" value="Logout">
            <!-- <a href="logout.php" >Logout</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>