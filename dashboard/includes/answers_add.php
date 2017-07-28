
<?php

if (isset($_POST['submit'])) {
   $cat_id = $_POST['cat_id'];
   $sym_id = $_POST['sym_id'];
   $ans_body = $_POST['ans_body'];
   $ans_tags = $_POST['ans_tags'];
   $rating = "Rated";
  try {
     $add_answers_query = "INSERT INTO answers(cat_id,sym_id,ans_body,ans_tags,rating) VALUES (:cat_id,:sym_id,:ans_body,:ans_tags,:rating)";
     $statement = $con->prepare($add_answers_query);
     $statement->execute(array(':cat_id' => $cat_id, ':sym_id' => $sym_id,':ans_body'=>$ans_body,':ans_tags' => $ans_tags,':rating'=>$rating));
     header('Location: answers.php');
  } catch (PDOException $e) {
    die($e->getMessage());
  }
     //--ADDING QUERY---
 }
?>
              <div class="row">
                <form method="POST" action="">
                
                  <div class="form-group">
                    <label>Enter Answer Body</label>
                    <textarea name="ans_body" class="form-control"></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label>Answer Tags</label>
                    <input type="text" name="ans_tags" class="form-control">
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
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              