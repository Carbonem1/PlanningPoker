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

  // check the database for the user account and password
  $stmt = $conn->prepare("SELECT username, password FROM Users");
  $stmt->execute();
  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v)
  {
    echo "$k, $v";
    if($k == "username" && $v == $username)
    {

    }
    if($k == "password" && $v == $password)
    {

    }
  }
}

catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>
