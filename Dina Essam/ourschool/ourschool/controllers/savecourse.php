<?php
	include_once("../controllers/common.php");
	include_once("../models/course.php");
	Database::connect('school', 'root', '');
	$id = safeGet("id", 0);
	if($id==0) {
		$course = new Course();
		$course->name = safeGet("name");
		$course->max_degree = safeGet("max_degree");
		$course->study_year = safeGet("study_year");
		Course::add($course->name, $course->max_degree, $course->study_year);
	} else {
		$course = new Course($id);
		$course->name = safeGet("name");
		$course->max_degree = safeGet("max_degree");
		$course->study_year = safeGet("study_year");
		$course->save();
	}
	header('Location: ../courses.php');
?>