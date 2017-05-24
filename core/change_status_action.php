<?php
  //Execute the query

  if (isset($_POST['submit_post_status'])) {
        //$post_title1 = $_POST['post_title'];
        //$post_data1 = $_POST['post_data'];

        $new_status=strip_tags($_POST["new_status"]);
    	  $new_status = $db->real_escape_string($new_status);


        if ( !empty($new_status) )
        {
          if (strlen($new_status)>255 )
          {
            //echo 'Sorry, maxlength for some field has been exceeded.';
            $msg_status_change = "<div class='alert alert-danger'>
                  <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, maxlength for some field has been exceeded
                </div>";
          }
          else
          {

              $user_id_session=$_SESSION['user_id_session'];
              $querry_change_name=("UPDATE tbl_users SET user_status='$new_status' WHERE user_id = '".$_SESSION['user_id_session']."' ");
              //VALUES('".$_POST["post_title"]."','".$_POST["post_data"]."') ");

              mysqli_query($db, $querry_change_name);

              if ( isset($_POST['submit_post_status']) )
              {
                //echo "Status changed successfully.";
                echo "<meta http-equiv='refresh' content='0'>";
                $msg_status_change = "<div class='alert alert-success'>
                      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Status changed successfully
                    </div>";


              }
              else
              {
                //echo 'Sorry, an error occurred. Please try again later';
                $msg_status_change = "<div class='alert alert-danger'>
                      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, an error occurred. Please try again later
                    </div>";
              }
          }
        }
        else
        {
          //echo 'The fields cannot be empty.';
          $msg_status_change = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; The fields cannot be empty.
              </div>";
        }

        unset($new_status);



  }


?>
