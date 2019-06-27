<?php

$errors = [];

if (!empty($_POST)){
	
	if(empty($_POST['fname'])){
		$errors['fname']='Введите имя!';
	}
	if(empty($_POST['sname'])){
		$errors['sname']='Введите фамилию!';
	}
	if(empty($_POST['email'])){
		$errors['email']='Введите email!';
	}
	if(empty($_POST['phone'])){
		$errors['phone']='Введите номер телефона!';
	}

	if(!count($errors)){
		$dir = "logs"; 
		if(!is_dir($dir)) { 
			mkdir($dir, 0777, true); 
		}
		$put_data = fopen('logs/form1.txt', 'a+');
		$file="logs/form1.txt";
		$i=sizeof(file($file));
		$i+=1;
		$fname = isset($_POST['fname']) ? trim($_POST['fname']) : null;
		$sname = isset($_POST['sname']) ? trim($_POST['sname']) : null;
		$email = isset($_POST['email']) ? trim($_POST['email']) : null;
		$phone = isset($_POST['phone']) ? trim($_POST['phone']) : null;
		$topic = isset($_POST['topic']) ? trim($_POST['topic']) : null;
		$payment = isset($_POST['payment']) ? trim($_POST['payment']) : null; 
		$getMail = isset($_POST['getMail']) ? $_POST['getMail'] : 'no'; 
		$contents = $i.")".$fname."|".$sname."|".$email."|".$phone."|".$topic."|".$payment."|".date('Y-m-d-H-i-s')."|".$getMail."|".$_SERVER['REMOTE_ADDR']."|1";
		$cont=$contents.PHP_EOL;
		fwrite($put_data, $cont);
		fclose($put_data);
		header('Location: form1.php');
	}
}

function field_validation($errors, $field){
	if (!empty($errors[$field])){
  		return $errors[$field];
  	}
}

include 'index.php';

