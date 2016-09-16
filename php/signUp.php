<?php
$servername = "localhost";
$db_username = "username";
$db_password = "password";
$database = "db";

try
{
  // connect to the database
  $conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";

  // check the database to make sure the account does not already exist
  $stmt = $conn->prepare("SELECT username FROM Users");
  $stmt->execute();
  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  if($result != NULL)
  {
    $conn = null;
    exit("Username already exists");
  }

  // insert user account into Users table
  $sql = "INSERT INTO Users (username, password, email)
  VALUES ($username, $password, $email)";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";

  // sql to create the user table
  // TODO: add user preferences and info
  $sql = "CREATE TABLE $username (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(20) NOT NULL,
  password VARCHAR(20) NOT NULL,
  firstname VARCHAR(30),
  lastname VARCHAR(30),
  email VARCHAR(50)
  )";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table $username created successfully";
}
catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>
