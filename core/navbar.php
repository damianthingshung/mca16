<?php
  require_once 'core/init.php';
?>

<?php
  $sql = "SELECT * FROM categories WHERE parent = 0";
  $pquery = $db->query($sql);
?>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="home.php">MCA16</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $_SESSION['user_name_session']; ?>&nbsp;<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                    <li><a href="members.php"><span class=""></span>Members</a></li>
                    <li><a href="about.php"><span class=""></span>About</a></li>
                    <li><a href="contact.php"><span class=""></span>Contact</a></li>
                    <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                  </ul>
                </li>
              </ul>

                <ul class="nav navbar-nav navbar-right">



                  <?php while($parent = mysqli_fetch_assoc($pquery)):   ?>

                  <?php
                    $parent_id = $parent['category_id'];

                  ?>

                    <?php
                      $sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
                      $cquery = $db->query($sql2);
                    ?>




                    <?php if ($parent_id == 2): {?>

                     <li>
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $parent['category']; ?> <b class="caret"></b></a>

                         <ul class="dropdown-menu">
                           <?php while($child = mysqli_fetch_assoc($cquery)):   ?>

                             <li><a href="<?php echo $child['category']; echo '.php';?>"><?php echo $child['category']; ?></a></li>

                           <?php endwhile; ?>
                         </ul>
                     </li>

                   <?php } else: {?>
                     <li>
                         <a href="<?php echo $parent['category']; ?>.php" ><?php echo $parent['category']; ?></a>
                     </li>
                   <?php } endif;  ?>

                  <?php endwhile; ?>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
