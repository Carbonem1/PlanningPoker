<?php
/* submit is used when the player wants to submit their card choice */

$servername = "localhost";
$db_username = "root";
$db_password = "PlanningPoker2016!";
$database = "PlanningPokerDB";

try {
	$roomID = $_POST['last_id'];
	$username = $_POST['username'];
	$card = $_POST['card'];

	// if card is a '?', format to fit into SQL insert
	if($card === "?")
	{
		$card = "'?'";
	}

	$room_instance_table = "RoomInstance".$roomID;
    	$conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$sql = ("SELECT username FROM $room_instance_table WHERE username='$username'"); 
	
	$result = $conn->query($sql);
	$row = $result->fetch();	

	$selected_username = $row['username'];

	if ($username === $selected_username)
	{
		$sql = "UPDATE RoomInstance$roomID SET card=$card WHERE username='$username'";

		// Prepare statement
		$stmt = $conn->prepare($sql);

		// execute the query
		$stmt->execute();
	}
	else
	{
		$conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "INSERT INTO RoomInstance$roomID (id, roomID, username, card)
		VALUES (default, $roomID, '$username', $card)";
		// use exec() because no results are returned
		$conn->exec($sql);
	}
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
