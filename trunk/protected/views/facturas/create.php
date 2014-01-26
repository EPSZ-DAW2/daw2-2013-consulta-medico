<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */

$this->breadcrumbs=array(
	'Perfiles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Perfiles', 'url'=>array('index')),
	array('label'=>'Manage Perfiles', 'url'=>array('admin')),
);
?>

<h1>Create Perfiles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>