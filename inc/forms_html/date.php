<?php
    echo '
		<div class="input_fields_wrap">
	    <fieldset class="uk-fieldset">
			<legend class="uk-legend">'.$placeholder.'</legend>
			<div class="uk-margin">
				<input class="uk-input" type="text" name="'.$name.'" placeholder="'.$placeholder.'" '.$validator.'>
			</div>
		</fieldset>
		<a href="#" class="remove_field">Remover</a>
		</div>
	';
?>

