<?php
  //insert comment to database
  //if(file_exists("init.php") && include("init.php"))
    {
 //       require_once 'init.php';
    }

?>
<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>

                  <?php
					//post comment action
                  if (isset($_POST['comment_submit'])) {
                        //$post_title1 = $_POST['post_title'];
                        //$post_data1 = $_POST['post_data'];
                        $p_id=$_GET['post_id_passed'];
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
                              echo 'Commented successfully.';
                              header( "refresh:1;url=../page.php?post_no=$p_id " );
                            }
                            else
                            {
                              echo 'Sorry, an error occurred. Please try again later';
                            }
                          }
                        }
                        else
                        {
                          echo 'The field cannot be empty.';
                          header( "refresh:1;url=../page.php?post_no=$p_id" );
                        }

                     


                  }


                  ?>
