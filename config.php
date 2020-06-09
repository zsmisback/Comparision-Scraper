<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "users";


$db = new mysqli($servername, $username, $password ,$dbname);


if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);

}

?>