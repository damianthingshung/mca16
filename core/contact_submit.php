<?php
  if(isset($_POST['contact_button_send'])) {

  	$sender_name = strip_tags($_POST['contact_name']);
  	$sender_email = strip_tags($_POST['contact_email']);
  	$sender_phoneno = strip_tags($_POST['contact_phoneno']);
    $sender_text = strip_tags($_POST['contact_text']);

  	$sender_name = $db->real_escape_string($sender_name);
  	$sender_email = $db->real_escape_string($sender_email);
  	$sender_phoneno = $db->real_escape_string($sender_phoneno);
    $sender_text = $db->real_escape_string($sender_text);

    $contact_query = "INSERT INTO contact_us(sender_name,sender_email,sender_phoneno,sender_text,user_id) VALUES('$sender_name','$sender_email','$sender_phoneno','$sender_text','$_SESSION[user_id_session]')";

		if ($db->query($contact_query)) {
			$msg_contact = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Thank you for contacting us
					</div>";
		}else {
			$msg_contact = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error please try again!
					</div>";
		}


  }
?>
