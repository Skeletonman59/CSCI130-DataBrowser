<?php
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
?>