<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mini_project';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['username'] = $username;

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo 'success';
} else {

  echo 'error';
}

$conn->close();
?>
