<?php 

class Model
{ 
   public function __construct()
   {

   }
   	
	public function getArray()
   {	    
		return array('%TITLE%'=>'Contact Form', '%ERRORS%'=>$this->checkForm());	
   }
	
	public function checkForm()
	{
		dd ($_POST);
		$error_message = "";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		
		$string_exp = "/^[A-Za-z .'-]+$/";
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		
		if (!preg_match($email_exp, $email)) 
		{
			$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
		}
		
		if (!preg_match($string_exp, $name)) 
		{
			$error_message .= 'The Name you entered does not appear to be valid.<br />';
		}
		
		if (!preg_match($string_exp, $message)) 
		{
			$error_message .= 'The Task text you entered does not appear to be valid.<br />';
		}
		
		if (strlen($error_message) > 0) 
		{
			return $error_message;
		}
		
		return true;			
	}
   
	public function sendEmail()
	{
		
	}		
}
