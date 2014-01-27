<?php
/* @var $this VisitasController */
/* @var $model Visitas */

$this->breadcrumbs=array(
	'Visitas'=>array('index'),
	$model->IdCita,
);

$this->menu=array(
	array('label'=>'Listar Visitas', 'url'=>array('index')),
	array('label'=>'Crear Visitas', 'url'=>array('create')),
	array('label'=>'Actulizar Visitas', 'url'=>array('update', 'id'=>$model->IdCita)),
	array('label'=>'Borrar Visitas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdCita),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Visitas', 'url'=>array('admin')),
);
?>

<h1>Ver Visitas #<?php echo $model->IdCita; ?></h1>

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
