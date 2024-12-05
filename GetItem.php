<?php

	include 'FormEntry.php';
	include 'usernameCHANGE.php'; //so that localhost/username/passwords are reused
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error ."<br>");
	} 
	//echo "Connected successfully <br>";
	
	$i = (isset($_POST['i'])) ? (int)$_POST['i'] : 0;
	//$i++;
	$sortType = isset($_POST['sortType']) ? (int)$_POST['sortType'] : 0;
	
	if($sortType === 0) { 
		$stmt = $conn->prepare("SELECT * FROM Entry WHERE pkey = ?");
		$i++; //for some reason, having this only in index sorting works.
	}
	else if($sortType === 1)$stmt = $conn->prepare("SELECT * FROM Entry ORDER BY title ASC LIMIT ?, 1"); /*LIMIT ?, 1*/
	
	if (!$stmt) die("Statement wasn't ready :(" . $conn->error);
	//...
	$stmt->bind_param("i", $i);
	$stmt->execute();
	$result = $stmt->get_result();
	
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		
		$indx = new Entry();
		$indx->SetSel($row["sel"]);
		$indx->SetTitle($row["title"]);
		$indx->SetArtist($row["artist"]);
		$indx->SetTopGenre($row["top_genre"]);
		$indx->SetYear($row["year"]);
		$indx->SetAdded($row["added"]);
		//$indx->SetRating($row["rating"]);
		
		$rating = ($row["rating"] !== null) ? $row["rating"] : ""; // Default to empty string if null
		$indx->SetRating($rating);
		
		echo json_encode($indx);
	}
	else echo json_encode(["error" => "Out of Bounds!!!"]);
	
	$stmt->close();
	$conn->close();
	/*
	$file = file_get_contents('simplified_JSON.json');
	$playlist = json_decode($file, true);
	$i = (isset($_POST['i'])) ? (int)$_POST['i'] : 0;
	
	if($i >=0 && $i < count($playlist)) {
		echo json_encode($playlist[$i]);
	}
	else {
		echo json_encode(["error" => "Index out of bounds"]);
	}
	*/
?>