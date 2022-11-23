<?php
session_start();
require_once "db_connect.php";
$conn = OpenCon();

if (isset($_COOKIE['user_id']) != "") {
  header("Location: dashboard.php");
}
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_error = "Please Enter Valid Email ID";
  }
  if (strlen($password) < 6) {
    $password_error = "Password must be minimum of 6 characters";
  }
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email . "' and password = '" . md5($password) . "'");
  if (!empty($result)) {
    if ($row = mysqli_fetch_array($result)) {
      // If Remember Me option is on, save cookies for 30 days
      if(isset($_POST['rememberMe'])){
        $hour = time() + 3600 * 24 * 30;
        setcookie('user_id',$row['uid'],$hour);
        setcookie('user_name',$row['name'],$hour);
        setcookie('user_email',$row['email'],$hour);
        setcookie('user_mobile',$row['mobile_number'],$hour);
      }
      else{
        // Save cookies only for one session
        setcookie('user_id',$row['uid'],0);
        setcookie('user_name',$row['name'],0);
        setcookie('user_email',$row['email'],0);
        setcookie('user_mobile',$row['mobile_number'],0);
      }
      header("Location: dashboard.php");
    }
  } else {
    $error_message = "Incorrect Email or Password!!!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Simple Login Form in PHP with Validation</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <div class="page-header">
          <h2>Login Form in PHP with Validation</h2>
        </div>
        <p>Please fill all fields in the form</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group ">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
            <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="" maxlength="10 " required="">
            <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
          </div>
          <div>
            <label for="rememberMe">Remember Me</label>
            <input type="checkbox" value="RememberMe" name="rememberMe">
          </div>
          <input type="submit" class="btn btn-primary" name="login" value="Submit">
          <br>
          You don't have account?<a href="registration.php" class="mt-3">Click Here</a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>