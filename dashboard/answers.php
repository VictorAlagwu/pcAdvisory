<?php
$title = 'Answer Page';
include 'views/header.php';
?>
<div id="wrapper">
	 <?php include 'views/nav.php';?>
	    <div id="page-wrapper">
           <div class="container-fluid">
           		<div class="row">
           			<div class="col-lg-12">
                        <h1 class="jumbotron">
                           Answer Page
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

case 'add_ans':
	include 'includes/answers_add.php';
	break;
case 'edit_ans':
	include 'includes/answers_edit.php';
	break;
case '94':
	echo "Exploring";
	break;

default:
	include 'includes/answers_view.php';
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
