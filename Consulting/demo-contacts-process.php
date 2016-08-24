<?php


# Include the Autoloader (see "Libraries" for install instructions)
require('../vendor/autoload.php');

use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-96d82ca8ad9aa148aba3dd0edf467655');
$domain = "mg.swflcloudforce.com";

# Make the call to the client.
	$email = $_POST['email'];
	$subject = $_POST['subject'];
  $name = $_POST['name'];
  $msg = $_POST['message'];


function send_mail($email,$subject,$msg) {
 $api_key="key-96d82ca8ad9aa148aba3dd0edf467655";/* Api Key got from https://mailgun.com/cp/my_account */
 $domain ="mg.swflcloudforce.com";/* Domain Name you given to Mailgun */
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
 curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/'.$domain.'/messages');
 curl_setopt($ch, CURLOPT_POSTFIELDS, array(
  'from' => $email,
  'to' => 'denasawyer1111@gmail.com',
  'subject' => $subject,
  'html' => $msg
 ));
 $result = curl_exec($ch);
 var_dump($result);
 curl_close($ch);
 return $result;
 

}


if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$subject = $_POST['subject'];
  $name = $_POST['name'];
  $msg = $_POST['message'];
  if($name != "" && $msg != ""){
    $ip_address = $_SERVER['REMOTE_ADDR'];
    send_mail($email, $subject,"Name: ($name) from IP ($ip_address) has sent you a message : <blockquote>$msg</blockquote>");
    echo "<h2 style='color:green;'>Your Message Has Been Sent</h2>";
  }else{
    echo "<h2 style='color:red;'>Please Fill Up all the Fields</h2>";
  }
}

header("Location: http://www.swflcrmspecialists.com/");
?>