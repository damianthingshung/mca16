

<?php
  require_once 'core/init.php';
?>

<?php
  session_start();

  $_SESSION["header_image"] = "profilebg.jpg";
  $_SESSION["header_title"] = "Profile";
	$nnn=$_SESSION['user_name_session'];
  $_SESSION["header_subtitle"] = $nnn;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MCA16 - Profile</title>
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
    $query_user_profile = $db->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['user_id_session']);
    $userRow_profile=$query_user_profile->fetch_array();
  ?>
  <!-- Page Header -->
  <!-- Set your background image for this header on the line below. -->
  <header class="intro-header" style="background-image: url('img/<?php echo $_SESSION["header_image"]; ?>')">
      <div class="container">
          <div class="row">

              <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                  <div class="site-heading">
                    <h1><?php //echo $_SESSION["header_title"]; ?>

                    </h1>
                    <img class="img-responsive img-thumbnail " src="<?php echo $userRow_profile['user_image'];?>" alt="Profile Picture" width=30%  data-toggle="modal" data-target="#myModalProfilePicture">
                      <!--<hr class="small">  -->
                      <span class="subheading"><?php echo $userRow_profile['username'];?></span>

                  </div>

              </div>
          </div>
      </div>
  </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
              <div class="panel panel-default post">
                <div class="panel-body">
                  <br>
                  <div >  <!-- Name and Password change -->
                    <?php
                      require_once 'core/change_name_action.php';
                      require_once 'core/change_password_action.php';
                    ?>
                    <?php
                      if(isset($msg_name_change)){
                        echo $msg_name_change;
                      }
                    ?>
                    <?php
                      if(isset($msg_password_change)){
                        echo $msg_password_change;
                      }
                    ?>
      							<p>Name: <?php echo $userRow_profile['username'];?>
                      <button type="button" name="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModalName">Change Name</button>
                          <!-- Modal Name change -->
                                  <?php
                                    require_once 'core/change_name.php';
                                  ?>
                          <br><br>

                          <button type="button" name="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModalPass">Change Password</button>
                          <!-- Modal password change -->
                          <?php
                            require_once 'core/change_password.php';
                          ?>
                    </p>
                  </div>

                  <br><br><hr><br>


                  <div >   <!-- Email change -->

                    <?php
                      require_once 'core/change_email_action.php';
                    ?>
                    <?php
                      if(isset($msg_email_change)){
                        echo $msg_email_change;
                      }
                    ?>
      							<p>Email: <?php echo $userRow_profile['email'];?>
                      <button type="submit" name="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModalEmail">Change Email</button>
                      <!-- Modal Email change -->
                      <?php
                        require_once 'core/change_email.php';
                      ?>

                    </p>
                  </div>

                  <br><hr><br>

                  <div> <!-- Status change -->
                    <?php
                      require_once 'core/change_status_action.php';
                    ?>
                    <?php
                      if(isset($msg_status_change)){
                        echo $msg_status_change;
                      }
                    ?>
      							<p>Status: <?php echo $userRow_profile['user_status'];?>
                      <button type="button" name="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModalStatus">Update Status</button>
                      <!-- Modal password change -->
                              <?php
                                require_once 'core/change_status.php';
                              ?>
                    </p>
                  </div>

                  <br><hr><br>

                  <div >  <!-- Profile Picture change -->
      							<p>Profile Picture:<br>

                      <img class="img-responsive img-thumbnail " src="<?php echo $userRow_profile['user_image'];?>" alt="Profile Picture" width=30%  data-toggle="modal" data-target="#myModalProfilePicture">

                      <button type="button" name="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModalPicture">Change Profile Picture</button>
                      <!-- Modal password change -->
                      <?php
                        require_once 'core/change_profile_picture.php';
                      ?>
                    </p>
                  </div>
                  <br>


                  <!-- Modal profile pic view -->
                  <div id="myModalProfilePicture" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <div class="modal-body">
                          <img class="img-responsive " src="<?php echo $userRow_profile['user_image'];?>" alt="Profile Picture" width=100% >
                        </div>

                      </div>

                    </div>
                  </div>

                </div>
              </div>

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
