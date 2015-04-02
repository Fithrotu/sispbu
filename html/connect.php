<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sipencarian";

// Create connection
$conn = mysql_connect($servername, $username, $password);
mysql_select_db($database, $conn);
// Check connection
if ($conn) {
    echo "Connected successfully";
}else{
    echo "Connected failed";
}
?>