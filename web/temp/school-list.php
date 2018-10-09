<?php
/**
 * 同步遠端學校學期資料
 **/
// 更改為學校的 API ID
$client_id = '79fbfe2afa9503aa8a701292ab0b99fe';
// 更改為學校的 API 密碼
$client_secret = 'cc8ad9ecf40d0891deffac3f46d91a08';
// =================================================
// API NAME
$api_name = '/school-news';

// API URL
$api_url = 'http://api.cloudschool.tw';
// 建立 CURL 連線
$ch = curl_init();
// 取 access token
curl_setopt($ch, CURLOPT_URL, $api_url . "/oauth?authorize");
// 設定擷取的URL網址
curl_setopt($ch, CURLOPT_POST, TRUE);
// the variable
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'grant_type' => 'client_credentials'
));
$data = curl_exec($ch);
$data = json_decode($data);
$access_token = $data->access_token;
$authorization = "Authorization: Bearer " . $access_token;
$get_id = $_GET["id"];
$json_array = [
    'action' => 'get',
    'id' => (int)$get_id,
];
$data = json_encode($json_array);
curl_setopt($ch, CURLOPT_URL, $api_url . $api_name);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization)); // **Inject Token into Header**
// 使用 PATCH method
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 不檢查 ssl 憑證，正式站台可拿掉
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, fase);
// 上傳資料設定
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
$data = json_decode($result);
//print_r($data->_embedded->school_news);
//print_r($data);
print("標題：" . $data->news->title . "<BR>");
print("內容：" . $data->news->content . "<BR>");
?>
<a href="school-news.php">返回</a>
