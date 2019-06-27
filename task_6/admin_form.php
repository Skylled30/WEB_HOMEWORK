<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Панель администратора</title>
 </head>
 <body>
 	<div>
 		<?php
			if(empty($_POST['f'])){ 
				echo "<h2>Вы ничего не выбрали</h2>";
			} 
			else{
				echo "<h2>Данные файлы были успешно отмечены как удалённые</h2>";
				$file=file("logs/form1.txt");
				$af=$_POST['f'];
				$n=count($af);
				for($i=0;$i<$n;$i++){
					if(substr($af[$i],-1)==1){
						for($j=0;$j<sizeof($file);$j++){
							if(substr($file[$j], 0,1)==substr($af[$i], 0,1)){
								$file[$j]=substr($af[$i],0,-1)."0".PHP_EOL;
								echo substr($file[$j],0,-3)."<br>";
								} 
							}
						} 
					}
				file_put_contents("logs/form1.txt", $file);	
				}
		?>
	</div>
 </body>
</html>
