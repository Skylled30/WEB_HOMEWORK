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
		$fname = isset($_POST['fname']) ? trim($_POST['fname']) : null;
		$sname = isset($_POST['sname']) ? trim($_POST['sname']) : null;
		$email = isset($_POST['email']) ? trim($_POST['email']) : null;
		$phone = isset($_POST['phone']) ? trim($_POST['phone']) : null;
		$topic = isset($_POST['topic']) ? trim($_POST['topic']) : null;
		$payment = isset($_POST['payment']) ? trim($_POST['payment']) : null;
		$filename = date('Y-m-d-H-i-s') . '-' . rand(010, 99) . '.txt'; 
		$getMail = isset($_POST['getMail']) ? $_POST['getMail'] : 'no'; 
		$contents = '<?php'."\n".'return'. var_export([
			'fname' => $fname, 
			'sname' => $sname, 
			'email' => $email,
			'phone' => $phone, 
			'topic' => $topic, 
			'payment' => $payment, 
			'getMail' => $getMail,
		], true);
		$dir = "logs";
		if(!is_dir($dir)) {
	    	mkdir($dir, 0777, true);
		}
		file_put_contents("$dir\\".$filename, $contents); 
		header('Location: form1.php');
	}
}

function field_validation($errors, $field){
	if (!empty($errors[$field])){
  		return $errors[$field];
  	}
}

include 'index.php';

