<?php
	//TODO: SQLify this php function
	//Assumption:
	/*
	1. take everything from table
	2. jsonify it
	3. find the iterated element in the json
	4. fetch the table, maybe something like SELECT <everything> FROM <tablename> WHERE pkey = . $index ., or the actual fetch
	
	*/
	include 'initialize_db_table.php'; //so that localhost/username/passwords are reused
	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error ."<br>");
	} 
	echo "Connected successfully <br>";
	
	//... TODO: fix
	$sql = SELECT * FROM Entry WHERE pkey = . $index .
	//...
	$result = $conn->query($sql);
	
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		
		$indx = new Entry();
		$indx = SetSel($row["sel"]);
		$indx = SetTitle($row["title"]);
		$indx = SetArtist($row["artist"]);
		$indx = SetTopGenre($row["top_genre"]);
		$indx = SetYear($row["year"]);
		$indx = SetAdded($row["added"]);
		
		echo json_encode($newstudent);
	}
	else echo "i dunno.";
	
	$file = file_get_contents('simplified_JSON.json');
	$playlist = json_decode($file, true);
	$i = (isset($_POST['i'])) ? (int)$_POST['i'] : 0;
	
	if($i >=0 && $i < count($playlist)) {
		echo json_encode($playlist[$i]);
	}
	else {
		echo json_encode(["error" => "Index out of bounds"]);
	}
	
?>