<?php
	$output_list_fies = '';
	$prefix_path = "logs/";
	$filelist = glob($prefix_path . '*');
	$i = 0;
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Панель администратора</title>
</head>
<body>
	<section>
		<form action="form2.php" method="POST">
		<div>
			<?php 
			foreach ($filelist as $filename) {
				$i++;
				$filename=substr($filename, iconv_strlen($prefix_path));
				$output_list_fies .= "<input type='checkbox' name='f[]' value=".$prefix_path . $filename.">$filename <br>";
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