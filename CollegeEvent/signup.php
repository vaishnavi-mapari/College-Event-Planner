<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }C:\xampp\htdocs\webdev\signup.php

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input[type="text"],
    input[type="password"],input[type="tel"] {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      margin-bottom: 20px;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .divider {
      text-align: center;
      margin: 20px 0;
      border-bottom: 1px solid #ccc;
      line-height: 0.1em;
    }

    .divider span {
      background-color: #f2f2f2;
      padding: 0 10px;
      color: #777;
    }

    .social-media {
      text-align: center;
    }

    .social-media button {
      background-color: #3B5998;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-right: 5px;
    }

    .social-media button:last-child {
      margin-right: 0;
    }
  </style>
</head>
<body>

<?php
    
    // Database credentials
    $host = "localhost";
    $email = "root";
    $password= "";
    $database = "seminar";

    $conn = new mysqli($host, $email, $password, $database);

    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
	{
        // Retrieve form inputs
        $name = $_POST['username'];
        $email = $_POST['email'];
        $phone= $_POST['phone no.'];
        $password = $_POST['password'];

        // Validate form inputs
       
        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO signup_db (name,email,phone,password) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$name, $email, $phone, $password);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Registered successfully.";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }
		
        // Close the statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
    ?>
  <div class="container">
    <h1>Signup</h1>
    <form  method="POST" action="signup.php">
      <label for="Name">Name:</label>
      <input type="name" id="name" placeholder="Enter your name" name="name" required>

      <label for="E-mail">Email:</label>
      <input type="temail" id="email" placeholder="Enter your email" name="email" required>

      <label for="Number">Phone No.:</label>
      <input type="number" id="number" placeholder="Enter your phone number" name="number" required>

      <label for="Password">Password:</label>
      <input type="password" id="password" placeholder="Enter your password" name="password" required>

      <input type="submit" value="Signup" name="submit">
    </form>

   <!-- <div class="divider">
      <span>or</span>
    </div>

    =<div class="social-media">
      <button>Facebook</button>
      <button>Google</button>-->
    </div>
  </div>
</body>
</html>