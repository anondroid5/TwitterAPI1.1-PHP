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
// user_timelineの取得。
$req = $to->OAuthRequest("https://api.twitter.com/1.1/friends/ids.json","GET",array("user_id"=>1598997848, "count"=>"200"));
// Twitterから返されたJSONをデコードする
$results = json_decode($req);
$result = $results->ids;
echo '<strong>'.指定ユーザのフォローしているユーザのID一覧.'</strong>';
echo '<ul>';
if (is_array($result)) {
	foreach($result as $value){
    	echo '<li>';
    	echo "ユーザーID:".$value.'<br />';//ユーザーID
    	echo '</li>';
	}
}else{

}
echo '</ul>';
?>
