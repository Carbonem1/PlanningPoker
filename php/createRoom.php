<?php
    // insert new Room record
    $servername = "localhost";
    $db_username = "root";
    $db_password = "PlanningPoker2016!";
    $database = "PlanningPokerDB";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Rooms (roomID)
        VALUES (default)";
        // use exec() because no results are returned
        $conn->exec($sql);
        }
    catch(PDOException $e)
        {
        }

    // get the roomID we just inserted
    $last_id = $conn->lastInsertId();

    try
    {
    // create new RoomInstance tabel with roomID
    // sql to create table
    $sql = "CREATE TABLE RoomInstance$last_id (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    roomID VARCHAR(30) NOT NULL,
    username VARCHAR(20) NOT NULL,
    card VARCHAR(5) NOT NULL
    )";
    $conn->exec($sql);
    }

    catch(PDOException $e)
    {
    }
    echo $last_id;
?>
