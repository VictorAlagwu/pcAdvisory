<?php
$title = 'ExpertSystem';
include 'views/layout/header.php';
?>
<style>
  .main_page {
    padding-top: 40px;
  }
</style>
<div class="container">
   <div class="row main_page">
  <div class="col-md-12 main_side">
     <?php
  $query = "SELECT * FROM categories";
  
  foreach ($con->query($query) as $row) {
    // while ($row = $stnt->fetch(PDO::FETCH_ASSOC)) {
      $cat_id = $row['id'];
      $cat_title = $row['cat_title'];
      $cat_body =$row['cat_body'];
      $cat_tags =$row['cat_tags'];
   ?>    
     <div class="col-md-6">
      <div class="panel-group">
        <div class="panel panel-info">
            <div class="panel-heading">
              <p class="panel-title center"><?php echo $cat_title; ?></p>
            </div>
            <div class="panel-body">
                <p><?php //echo $cat_body; ?></p>
                <p>Other Online resources</p>
                <p><?php echo $cat_tags; ?></p>
               
                <a href="symptoms.php?id=<?php  echo $cat_id; ?>" class="btn btn-info"> View Questions</a>
                
            </div>
        </div>
      </div>
    </div>
    <?php
}
    ?>
  </div>
</div>


<?php
include 'views/layout/footer.php'
?>