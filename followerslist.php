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
// followers/listの取得。
$req = $to->OAuthRequest("https://api.twitter.com/1.1/followers/list.json","GET",array("cursor" => "-1","screen_name"=>"anondroid3"));
// Twitterから返されたJSONをデコードする
$results = json_decode($req);
$result= $results->users;
echo '<ul>';
foreach($result as $users){
    echo '<li>';
    echo '<img src="'.$users->profile_image_url.'" /><br />';
    echo "ユーザー名:".$users->name.'<br />';//ユーザー名
    echo "ユーザーの言語:".$users->lang.'<br />';//ユーザーの言語
    echo "ユーザーID:".$users->id.'<br />';//ユーザーID
    echo "アカウント取得日:".date("Y-m-d H:i:s", strtotime($users->created_at)).'<br />';
    echo "フォロー数:".$users->friends_count.'<br />';//フォロー数
    echo "総ツイート数:".$users->statuses_count.'<br />';//総ツイート数
    echo '</li>';
}
echo '</ul>';
?>
