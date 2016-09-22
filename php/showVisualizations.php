<?php

$roomID = $_POST['last_id'];
$estimates = array();

$servername = "localhost";
$db_username = "root";
$db_password = "PlanningPoker2016!";
$database = "PlanningPokerDB";

class TableRows extends RecursiveIteratorIterator { 
function __construct($it) { 
	parent::__construct($it, self::LEAVES_ONLY); 
}

function current() {
	return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
}

function beginChildren() { 
        echo "<tr>"; 
} 

function endChildren() { 
        echo "</tr>" . "\n";
} 
} 

try {
	$room_instance_table = "RoomInstance".$roomID;
    	$conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$sql = ("SELECT username, card FROM $room_instance_table"); 
	foreach ($conn->query($sql) as $row) {
        	$username = $row['username'];
        	$card = $row['card'];
		$estimates[] = $card;
    	}
	foreach($estimates as $value)
	{
		echo $value.", ";
	}
}
catch(PDOException $e) {
    	echo "Error: " . $e->getMessage();
}
	$conn = null;
?>
