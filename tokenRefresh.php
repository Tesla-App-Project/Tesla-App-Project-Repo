<?php
require __DIR__ . '/kernel/AutoLoad.php';
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$user = new UserModel();
$users = $user->getAllUsers();

//die(var_dump($users));


$result = [];
for($i = 0; $i < count($users); $i++){

}

$ch = curl_init();

// Check if initialization had gone wrong*
//if ($ch === false) {
//    throw new Exception('failed to initialize');
//}

curl_setopt($ch, CURLOPT_URL, "https://auth.tesla.com/oauth2/v3/token");

// Bearer token and data type

$requestBody = [
    "grant_type" => "refresh_token",
    "client_id" => "ownerapi",
    "refresh_token" => $users[0]["token"],
    "scope" => "openid email offline_access"
];

$headers = [
    0 => 'Content-Type: application/json; charset=utf-8',
    1 => "Authorization: Bearer {$users[0]["token"]}",
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_TIMEOUT, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestBody));

if($_ENV['DEV']){
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
}

try {
    $res = curl_exec($ch);
} catch (Exception $e) {
    var_dump($e->getCode() . " " . $e->getMessage());
} finally {
    curl_close($ch);
    die(var_dump(curl_error($ch)));
    $result[] = json_decode($res, true);
}

var_dump($result);

//foreach ($usersId as $userId) {
//    $user->getUser($userId['id']);
//    $httpRequestHandler = new HttpRequestHandlerModel($user->getBearerToken(), '1493131276665295', $user->getRefreshToken());
//    $tokens = $httpRequestHandler->callAPI('refreshToken', []);
//    $user->refreshToken($tokens['bearer'], $tokens['refresh']);
//}
