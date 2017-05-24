<?php
  require_once 'core/init.php';

  //session_start();
?>

                  <?php

                  if (isset($_POST['delete_comment'])) {
                          $comment_user_id = $_SESSION['user_id_session'];
                          if ($comment_user_id == $_SESSION['user_id_session'])
                          {

                            $msg_delete_comment = "<div class='alert alert-danger'>
                                  <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, you are not authorised.
                                </div>";
                          }
                          else
                          {

                            if ( isset($_POST['delete_comment']) )
                            {

                              $msg_delete_comment = "<div class='alert alert-danger'>
                                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Deleted successfully
                                  </div>";
                              header( "refresh:1;url=../page.php?post_no=$p_id " );
                            }
                            else
                            {

                              $msg_delete_comment = "<div class='alert alert-danger'>
                                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, an error occurred. Please try again later
                                  </div>";
                            }
                          }

                  }


                  ?>




<!-- Modal password change -->
<div id="myModalDeleteComment" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirm delete</h4>
      </div>
      <div class="modal-body">
                                <div class="">
                                  <form method="POST" action="page.php">
                                    <input type="hidden" name="post_no" value="<?php echo $p_id;?>">
                                    <button type="submit" name="delete_comment" class="btn btn-default" >Delete</button>
                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                                  </form>
                                </div>
      </div>

    </div>

  </div>
</div>
