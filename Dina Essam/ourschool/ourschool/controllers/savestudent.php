<?php
	include_once("../controllers/common.php");
	include_once("../models/student.php");
	Database::connect('school', 'root', '');
	$id = safeGet("id", 0);
	if($id==0) {
		$student = new Student();
		$student->name = safeGet("name");
		Student::add($student->name);
	} else {
		$student = new Student($id);
		$student->name = safeGet("name");
		$student->save();
	}
	header('Location: ../students.php');
?>