<?php 
$errors = '';

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$phone = $_POST['phone']; 
$message = $_POST['message']; 

$myemail = 'alex@adeeley.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email'])  || 
   empty($_POST['phone'])  || 
   empty($_POST['message']))
{
    header('Location: index.php#contact?fail=1');
}


if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{    
    header('Location: index.php#contact?fail=2');
}




if( empty($errors))

{

$to = $myemail;

$email_subject = "AD - Contact form submission from $name";

$email_body = "You have received a new message. ".

" Here are the details:\n Name: $name \n ".

"Email: $email_address\n Phone: $phone\n Message \n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email_address";

mail($to,$email_subject,$email_body,$headers);

//redirect to the 'thank you' page

header('Location: index.php#contact?sent=1');

}

?>
