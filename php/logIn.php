<?php
$servername = "localhost";
$db_username = "root";
$db_password = "PlanningPoker2016!";
$database = "PlanningPokerDB";

try
{
  $given_username = $_GET['username'];
  $given_password =  $_GET['password'];

  // connect to the database
  $conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // check the database to make sure the account does not already exist
  $sql = ("SELECT password, salt FROM Users WHERE username = '".$given_username."'");
  foreach ($conn->query($sql) as $row) 
  {
    if($row != NULL)
    {
	$password = $row['password'];
	$salt = $row['salt'];
	$given_password = $given_password.$salt;

	if (password_verify($given_password, $password))
	{
	  echo "logged_in";
 	}
	else
        {
	  echo "BAD";
        }
    }
    
  }
}

catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>
