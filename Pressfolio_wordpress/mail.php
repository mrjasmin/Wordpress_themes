<?php

function isValid($from) { // Email address verification, do not edit.
		return(preg_match("(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})",$from));
		}
   
$name = ''; 
$message = '';
$from = '' ; 
$error  = '';


if(isset($_POST['submit'])) {
	
	$email = "mrjasmin_90@hotmail.com" ; 
	$from = $_POST['email'] ; 
	$message = $_POST['message'] ; 
	$headers = "From: {$_POST['name']} <$from>"; 
	$name = $_POST['name'] ; 
	$subject = ''; 
	
	if(trim($name) == '' ) {
	$error = '<p class="error">Please enter your name</p>' ;
	}
	elseif(trim($message) == '' ) {
	$error = '<p class="error">Please enter your message</p>' ;
	}
	elseif(trim($from) == '' ) {
	$error = '<p class="error">Please enter your email</p>' ;
	}
	else if(!isValid($from)) {
    $error = '<p class="error">You have enter an invalid e-mail address, try again.</p>';
    }
	
    
    if($error == '') {	

	mail($email, $subject, $message, $headers) ; 
	
	echo "<h3>Your message has been sent successfully</h3>" ; 
	
	}
	
} 

if(!isset($_POST['submit']) || $error !=='' ) {

?>

<?php echo $error ; ?>


<form id="form" name="form" method="post" action="($_SERVER['REQUEST_URI']); ?>">

Name:<br />
<input type="text" name="name" class="input"/> <br />

Email:<br />
<input type="text" name="email" class="input" /> <br />

Message:<br />
<textarea name="message" id="message" cols="45" rows="5"></textarea> <br />

<input type="submit" name="submit" id="submit" class="submitbutton" value="Send message"/>

</form>

<?php 
}  



?>