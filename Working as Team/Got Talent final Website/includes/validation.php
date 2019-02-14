<?php
foreach ($_POST as $key => $value) {
	$value = trim($value);
	if (empty($value)){
		$flag   = 1;
		$missing[] = "$key";
		$$key   = '';
	}else{
		$$key = $value;
	}
}
if(isset($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
	$flag = 1;
	$errors[] = 'email';
}
if(isset($name) && !preg_match("/^[a-zA-Z ]*$/", $name)){
	$flag = 1;
	$errors[] ='username';
}
if(isset($mobile) && !preg_match("/(01)[0125]\d{8}$/", $mobile)){
	$flag = 1;
	$errors[] ='mobile';
}
if(isset($repassword) && $password != $repassword){
    $flag = 1;
	$errors[] ='repassword';
}
if(isset($repassword) && strlen($password) < 8 ){
    $flag = 1;
	$errors[] ='password';
}
