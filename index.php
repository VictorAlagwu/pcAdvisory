<?php
$title = 'ExpertSystem';
include 'views/layout/index_header.php';
?>
<style>
  .main_index{
  padding-bottom:100px;
}
  #fa_cogs{
  text-shadow: 1px 1px 1px #ccc;
  font-size: 75px;
}
</style>
  <div class="container main_index">

      <div class="container-center">
        <div class="m">
        <!-- <i class="fa fa-cogs" id="fa_cogs"></i> -->
          <div id="title"> <!--BG IMAGE ELM--> </div>
          
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              
              <form action="search.php" method="GET">
                <div class="form-group">
                  <input name="search" type="search" class="form-control input-lg" id="search_box" placeholder="Hey! What's the problem">
                </div>

                <div id="search_buttons">
                  <button type="submit" class="btn btn-primary btn-lg text-center" name="submit">Go</button>
                 
                </div>

          </form>

            </div><!-- /.col-md-6 col-md-offset-3 -->
          </div> <!-- /.row -->

        </div>
      </div>

    </div>

<?php
include 'views/layout/footer.php'
?>