<?php
$servername = "localhost";
$db_username = "root";
$db_password = "PlanningPoker2016!";
$database = "PlanningPokerDB";

try
{
  $username = $_GET['username'];
  $password =  $_GET['password'];
  $confirm_password =  $_GET['confirm_password'];
  $email =  $_GET['email'];

  $size = mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CFB);
  $salt = mcrypt_create_iv($size, MCRYPT_DEV_RANDOM);
  $password = $password.$salt;
  $password = password_hash($password, PASSWORD_DEFAULT);

  // connect to the database
  $conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // check the database to make sure the account does not already exist
  $sql = ("SELECT username FROM Users WHERE username = '".$username."'");
  foreach ($conn->query($sql) as $row) 
  {
    if($row != NULL)
    {
      $conn = null;
      exit("Username already exists");
    }
  }
  // insert user account into Users table
  $sql = "INSERT INTO Users (userID, username, password, email, salt)
  VALUES (default, '$username', '$password', '$email', '$salt')";
  // use exec() because no results are returned
  $conn->exec($sql);

  // sql to create the user table
  // TODO: add user preferences and info
  $sql = "CREATE TABLE User_$username (
  userID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(20) NOT NULL,
  password VARCHAR(20) NOT NULL,
  firstname VARCHAR(30),
  lastname VARCHAR(30),
  email VARCHAR(50)
  )";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "signed_up";
}
catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>
