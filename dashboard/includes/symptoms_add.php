  <?php
    insert_symptom();
?>
  <div class="row">
                <form method="POST" action="" role="form" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Enter Symptom Problem</label>
                    <input type="text" name="sym_pro" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Enter Symptom Body</label>
                    <textarea name="sym_body" class="form-control"></textarea>
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
                    <select class="form-control" name="cat_id">
                    <?php 
$cat_query = "SELECT * FROM categories";
$cat_state =$con->prepare($cat_query);
$cat_state->execute();
while ($cat_row =$cat_state->fetch()) {
  $cat_id = $cat_row['id'];
  $cat_title = $cat_row['cat_title'];


                    ?>
                      <option  value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
                     
<?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>