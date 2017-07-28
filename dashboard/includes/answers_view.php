<div class="row">
	            	<table class="table table-bordered table-striped table-hover">
	            		<thead>
	            			<tr>
	            				<th>Id</th>
	            				<th>Category ID</th>
	            				<th>Symptoms ID</th>
	            				<th>Answers Body</th>
	            				<th>Answers Tags</th>
	            				<th>Rating</th>
	            				<th>Edit</th>
	            				<th>Delete</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            		<?php
	            		$select_query = "SELECT * FROM answers";
	            		$statement =  $con->prepare($select_query);
	            		$statement->execute();
	            		while ($row_sym =$statement->fetch()) {
	            			$ans_id = $row_sym['id'];
	            			$cat_id = $row_sym['cat_id'];
	            			$sym_id = $row_sym['sym_id'];
	            			$ans_body = $row_sym['ans_body'];
	            			$ans_tags = $row_sym['ans_tags'];
	            			$ans_rate = $row_sym['rating'];
	            	
	            		?>
	            			<tr>
	            				<td><?php echo $ans_id?></td>
	            				<td><?php echo $cat_id?></td>
	            				<td><?php echo $sym_id?></td>
	            				<td><?php echo $ans_body?></td>
	            				<td><?php echo $ans_tags?></td>
	            				<td><?php echo $ans_rate?></td>
	            				<td><a href="answers.php?source=edit_ans&a_id=<?php echo $ans_id; ?>"><span class="glyphicon glyphicon-edit" style="color: #265a88;"></span></a></td>
	                			<td><a href="answers.php?del_ans=<?php echo $ans_id; ?>"><i class="fa fa-times" style="color: red;"></i></a></td>
	            			</tr>
	            			<?php
	}
	if (isset($_GET['del_ans'])) {
		$sym_del = $_GET['del_ans'];
		$del_query = "DELETE FROM answers WHERE id = {$sym_del} ";
		$run_del_query = $con->prepare($del_query);
		$run_del_query->execute();
		header('Location: answers.php');
	}
	            			?>
	            		</tbody>
	            	</table>
                </div>