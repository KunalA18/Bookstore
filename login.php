<?php
ob_start();
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Login at Book-Bugs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: midnightblue;
        }

        .container {

            background-color: #1e88e5;
            box-shadow: 6px 6px 5px white;
            padding: 14px;
            align-content: center;
            max-width: 300px;
            margin-top: 18px;
            border-radius: 9px;
        }

        h3 {
            color: aliceblue;
            font-family: cursive;
            text-align: center;
            margin-top: 70px;
            margin-bottom: 0px;
            margin-left: 20px;
        }

        .container .form-group .form-control {
            color: aliceblue;
        }
    </style>
</head>

<body>
    <div>
        <!-- Navbar linked title on top left  -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <a class="navbar-brand" href="home.php">Book-Bugs</a>
            <span style="font-size: 2em; color: white;">
                <i class="fas fa-book-open"></i>
            </span>

            <!-- Collapsable NavBar for responsive design -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto ">
                    <a class="nav-item nav-link " href="home.php" style="color: antiquewhite" ;>Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="about.html" style="color: antiquewhite" ;>About Us</a>
                    <a class="nav-item nav-link" href="login.php" style="color: antiquewhite" ;>Login</a>
                    <a class="nav-item nav-link" href="register.php" style="color: antiquewhite" ;>Register</a>
                </div>
            </div>

        </nav>
    </div>

    <!-- Login Container -->
    <h3>Login</h3>
    <div class="container">
        <form action=" " method="post">
            <div class="form-group">
                <label for="email" style="color: aliceblue;"><b>Email address:</b></label>
                <input type="email" class="form-control" name="loginmail" id="email" placeholder="Enter Email-id" required style="color: black;">
            </div>
            <div class="form-group">
                <label for="pwd" style="color: aliceblue;"><b>Password:</b></label>
                <input type="password" class="form-control" id="pwd" name="loginpassword" placeholder="Enter Password" required style="color: black;">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> <b>Remember me</b>
                </label>
            </div>
            <a href="register.php" style="color: aliceblue;">Don't have an account? Register Here </a><br><br>
            <button type="submit" class="btn btn-primary" name="loginsubmit" style="background-color: blue;box-shadow: 2px 2px white;">Submit</button>
        </form>

        <?php
        session_start();
        // If Submit button is pressed, then check the entered details against database entry
        if (isset($_POST['loginsubmit'])) {
            require_once('config.php');
            $username = mysqli_real_escape_string($conn, $_POST['loginmail']);
            $password = mysqli_real_escape_string($conn, $_POST['loginpassword']);
            $query = "SELECT * FROM userinfo WHERE email='$username' AND password='$password'";
            $results = mysqli_query($conn, $query);
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: userhome.php');
            } else {
                echo "<br>";
                echo "<h4>Incorrect email/password!</h4>";
            }
        }

        ob_end_flush();
        ?>

    </div>
</body>

</html>