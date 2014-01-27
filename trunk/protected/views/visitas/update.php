<?php
/* @var $this VisitasController */
/* @var $model Visitas */

$this->breadcrumbs=array(
	'Visitas'=>array('index'),
	$model->IdCita=>array('view','id'=>$model->IdCita),
	'Update',
);

$this->menu=array(
	array('label'=>'List Visitas', 'url'=>array('index')),
	array('label'=>'Create Visitas', 'url'=>array('create')),
	array('label'=>'View Visitas', 'url'=>array('view', 'id'=>$model->IdCita)),
	array('label'=>'Manage Visitas', 'url'=>array('admin')),
);
?>

<h1>Update Visitas <?php echo $model->IdCita; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>