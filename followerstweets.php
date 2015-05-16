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
$req1 = $to->OAuthRequest("https://api.twitter.com/1.1/followers/ids.json","GET",array("q"=>"anondroid3", "count"=>"200"));
// Twitterから返されたJSONをデコードする
$results = json_decode($req1);
$result= $results->ids;

echo "<strong>フォロワー一覧</strong>";
foreach($result as $ids){
    // user_timelineの取得。
$req2 = $to->OAuthRequest("https://api.twitter.com/1.1/statuses/user_timeline.json","GET",array("user_id"=>$ids, "count"=>"150"));

// Twitterから返されたJSONをデコードする
$results = json_decode($req2);
echo '<ul>';
foreach($results as $value){
    echo '<li>';
    echo '<img src="'.$value->user->profile_image_url.'" /><br />';
    echo "ユーザー名:".$value->user->name.'<br />';//ユーザー名
    echo "ユーザーの言語:".$value->user->lang.'<br />';//ユーザーの言語
    echo "ユーザーID:".$value->user->id.'<br />';//ユーザーID
    echo "ステータスID:".$value->id.'<br />';//ステータスID
    echo "アカウント取得日:".date("Y-m-d H:i:s", strtotime($value->user->created_at)).'<br />';
    echo "フォロー数:".$value->user->friends_count.'<br />';//フォロー数
    echo "フォロワー数:".$value->user->followers_count.'<br />';//フォロワー数
    echo "総ツイート数:".$value->user->statuses_count.'<br />';//総ツイート数
    echo "つぶやき:".'<strong>'.$value->text.'</strong>'.'<br />';//つぶやき
    echo "つぶやいた時刻:".date("Y-m-d H:i:s", strtotime($value->created_at));
    echo '</li>';
}
echo '</ul>';
}

?>
