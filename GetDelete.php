<?php

	include 'FormEntry.php';
	include 'usernameCHANGE.php'; //so that localhost/username/passwords are reused
	
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error ."<br>");
	} 
	//echo "Connected successfully <br>";
	
	$i = (isset($_POST['i'])) ? (int)$_POST['i'] : 0;
	$i++;
	
	$stmt = $conn->prepare("DELETE FROM Entry WHERE pkey = ?");
	if (!$stmt) die("Row wants to keep living" . $conn->error);
	//...
	$stmt->bind_param("i", $i);
	$stmt->execute();
	//great, we deleted the row.
	$stmt->close();
	$conn->close();
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error ."<br>");
	} 
	//now to reset the keys
	$sql = 'SET @new_id = 0;';
	$sql .='UPDATE Entry SET pKey = (@new_id := @new_id+1) ORDER BY pKey;';
	$sql .='ALTER TABLE Entry AUTO_INCREMENT =1;';
	$conn->multi_query($sql);
	
	$conn->close();
	/*
	$file = file_get_contents('simplified_JSON.json');
	$playlist = json_decode($file, true);
	$i = (isset($_POST['i'])) ? (int)$_POST['i'] : 0;
	
	if($i >=0 && $i < count($playlist)) {
		#echo json_encode($playlist[$i]);
		//Do the entry deletion stuff here
		unset($playlist[$i]);
		$playlist = array_values($playlist);
		file_put_contents('simplified_JSON.json', json_encode($playlist, JSON_PRETTY_PRINT));
	}
	else {
		echo json_encode(["error" => "Index out of bounds"]);
	}
	*/
?>