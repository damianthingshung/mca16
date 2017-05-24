
<?php
  require_once 'core/init.php';

?>



<?php while($postt = mysqli_fetch_assoc($dquery)):   ?>

  <div class="panel panel-default post">
    <div class="panel-body">

      <div class="">
        <a href="page.php?post_no=<?php echo $postt['post_id']; ?>#post_details">
          <h3 class="post-subtitle">

            <?php echo substr($postt['post_content'], 0, 150) .((strlen($postt['post_content']) > 150) ? '...' : ''); ?>
          </h3>
        </a>

        <?php
          $query_user_name = $db->query("SELECT * FROM tbl_users WHERE user_id=".$postt['user_id']);
          $userRow_name=$query_user_name->fetch_array();
        ?>
        <p class="">Posted by
          <a href="othersProfile.php?profile_no=<?php echo $postt['user_id']; ?>#post_details"><?php echo $userRow_name['username'];?></a>
           on <?php echo $postt['post_date']; ?></p>

        <a href="page.php?post_no=<?php echo $postt['post_id']; ?>#post_details" class="btn btn-default pull-right">Comment
        </a>
      </div>

    </div>
  </div>
<?php endwhile; ?>
