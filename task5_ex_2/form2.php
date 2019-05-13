<?php 
$output_inf_files = '';	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Панель администратора</title>
</head>
<body>
	<?php 
	if(!empty($_POST['f'])){
		foreach ($_POST['f'] as $key => $value) {
			if(unlink($value)){
				echo substr($value, 5) . ' успешно удалён';
			} else{
				echo substr($value, 5) . ' не удалось удалить';
			}
			echo "\n";
		}
	} else{
		echo "Вы ничего не выбрали";
	}
	?>
</body>
</html>