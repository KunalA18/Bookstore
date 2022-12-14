<?php
session_start();
if (!isset($_SESSION['username']))
  header("location: login.php?Message=Login To Continue");
include "config.php";

if (isset($_POST['add'])) {
  $title = trim($_POST['title']);
  $title = mysqli_real_escape_string($conn, $title);
  
  $author = trim($_POST['author']);
  $author = mysqli_real_escape_string($conn, $author);

  $mrp = floatval(trim($_POST['mrp']));
  $mrp = mysqli_real_escape_string($conn, $mrp);
  
  $price = floatval(trim($_POST['price']));
  $price = mysqli_real_escape_string($conn, $price);
  
  $discount = floatval(trim($_POST['discount']));
  $discount = mysqli_real_escape_string($conn, $discount);

  $publisher = trim($_POST['publisher']);
  $publisher = mysqli_real_escape_string($conn, $publisher);

  $edition = trim($_POST['edition']);
  $edition = mysqli_real_escape_string($conn, $edition);
  
  $category = trim($_POST['category']);
  $category = mysqli_real_escape_string($conn, $category);
  echo $category;

  $query_cat = "SELECT SUBSTRING(PID, LEN(LEFT(PID, CHARINDEX ('-', PID))) + 1) FROM products WHERE Category LIKE '%{$category}%'";

  $descr = trim($_POST['descr']);
  $descr = mysqli_real_escape_string($conn, $descr);

  $language = trim($_POST['language']);
  $language = mysqli_real_escape_string($conn, $language);

  $page = trim($_POST['page']);
  $page = mysqli_real_escape_string($conn, $page);

  $weight = trim($_POST['weight']);
  $weight = mysqli_real_escape_string($conn, $weight);


  // add image
  if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
    $image = $_FILES['image']['name'];
    $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
    $uploadDirectory .= $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
  }

  // find publisher and return pubid
  // if publisher is not in db, create new
  $findPub = "SELECT * FROM publisher WHERE publisher_name = '$publisher'";
  $findResult = mysqli_query($conn, $findPub);
  if (!$findResult) {
    // insert into publisher table and return id
    $insertPub = "INSERT INTO publisher(publisher_name) VALUES ('$publisher')";
    $insertResult = mysqli_query($conn, $insertPub);
    if (!$insertResult) {
      echo "Can't add new publisher " . mysqli_error($conn);
      exit;
    }
    $publisherid = mysqli_insert_id($conn);
  } else {
    $row = mysqli_fetch_assoc($findResult);
    $publisherid = $row['publisherid'];
  }


  $query = "INSERT INTO books VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $image . "', '" . $descr . "', '" . $price . "', '" . $publisherid . "')";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    echo "Can't add new data " . mysqli_error($conn);
    exit;
  } else {
    header("Location: admin_book.php");
  }
}
?>

<form method="post" action="add_books.php" enctype="multipart/form-data">
  <table class="table">
    <tr>
      <th>Title</th>
      <td><input type="text" name="title" required></td>
    </tr>
    <tr>
      <th>Author</th>
      <td><input type="text" name="author" required></td>
    </tr>
    <tr>
      <th>MRP</th>
      <td><input type="text" name="mrp" required></td>
    </tr>
    <tr>
      <th>Image</th>
      <td><input type="file" name="image"></td>
    </tr>
    <tr>
      <th>Price</th>
      <td><input type="text" name="price" required></td>
    </tr>
    <tr>
      <th>Discount</th>
      <td><input type="text" name="discount" required></td>
    </tr>
    <tr>
      <th>Publisher</th>
      <td><input type="text" name="publisher" required></td>
    </tr>
    <tr>
      <th>Edition</th>
      <td><input type="text" name="edition" required></td>
    </tr>
    <tr>
      <th>Category</th>
      <td><input type="text" name="category" required></td>
    </tr>
    <tr>
      <th>Description</th>
      <td><textarea name="descr" cols="40" rows="5"></textarea></td>
    </tr>
    <tr>
      <th>Language</th>
      <td><input type="text" name="language" required></td>
    </tr>
    <tr>
      <th>Page</th>
      <td><input type="text" name="page" required></td>
    </tr>
    <tr>
      <th>Weight</th>
      <td><input type="text" name="weight" required></td>
    </tr>
  </table>
  <input type="submit" name="add" value="Add new book" class="btn btn-primary">
  <input type="reset" value="cancel" class="btn btn-default">
</form>
<br />

<!-- Footer -->
<div class="container">
  <hr class="footerhr">
</div>
<div class="container">
  <footer class="foot">
    &copy;2022 PHP Assignment &nbsp;<span class="separator">|</span> Open Source Coding
  </footer>

</div>
</body>

</html>