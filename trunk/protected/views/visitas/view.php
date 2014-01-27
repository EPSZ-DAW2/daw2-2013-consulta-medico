<?php
/* @var $this VisitasController */
/* @var $model Visitas */

$this->breadcrumbs=array(
	'Visitases'=>array('index'),
	$model->IdCita,
);

$this->menu=array(
	array('label'=>'List Visitas', 'url'=>array('index')),
	array('label'=>'Create Visitas', 'url'=>array('create')),
	array('label'=>'Update Visitas', 'url'=>array('update', 'id'=>$model->IdCita)),
	array('label'=>'Delete Visitas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdCita),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Visitas', 'url'=>array('admin')),
);
?>

<h1>View Visitas #<?php echo $model->IdCita; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdCita',
		'IdPaciente',
		'Fecha_hora',
		'Notas',
		'Estado',
	),
)); ?>
