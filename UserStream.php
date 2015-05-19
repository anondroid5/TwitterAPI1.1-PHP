<?php
//twitteroauth.phpをinclude
require_once("./twitteroauth/twitteroauth.php");
//取得した各キーを入力
$consumer_key = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$consumer_secret = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$access_token = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$access_token_secret = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
// OAuthオブジェクト生成
$to = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
// userstreamで取得。
$req = $to->OAuthRequest("https://userstream.twitter.com/1.1/user.json","GET",array("q"=>"anondroid3", "count"=>"200"));
// Twitterから返されたJSONをデコードする
echo $req;

?>