<?php
	$file = file_get_contents('simplified_JSON.json');
	$playlist = json_decode($file, true);
	if ($playlist !== null && is_array($playlist)) {
		$maximum = count($playlist);
		echo json_encode(["maximum" => $maximum]);
	}
	else echo json_encode(["error" => "Goofy ahh array"]);
?>