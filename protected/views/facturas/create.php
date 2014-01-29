<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Facturases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Facturas', 'url'=>array('index')),
	array('label'=>'Manage Facturas', 'url'=>array('admin')),
);
?>

<h1>Create Facturas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>