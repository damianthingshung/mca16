<?php
  if (isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_phoneno']) && isset($_POST['contact_text']) )
  {

    $contact_name = $_POST['contact_name'];
    $contact_name =  $_POST['contact_email'];
    $contact_name = $_POST['contact_phoneno'];
    $contact_name = $_POST['contact_text'];

    if (!empty($contact_name) && !empty($contact_email) && !empty($contact_phoneno) && !empty($contact_text) )
    {
      if (strlen($contact_name)>25 || strlen($contact_name)>50 || strlen($contact_name)>13 || strlen($contact_name)>1000 )
      {
        echo 'Sorry, maxlength for some field has been exceeded.';
      }
      else
      {
        $to = 'daym321@gmail.com';
        $subject = 'Contact form submitted.';
        $body = $contact_name.$contact_phoneno.$contact_email;
        $headers = 'From:'.$contactcontact_email;

        if (mail($to, $subject,$body,$headers))
        {
          echo 'Thanks for contacting us. We\'ll be in touch soon.';
        }
        else
        {
          echo 'Sorry, an error occurred. Please try again later';
        }
      }
    }

  }

 ?>
