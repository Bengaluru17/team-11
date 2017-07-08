<?php 
 
// Get the PHP helper library from twilio.com/docs/php/install 
require_once 'vendor/autoload.php'; // Loads the library 
 
use Twilio\Rest\Client; 
 
$account_sid = 'AC7bd25c9d2fd6296c5a57cb248816f381'; 
$auth_token = '6e7bbf51d493862277ca6772056feaf8'; 
$client = new Client($account_sid, $auth_token); 
 
$messages = $client->api->v2010->accounts("AC7bd25c9d2fd6296c5a57cb248816f381") 
  ->messages->create("+919740284516", array( 
        'From' => "+15109451364",  
        'Body' => "test",      
  ));
