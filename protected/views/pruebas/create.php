<?php
/* @var $this PruebasController */
/* @var $model Pruebas */

$this->breadcrumbs=array(
	'Pruebases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pruebas', 'url'=>array('index')),
	array('label'=>'Manage Pruebas', 'url'=>array('admin')),
);
?>

<h1>Create Pruebas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>