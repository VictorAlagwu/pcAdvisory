<?php

function insert_category() {
	global $con;
	if (isset($_POST['submit'])) {
		$cat_title = $_POST['cat_title'];
		$cat_body = $_POST['cat_body'];
		$cat_tags = $_POST['cat_tags'];
			try {
				//--ADDING QUERY---
			$add_category_query = "INSERT INTO categories(cat_title,cat_body,cat_tags) VALUES (:cat_title,:cat_body,:cat_tags)";
			$statement = $con->prepare($add_category_query);
			$statement->execute(array(':cat_title' =>$cat_title ,':cat_body' => $cat_body,':cat_tags'=>$cat_tags ));
			echo '<script>
             		 setTimeout(function(){
		                swal({
		                  title: "Congrat!",
		                  text: "Category was added successfully added",
		                  type: "success"

		                }, function(){
		                  window.location = "categories.php";
		                });
		              }, 1000);

          			</script>';
			// header('Location: ');
			
			} catch (PDOException $e) {
				die($e->getMessage());
			}
			
		
	}
}

function delete_category() {
	global $con;
	if (isset($_GET['del'])) {
		$cat_del = $_GET['del'];
		$del_query = "DELETE FROM categories WHERE id = :cat_del ";
		$run_del_query = $con->prepare($del_query);
		$run_del_query->execute(array(':cat_del'=>$cat_del));
		header('Location: categories.php');
	}

}
function update_category() {
	global $con;
	
		 include 'category_edit.php';
	
}

?>