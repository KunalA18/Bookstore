<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Book-Bugs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body{
            background-color: #ede7f6;
        }
        .container .row{
            margin-top: 20px;
        }
        @keyframes example {
  0%   {background-color: #512da8;}
  25%  {background-color: #7e57c2;}
  50%  {background-color: #d1c4e9;}
  100% {background-color: #ede7f6;}
}
        .container .row .col-sm-3 .card{
            margin-top: 20px;
            margin-right: 30px;
            margin-bottom: 67px;
            box-shadow: 10px 10px 8px darkblue;
            animation-name: example;
            animation-duration: 5s;
        }
        .container .footerhr{
            margin-top: 80px;
            border-width: thin;
            box-shadow: 1px 1px 1px purple;
        }
        .container .foot {
            align-content: center;
            color: black;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
            margin-top: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            }
    </style>
</head>
<body>
    
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
          <a class="navbar-brand" href="home.php">Book-Bugs</a>
            <span style="font-size: 2em; color: white;">
                <i class="fas fa-book-open"></i>
            </span>
         
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto ">
              <a class="nav-item nav-link " href="home.php" style = "color: antiquewhite";>Home <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="about.html" style = "color: antiquewhite";>About Us</a>
              <a class="nav-item nav-link" href="login.php" style = "color: antiquewhite";>Login</a>    
              <a class="nav-item nav-link" href="register.php" style = "color: antiquewhite";>Register</a>    
              </div >
          </div> 
            
        </nav>
    </div> 

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-300" src="p1.jpeg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-300" src="p2.jpeg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-300" src="p3.jpeg" alt="Third slide">
        </div>
        </div>
     
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
      
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>    
    </div>
    
    <div class = "container">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Biographies</h5>
                        <a href="biographies.php" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Academics</h5>
                        <a href="academicandprofessional.php" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Literature</h5>
                        <a href="literatureandfiction.php" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Other Books</h5>
                        <a href="otherbooks.php" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class = "container">
        <blockquote class="blockquote text-right">
            <p class="mb-0">“The person, be it gentleman or lady, who has not pleasure in a good novel, must be intolerably stupid.”</p>
            <footer class="blockquote-footer">Jane Austen,  <cite title="Source Title">Northanger Abbey</cite></footer>
        </blockquote>
    </div>
    <div class = "container">
        <hr class = "footerhr">
    </div>
    <div class = "container">
                <footer class = "foot">
                    &copy;2022 PHP Assignment &nbsp;<span class="separator">|</span> Open Source Coding
                </footer>

    </div>

</body>
</html>

