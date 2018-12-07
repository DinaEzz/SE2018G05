<?php
	include_once("../controllers/common.php");
	include_once("../models/grade.php");
	Database::connect('school', 'root', '');
	$id = safeGet("id", 0);
	if($id==0) {
		$grade = new Grade();
		$grade->student = safeGet("student");
		$grade->course = safeGet("course");
		$grade->grade = safeGet("grade");
		Grade::add($grade->student, $grade->course, $grade->grade);
	} else {
		$grade = new Grade($id);
		$grade->student = safeGet("student");
		$grade->course = safeGet("course");
		$grade->grade = safeGet("grade");
		$grade->save();
	}
	header('Location: ../grades.php');
?>