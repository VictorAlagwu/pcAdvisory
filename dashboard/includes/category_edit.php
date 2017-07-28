	<?php 
if (isset($_GET['edit'])) 
{
		$cat_id = $_GET['edit'];

 		$query = "SELECT * FROM categories WHERE id = :cat_id ";
        $statement = $con->prepare($query);
        $statement->execute(array(':cat_id' =>$cat_id));
    	
    		while ($row = $statement->fetch()) {
        		$cat_id = $row['id'];
        		$cat_title = $row['cat_title'];
        		$cat_body = $row['cat_body'];
        		$cat_tags = $row['cat_tags'];
	?>
    <form method="POST" action="" role="form">
        <h3>Update Category</h3>
   			<div class="form-group">
                <label for="cat_title">Category Title</label>
                <input type="text" name="cat_title" value="<?php echo $cat_title;?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Category Body</label>
                
                <textarea name="cat_body" class="form-control"><?php echo $cat_body;?></textarea>
            </div>
            <div>
                <label>Category Tags</label>
                <input type="text" name="cat_tags" value="<?php echo $cat_tags;?>" class="form-control">
            </div>
            <div class="form-group">
            	<button type="submit" name="update" class="btn btn-primary">Update Category</button>
            </div>
    </form>
    <?php

        if (isset($_POST['update'])) {
            $u_cat_title = $_POST['cat_title'];
            $u_cat_body = $_POST['cat_body'];
            $u_cat_tags = $_POST['cat_tags'];

            $edit_query = "UPDATE categories SET cat_title = :cat_title, cat_body =:cat_body, cat_tags= :cat_tags WHERE id = :cat_id";
            $stnt= $con->prepare($edit_query);
            $stnt->execute(array(':cat_title' =>$u_cat_title , ':cat_body'=>$u_cat_body,':cat_tags'=>$u_cat_tags,':cat_id'=>$cat_id ));
            // header('Location: categories.php');
        }else{

            echo "Not Updated";
        }
        
    }
}
?>
