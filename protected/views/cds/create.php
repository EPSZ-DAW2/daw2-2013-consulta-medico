<?php
/* @var $this CdsController */
/* @var $model Cds */

$this->breadcrumbs=array(
	'Cds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cds', 'url'=>array('index')),
	array('label'=>'Manage Cds', 'url'=>array('admin')),
);
?>

<h1>Create Cds</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>