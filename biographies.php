<?php
// If user is not logged in then redirect to login page
session_start();
if (!isset($_SESSION['username']))
    header("location: login.php?Message=Login To Continue");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <title>Biographies</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <style>
        #books {
            margin-bottom: 50px;
        }

        @media only screen and (width: 767px) {
            body {
                margin-top: 150px;
            }
        }

        #books .row {
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: 800;
        }

        @media only screen and (max-width: 760px) {
            #books .row {
                margin-top: 10px;
            }
        }
    </style>

</head>

<body>

    <!-- Search Bar -->
    <div id="top">
        <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
            <div>
                <form role="search" action="Result.php" method="post">
                    <input type="text" name="keyword" class="form-control" placeholder="Search for a Book , Author Or Category" style="width:80%;margin:20px 10% 20px 10%;">
                </form>
            </div>
        </div>


        <div class="container-fluid" id="books">
            <div class="row">
                <div class="col-xs-12 text-center" id="heading">
                    <h2 style="color:rgb(228, 55, 25);text-transform:uppercase;margin-bottom:0px;"> Biographies and Auto Biographies </h2>
                </div>
            </div>

            <?php
            include("config.php");
            // Get books from database
            $query = "SELECT * FROM products WHERE Category='Biographies and Auto Biographies' ORDER BY Price";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            $i = 0;

            // Count no. of books
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Get the image from img folder
                    $path = "img/books/" . $row['PID'] . ".jpg";
                    $description = "description.php?ID=" . $row["PID"];
                    // Only display 4 books per row
                    if ($i % 4 == 0)
                        echo '<div class="row">';
                    echo '
               <a href="' . $description . '">
                <div class="col-sm-6 col-md-3 col-lg-3 text-center">
                    <div class="book-block" style="border :3px solid #DEEAEE;">
                        <img class="book block-center img-responsive" src="' . $path . '">
                        <hr>
                         ' . $row["Title"] . '<br>
                        ' . $row["Price"] . '  &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> ' . $row["MRP"] . ' </span>
                        <span class="label label-warning">' . $row["Discount"] . '%</span>
                    </div>
                </div>
                
               </a> ';
                    $i++;
                    if ($i % 4 == 0)
                        echo '</div>';
                }
            }
            ?>
        </div>;
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>