<?php
$title ='Symptom';
include './views/header.php';
?>
<body>
   <?php
if (isset($_GET['edit'])) {
    $sym_id = $_GET['edit'];
    $sym_query = "SELECT * FROM symptoms WHERE id = '{$sym_id}' ";
    $run_sym_query = mysqli_query($con,$sym_query);
        while ($sym_row = mysqli_fetch_array($run_sym_query)) {
            $s_id = $sym_row['id'];
            $cat_id = $sym_row['cat_id'];
            $s_title = $sym_row['sym_title'];
            $s_body = $sym_row['sym_body'];
            $s_pro = $sym_row['sym_pro'];
            $s_answer = $sym_row['sym_answer'];
            $s_tags = $sym_row['sym_tags'];
            $s_checker = $sym_row['checker'];

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
                    </div>
                </div>
                <div class="row">
             
                    <form method="POST" action="" role="form">
                        <div class="form-group">
                            <label>Enter Symptom Title</label>
                            <input type="text" name="sym_title" value="<?php echo $s_title; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Enter Symptom Body</label>
                            <textarea name="sym_body" class="form-control"><?php echo $s_body; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Enter Symptom Problem</label>
                            <input type="text" name="sym_pro" value="<?php echo $s_pro; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Enter Symptom Answer</label>
                            <textarea name="sym_ans" class="form-control"><?php echo $s_answer; ?></textarea>
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
                            <select>
                                <option><?php echo $cat_id; ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    <?php 

        if (isset($_POST['update'])) {
            $cat_id = $_POST['cat_id'];
            $sym_title = $_POST['sym_title'];
            $sym_body = $_POST['sym_body'];
            $sym_pro = $_POST['sym_pro'];
            $sym_ans = $_POST['sym_ans'];
            $sym_tags = $_POST['sym_tags'];
            $sym_checker = $_POST['sym_checker'];
                //--UPDATING QUERY---
                $u_symptoms_query = "UPDATE symptoms SET cat_id = '{$cat_id}', sym_title = '{$sym_title}', sym_body = '{$sym_body}', sym_pro = '{$sym_pro}', sym_answer ='{$sym_ans}', sym_tags= '{$sym_tags}', checker= '{$sym_checker}' WHERE id = $sym_id";
                $run_u_symptoms_query = mysqli_query($con, $u_symptoms_query);
                header('Location: symptoms.php');
        }else{
            echo "Not Updated";
        }
    }
}
                    ?>
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
