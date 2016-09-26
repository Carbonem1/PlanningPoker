<?php
$servername = "localhost";
$db_username = "root";
$db_password = "PlanningPoker2016!";
$database = "PlanningPokerDB";

try {
    $roomID = $_POST['last_id'];
    $username = $_POST['username'];
    $card = $_POST['card'];
    $current_user_id = $_POST['current_user_id'];

    $conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($current_user_id == "")
    {
    $sql = "INSERT INTO RoomInstance$roomID (id, roomID, username, card)
    VALUES (default, $roomID, '$username', $card)";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo $conn->lastInsertId();
    }
    else
    {	
    $sql = "UPDATE RoomInstance$roomID SET card=$card WHERE id=$current_user_id";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
    echo $current_user_id;
    }
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
