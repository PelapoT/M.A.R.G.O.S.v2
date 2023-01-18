<?php
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$config = [
'id' => 'basic',
'name'=>'shop',
'language'=>'ru-RU',
'basePath' => dirname(__DIR__),
'bootstrap' => ['log'],
'aliases' => [
'@bower' => '@vendor/bower-asset',
'@npm' => '@vendor/npm-asset',
],
'components' => [
'request' => [
// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
'cookieValidationKey' => 'Leonid',
'parsers' => [
'application/json' => 'yii\web\JsonParser',
]
],
'cache' => [
'class' => 'yii\caching\FileCache',
],
'user' => [
'identityClass' => 'app\models\User',
'enableAutoLogin' => true,
],
'errorHandler' => [
'errorAction' => 'site/error',
],
'mailer' => [
'class' => 'yii\swiftmailer\Mailer',

// send all mails to a file by default. You have to set
// 'useFileTransport' to false and configure transport
// for the mailer to send real emails.
'useFileTransport' => true,
],
'log' => [
'traceLevel' => YII_DEBUG ? 3 : 0,
'targets' => [
[ 'class' => 'yii\log\FileTarget',
'levels' => ['error', 'warning'],
],
],
],
'db' => $db,
'urlManager' => [
'enablePrettyUrl' => true,
'enableStrictParsing' => true,
'showScriptName' => false,
'rules' => [
  'POST register' => 'user/reg',
  'POST connect' => 'request/connect', // сделан
  'POST auto' => 'user/auto',
  'POST orders/<id_merch>' => 'orders/getd', // сделан
  'POST services/<id_services>' => 'request/get', // сделан
  'POST addmerch' => 'merch/add', // сделан
  'DELETE dltmerch/<id_merch>' => 'merch/dltmerch',
  'PUT redmerch/<id_merch>' => 'merch/redmerch',
  'GET watchmerch' => 'merch/watchmerch', // сделан
  'POST addservice' => 'service/adds', // сделан
  'DELETE dltservice/<id_services>' => 'service/dltservice',
  'PUT redservice/<id_services>' => 'service/redservice',
  'GET watchservices' => 'service/watchservices'// сделан
   //['class' => 'yii\rest\UrlRule', 'controller' => 'user'], (это вкл если 3)
   // 'POST register' => 'user/create',
  //  'POST login' => 'user/login',
  //  'GET station' => 'station/index',
  //  'GET station/<id>' => 'station/view',
  //  'GET trip' => 'trip/search'
    
],
]
],
'params' => $params,
];
if (YII_ENV_DEV) {
// configuration adjustments for 'dev' environment
$config['bootstrap'][] = 'debug';
$config['modules']['debug'] = [
'class' => 'yii\debug\Module',
// uncomment the following to add your IP if you are not connecting from localhost.
'allowedIPs' => ['127.0.0.1', '::1', '*'],
];
$config['bootstrap'][] = 'gii';
$config['modules']['gii'] = [
'class' => 'yii\gii\Module',
// uncomment the following to add your IP if you are not connecting from localhost.
'allowedIPs' => ['127.0.0.1', '::1','*' ],
];
}
return $config;
