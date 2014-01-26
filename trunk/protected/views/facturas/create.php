<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Factura', 'url'=>array('index')),
	array('label'=>'Manage Factura', 'url'=>array('admin')),
);
?>

<h1>Create Facturas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>