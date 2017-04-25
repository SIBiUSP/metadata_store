<html>
	<head>	
		<?php
			include 'inc/config.php';
			include 'inc/functions.php';
			include 'inc/meta-header.php'; 
		?>
		<title>Editor de metadados</title>	
	</head>	
	<body>
		<div class="uk-container uk-container-center">
			<h1>Editor de metadados</h1>
			<?php if (!empty($_GET["type"])) : ?>
				<form class="uk-form-horizontal uk-margin-large" method="post" action="editor.php">
					<?php form::read_json($_GET["type"]); ?>
					<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Salvar</button>
				</form>
			<?php else : ?>
			<h2>Não foi informado o tipo de registro</h2>
			<?php endif; ?>
		</div>
		<script>
		  $.validate({
			lang: 'pt'
		  });
		</script>		
		<script type="text/javascript">
			$(document).ready(function() {
				var max_fields      = 3; //maximum input boxes allowed
				var wrapper         = $(".input_fields_wrap"); //Fields wrapper
				var add_button      = $(".add_field_button"); //Add button ID
				var x = 1; //initlal text box count
				$(add_button).click(function(e){ //on add input button click
					e.preventDefault();
					if(x < max_fields){ //max input box allowed
						x++; //text box increment
						console.log(this.nextElementSibling);						
						var copyElement =  this.nextElementSibling;
						var parentElement =  copyElement.parentElement;
						var newdiv = document.createElement('div');
						newdiv.className += "input_fields_wrap";
						newdiv.innerHTML = copyElement.innerHTML;
						parentElement.append(newdiv); //add input box
					}
				});
				$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
					e.preventDefault(); $(this).parent('div').remove(); x--;
				})
			});
		</script>
	</body>	
</html>