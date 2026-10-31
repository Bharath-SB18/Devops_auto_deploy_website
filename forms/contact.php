
<?php

  // Receiving email address
  $receiving_email_address = 'bharaths0418@gmail.com';

  // Load PHP Email Form library
  $php_email_form = '../assets/vendor/php-email-form/php-email-form.php';

  if (file_exists($php_email_form)) {
      include($php_email_form);
  } else {
      die('Unable to load the PHP Email Form Library!');
  }

  // Create contact form
  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Add contact form fields
  $contact->add_message($_POST['name'], 'Name');
  $contact->add_message($_POST['email'], 'Email');
  $contact->add_message($_POST['subject'], 'Subject');
  $contact->add_message($_POST['message'], 'Message', 10);

  // Send email
  echo $contact->send();

?>
