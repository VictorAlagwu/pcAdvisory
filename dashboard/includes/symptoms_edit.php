
   <?php
if (isset($_GET['s_id'])) {
    $sym_id = $_GET['s_id'];
    $sym_query = "SELECT * FROM symptoms WHERE id = :sym_id";
    $statement = $con->prepare($sym_query);
    $statement->execute(array(':sym_id' => $sym_id));
        while ($sym_row = $statement->fetch()) {
            $s_id = $sym_row['id'];
            $cat_id = $sym_row['cat_id'];
            $s_pro = $sym_row['sym_pro'];
            $s_body = $sym_row['sym_body'];
            
            $s_answer = $sym_row['sym_answer'];
            $s_tags = $sym_row['sym_tags'];
            $s_checker = $sym_row['checker'];

                ?>
 
                <div class="row">
             
                    <form method="POST" action="" role="form">
                        <div class="form-group">
                            <label>Enter Symptom Problem</label>
                            <input type="text" name="sym_pro" value="<?php echo $s_pro; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Enter Symptom Body</label>
                            <textarea name="sym_body" class="form-control"><?php echo $s_body; ?></textarea>
                        </div>
                       
                          <div class="form-group">
                            <label>Symptom Tags</label>
                            <input type="text" name="sym_tags" class="form-control" value="<?php echo $s_tags; ?>">
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
                            <select class="form-control" name="cat_id">
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
            $sym_pro = $_POST['sym_pro'];
            $sym_body = $_POST['sym_body'];
            
            $sym_ans = $_POST['sym_ans'];
            $sym_tags = $_POST['sym_tags'];
            $sym_checker = "Yes";
                //--UPDATING QUERY---
                $u_symptoms_query = "UPDATE symptoms SET cat_id = :cat_id, sym_pro = :sym_pro, sym_body = :sym_body, sym_answer =:sym_answer, sym_tags = :sym_tags, checker = :sym_checker WHERE id = :sym_id ";
                $stnt = $con->prepare($u_symptoms_query);
                $stnt->execute(array(':cat_id'=> $cat_id,':sym_pro'=>$sym_pro,':sym_body'=>$sym_body,':sym_answer'=> $sym_ans, ':sym_tags' => $sym_tags,':sym_checker'=> $sym_checker,':sym_id' => $sym_id));
                
               header('Location: symptoms.php');
   
        }else{
            // echo $e->getMessage();
           echo "Not Updated";
        }
    }
}
                    ?>
                </div>
                <!-- /.row -->

          