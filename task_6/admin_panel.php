<?php
	$output_list_fies = '';
	$prefix_path = "logs/";
	#$filelist = glob($prefix_path . '*');
	$i = 0;
	$fp = fopen($prefix_path . "/form1.txt", "r");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Панель администратора</title>
</head>
<body>
	<section>
		<form action="admin_form.php" method="POST">
		<div>
			<?php
			if($fp){
				while (!feof($fp)){
					$str = fgets($fp, 999);
					if(substr($str,-3,1)==1){
						$str1=substr($str,0,-3);
						$output_list_fies .= "<input type='checkbox' name='f[]' value=".$str.">" . $str1 . " <br>";
					}
				}
			} else {
				echo "Ошибка при открытии файла";
			}
			echo $output_list_fies; 
			?>
		</div>
		<div class="delete_files">
			<input type="submit" name="delete_files" value="Удалить">
		</div>
		</form>
	</section>
</body>
</html>