<?php
$title = 'Symptoms';
include 'views/header.php';
require 'includes/crud_sym_function.php';
?>
<div id="wrapper">
	 <?php include 'views/nav.php';?>
	    <div id="page-wrapper">
           <div class="container-fluid">
           		<div class="row">
           		   <div class="col-lg-12">
                        <h1 class="jumbotron">
                          Symptoms Page
                        </h1>
                    </div>
           		</div>
           		<?php
if (isset($_GET['source'])) {
	$source = $_GET['source'];
} else {
	$source = '';
}
switch ($source) {

case 'add_sym':
	include 'includes/symptoms_add.php';
	break;
case 'edit_sym':
	include 'includes/symptoms_edit.php';
	break;
case '02':
	echo "Source o2";
	break;
case '94':
	echo "Exploring";
	break;

default:
	include 'includes/symptoms_view.php';
	break;
}

?>
           
                
            </div>
        </div>
</div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
