<?php
 // require_once 'core/init.php';

?>
			<?php
					//post comment action
                  if (isset($_POST['comment_submit'])) {
                        //$post_title1 = $_POST['post_title'];
                        //$post_data1 = $_POST['post_data'];
                        //$p_id=$_GET['post_id_passed'];
                        $p_id=$postt['post_id'];
						//$post_category=$_POST["post_category"];
                        $comment_data1=strip_tags($_POST["comment_data"]);
                        $comment_data1 = $db->real_escape_string($comment_data1);

                        if ( !empty($comment_data1) )
                        {
                          if (strlen($comment_data1) > 255  )
                          {
                            echo 'Sorry, maxlength has been exceeded.';
                          }
                          else
                          {
                            $user_id_session_comment=$_SESSION['user_id_session'];
                            $sql_comment=("INSERT INTO comments(post_id,user_id,comment_data)
                            VALUES('$p_id','$user_id_session_comment','$comment_data1') ");
                            //VALUES('".$_POST["post_title"]."','".$_POST["post_data"]."') ");

                            mysqli_query($db, $sql_comment);

                            if ( isset($_POST['comment_submit']) )
                            {
                              //echo 'Commented successfully.';
							  echo "<meta http-equiv='refresh' content='0'>";
								$msg_comment = "<div class='alert alert-success'>
                    					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Commented successfully.
                    				</div>";
                              header( "refresh:1;url=../page.php?post_no=$p_id " );
                            }
                            else
                            {
                              //echo 'Sorry, an error occurred. Please try again later';
							  $msg_comment = "<div class='alert alert-danger'>
                    					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, an error occurred. Please try again later.
                    				</div>";
                            }
                          }
                        }
                        else
                        {
                          //echo 'The field cannot be empty.';
						  $msg_comment = "<div class='alert alert-danger'>
                    					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; The field cannot be empty.
                    				</div>";
                          header( "refresh:1;url=../page.php?post_no=$p_id" );
                        }

                     


                  }

				//action="core/comment_action.php?post_id_passed=<?php echo $postt['post_id']; //
			?>




<!--Comment form -->
    <form action="" method="POST">
      <div class="form-group">
        <textarea class="form-control" placeholder="Comment here" name="comment_data" required autofocus></textarea>

              <br>
              <div class="pull-right">
                  <button type="submit" name="comment_submit" class="btn btn-default">Comment</button>
              </div>
              <br>
      </div>
    </form>
    <br>
	<?php
              // require_once 'core/comment_action.php';

    ?>

    <?php
//comment preview.
      $sql_comment = "SELECT * FROM comments WHERE post_id = $p_id ORDER BY comment_id";
      $comment_query = $db->query($sql_comment);
    ?>



    <div class="panel panel-default post">
      <div class="panel-body">
        <?php while($post_comment = mysqli_fetch_assoc($comment_query)):   ?>
          <div class="panel panel-default post">
            <div class="panel-body">
              
              <!--<ul class="dropdown pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><span class=""></span><button type="button" name="#" class="btn btn-default" data-toggle="modal" data-target="#myModalDeleteComment">Delete</button></li>
                </ul>
              </ul>-->

              <p><?php echo $post_comment['comment_data']; ?></p>

              <?php
                $query_user_name = $db->query("SELECT * FROM tbl_users WHERE user_id=".$post_comment['user_id']);
                $userRow_name=$query_user_name->fetch_array();
              ?>
              <p class="post-meta pull-right">Commented by <a href="othersProfile.php?profile_no=<?php echo $post_comment['user_id']; ?>#post_details"><?php echo $userRow_name['username'];?></a> on <?php echo $post_comment['comment_date']; ?></p>
            </div>
          </div>
        <?php endwhile;
        //end fetching comment
        ?>
      </div>
    </div>
