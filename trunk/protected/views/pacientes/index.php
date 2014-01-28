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

Yii::import('ext.yii-mail.YiiMailMessage');
 $message = new YiiMailMessage;
 $message->setBody('Message content here with HTML', 'text');
 $message->subject = 'My Subject';
 $message->addTo('carlosmarde@gmail.com');
 $message->from = Yii::app()->params['adminEmail'];
 Yii::app()->mail->send($message);

?>
<h1>Pacientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
