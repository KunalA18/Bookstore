<?php

include "db_connect.php";

$conn = OpenCon();

echo "Connection Successful!";

closeCon($conn);

?>