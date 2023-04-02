<?php
require __DIR__ . '/kernel/AutoLoad.php';

$db = new Database();
$usersId = $db->queryGetAll(['id'], 'users');
$user = new UserModel();
var_dump($usersId);
foreach ($usersId as $userId) {
    $user->getUser($userId['id']);
    $httpRequestHandler = new HttpRequestHandlerModel($user->getBearerToken(), '1493131276665295', $user->getRefreshToken());
    $tokens = $httpRequestHandler->callAPI('refreshToken', []);
    $user->refreshToken($tokens['bearer'], $tokens['refresh']);
}
