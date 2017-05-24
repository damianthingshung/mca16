<?php
  require_once 'core/init.php';

  //session_start();
?>

                  <?php

                  if (isset($_POST['delete_post'])) {
                          //$comment_user_id = $_SESSION['user_id_session'];
                          $current_user=$_SESSION["user_id_session"];
                          $del_id = (int)$_POST['delete_post_id'];

                          $sql_post_user_id = "SELECT * FROM posts WHERE post_id=$del_id and user_id=$current_user";
                          $query_post_user_id = $db->query($sql_post_user_id);
                          $post_user_id_no=0;

                          while($post_user_id = mysqli_fetch_assoc($query_post_user_id))
                          {
                            $post_user_id_no = $post_user_id['user_id'];
                          }

                          if ($post_user_id_no != $current_user)
                          {

                            $msg_delete_comment = "<div class='alert alert-danger'>
                                  <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, you are not the author of this post.
                                </div>";
                          }
                          else
                          {

                            //Post delete.



                              $sql_del=("DELETE FROM posts WHERE post_id=$del_id and user_id=$current_user");

                              //$delete_querry1=mysqli_query($db, $sql_del);
                              $sql_del_comments=("DELETE FROM comments WHERE post_id=$del_id ");
                              mysqli_query($db, $sql_del_comments);

                            if(mysqli_query($db, $sql_del))
                            {

                              $msg_delete_post = "<div class='alert alert-success'>
                                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Deleted successfully
                                  </div>";
                                ?>
                                <script language=javascript>window.history.go(-2);</script><?php
                              //header( "Location: home.php");
                            }
                            else
                            {

                              $msg_delete_post = "<div class='alert alert-danger'>
                                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, an error occurred. Please try again later
                                  </div>";
                            }
                          }

                  }


                  ?>




<!-- Modal password change -->
<div id="myModalDeletePost" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirm delete</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this post and all its comments?</p>
      </div>
      <div class="modal-footer">
          <form id="delete" method="post" action="">
            <input type="hidden" name="delete_post_id" value="<?php print $p_id; ?>"/>
            <input type="submit" name="delete_post" value="Delete!" class="btn btn-danger "/>
            <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
          </form>
      </div>

    </div>

  </div>
</div>
