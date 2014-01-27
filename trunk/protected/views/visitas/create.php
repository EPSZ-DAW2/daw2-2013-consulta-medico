<?php
/* @var $this VisitasController */
/* @var $model Visitas */

$this->breadcrumbs=array(
	'Visitases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Visitas', 'url'=>array('index')),
	array('label'=>'Manage Visitas', 'url'=>array('admin')),
);
?>

<h1>Create Visitas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>