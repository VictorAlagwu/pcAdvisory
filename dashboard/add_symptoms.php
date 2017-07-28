<?php
$title ='Symptom';
include 'views/header.php';
?>
<body>
<?php


// if (isset($_POST['submit'])) {
//    $cat_id = $_POST['cat_id'];
//    $sym_title = $_POST['sym_title'];
//    $sym_body = $_POST['sym_body'];
//    $sym_pro = $_POST['sym_pro'];
//    $sym_ans = $_POST['sym_ans'];
//    $sym_tags = $_POST['sym_tags'];
//    $sym_checker = $_POST['sym_checker'];
//    if ($sym_title == "" || empty($sym_title)) {
//      echo "Please input category";
//    } else {
//      //--ADDING QUERY---
//      $add_symptoms_query = "INSERT INTO symptoms(cat_id,sym_title,sym_body,sym_pro,sym_answer,sym_tags,checker) VALUES ('{$cat_id}','{$sym_title}','{$sym_body}','{$sym_pro}','{$sym_ans}','{$sym_tags}','{$sym_checker}')";
//      $run_add_symptoms_query = mysqli_query($con, $add_symptoms_query);
//      header('Location: symptoms.php');
//      if (!$run_add_symptoms_query) {
//        die('Error processing query');
//      }
//    }
//  }
?>
    <div id="wrapper">
        <!-- Navigation -->
       <?php 
include './views/nav.php';
       ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
            <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Symptoms Page
                            <small>Symptoms Name</small>
                        </h1>
                        <?php
if ($con) {
 echo "Connection Successful";
}else{
  echo "Connection Not Successful";
}
                        ?>
                    </div>
                </div>
                <div class="row">
                <form method="POST" action="">
                  <div class="form-group">
                    <label>Enter Symptom Title</label>
                    <input type="text" name="sym_title" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Enter Symptom Body</label>
                    <textarea name="sym_body" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Enter Symptom Problem</label>
                    <input type="text" name="sym_pro" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Symptom Tags</label>
                    <input type="text" name="sym_tags" class="form-control">
                  </div>

                  <div class="form-group">
                    <label class="form-control">Enter Symptom Answer</label>
                    <textarea name="sym_ans" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                  <label class="form-control">Did this answer your question ?</label>
                    <div class="radio">
                      <label><input type="radio" name="sym_checker" value="Yes">Yes</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="sym_checker" value="No">No</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Choose Category ID</label>
                    <select class="form-control">
                    <?php 
$cat_query = "SELECT * FROM categories";
$run_cat_query = mysqli_query($con,$cat_query);
while ($cat_row = mysqli_fetch_array($run_cat_query)) {
  $cat_id = $cat_row['id'];
  $cat_title = $cat_row['cat_title'];


                    ?>
                      <option name="cat_id" value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
                     
<?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
