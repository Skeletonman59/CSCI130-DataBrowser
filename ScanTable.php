<?php
	include 'FormEntry.php';
	include 'usernameCHANGE.php'; //so that localhost/username/passwords are reused
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error ."<br>");
	} 
	//echo "Connected successfully <br>";
	
	$stmt = $conn->prepare("SELECT pKey FROM Entry");
	if (!$stmt) die("Statement wasn't ready :(" . $conn->error);
	$stmt->execute();
	$result = $stmt->get_result();
	$pKeys = [];
	while($row = $result->fetch_assoc()) {
		$pKeys[] = $row['pKey'];
	}
	echo json_encode($pKeys);
	
	$stmt->close();
	$conn->close();
?>