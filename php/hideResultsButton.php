<?php

$roomID = $_POST['last_id'];
$servername = "localhost";
$db_username = "root";
$db_password = "PlanningPoker2016!";
$database = "PlanningPokerDB";

try {
    	$conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$sql = ("UPDATE Rooms SET showResults='0' WHERE roomID=$roomID"); 
    	// Prepare statement
    	$stmt = $conn->prepare($sql);

    	// execute the query
    	$stmt->execute();
    }

catch(PDOException $e) {
    	echo "Error: " . $e->getMessage();
}
	$conn = null;
?>
