<?php 
	$search = "grade"; 
	include_once('./controllers/common.php');
	include_once('./components/head.php');
	include_once('./models/grade.php');
	Database::connect('school', 'root', '');

?>
   <div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Grades</span>
		<button class="button float-right edit_grade" id="0">Add Grade</button>
	</div>
    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">ID</th>
	      		<th scope="col">Student name</th>
	      		<th scope="col">Course</th>
	      		<th scope="col">Grade</th>
	      		<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php	
				$grades = Grade::all(safeGet('keywords'));
				foreach ($grades as $grade) {
			?>
    		<tr>
    			<td><?=$grade->id?></td>
    			<td><?=$grade->student?></td>
    			<td><?=$grade->course?></td>
    			<td><?=$grade->grade?></td>
    			<td>
    				<button class="button edit_grade" id="<?=$grade->id?>">Edit</button>&nbsp;
    				<button class="button delete_grade" id="<?=$grade->id?>">Delete</button>
				</td>
    		</tr>
    		<?php } ?>
    	</tbody>
    </table>

<?php include_once('./components/tail.php') ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_grade').click(function(event) {
			window.location.href = "editgrade.php?id="+$(this).attr('id');
		});
	
		$('.delete_grade').click(function(){
			var anchor = $(this);
			$.ajax({
				url: './controllers/deletegrade.php',
				type: 'GET',
				dataType: 'json',
				data: {id: anchor.attr('id')},
			})
			.done(function(reponse) {
				if(reponse.status==1) {
					anchor.closest('tr').fadeOut('slow', function() {
						$(this).remove();
					});
				}
			})
			.fail(function() {
				alert("Connection error.");
			})
		});
	});
</script>