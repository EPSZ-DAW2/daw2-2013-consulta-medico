<?php
/* @var $this PruebasController */
/* @var $model Pruebas */

$this->breadcrumbs=array(
	'Pruebases'=>array('index'),
	$model->IdPrueba=>array('view','id'=>$model->IdPrueba),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pruebas', 'url'=>array('index')),
	array('label'=>'Create Pruebas', 'url'=>array('create')),
	array('label'=>'View Pruebas', 'url'=>array('view', 'id'=>$model->IdPrueba)),
	array('label'=>'Manage Pruebas', 'url'=>array('admin')),
);
?>

<h1>Update Pruebas <?php echo $model->IdPrueba; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>