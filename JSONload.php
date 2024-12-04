<?php
	include 'FormEntry.php';
	include 'usernameCHANGE.php'; //so that localhost/username/passwords are reused
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error ."<br>");
	} 
	//echo "Connected successfully <br>";
	$file = file_get_contents('table.json');
	$playlist = json_decode($file, true);
	
	//if we are have generated a database and table, then just use that empty table.
	//Not empty? delete everything and then import.
	$conn->query("TRUNCATE TABLE Entry");
	$stmt = $conn->prepare("INSERT INTO Entry (sel, title, artist,top_genre,year,added) VALUES (?,?,?,?,?,?)");
	if ($stmt==FALSE) {
		echo "There is a problem with prepare <br>";
		echo $conn->error; // Need to connect/reconnect before the prepare call otherwise it doesnt work
	}
	$stmt->bind_param("isssis", $sel, $title,$artist,$top_genre,$year, $added);
	
	foreach($playlist as $row) {
		$sel = $row['sel'];
		$title = $row['title'];
		$artist = $row['artist'];
		$top_genre = $row['top_genre'];
		$year = $row['year'];
		$added = $row['added'];
		$stmt->execute();
	}
	echo "Table successfully imported.";
	
	$stmt->close();
	$conn->close();
?>