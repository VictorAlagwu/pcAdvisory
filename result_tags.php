<?php
$title = 'Search Results';

include 'views/layout/header.php';
?>

 <div class="row">
    <div class="col-md-6 col-md-offset-3">
    <h3>Tag Search Result(s)</h3>
    </br>
  <div class="row">
         <?php
if (isset($_GET['tag'])) {
  $search_tags = $_GET["tag"];

  $query = 'SELECT * FROM symptoms WHERE sym_tags LIKE "%' . $search_tags . '%"';
  
    foreach ($con->query($query) as $row) {
   
      //How to use mysqli_num_rows in PDO
      $sym_cat_id = $row['cat_id'];
      $sym_pro = $row['sym_pro'];
      $sym_body = $row['sym_body'];
      $sym_ans = $row['sym_answer'];
      ?>
    <!-- Symptom Area-->

  <div class="panel-group">
      <div class="panel panel-success">
        <div class="panel-heading">
         <p><?php //echo $cat_title;?></p> <?php echo $sym_pro; ?>
        </div>
        <div class="panel-body">
          <?php echo $sym_body; ?>
          <p><h4>Answer</h4>
          <?php echo $sym_ans;?></p>
          <p><h4>Was the answer helpful</h4></p>
          <?php
if (isset($_POST['yes_btn'])) {
                         header('Location:index.php');
                        }  
          ?>
          
              <p>
              <a href="index.php" class="btn btn-info pull-left"> Yes</a>
              <button type="button" class="btn btn-danger pull-right">No</button>
              </p>
         
        
        </div>
      </div>
  </div>

            <!-- Symptom Area -->
            <?php
                      
        
  }
}
?>
</div>





            <hr>
           
    </div>    
 </div>
<?php
include 'views/layout/footer.php'
?>