<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	include 'FormEntry.php';
	
	echo "Create some Entries<br>";
	$n=10;
	$a0=array();
	for ($i=0;$i<$n;$i++) {
		$a0[$i]=new Entry();
	}
	
	$servername = "localhost"; 	// default server name
	$username = "Marco"; 	// user name that you created
	$password = "Polo";		// password that you created
	$dbname = "dayta_bais";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error ."<br>");
	} 
	echo "Connected successfully <br>";
	
	// Creation of the database
	$sql = "CREATE DATABASE ". $dbname;
	if ($conn->query($sql) === TRUE) {
		echo "Database ". $dbname ." created successfully<br>";
	} else {
		echo "Error creating database: " . $conn->error ."<br>";
	}
	
	// close the connection
	$conn->close();
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
		
	$sql = "CREATE TABLE Entry (
	pkey INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	sel  INT(5) NOT NULL,
	title   VARCHAR(30) NOT NULL,
	artist VARCHAR(30) NOT NULL,
	top_genre VARCHAR(30) NOT NULL,
	year INT(4) NOT NULL,
	added VARCHAR(10) NOT NULL
	)";
	
	
	if ($conn->query($sql) === TRUE) {
		echo "Table Entry created successfully<br>";
	} else {
		echo "Error creating table: " . $conn->error ."<br>";
	}
	
	
	$stmt = $conn->prepare("INSERT INTO Entry (sel, title, artist,top_genre,year,added) VALUES (?,?,?,?,?,?)");
	if ($stmt==FALSE) {
		echo "There is a problem with prepare <br>";
		echo $conn->error; // Need to connect/reconnect before the prepare call otherwise it doesnt work
	}
	$stmt->bind_param("isssis", $sel, $title,$artist,$top_genre,$year, $added);
	
	for ($i=0;$i<$n;$i++) {
		// set parameters and execute
		$sel = $a0[$i]->GetSel();
		$title = $a0[$i]->GetTitle();
		$artist = $a0[$i]->GetArtist();
		$top_genre=$a0[$i]->GetTopGenre(); 
		$year=$a0[$i]->GetYear();
		$added=$a0[$i]->GetAdded();
		$stmt->execute();
		echo "New record ". $i ." created successfully<br>";
	}

	$stmt->close();

	// close the connection
	$conn->close();
?>