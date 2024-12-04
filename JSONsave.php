<?php
	include 'FormEntry.php';
	include 'usernameCHANGE.php'; //so that localhost/username/passwords are reused
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error ."<br>");
	} 
	//echo "Connected successfully <br>";
	
	$stmt = $conn->prepare("SELECT * FROM Entry");
	if (!$stmt) die("Statement wasn't ready :(" . $conn->error);
	$stmt->execute();
	$result = $stmt->get_result();
	
	$data = [];
	while($row = $result->fetch_assoc()) {
		$data[] = $row;
	}
	$json = json_encode($data, JSON_PRETTY_PRINT);
	file_put_contents("table.json", $json);
	echo "Table saved into table.json";
	
	$stmt->close();
	$conn->close();
?>