<?php
/* @var $this PacientesController */
/* @var $model Pacientes */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->IdPaciente,
);

$this->menu=array(
	array('label'=>'Listar Pacientes', 'url'=>array('index')),
	array('label'=>'Crear Pacientes', 'url'=>array('create'), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Actualizar Pacientes', 'url'=>array('update', 'id'=>$model->IdPaciente), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Borrar Pacientes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdPaciente),'confirm'=>'¿Está seguro de que desea eliminar este paciente?'), 'visible'=>!$this->esPerfil('paciente')), 
	array('label'=>'Gestionar Pacientes', 'url'=>array('admin'), 'visible'=>!$this->esPerfil('paciente')), 
);
?>

<h1>Ver Paciente: <?php echo $model->DNI_NIF; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile' => false,
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
		'aseguradoras.Nombre',
		'Notas',
	),
)); ?>

<h1>Visitas</h1>
<?php 
$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider1,
			'itemView'=>'../visitas/_view',
			//'viewData'=>array('fecha'=>$fechas),
		)); 
?>

<h1>Pruebas</h1>
<?php 
$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider2,
			'itemView'=>'../pruebas/_view',
			//'viewData'=>array('fecha'=>$fechas),
		)); 
?>
