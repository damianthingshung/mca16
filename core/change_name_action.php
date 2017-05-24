<?php
  require_once 'core/init.php';
 ?>

<?php
  //Execute the query

  if (isset($_POST['submit_post_username'])) {
        //$post_title1 = $_POST['post_title'];
        //$post_data1 = $_POST['post_data'];

        $new_name=strip_tags($_POST["new_name"]);
        $confirm_new_name=strip_tags($_POST["confirm_new_name"]);

    	  $new_name = $db->real_escape_string($new_name);
        $confirm_new_name = $db->real_escape_string($confirm_new_name);


        if ( !empty($new_name) && !empty($confirm_new_name) )
        {
          if (strlen($new_name)>50 ||  strlen($confirm_new_name)>50 )
          {
            //echo 'Sorry, maxlength for some field has been exceeded.';
            $msg_name_change = "<div class='alert alert-danger'>
                  <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, maxlength for some field has been exceeded
                </div>";

          }
          else
          {


              if ($new_name == $confirm_new_name)
              {
                $check_name = $db->query("SELECT username FROM tbl_users WHERE username='$new_name'");
                $count=$check_name->num_rows;

                if ($count==0)
                {

                      $user_id_session=$_SESSION['user_id_session'];
                      $querry_change_name=("UPDATE tbl_users SET username='$new_name' WHERE user_id = '".$_SESSION['user_id_session']."' ");
                      //VALUES('".$_POST["post_title"]."','".$_POST["post_data"]."') ");

                      mysqli_query($db, $querry_change_name);

                      if ( isset($_POST['submit_post_username']) )
                      {
                        $_SESSION['user_name_session']=$new_name;
                        echo "<meta http-equiv='refresh' content='0'>";
                        $msg_name_change = "<div class='alert alert-success'>
                    					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Name changed successfully
                    				</div>";
                        //echo 'Name changed successfully.';



                      }
                      else
                      {
                        //echo 'Sorry, an error occurred. Please try again later';
                        $msg_name_change = "<div class='alert alert-danger'>
                    					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, an error occurred. Please try again
                    				</div>";
                      }
                }
                else
                {
                    		$msg_name_change = "<div class='alert alert-danger'>
                      					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry name already taken !
                      				</div>";
                }

              }
              else
              {
                //echo 'The names should be equal';
                $msg_name_change = "<div class='alert alert-danger'>
            					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; The names should be equal
            				</div>";

              }


          }
        }
        else
        {
          $msg_name_change = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; The fields cannot be empty
              </div>";
          //echo 'The fields cannot be empty.';
        }

        unset($new_name);
        unset($confirm_new_name);


  }


?>
