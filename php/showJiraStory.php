<?php

$roomID = $_POST['last_id'];
$current_story = NULL;
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
    	$conn = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$sql = ("SELECT currentStory FROM Rooms WHERE roomID = $roomID"); 
	foreach ($conn->query($sql) as $row) {
        	$current_story = $row['currentStory'];
    	}

    	$sql = ("SELECT number, name, estimate, acceptanceCriteria, description FROM Stories WHERE number = $current_story"); 
	foreach ($conn->query($sql) as $row) {
        	$number = $row['number'];
        	$name = $row['name'];
        	$estimate = $row['estimate'];
        	$accesptance_criteria = $row['acceptanceCriteria'];
        	$description = $row['description'];

      		echo '
		<div id = "show_jira_story_section">
		  <img id = "clear_jira_story_button" title = "Click to clear Jira story" src = "../images/clear_results1.png" onclick = "clearJiraStory()">
        	  <span id = "reference_story_section_header">
		    <a href = "https://hwjiraprd01.corp.emc.com/browse/CDES-'.$number.'"> <p class = "jira_text"> CDES-'.$number.' </p> </a>
		    <p class = "jira_text"> '.$name.' </p>
		  </span>
		</div>';

    	}
}
catch(PDOException $e) {
	echo "SQL ERROR";
    	//echo "Error: " . $e->getMessage();
}
	$conn = null;
?>
