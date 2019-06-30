<?php 
	include "formclass.php";
	$formclass = new formclass;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Панель администратора</title>
</head>
<body>
	<section>
		<form action="admin_form.php" method="POST">
		<div>
			<?php
				$formclass->data_read();
			?>
		</div>
		<div class="delete_files">
			<input type="submit" name="delete_files" value="Удалить">
		</div>
		</form>
	</section>
</body>
</html>