<?php 
	include "formclass.php";
	$formclass = new formclass;
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Панель администратора</title>
</head>
<body>
	<div>
		<?php
			$formclass->db_delete();
		?>
	</div>
</body>
</html>
