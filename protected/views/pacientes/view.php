<?php
/* @var $this PacientesController */
/* @var $model Pacientes */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->IdPaciente,
);

$this->menu=array(
	array('label'=>'List Pacientes', 'url'=>array('index')),
	array('label'=>'Create Pacientes', 'url'=>array('create')),
	array('label'=>'Update Pacientes', 'url'=>array('update', 'id'=>$model->IdPaciente)),
	array('label'=>'Delete Pacientes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdPaciente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pacientes', 'url'=>array('admin')),
);
?>

<h1>View Pacientes #<?php echo $model->IdPaciente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdPaciente',
		'Apellidos',
		'Nombre',
		'DNI_NIF',
		'Fecha_nacimiento',
		'Direccion',
		'CodPostal',
		'Localidad',
		'Provincia',
		'TelFijo',
		'TelMovil',
		'Email',
		'idAseguradora',
		'Notas',
	),
)); ?>
