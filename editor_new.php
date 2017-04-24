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
			<form class="uk-form-horizontal uk-margin-large" method="post" action="editor.php">
				<?php form::read_json(); ?>
				<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Salvar</button>
			</form>	
		</div>
		<script>
		  $.validate({
			lang: 'pt'
		  });
		</script>	
	</body>	
</html>