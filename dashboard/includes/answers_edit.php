
<?php

if (isset($_GET['a_id'])) {
   $ans_id = $_GET['a_id'];

  $ans_query = "SELECT * FROM answers WHERE id = :ans_id";
  $stnt = $con->prepare($ans_query);
  $stnt->execute(array(':ans_id'=>$ans_id));
  while ($ans_row = $stnt->fetch()) {
      $cat_id = $ans_row['cat_id'];
      $sym_id = $ans_row['sym_id'];
      $ans_body = $ans_row['ans_body'];
      $ans_tags = $ans_row['ans_tags'];
      $rating = $ans_row['rating'];
 
?>
              <div class="row">
                <form method="POST" action="">
                
                  <div class="form-group">
                    <label>Enter Answer Body</label>
                    <textarea name="ans_body" class="form-control"><?php echo $ans_body; ?></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label>Answer Tags</label>
                    <input type="text" name="ans_tags" class="form-control" value="<?php echo $ans_tags;?>">
                  </div>
                  <div class="form-group">
                    <label>Choose Symptom ID</label>
                    <select class="form-control" name="sym_id">
                    <?php 
$sym_query = "SELECT * FROM symptoms";
$run_sym_query =$con->prepare($sym_query);
$run_sym_query->execute();
while ($sym_row = $run_sym_query->fetch()) {
  $sym_id = $sym_row['id'];
  $sym_pro = $sym_row['sym_pro'];


                    ?>
                      <option value="<?php echo $sym_id; ?>"><?php echo $sym_pro; ?></option>
                     
<?php } ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Choose Category ID</label>
                    <select class="form-control" name="cat_id">
                    <?php 
$cat_query = "SELECT * FROM categories";
$run_cat_query =$con->prepare($cat_query);
$run_cat_query ->execute();
while ($cat_row = $run_cat_query->fetch()) {
  $cat_id = $cat_row['id'];
  $cat_title = $cat_row['cat_title'];


                    ?>
                      <option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
                     
<?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
      <?php
            if (isset($_POST['update'])) {  
            $sym_id = $_POST['sym_id'];
            $cat_id = $_POST['cat_id'];
            $ans_body = $_POST['ans_body'];
            $ans_tags = $_POST['ans_tags'];       
            $rating = "Rating";
                //--UPDATING QUERY---
                $u_answers_query = "UPDATE answers SET cat_id = :cat_id, sym_id = :sym_id, ans_body = :ans_body,ans_tags = :ans_tags, rating = :rating WHERE id = :ans_id ";
                $stnt = $con->prepare($u_answers_query);
                $stnt->execute(array(':cat_id'=> $cat_id,':sym_id'=>$sym_id,':ans_body'=>$ans_body, ':ans_tags' => $ans_tags,':rating'=> $rating,':ans_id' =>$ans_id));      
                header('Location:answers.php');
   
        }else{
            // echo $e->getMessage();
           echo "Not Updated";
        }

  
  }    
 }
      ?>