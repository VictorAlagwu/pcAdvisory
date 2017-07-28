<?php 
$title ='Categories';
include 'views/header.php';
require 'includes/crud_cat_function.php';

?>
    <div id="wrapper">

        <!-- Navigation -->
       <?php include 'views/nav.php';?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Categories Page
                            <small>Category Name</small>
                        </h1>
                    </div>
                </div>
<?php
insert_category();

?>
                <div class="row">
                    <div class="col-xs-6">

                            <form method="POST" action="" role="form">
                                <div class="form-group">
                                <label for="cat_title">Add Category Title</label>
                                <input type="text" name="cat_title"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Category Body</label>
                                    <!-- <input type="text" name="cat_body" class="form-control"> -->
                                    <textarea name="cat_body" class="form-control"></textarea>
                                </div>
                                <div>
                                    <label>Category Tags</label>
                                    <input type="text" name="cat_tags" class="form-control">
                                </div>
                                <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                                </div>
                            </form>

            

                              


<?php
 update_category();
?>





                 </div>
                    <div class="col-xs-6">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Categories Title</th>
                                <th>Categories Body</th>
                                <th>Categories Tags</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
$query = "SELECT * FROM categories";
$statement = $con->prepare($query);
$statement->execute();
while ($row =$statement->fetch()) {

	$cat_id = $row['id'];
	$cat_title = $row['cat_title'];
    $cat_body = $row['cat_body'];
    $cat_tags = $row['cat_tags'];
	# code...

	?><tr>

                                <td><?php echo $cat_id; ?></td>
                                <td><?php echo $cat_title; ?></td>
                                <td><?php echo $cat_body; ?></td>
                                <td><?php echo $cat_tags; ?></td>
                                <td><a href="categories.php?edit=<?php echo $cat_id; ?>"><span class="glyphicon glyphicon-edit" style="color: #265a88;"></span></a></td>
                                <td><a href="categories.php?del=<?php echo $cat_id; ?>"><i class="fa fa-times" style="color: red;"></i></a></td>
                            </tr>
                                 <?php
}
//----DELETE QUERY-----
delete_category();
?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>

                <!-- /.row -->








            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script type="text/javascript" src='../assets/js/sweetalert.min.js'></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
