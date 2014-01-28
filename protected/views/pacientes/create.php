<?php
/* @var $this PacientesController */
/* @var $model Pacientes */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Pacientes', 'url'=>array('index')),
	array('label'=>'Gestionar Pacientes', 'url'=>array('admin')),
);
<?php
$message = 'Hello World!';
$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
$mailer->Host = 'smtp.yiiframework.com';
$mailer->IsSMTP();
$mailer->From = 'alejandropoyogarrido@gmail.com';
//$mailer->AddReplyTo('wei@example.com');
$mailer->AddAddress(''carlosmarde@gmail.com');
$mailer->FromName = 'Alejandro Poyo';
$mailer->CharSet = 'UTF-8';
$mailer->Subject = Yii::t('demo', 'Yii rulez!');
$mailer->Body = $message;
$mailer->Send();
?>

<h1>Crear Pacientes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>