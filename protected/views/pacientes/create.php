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


?>

<h1>Crear Pacientes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>