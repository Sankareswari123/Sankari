<?php
session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "twitterusername";
$notweets = 30;
$consumerkey = "JCLkK6dMXF91r0r9LVUhfSrKE"; 
$consumersecret = "YybeSmnlrTmPBvIFR5xvVpF1IiCdh1a1Vnk6fH0IzFZSqzlVoY";
$accesstoken = "725506509283667970-rdxusMEVYG6ZRL4jzg1WWqptDPTeW7G";
$accesstokensecret = "6sv4SIKvABFUMC8Rus9yoRXm2d84cgDqEGtjjixSOJUcu";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>