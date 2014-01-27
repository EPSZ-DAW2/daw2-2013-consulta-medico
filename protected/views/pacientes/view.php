<?php
/* @var $this PacientesController */
/* @var $model Pacientes */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->IdPaciente,
);

$this->menu=array(
	array('label'=>'Listar Pacientes', 'url'=>array('index')),
	array('label'=>'Crear Pacientes', 'url'=>array('create')),
	array('label'=>'Actualizar Pacientes', 'url'=>array('update', 'id'=>$model->IdPaciente)),
	array('label'=>'Borrar Pacientes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdPaciente),'confirm'=>'¿Está seguro de que desea eliminar este paciente?')),
	array('label'=>'Gestionar Pacientes', 'url'=>array('admin')),
);
?>

<h1>Ver Pacientes #<?php echo $model->IdPaciente; ?></h1>

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
