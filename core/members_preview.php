
<?php
  require_once 'core/init.php';

?>

<?php $i=0 ?>


<?php while($post_members = mysqli_fetch_assoc($query_members)):   $i++; ?>

  <div class="panel panel-default post">
    <div class="panel-body">

      <div class="">
        <div class=>
          <div>
            <!--<a href="othersProfile.php?profile_no=<?//php echo $post_members['user_id']; ?>#post_details">-->
              <?php $image_src=$post_members['user_image']; ?>
              <img class="img-responsive img-thumbnail pull-left" src="<?php echo $image_src;?>" alt="Profile Picture" width=30% data-toggle="modal" data-target="#myModalProfilePicture<?php echo $i; ?>">

          </div>
          <!-- Modal profile pic view -->
          <div id="myModalProfilePicture<?php echo $i; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                  <img class="img-responsive " src="<?php echo $image_src;?>" alt="Profile Picture" width=100% >
                </div>

              </div>

            </div>
          </div>

          <div>

              <h3 class="post-subtitle">
                &nbsp;<a href="othersProfile.php?profile_no=<?php echo $post_members['user_id']; ?>#post_details"><?php echo $post_members['username']; ?></a>
              </h3>

            <p class="">
              &nbsp;<?php echo $post_members['user_status']; ?>
            </p>
          </div>
        </div>
        <a href="othersProfile.php?profile_no=<?php echo $post_members['user_id']; ?>#post_details" class="btn btn-default pull-right">View More
        </a>
      </div>

    </div>
  </div>
<?php endwhile; ?>
