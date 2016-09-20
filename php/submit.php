<?php
$servername = "localhost";
$db_username = "root";
$db_password = "PlanningPoker2016!";
$database = "PlanningPokerDB";

try {
    $room_id = $_POST['last_id'];
    $username = $_POST['username'];
    $card = $_POST['card'];

    $conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO RoomInstance$room_id (id, roomID, username, card)
    VALUES (''', $roomID, $userID, $username, $card')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
