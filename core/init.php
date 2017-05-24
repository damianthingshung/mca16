<?php
$db = mysqli_connect ('127.0.0.1','root','','mca16_db');
//$db = mysqli_connect ('sql205.ultimatefreehost.in','ltm_20121159','spiritual.guys','ltm_20121159_mca16_db');
if(mysqli_connect_errno())
{
  echo 'Database Connection failed with the following errors: ', mysqli_connect_error();
  die();
}
 ?>
