<!-- Pager -->

<?php

  if($num_page>1)
  {
?>
    <ul class="pager">
      <?php if($page!=1){ ?>
        <li class="previous">
            <a href="home.php?p=<?php echo ($page-1) ?>">&larr; Newer Posts</a>
        </li>
      <?php } ?>
        <?php
            for($i=1;$i<=$num_page;$i++)
            {
              if($i==$page)
              {
                echo'<li><a onclick="return false" href="#" >['.$i.']</a></li>';
              }
              else
              {
                echo'<li><a href="'.$uri.'?p='.$i.'">'.$i.'</a></li>';
              }
            }
        ?>
      <?php if($page!=$num_page){?>
        <li class="next">
            <a href="home.php?p=<?php echo ($page+1) ?>">Older Posts &rarr;</a>
        </li>
      <?php } ?>
    </ul>

<?php
  }
?>
