<html>
	<head>	
		<?php
			include 'inc/config.php';
			include 'inc/functions.php';
			include 'inc/meta-header.php'; 
		?>
		<title>Editor</title>	
	</head>	
	<body>
		<div class="uk-container uk-container-center">
			<form class="uk-form-horizontal uk-margin-large" method="post" action="editor.php">
				<?php form::read_json(); ?>
			</form>	
		</div>
		<script>
		  $.validate({
			lang: 'pt'
		  });
		</script>	
	</body>	
</html>