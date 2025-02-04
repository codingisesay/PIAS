<?php
$servername = "localhost";
$username = "u946161363_patrioticIAS";
$password = "Pat_amit@1234";
$databasename = "u946161363_patrioticias";

// Create connection
$conn = new mysqli($servername, $username, $password,$databasename);

// $link = (empty($_SERVER['HTTPS']) ? 'http' : 'https')."://$_SERVER[HTTP_HOST]/patrioticias/admin/adminHome.php";
// $link = (empty($_SERVER['HTTPS']) ? 'http' : 'https')."://$_SERVER[HTTP_HOST]/patrioticias";
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>