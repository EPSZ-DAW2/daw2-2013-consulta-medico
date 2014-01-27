<?php
/* @var $this AseguradorasController */
/* @var $model Aseguradoras */

$this->breadcrumbs=array(
	'Aseguradoras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Aseguradoras', 'url'=>array('index')),
	array('label'=>'Manage Aseguradoras', 'url'=>array('admin')),
);
?>

<h1>Create Aseguradoras</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>