<?php
	class serverCommands {
		function Retrieve() {
			$file = file_get_contents('simplified_JSON.json');
			$playlist = json_decode($file, true);
			$i = (isset($_POST['i'])) ? (int)$_POST['i'] : 0;
	
			if($i >=0 && $i < count($playlist)) {
				echo json_encode($playlist[$i]);
			}
			else {
				echo json_encode(["error" => "Index out of bounds"]);
			}
		}
		function Insert() {
			$file = file_get_contents('simplified_JSON.json');
			$playlist = json_decode($file, true);
			if ($playlist !== null && is_array($playlist)) {
				
			}
			else echo json_encode(["error" => "Goofy ahh array"]);
		}
		function Save() {
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
	
			if($i >=0 && $i < count($playlist)) {
				$playlist[$i]['title'] = $s1;
				$playlist[$i]['artist'] = $s2;
				$playlist[$i]['sel'] = $n1;
		
				$updated_entry = json_encode($playlist);
				file_put_contents('simplified_JSON.json', $updated_entry);
				echo json_encode(["message" => "Edits saved Successfully."]);
			}
			else {
				echo json_encode(["message" => "Index out of bounds"]);
				//idk, do nothing i guess
			}
		}
?>