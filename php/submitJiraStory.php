<?php

$username = $_GET['username'];
$password =  $_GET['password'];
$story_number =  $_GET['story_number'];
 
$json = `curl -u $username:$password https://hwjiraprd01.corp.emc.com/rest/api/latest/issue/CDES-$story_number.json`;

$json = json_decode($json, true);

$story_name = $json['fields']['summary'];
$story_estimate = $json['fields']['customfield_10002'];
$story_acceptance_criteria = $json['fields']['customfield_10733'];
$story_description = $json['fields']['description'];

$servername = "localhost";
$db_username = "root";
$db_password = "PlanningPoker2016!";
$database = "PlanningPokerDB";

try {
	$story_number =  $_GET['story_number'];
 	$roomID = $_GET['last_id'];
    	$conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "UPDATE Rooms SET currentStory=$story_number WHERE roomID='$roomID'";

	// Prepare statement
	$stmt = $conn->prepare($sql);

	// execute the query
	$stmt->execute();

	// check if we already have the story in the database
    	$sql = ("SELECT number FROM Stories WHERE number='$story_number'"); 
	
	$result = $conn->query($sql);
	$row = $result->fetch();	

	$selected_number = $row['number'];

	if ($story_number === $selected_number)
	{
		$sql = "UPDATE Stories SET name='$story_name', estimate='$story_estimate', acceptanceCriteria='$story_acceptance_criteria', description='$story_description' WHERE number='$story_number'";

		// Prepare statement
		$stmt = $conn->prepare($sql);

		// execute the query
		$stmt->execute();
	}
	else
	{
	// insert story instance
	$sql = "INSERT INTO Stories (storyID, number, name, estimate, acceptanceCriteria, description)
	VALUES (default, $story_number, '$story_name', '$story_estimate', '$story_acceptance_criteria', '$story_description')";
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
