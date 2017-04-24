<?php

	class form {
		
		static function read_json() {	
			$json = file_get_contents("inc/json_format/book.json");
			$arr = json_decode($json,true);
			foreach ($arr as &$value) {
				self::mount_form($value);
			}
		}
		
		static function mount_form($value) {
			$name = $value["name"];
			$placeholder = $value["placeholder"];
			include 'inc/forms_html/'.$value["htmlform"].'';			
			
		}
		
	}

?>