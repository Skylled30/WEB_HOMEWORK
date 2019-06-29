<?php 
  include 'func.php' 
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <h1 align ="center">Регулярые выражения №2</h1>
  <title>Регулярые выражения №2</title>
</head>
<body>
<p>Из полного имени файла (например, picture.jpg) получите его расширение (например, jpg)</p>
<form action="<?= $_SERVER['REQUEST_URI'];?>" method="POST">
  <p><input placeholder="Введите имя файла" name="id1" value="<?= isset($_POST['id1']) ? $_POST['id1']:''?>"></p>
  <p><input type="submit"></p>
</form>
<div>
	<?php
	if(!empty($_POST['id1'])){
		$var1=$_POST['id1'];
		echo findtail($var1);
	}
	else{
		echo "Введите данные";
	}
 ?>
</div>
<p>По полному имени файла проверьте соответствует ли оно: а) архиву, б) аудиофайлу, в) видеофайлу, г) картинке</p>
  <form action="<?= $_SERVER['REQUEST_URI'];?>" method="POST">
   <p><input placeholder="Введите имя файла" name="id2" value="<?= isset($_POST['id2']) ? $_POST['id2']:''?>"></p>
   <p><input type="submit"></p>
  </form>
  <div>
  	<?php
  	if(!empty($_POST['id2'])){
  		$var2=$_POST['id2'];
  		echo checktail($var2);
  	}
  	else{
  		echo "Введите данные";
  	}
	?>
</div>
<p>В правильном html-коде найдите строку, заключенную в теги "title"</p>
  <form action="<?= $_SERVER['REQUEST_URI'];?>" method="POST">
   <p><textarea placeholder="Введите html-код" name="id3" value="<?= isset($_POST['id3']) ? $_POST['id3']:''?>"></textarea></p>
   <p><input type="submit"></p>
  </form>
  <div>
  	<?php
  	if(!empty($_POST['id3'])){
  		$var3=$_POST['id3'];
  		echo find_in_title_teg($var3);
  	}
  	else{
  		echo "Введите данные";
  	}
	?>
</div>
<p>В произвольном html-коде найдите ссылки, заключенные в тегах "a"</p>
  <form action="<?= $_SERVER['REQUEST_URI'];?>" method="POST">
   <p><textarea placeholder="Введите html-код" name="id4" value="<?= isset($_POST['id4']) ? $_POST['id4']:''?>"></textarea></p>
   <p><input type="submit"></p>
  </form>
  <div>
  	<?php
  	if(!empty($_POST['id4'])){
  		$var4=$_POST['id4'];
  		echo find_in_a_teg($var4);
  	}
  	else{
  		echo "Введите данные";
  	}
	?>
</div>
<p>В произвольном HTML-коде найдите все ссылки на картинки в тегах <img> (атрибут src)</p>
  <form action="<?= $_SERVER['REQUEST_URI'];?>" method="POST">
   <p><textarea placeholder="Введите html-код" name="id5" value="<?= isset($_POST['id5']) ? $_POST['id5']:''?>"></textarea></p>
   <p><input type="submit"></p>
  </form>
  <div>
    <?php
    if(!empty($_POST['id5'])){
      $var5=$_POST['id5'];
      echo find_in_img_teg($var5);
    }
    else{
      echo "Введите данные";
    }
  ?>
</div>
<p>В произвольном тексте найдите и подсветите с помощью тега strong заданную строку</p>
  <form action="<?= $_SERVER['REQUEST_URI'];?>" method="POST">
   <p><textarea placeholder="Введите текст" name="id6" value="<?= isset($_POST['id6']) ? $_POST['id6']:''?>"></textarea></p>
   <p><input placeholder="Введите строку" name="id7" value="<?= isset($_POST['id7']) ? $_POST['id7']:''?>"></p>
   <p><input type="submit"></p>
  </form>
  <div>
    <?php
    if(!empty($_POST['id6']) && !empty($_POST['id7'])){
      $var6=$_POST['id6'];
      $var7=$_POST['id7'];
      echo find_str_in_text($var6, $var7);
    }
    else{
      echo "Введите данные";
    }
  ?>
</div>
<p>В произвольном тексте замените определенный набор текстовых смайликов :), ;), :(на соответствующие им картинки img src="smile.png" alt=":)", img src="wink.png" alt=";)", img src="sad.png" alt=":("</p>
  <form action="<?= $_SERVER['REQUEST_URI'];?>" method="POST">
   <p><textarea placeholder="Введите html-код" name="id8" value="<?= isset($_POST['id8']) ? $_POST['id8']:''?>"></textarea></p>
   <p><input type="submit"></p>
  </form>
  <div>
    <?php
    if(!empty($_POST['id8'])){
      $var8=$_POST['id8'];
      echo replace_emoji($var8);
    }
    else{
      echo "Введите данные";
    }
  ?>
</div>
<p>В заданной строке избавьтесь от случайных повторяющихся пробелов.</p>
  <form action="<?= $_SERVER['REQUEST_URI'];?>" method="POST">
   <p><input placeholder="Введите строку" name="id9" value="<?= isset($_POST['id9']) ? $_POST['id9']:''?>"></p>
   <p><input type="submit"></p>
  </form>
  <div>
    <?php
    if(!empty($_POST['id9'])){
      $var9=$_POST['id9'];
      echo delete_space($var9);
    }
    else{
      echo "Введите данные";
    }
  ?>
</div>
</body>
</html>
