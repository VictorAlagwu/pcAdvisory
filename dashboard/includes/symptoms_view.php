		<div class="row">
	            	<table class="table table-bordered table-striped table-hover">
	            		<thead>
	            			<tr>
	            				<th>Id</th>
	            				<th>Category ID</th>
	            				<th>Symptoms Problem</th>
	            				<th>Symptoms Body</th>
	            				<th>Symptoms Answer</th>
	            				<th>Symptoms Tags</th>
	            				<th>Symptoms Checker</th>
	            				<th>Edit</th>
	            				<th>Delete</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            		<?php
	            		$select_query = "SELECT * FROM symptoms";
	            		$statement = $con->prepare($select_query);
	            		$statement->execute();
	            		while ($row_sym =$statement->fetch()) {
	            			$sym_id = $row_sym['id'];
	            			$cat_id = $row_sym['cat_id'];
	            			$sym_pro = $row_sym['sym_pro'];
	            			$sym_body = $row_sym['sym_body'];
	            			
	            			$sym_answer = $row_sym['sym_answer'];
	            			$sym_tags = $row_sym['sym_tags'];
	            			$sym_checker = $row_sym['checker'];
	            	
	            		?>
	            			<tr>
	            				<td><?php echo $sym_id?></td>
	            				<td><?php echo $cat_id?></td>
	            				<td><?php echo $sym_pro?></td>
	            				<td><?php echo $sym_body?></td>
	            				
	            				<td><?php echo $sym_answer?></td>
	            				<td><?php echo $sym_tags?></td>
	            				<td><?php echo $sym_checker?></td>
	            				<td><a href="symptoms.php?source=edit_sym&s_id=<?php echo $sym_id; ?>"><span class="glyphicon glyphicon-edit" style="color: #265a88;"></span></a></td>
	                			<td><a href="symptoms.php?del=<?php echo $sym_id; ?>"><i class="fa fa-times" style="color: red;"></i></a></td>
	            			</tr>
	            			<?php
	}
	delete_symptom();

	            			?>
	            		</tbody>
	            	</table>
                </div>