<?php

$dbHost	= 'sql301.epizy.com';
$dbUser = 'epiz_23455109';
$dbPass = '8a74V4JsOUhlPm';
$dbName = 'epiz_23455109_gottalent';

// function to aviod sql injection

// 1. Create a Database connection
function db_connect(){
	global $dbHost , $dbUser , $dbPass , $dbName;
	$connection = mysqli_connect($dbHost , $dbUser , $dbPass , $dbName);
	confirm_db_connect();
	return $connection;
}

function confirm_db_connect(){
	if (mysqli_connect_errno()){
		$msg = 'Database connection Failed: ';
		$msg .= mysqli_connect_error();
		$msg .= "( " . mysqli_connect_errno() . " )";
		exit($msg);
	}
}

function db_escape($connection , $string){
    // convert all single quotes , double qoutes , backslashes
    return mysqli_real_escape_string($connection , $string);
}

function select_member($table, $id){
    global $db;
    $sql    = "SELECT * FROM $table WHERE ";
    $sql    .= "id='" . $id . "';";
    $select = mysqli_query($db , $sql);
    return $select;
}
function create_user($table, $name, $mobile, $email,  $gender,  $birthday, $talent, $password){
	global $db;
	$sql    = 'INSERT INTO ' . $table . " ";
    $sql    .= '(name,  mobile, email,  gender, birthday, talent, password) ';
    $sql    .= 'VALUES ( ';
    $sql    .= "'" . db_escape($db , $name) . "', ";
    $sql    .= "'" . db_escape($db ,$mobile) . "', ";
    $sql    .= "'" . db_escape($db ,$email) . "', ";
    $sql    .= "'" . db_escape($db ,$gender) . "', ";
    $sql    .= "'" . db_escape($db ,$birthday) . "', ";
    $sql    .= "'" . db_escape($db ,$talent) . "', ";
    $sql 	.= "'" . db_escape($db ,$password) . "');";
    $create  = mysqli_query($db, $sql);
    return $create;
}
function get_telents(){
    global $db;
    $sql    = "SELECT * FROM talents";
    $get    = mysqli_query($db,$sql);
    return $get;
}
function get_courses(){
    global $db;
    $sql     = "SELECT courses.c_name, talents.t_name , talents.t_image, courses.c_desc , courses.c_link FROM courses ";
    $sql    .= "JOIN talents ON talents.t_id = courses.c_talent";
    $get    = mysqli_query($db,$sql);
    return $get;
}
function select_user($name){
    global $db;
    $sql     = "SELECT * FROM users";
    $sql    .= " WHERE name='" . $name . "'";
    $get     = mysqli_query($db, $sql);
    return $get;
}
function get_works(){
    global $db;
    $sql     = "SELECT works.w_name, works.w_path , works.w_description , works.w_date , users.talent, users.name FROM works ";
    $sql    .= "JOIN users ON users.id = works.w_user ";
    $result = mysqli_query ($db , $sql);
    return $result;
}
function get_works_id($id){
    global $db;
    $sql     = "SELECT works.w_name, works.w_path , works.w_description , works.w_date FROM works ";
    $sql    .= "JOIN users ON users.id = works.w_user ";
    $sql    .= "WHERE users.id ='" . $id . "'";
    $result = mysqli_query ($db , $sql);
    return $result;
}
function num_talent_courses(){
    global $db;
    $sql    =   "SELECT talents.t_name, talents.t_image, COUNT(*) as num FROM courses
                JOIN talents ON talents.t_id = courses.c_talent
                GROUP BY talents.t_name";
    $result = mysqli_query ($db , $sql);
    return $result;
}
function search($name){
    global $db;
    $sql     = "SELECT courses.c_name, talents.t_name , talents.t_image, courses.c_desc , courses.c_link FROM courses ";
    $sql    .= "JOIN talents ON talents.t_id = courses.c_talent ";
    $sql    .= "Where courses.c_name LIKE '" . '%'.$name.'%' ."' ";
    $sql    .= "OR talents.t_name LIKE '". '%'.$name.'%' ."'";
    $result = mysqli_query ($db , $sql);
    return $result;
}
function search_work($talentname){
    global $db;
    $sql     = "SELECT works.w_name, works.w_path , works.w_description , works.w_date , users.talent, users.name FROM works ";
    $sql    .= "JOIN users ON users.id = works.w_user ";
    $sql    .= "Where users.talent ='" .$talentname."'";
    $result = mysqli_query ($db , $sql);
    return $result;
}
function confirm_result_set($result_set){
	if (!$result_set){
		exit("Database Query Failed");
	}
}
//5. Disconnect the Database
function db_disconnect($connection){
	if(isset($connection)){
		mysqli_close($connection);
	}
}


