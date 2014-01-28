<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();

$message = 'Hola jandro, ojala esto este funcionando';
$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
$mailer->Host = 'smtp.yiiframework.com';
$mailer->IsSMTP();
$mailer->From = 'carlosmarde@gmail.com';
$mailer->AddAddress('alejandropoyogarrido@gmail.com');
$mailer->FromName = 'Wei Yard';
$mailer->CharSet = 'UTF-8';
$mailer->Subject = Yii::t('demo', 'Yii rulez!');
$mailer->Body = $message;
$mailer->Send();
