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
// followers_idの取得。
$req = $to->OAuthRequest("https://api.twitter.com/1.1/followers/ids.json","GET",array("q"=>"anondroid3", "count"=>"200"));
// Twitterから返されたJSONをデコードする
$results = json_decode($req);
$result= $results->ids;
echo "<strong>フォロワーのid一覧</strong>";
echo '<ul>';
foreach($result as $ids){
    echo '<li>';
    echo "フォロワーのid:".$ids.'<br />';//フォロワーid:
    echo '</li>';
}
echo '</ul>';
?>