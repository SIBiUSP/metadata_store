<?php
    echo '
		 <div>
			<div>
				<fieldset class="uk-fieldset">
					<legend class="uk-legend">'.$placeholder.'</legend>
					<div class="uk-margin">
						<textarea class="uk-textarea" rows="5" name="'.$name.'" placeholder="'.$placeholder.'" '.$validator.'></textarea>
					</div>
				</fieldset>';
				if ($value["repetitive"] == true) {
					echo '<a href="#" class="add_field_button">+</a>';
				}
				echo '<a href="#" class="remove_field">Remover</a>	
			</div>
		</div>		
	';
?>