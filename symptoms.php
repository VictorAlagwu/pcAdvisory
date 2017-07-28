<?php
$title = 'ExpertSystem';
include 'views/layout/header.php';
?>
<style>
  .header {
    padding-top: 40px;
  }
</style>
 <div class="row">
 <div id="title"> <!--BG IMAGE ELM--> </div>
    <div class="col-md-6 col-md-offset-3">
     	 	<form method="POST" action="search.php">
                    <div class="form-group">
                      <input name="search" type="search" class="form-control input-lg" id="search_box" placeholder="Hey! What's the problem?">
                    </div>

                    <div id="search_buttons">
                      <button type="submit" class="btn btn-primary btn-lg" name="submit">Go</button>
                
                    </div>

        </form>
    </div>
 </div>
 <div class="row header">
   <div class="col-md-6 col-md-offset-3">
     <?php 
     if (isset($_GET['id'])) {
       
       $r_cat_id = $_GET['id'];
       // $query ="SELECT c.* , s.* FROM categories c INNER JOIN symptoms s ON c.id = s.cat_id ";
      $query = "SELECT * FROM symptoms WHERE cat_id = '{$r_cat_id}'";
       $search_query = $con->prepare($query);
       $search_query->execute();
       $count = $search_query->rowCount();
       if ($count == 0) {
         echo "<h3 class='alert alert-danger'>No result</h3>";
       }
        while ($row = $search_query->fetch(PDO::FETCH_ASSOC)) {
            $sym_pro = $row['sym_pro'];
            $sym_body = $row['sym_body'];
            $cat_id = $row['cat_id'];

              ?>
    
          <div class="panel-group">
              <div class="panel panel-success">
                <div class="panel-heading">
                   <p><?php //echo $cat_title;?></p> <?php echo $sym_pro; ?>
                </div>
                <div class="panel-body">
                      <?php echo $sym_body; ?>
                </div>
              </div>
          </div>
            <?php
                 }
                }
            ?>
      </div>
 </div>

<?php
include 'views/layout/footer.php'
?>