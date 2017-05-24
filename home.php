<?php
session_start();
//include_once 'dbconnect.php';

require_once 'core/init.php';

if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}

$query = $db->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
//$DBcon->close();

?>

<?php
  //session_start();
  $_SESSION['user_id_session']=$_SESSION['userSession'];
  $_SESSION["header_image"] = "index.jpg";
  $_SESSION["header_title"] = "MCA 2016";
  $_SESSION["header_subtitle"] = "St. Anthony's College, Shillong";
	$_SESSION["post_number"] = "";
  $_SESSION['user_name_session']=$userRow['username'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MCA16 - Home</title>

		<link rel="icon" href="icon/favicon.png">
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

    <!---Including jQuery from google------>
        <script src="jquery.js"></script>
        <script src="script.js"></script>
    <!---Including CSS File------>
        <link rel="stylesheet" type="text/css" href="style.css">

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
		<!-- PAGER -->
<?php
//pager

		$uri="home.php";

		if (isset($_REQUEST['p']) ) {
			$page=(int)$_REQUEST['p'];
		}
		else{
			$page="";
		}

		$limit=10;
		if($page=='')
		{
		 	$page=1;
		 	$start=0;
		}
		else
		{
		 	$start=$limit*($page-1);
		}

		//pager
		$query = $db->query("SELECT * FROM posts");
		$row=$query->fetch_array();

		$total = $query->num_rows;
		$num_page=ceil($total/$limit);
?>

	<!-- Main Content -->
	<div class="container">
			<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
						<br>
						<?php
							require_once 'core/post_form_submit.php';
						?>
						<?php
						//Post preview.
							$sql3 = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $start, $limit";
							$dquery = $db->query($sql3);

						?>

						<?php
							//post preiew
							require_once 'core/post_preview.php';
						?>

							<!-- Pager -->
							<?php
								require_once 'core/pager.php';
							?>
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
