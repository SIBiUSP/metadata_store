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
	</body>	
</html>