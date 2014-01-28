<?php
/* @var $this PacientesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pacientes',
);

$this->menu=array(
	array('label'=>'Crear Pacientes', 'url'=>array('create')),
	array('label'=>'Gestionar Pacientes', 'url'=>array('admin')),
);

Yii:import("extensions.mailer.*");
$message = 'Hello World!';
$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
$mailer->Host = <your smtp host>;
$mailer->IsSMTP();
$mailer->From = 'alejandropoyogarrido@gmail.com';
//$mailer->AddReplyTo('wei@example.com');
$mailer->AddAddress('alejandropoyogarrido@gamil.com');
$mailer->FromName = 'Alejandro Poyo';
$mailer->CharSet = 'UTF-8';
$mailer->Subject = Yii::t('demo', 'Yii rulez!');
$mailer->Body = $message;
$mailer->Send();

<h1>Pacientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
