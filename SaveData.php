<?php
	include 'FormEntry.php';
	include 'usernameCHANGE.php'; //so that localhost/username/passwords are reused
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error ."<br>");
	} 
	$i  = $_POST['i'];
	$n1  = $_POST['n1']; //sel
	$s1  = $_POST['s1']; //title
	$s2  = $_POST['s2']; //artist
	$s3  = $_POST['s3']; //genre
	$n2  = $_POST['n2']; //year
	$s4  = $_POST['s4']; //added
	$rating  = $_POST['rating']; //rating
	
	$maximum = $_POST['maximum'];
	echo $i . "<br>";
	
	if($i >=0 && $i <= $maximum) { //Editing, UPDATE
		$sql = "UPDATE Entry SET sel = ?, title = ?, artist = ?, top_genre = ?, year = ?, added = ?, rating = ? WHERE pKey = ?";
		$stmt = $conn->prepare($sql);
		if (!$stmt) die("Statement hates change :(" . $conn->error);

		$i++;
		echo $i;
		$stmt->bind_param("isssisii", $n1, $s1, $s2, $s3, $n2, $s4, $rating, $i);
		$stmt->execute();
		echo "Row updated successfully.";
	}
	else if($i > $maximum) { //Inserting, INSERT INTO
		
		$sql = "INSERT INTO Entry (sel, title, artist, top_genre, year, added, rating) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		if (!$stmt) die("Statement hates nth wheeling :(" . $conn->error);
		
		$stmt->bind_param("isssisi", $n1, $s1, $s2, $s3, $n2, $s4, $rating);
		$stmt->execute();
		echo "Row added successfully.";
	}
	$stmt->close();
	$conn->close();
	
	/*
	$file = file_get_contents('simplified_JSON.json');
	$playlist = json_decode($file, true);
	#$i  = (isset($_POST['i'])) ? (int)$_POST['i'] : 0;
	#$s1 = (isset($_POST['s1'])) ? (int)$_POST['s1'] : 0;
	#$s2 = (isset($_POST['s2'])) ? (int)$_POST['s2'] : 0;
	#$n1 = (isset($_POST['n1'])) ? (int)$_POST['n1'] : 0;
	$i  = $_POST['i'];
	$s1  = $_POST['s1'];
	$s2  = $_POST['s2'];
	$n1  = $_POST['n1'];
	
	if($i >=0 && $i < count($playlist)) { //Editing, UPDATE
		$playlist[$i]['title'] = $s1;
		$playlist[$i]['artist'] = $s2;
		$playlist[$i]['sel'] = $n1;
		
		$updated_entry = json_encode($playlist);
		file_put_contents('simplified_JSON.json', $updated_entry);
		echo json_encode(["message" => "Edits saved successfully."]);
	}
	else if($i >= count($playlist)) { //Inserting
		//new inserted entry... wow the only thing that changed was the message.
		$playlist[$i]['title'] = $s1;
		$playlist[$i]['artist'] = $s2;
		$playlist[$i]['sel'] = $n1;
		
		$updated_entry = json_encode($playlist);
		file_put_contents('simplified_JSON.json', $updated_entry);
		echo json_encode(["message" => "Entry added successfully"]);
	}
	else{
		echo json_encode(["message" => "Index out of bounds"]);
		//idk, do nothing i guess
	}
	*/
?>