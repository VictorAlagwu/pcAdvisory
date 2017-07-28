<?php
define("ROW_PER_PAGE",1);    //Records to display per page
$title = 'Search Results';

include 'views/layout/header.php';
?>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    <?php
    $search = '';
      if (!empty($_GET['search'])) {
         $search = $_GET['search'];

                  /* Search Entry */
               
                $keywords =  explode(' ', $search);
                $arr_length = count($keywords);
                $sub_query = '';

                    for ($i = 0; $i < $arr_length; $i++) {
                      if ($i == 0) {
                        $sub_query = $sub_query . 'sym_tags LIKE "%' . $keywords[$i] . '%" OR sym_tags LIKE "%' . $keywords[$i] . '%"';
                        }else {
                        $sub_query = $sub_query . ' OR sym_tags LIKE "%' . $keywords[$i] . '%" OR sym_tags LIKE "%' . $keywords[$i] . '%"';
                      }
                    }


                  /* Query */
                $query = 'SELECT * FROM symptoms WHERE ' . $sub_query; 


                  /*Pagination Code Starts */
                        $per_page_htm = '';
                        $page = 1;
                        $start = 0;
                          if(!empty($_GET['r'])) {
                             $page = $_GET['r'];
                             $start = ($page - 1) * ROW_PER_PAGE;
                           }     
                  $limit = "LIMIT " . $start . "," . ROW_PER_PAGE;

                /* Getting Row Count Tested Working */
              $p_query = 'SELECT COUNT(*) FROM symptoms WHERE ' . $sub_query;
              $pag_stnt = $con->query($p_query);
              $row_count = $pag_stnt->fetchColumn();

                echo "<h4>You have $row_count result(s)</h4>";

                    if (!empty($row_count)) {
                      $per_page_htm .= "<div style='text-align:center;margin:20px 0px;'>";
                      $page_count = ceil($row_count / ROW_PER_PAGE);
                        if ($page_count > 1) {
                          $self = $_SERVER['PHP_SELF'];
                          $page_count  = $page_count +1;
                            for($i=1; $i<=$page_count; $i++){
                                if($i==$page){
                                    $per_page_htm .= "<a href='".$self."?r=".$i."&search=".urlencode($search)."' class='btn-page current'>".$i."</a>";
                                  }elseif($i < $page_count){
                                      $per_page_htm .= "<a href='".$self."?r=".$i."&search=".urlencode($search)."' class='btn-page'>".$i."</a>"; 
                                  }
                                  elseif($i == $page_count){

                                      $per_page_htm .= "<a href='answer.php?search=".urlencode($search)."' class='btn btn-danger'>If none worked,Click Here</a>"; 
                                }elseif($i > $page_count){
                                  header('Location:index.php');
                                }else{
                                  echo "error";
                                }
                                
                            }
                        }
                        $per_page_htm .= "</div>";
                    
                          
                   
                    
                          $n_query = 'SELECT * FROM symptoms WHERE ' . $sub_query . ' '.$limit ;
                        
                            foreach ($con->query($n_query) as $row) {
                            
                              $sym_cat_id = $row['cat_id'];
                              $sym_pro = $row['sym_pro'];
                              
                              $sym_body = $row['sym_body'];
                              $sym_ans = $row['sym_answer'];

                
                   
                      ?>
                    <!-- Symptom Area-->

                      <div class="panel-group results">
                          <div class="panel panel-success">
                            <div class="panel-heading">
                             <p><?php //echo $cat_title;?></p> 
                             <?php echo $search; ?>
                            </div>
                            <div class="panel-body">
                              <?php echo $sym_ans; ?>
                              
                              <?php //echo $sym_ans;?></p>
                              <p><h4 class="text-center">Was the answer helpful</h4></p>
                               
                                  <p>
                                    <a href="index.php" class="btn btn-info">YES</a>
                                    <?php
                                    if ($row_count == 1) {
                                      
                              echo "<a href='answer.php?search=".urlencode($search)."' class='btn btn-warning pull-right'>NO</a>"; 
                                    
                                    }
                                    ?>
                                  
                                  </p>
                            </div>
                          </div>
                      </div>
                          <?php
                            }
                         }else{  
                        echo '<script>
                            setTimeout(function(){
                              swal({
                                title: "Sorry!",
                                text: "Your Query is not in our database",
                                type: "info"

                              }, function(){
                                window.location = "index.php";
                              });
                            }, 1000);
                            </script>';
                                    }
    
 
echo $per_page_htm;
        }else{
  echo '<script>
              setTimeout(function(){
                swal({
                  title: "Oops!",
                  text: "Please enter a valid value!",
                  type: "error"

                }, function(){
                  window.location = "index.php";
                });
              }, 1000);
          </script>
  ';
}

?>

    </div>
    <div class="col-md-6 col-md-offset-3">
      <div class="well text-center"">
            <h4>Questions Directory</h4>
            <p>Symptom Problem</p>
            <?php
              $query = "SELECT sym_tags FROM symptoms";
              $r_query = $con->prepare($query);
              $r_query->execute();
              ?>

              <?php
                while ($row = $r_query->fetch(PDO::FETCH_ASSOC)) {
                  $sym_tags = explode(",", $row['sym_tags']);
                  foreach ($sym_tags as $sym_tag) {
                    echo '<a href="result_tags.php?tag=' . $sym_tag . '" class="btn btn-info">' . $sym_tag . '</a> &nbsp;';
                  }
                }
              ?>
          </div>
    </div>
</div>
<div row>
  
</div>
</div>
 
<?php
include 'views/layout/footer.php'
?>