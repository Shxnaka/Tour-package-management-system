<?php
if(isset($_POST['form_email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "anoo007@gmail.com";
    $email_subject = "AMH Web Form";
 
    // validation expected data exists
    if(
        !isset($_POST['form_email']) ||
        !isset($_POST['form_message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $form_email = $_POST['form_email']; // required
    $form_message = $_POST['form_message']; // required
 
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= " Email: ".clean_string($form_email)."\n";
    $email_message .= "Message: ".clean_string($form_message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

  echo '<script>alert("Thank you for the Query.");
window.location.href="../index.html";
</script>';
?>
 

 
<?php
 
}
?>