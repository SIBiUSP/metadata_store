<?php

	class form {
		
		static function read_json($type) {	
			$json = file_get_contents("inc/json_format/$type.json");
			$arr = json_decode($json,true);
			foreach ($arr as &$value) {
				self::mount_form($value);
			}
		}
		
		static function mount_form($value) {
			$name = $value["name"];
			$placeholder = $value["placeholder"];
			if ($value["required"] == true) {
				$validator = 'data-validation="required"';
			} else {
				$validator = '';
			}
				
			include 'inc/forms_html/'.$value["htmlform"].'';			
			
		}
		
	}

?>