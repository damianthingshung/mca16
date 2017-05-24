<?php
  require_once 'core/init.php';
 ?>

<?php
  //Execute the query

  if (isset($_POST['submit_post_userpassword'])) {
        //$post_title1 = $_POST['post_title'];
        //$post_data1 = $_POST['post_data'];

        $old_password=strip_tags($_POST["old_password"]);
        $old_password = $db->real_escape_string($old_password);

        $new_password=strip_tags($_POST["new_password"]);
        $confirm_new_password=strip_tags($_POST["confirm_new_password"]);

        $new_password = $db->real_escape_string($new_password);
        $confirm_new_password = $db->real_escape_string($confirm_new_password);


        if ( !empty($new_password) && !empty($confirm_new_password) && !empty($old_password) )
        {
          if (strlen($new_password)>25 ||  strlen($confirm_new_password)>25 )
          {
            //echo 'Sorry, maxlength for some field has been exceeded.';
            $msg_password_change = "<div class='alert alert-danger'>
                  <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, maxlength for some field has been exceeded
                </div>";

          }
          else
          {
            $query_password = $db->query("SELECT user_id, password FROM tbl_users WHERE user_id = '".$_SESSION['user_id_session']."'");
            $row_password=$query_password->fetch_array();

            $counter = $query_password->num_rows; // if email/password are correct returns must be 1 row

            if (password_verify($old_password, $row_password['password']) && $counter==1)
            {

              if ($new_password == $confirm_new_password)
              {
                      $password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

                      $user_id_session=$_SESSION['user_id_session'];
                      $querry_change_password=("UPDATE tbl_users SET password='$password_hashed' WHERE user_id = '".$_SESSION['user_id_session']."' ");
                      //VALUES('".$_POST["post_title"]."','".$_POST["post_data"]."') ");

                      mysqli_query($db, $querry_change_password);

                      if ( isset($_POST['submit_post_userpassword']) )
                      {

                        $msg_password_change = "<div class='alert alert-success'>
                    					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Password changed successfully
                    				</div>";




                      }
                      else
                      {
                        //echo 'Sorry, an error occurred. Please try again later';
                        $msg_password_change = "<div class='alert alert-danger'>
                    					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, an error occurred. Please try again
                    				</div>";
                      }


              }
              else
              {
                //echo 'The names should be equal';
                $msg_password_change = "<div class='alert alert-danger'>
            					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; The passwords should be equal
            				</div>";

              }

            }
            else {
          		$msg_password_change = "<div class='alert alert-danger'>
          					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Old password does not match!
          				</div>";
          	}


          }
        }
        else
        {
          $msg_password_change = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; The fields cannot be empty
              </div>";
          //echo 'The fields cannot be empty.';
        }

        unset($new_password);
        unset($confirm_new_password);


  }


?>
