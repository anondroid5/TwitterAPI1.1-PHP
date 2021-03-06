<?php
// OAuth用ライブラリ「twitteroauth」
require_once "twitteroauth/twitteroauth.php";
// アプリ登録した際に発行された値を入れて下さい。
$consumer_key = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$consumer_secret = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$access_token = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$access_token_secret = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
// オブジェクト生成
$tw_obj = new TwitterOAuth (
  $consumer_key,
  $consumer_secret,
  $access_token,
  $access_token_secret);
// REST_API指定(今回はサーチのREST_API)
$tw_rest_api = "https://api.twitter.com/1.1/search/tweets.json";
// メソッド指定
$request_method = "GET";
// オプションで使用する変数
$option_q = "セキュリティ";
$option_count = 20;
// オプション指定
$options = array (
  "q" => $option_q,
  "count" => $option_count);
// ユーザータイムライン取得
$tw_obj_request = $tw_obj->OAuthRequest (
  $tw_rest_api,
  $request_method,
  $options);
// json形式で取得
$tw_obj_request_json = json_decode($tw_obj_request, true);
// 変数生成
$search_texts = "";
// 取得したデータを回す
foreach ($tw_obj_request_json["statuses"] as $key => $value) {
  // 検索結果をを入れていく
  $search_texts .= "<p>".$value["text"]."</p>";
}
print($search_texts);
?>