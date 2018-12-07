<?php
	include_once('database.php');

	class Grade extends Database{
		function __construct($id) {
			$sql = "SELECT * FROM grades WHERE id = $id;";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$data = $statement->fetch(PDO::FETCH_ASSOC);
			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		}

		public static function add($student , $course , $grade) {
			$sql = "INSERT INTO grades (student, course, grade) VALUES (?,?,?)";
			Database::$db->prepare($sql)->execute([$student , $course , $grade]);
		}
		
		public function delete() {
			$sql = "DELETE FROM grades WHERE id = $this->id;";
			Database::$db->query($sql);
		}

		public function save() {
			$sql = "UPDATE grades SET student = ?, course = ?, grade = ? WHERE id = ?;";
			Database::$db->prepare($sql)->execute([$this->student, $this->course, $this->grade, $this->id]);
		}

		public static function all($keyword) {
			$keyword = str_replace(" ", "%", $keyword);
			$sql = "SELECT * FROM grades WHERE course like ('%$keyword%') OR student like ('%$keyword%');";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$grades = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$grades[] = new Grade($row['id']);
			}
			return $grades;
		}
	}
?>