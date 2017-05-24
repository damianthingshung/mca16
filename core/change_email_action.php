<?php
  require_once 'core/init.php';
 ?>

<?php
  //Execute the query

  if (isset($_POST['submit_post_email'])) {

        $new_email=strip_tags($_POST["new_email"]);
        $confirm_new_email=strip_tags($_POST["confirm_new_email"]);

    	  $new_email = $db->real_escape_string($new_email);
        $confirm_new_email = $db->real_escape_string($confirm_new_email);


        if ( !empty($new_email) && !empty($confirm_new_email) )
        {
          if (strlen($new_email)>50 ||  strlen($confirm_new_email)>50 )
          {
            //echo 'Sorry, maxlength for some field has been exceeded.';
            $msg_email_change = "<div class='alert alert-danger'>
                  <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, maxlength for some field has been exceeded
                </div>";

          }
          else
          {


              if ($new_email == $confirm_new_email)
              {
                $check_email = $db->query("SELECT email FROM tbl_users WHERE email='$new_email'");
                $count=$check_email->num_rows;

                if ($count==0)
                {
                      $user_id_session=$_SESSION['user_id_session'];
                      $querry_change_email=("UPDATE tbl_users SET email='$new_email' WHERE user_id = '".$_SESSION['user_id_session']."' ");
                      //VALUES('".$_POST["post_title"]."','".$_POST["post_data"]."') ");

                      mysqli_query($db, $querry_change_email);

                      if ( isset($_POST['submit_post_email']) )
                      {
                        //$_SESSION['user_name_session']=$new_name;
                        echo "<meta http-equiv='refresh' content='0'>";
                        $msg_email_change = "<div class='alert alert-success'>
                    					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Email changed successfully
                    				</div>";
                        //echo 'Name changed successfully.';



                      }
                      else
                      {
                        //echo 'Sorry, an error occurred. Please try again later';
                        $msg_email_change = "<div class='alert alert-danger'>
                    					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, an error occurred. Please try again
                    				</div>";
                      }
                }
                else
                {
                		$msg_email_change = "<div class='alert alert-danger'>
                  					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
                  				</div>";
                }

              }
              else
              {
                //echo 'The names should be equal';
                $msg_email_change = "<div class='alert alert-danger'>
            					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; The emails should be equal
            				</div>";

              }


          }
        }
        else
        {
          $msg_email_change = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; The fields cannot be empty
              </div>";
          //echo 'The fields cannot be empty.';
        }

        unset($new_email);
        unset($confirm_new_email);


  }


?>
