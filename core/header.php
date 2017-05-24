
<a name="top"></a>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/<?php echo $_SESSION["header_image"]; ?>')">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1><?php echo $_SESSION["header_title"]; ?></h1>
                    <!--<hr class="small"> -->
                    <span class="subheading"><?php echo $_SESSION["header_subtitle"]; ?></span>

                </div>
                <a href="profile.php">
                  <font color="#fff" class="pull-right" >Welcome : <?php print($_SESSION['user_name_session']); ?></font>
                </a>
            </div>
        </div>
    </div>
</header>
