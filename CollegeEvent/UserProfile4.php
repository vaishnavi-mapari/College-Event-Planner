<?php
//session_start();

//if (isset($_SESSION['id'])) {
  //$userId = $_SESSION['id'];

  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'seminar2';

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }

  $sql = "SELECT * FROM users WHERE name = 'Yogesh Shewalkar'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    echo '<p>Name: ' . $row['name'] . '</p>';
    echo '<p>Mobile Number: ' . $row['mobile'] . '</p>';
    echo '<p>Email ID: ' . $row['email'] . '</p>';
  } else {
    echo 'User profile not found.';
  }

  $conn->close();
 
?>
