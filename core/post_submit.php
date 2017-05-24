<?php

// create a variable
$post_title1=$_POST['post_title'];
$post_data1=$_POST['post_data'];


//Execute the query

$sqll=("INSERT INTO posts(post_title,post_content)
VALUES('$post_title1','$post_data1')");

mysqli_query($db, $sqll);

?>
