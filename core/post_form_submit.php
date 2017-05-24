<?php
  require_once 'core/init.php';
?>


<!--post form-->

<?php


//Execute the query

if (isset($_POST['submit_post'])) {

      $post_category=strip_tags($_POST["post_category"]);
      $post_data=strip_tags($_POST["post_data"]);

    	$post_category = $db->real_escape_string($post_category);
      $post_data = $db->real_escape_string($post_data);


      if ( !empty($post_category) && !empty($post_data) )
      {
        if (strlen($post_category)>50 ||  strlen($post_data)>5000 )
        {
          echo 'Sorry, maxlength for some field has been exceeded.';
        }
        else
        {
          $user_id_session=$_SESSION['user_id_session'];
          $sqll=("INSERT INTO posts(user_id,post_category,post_content)
          VALUES('$user_id_session','$post_category','$post_data') ");
          //VALUES('".$_POST["post_title"]."','".$_POST["post_data"]."') ");

          mysqli_query($db, $sqll);

          if ( isset($_POST['submit_post']) )
          {
            echo 'Posted successfully.';
          }
          else
          {
            echo 'Sorry, an error occurred. Please try again later';
          }
        }
      }
      else
      {
        echo 'The fields cannot be empty.';
      }

      unset($post_category);
      unset($post_data);


}


?>
          <div class="panel panel-default post">
            <div class="panel-body">
              <div class="panel-heading">
                <h3 class="panel-title">POST HERE</h3>
              </div>
              <div class="panel-body">
                <form action="home.php" method="POST">

                    <div class="form-group">
                      <select class="selectpicker" name="post_category" required="required">
                        <option selected value="">Select Category</option>
                        <option value="8">Assignments</option>
                        <option value="3">CG</option>
                        <option value="7">OOPD</option>
                        <option value="4">DS</option>
                        <option value="6">COA</option>
                        <option value="5">TOC</option>
                        <option value="11">CS</option>
                        <option value="12">General Post</option>
                      </select>


                   </div>


                  <div class="form-group">

                    <textarea class="form-control" placeholder="Write your post here" name="post_data"  required></textarea>
                  </div>
                  <br>
                  <div id="success"></div>
                  <button type="submit" name="submit_post" class="btn btn-default">Post</button>

                </form>

<br>

                <div class="pull-right">
                  <div class="btn-toolbar">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-file-image-o"></i>Image</button>


                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Upload Images (NOT COMPLETE)</h4>
                          </div>
                          <div class="modal-body">


                            <form enctype="multipart/form-data" action="" method="post">
                                Select your images
                                <hr/>
                                <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>

                                <input type="button" id="add_more" class="upload" value="Add More Image"/>
                                <input type="submit" value="Upload" name="submit" id="upload" class="upload"/>

                                <br>
                            <!-------Including PHP Script here------>
                                <?php include "upload.php"; ?>
                            </form>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>


                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalVideo"><i class="fa fa-file-video-o"></i>Video</button>
					<!-- Modal -->
                    <div id="myModalVideo" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Upload Video (NOT COMPLETE)</h4>
                          </div>
                          <div class="modal-body">


                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
					
					
					
                  </div>
                </div>


              </div>
            </div>
          </div>
