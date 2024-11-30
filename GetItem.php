<?php
	$file = file_get_contents('simplified_JSON.json');
	$playlist = json_decode($file, true);
	$i = (isset($_POST['i'])) ? (int)$_POST['i'] : 0;
	
	if($i >=0 && $i < count($playlist)) {
		echo json_encode($playlist[$i]);
	}
	else {
		echo json_encode(["error" => "Index out of bounds"]);
	}
	
	
	#test this php file, does it look at the JSON?
	#this is a php file. THe following is what simplified_JSON.json contains.
	#What exactly is returned from the echo? How do i echo an entire segment
	#from the JSON, so that "response" in JS returns what I need to update the form
	#in the html (the textboxes for title, artist, page number (iterator), etc)
?>