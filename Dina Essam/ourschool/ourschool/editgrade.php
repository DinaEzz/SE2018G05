<?php 
	include_once("./controllers/common.php");
	include_once('./components/head.php');
	include_once('./models/grade.php');
	include_once('./models/student.php');
	include_once('./models/course.php');
	$id = safeGet('id');
	Database::connect('school', 'root', '');
	$grade = new Grade($id);
?>

    <h2 class="mt-4"><?=($id)?"Edit":"Add"?> Grade</h2>

    <form action="controllers/savegrade.php" method="post">
    	<input type="hidden" name="id" value="<?=$grade->get('id')?>">
		<div class="card">
			<div class="card-body">
				<div class="form-group row gutters">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Student name</label>
					<div class="col-sm-10">
						<select class="form-control" name="student" required>
							<?php	
								$students = Student::all(safeGet('keywords'));
								foreach ($students as $student) {
									echo '<option value="'. $student->name .'"';
									if($grade->get('student') == $student->name) echo 'selected';
									echo ">" .$student->name.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group row gutters">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Course name</label>
					<div class="col-sm-10">
						<select class="form-control" name="course" required>
							<?php	
								$courses = Course::all(safeGet('keywords'));
								foreach ($courses as $course) {
									echo '<option value="'. $course->name .'"';
									if($grade->get('course') == $course->name) echo 'selected';
									echo ">" .$course->name.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group row gutters">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Student grade</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="grade" value="<?=$grade->get('grade')?>" required>
					</div>
				</div>
		    	<div class="form-group">
		    		<button class="button float-right" type="submit">Add</button>
		    	</div>
		    </div>
		</div>
    </form>

<?php include_once('./components/tail.php') ?>