<?php

$roomID = $_POST['last_id'];
$servername = "localhost";
$db_username = "root";
$db_password = "PlanningPoker2016!";
$database = "PlanningPokerDB";

try {
    	$conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$sql = ("UPDATE Rooms SET showResults='1' WHERE roomID=$roomID"); 
    	// Prepare statement
    	$stmt = $conn->prepare($sql);

    	// execute the query
    	$stmt->execute();

    	// echo a message to say the UPDATE succeeded
    }

catch(PDOException $e) {
    	echo "Error: " . $e->getMessage();
}
	$conn = null;
?>
