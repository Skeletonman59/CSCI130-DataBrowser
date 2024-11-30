<?php
	//declare(strict_types = 1);
	// isset: function that determines if a variable is set and is not NULL
	// $name: variable containing the value of the variable defined as userName sent by the client
	$name = (isset($_POST['arr'])) ? $_POST['arr'] : $_POST[0] = 0;
	# Create a string 
	$computedString = "Hi, " . $name . " welcome";
	// Here we are not doing much, just repackaging the variable within an array and encoded into a JSON structure 
	$array = ['userName' => $name, 'computedString' => $computedString];
	echo json_encode($array);
	// the output of the echo will be caught by the XMLHttpRequestobject responseText value
?>