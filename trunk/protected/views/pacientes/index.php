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

$message = 'Hello World!';
Yii::app()->mailer->Host = 'smtp.yiiframework.com';
Yii::app()->mailer->IsSMTP();
Yii::app()->mailer->From = 'alejandropoyogarrido@gmail.com';
Yii::app()->mailer->FromName = 'Alejandro';
//Yii::app()->mailer->AddReplyTo('wei@pradosoft.com');
Yii::app()->mailer->AddAddress('carlosmarde@gmail.com');
Yii::app()->mailer->Subject = 'Correo Yii!';
Yii::app()->mailer->Body = $message;
Yii::app()->mailer->Send();

?>
<h1>Pacientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
