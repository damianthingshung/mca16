<?php
  require_once 'core/init.php';
?>
<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MCA16</title>
    <link rel="icon" href="icon/favicon.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

  <?php
  //Navigation bar
    require_once 'core/navbar.php';
  ?>


  <?php
  //header
    require_once 'core/header.php';
  ?>

    <!-- Main Content -->
    <div class="container" id="post_details">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">



              <?php

                $p_id=(int)$_GET['post_no'];
                $_SESSION["post_number"] = "$p_id";   //for deleting post
                //$p_id=$_SESSION["post_session_id"];
	//Post preview.
                $sql3 = "SELECT * FROM posts WHERE post_id=$p_id";
                $dquery = $db->query($sql3);
              ?>
              <?php
                require_once 'core/delete_post.php';
              ?>


              <?php
                if(isset($msg_delete_comment)){
                  echo $msg_delete_comment;
                }
              ?>
              <?php
                if(isset($msg_delete_post)){
                  echo $msg_delete_post;

                }

              ?>

              <?php while($postt = mysqli_fetch_assoc($dquery)):   ?>



                <div class="panel panel-default post">
                    <div class="panel-body">

                      <div class="panel panel-default post">
                        <div class="panel-body">

                          <ul class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><span class=""></span><button type="button" name="#" class="btn btn-default" data-toggle="modal" data-target="#myModalDeletePost">Delete</button></li>
                            </ul>
                          </ul>

                          <p><?php echo $postt['post_content']; ?></p>
                          <?php
                            $query_user_name = $db->query("SELECT * FROM tbl_users WHERE user_id=".$postt['user_id']);
                            $userRow_name=$query_user_name->fetch_array();
                          ?>
                          <p class="post-meta pull-right">Posted by
                            <a href="othersProfile.php?profile_no=<?php echo $postt['user_id']; ?>#post_details"><?php echo $userRow_name['username'];?></a> on <?php echo $postt['post_date']; ?></p>
                        </div>
                      </div>
					  
					  <?php
                      if(isset($msg_comment)){
                        echo $msg_comment;
                      }
                    ?>


                      <?php
                        //require_once 'core/delete_comment.php';
                      ?>
					  
					  	

                      <?php
                        //comments form n display
                        require_once 'core/comments.php';
                      ?>

						<?php
							//require_once 'core/comment_action.php';

						?>

                    </div>

              <?php endwhile; ?>


            </div>
        </div>
    </div>

    <hr>

    <?php
    //footer
      require_once 'core/footer.php';
    ?>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
