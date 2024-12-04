<?php
	include 'FormEntry.php';
	include 'usernameCHANGE.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error ."<br>");
	} 
	$sql = "SELECT COUNT(*) AS total FROM Entry";
	$result = $conn->query($sql);
	
	if ($result) {
		$row = $result->fetch_assoc();
		$max = $row['total'];
		echo json_encode(["maximum" => $max]);
	}
	else echo json_encode(["error" => "no items???"]);
	
	$conn->close();

	/*
	$file = file_get_contents('simplified_JSON.json');
	$playlist = json_decode($file, true);
	if ($playlist !== null && is_array($playlist)) {
		$maximum = count($playlist);
		echo json_encode(["maximum" => $maximum]);
	}
	else echo json_encode(["error" => "Goofy ahh array"]);
	*/
?>