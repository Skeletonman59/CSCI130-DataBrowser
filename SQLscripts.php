<?php
	//This file will do what the JS does, take data from form, turn it into a class, send class object
	//to database to be stored into a table.
	
	
	//$servername = "localhost"; // default server name
	//$username = "hubert"; // user name that you created
	//$password = "Rc8piTPGijEkPKds"; // password that you created
	//$dbname = "myDB";
	$servername = "localhost"; // default server name
	$username = "admin"; // user name that you created
	$password = "password"; // password that you created (totally safe!!!)
	
	// Create a database
	function CreateDB($name) {
		global $servername, $username, $password;
		// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error ."<br>");
		} 
		echo "Connected successfully <br>";
		// Creation of the database
		$sql = "CREATE DATABASE ". $name;
		if ($conn->query($sql)) {
			echo "Database ". $name ." created successfully<br>";
		} else {
			echo "Error creating database ". $name ." : " . $conn->error ."<br>";
		}
		// close the connection
		$conn->close();
	}
	function DeleteDB($name) {
		global $servername, $username, $password;
		// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error ."<br>");
		} 
		echo "Connected successfully <br>";
		// Creation of the database
		$sql = "DROP DATABASE ". $name;
		if ($conn->query($sql)) {
			echo "Database ". $name ." deleted successfully<br>";
		} else {
			echo "Error creating database: ". $name ." : " . $conn->error ."<br>";
		}
		// close the connection
		$conn->close();
	}
	function InsertTable1($c,$db) {
		global $servername, $username, $password;
		// Create connection
		$conn = new mysqli($servername, $username, $password, $db);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$o=new $c(); 
		
		// we use what we did with JSON to go back to a std class that embeds everything 
		$jo=json_encode($o);
		$o=json_decode($jo);
		
		$obj_vars=get_object_vars($o);
		echo count($obj_vars);
		echo '<br>';
		$vproperty=Array();
		foreach ($obj_vars as $key => $value){
		  echo 'key:'. $key . '  value:' . $value;  
		  echo '<br>';
		  array_push($vproperty,$key);
		}
		echo '<br>';
		
		// By default we create an index for each element we will insert, it can be used as a key
		// be careful to the key words in SQL that you cannot use as names for the columns
		$sql = "CREATE TABLE ". $c . "(	idx INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, ";
		for ($i=0;$i<count($vproperty);$i++) {
			// Here we assume everything is a string	
			$sql .=$vproperty[$i] . " VARCHAR(30) NOT NULL, ";
		}
		$sql .=" reg_date TIMESTAMP )";
		echo $sql . '<br>';
		if ($conn->query($sql) === TRUE) {
			echo "Table ". $c ." created successfully<br>";
		} else {
			echo "Error creating table: " . $conn->error ."<br>";
		}
			
		// close the connection
		$conn->close();
	}
	
?>