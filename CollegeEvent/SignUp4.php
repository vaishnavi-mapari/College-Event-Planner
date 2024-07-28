<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mini_project';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users (name, mobile, email, username, password) VALUES ('$name', '$mobile', '$email', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
  echo 'Sign Up successful.';
} else {
  echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
?>
